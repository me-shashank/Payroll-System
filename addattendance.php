<!DOCTYPE html>
<html>
<head>
	<title>OPMS</title>
	<link rel="icon" href="fav.png" type="image/gif" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Germania+One|Gloria+Hallelujah|Indie+Flower|Lobster|Pacifico" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	</head>
<body>
<div class="header">
	<div class="icon">
		<a href="adminhome.php"><img src="images/house.png" height="60px"></a>
	</div>
	<div class="pp">
		<img src="pp.png" height="100%">
	</div>
	<div class="panda">
		PAYROLL <font color="05AABC">PANDA</font>
	</div>
	<div class="date">
		<div id="clockbox"></div>
	</div>
</div>
<div class="body" id="attendance" style="background-color: blue;">

<br><br><br>
	<div class="red" style="margin:0px auto;height:auto;">
	<div class="admin">ADD ATTENDANCE</div>
	<div class="white" style="height:auto;">
     <center>
     	<br>
     	<form action="" method="post" name="login" onsubmit="return validate()">
     	<input type="text" placeholder="EmployeeId" name="eid" class="input"><br>
     	<input type="text" placeholder="Total No of Working Days" name="twd" class="input"><br>
     	<input type="text" placeholder="No Of Days Worked" name="ndp" class="input"><br>
        <input type="text" placeholder="No of Days Overtime Done" name="ndo" class="input"><br>
        <select class="month" name="month">
	    <option value=''>--Select Month--</option>
	    <option value='1'>Janaury</option>
	    <option value='2'>February</option>
	    <option value='3'>March</option>
	    <option value='4'>April</option>
	    <option value='5'>May</option>
	    <option value='6'>June</option>
	    <option value='7'>July</option>
	    <option value='8'>August</option>
	    <option value='9'>September</option>
	    <option value='10'>October</option>
	    <option value='11'>November</option>
	    <option value='12'>December</option>
	    </select> 
        <input type="submit" name="submit4" value="Add Attendance" class="btn">
        <br>
        <br>
      </form>
  </center>
  <?php
      if(isset($_POST['submit4']))
      {
        $server="localhost";
		$username="root";
		$password="";
		$dbname="payroll";
		$conn= new mysqli($server,$username,$password,$dbname);

		$eid=$_POST['eid'];
		$twd=$_POST['twd'];
		$ndp=$_POST['ndp'];
		$ndo=$_POST['ndo'];
		$month=$_POST['month'];
		$basic=0;
		$ta=0;
		$hra=0;
		$medical=0;
		$overtime=0;
		$bonus=0;
		$tax=0;
		$net=0;
		$sql="select * from employee where eid=$eid";
		$result=mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) > 0) 
         {
		   $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
		   $grade=$row['grade'];
		   if($grade=='A')
		   {
              $basic=80000;
              $medical=10000;  
		   }
		   if($grade=='B')
		   {
              $basic=60000;
              $medical=8000;  
		   }if($grade=='C')
		   {
              $basic=40000;
              $medical=5000;  
		   }
		   $hra=(8*$basic)/100;
		   $basic=($ndp/$twd)*$basic;
		   $overtime=($ndo/$twd)*$basic;
		   $ta=(5*$basic)/100;
		   $bonus=2000;
		   $tax=0.05*$basic;
		   $netpay=$basic+$hra+$ta+$bonus+$medical+$overtime-$tax;
		   $sql="insert into salary values($eid,$month,$twd,$ndp,$ndo,$basic,$ta,$hra,$medical,$overtime,$bonus,$tax,$netpay)";
		  if(mysqli_query($conn, $sql))
		  {
		  	echo "<script>alert('Attendance & Salary Added!!');</script>";
		  }
		   
		 }
		 else
		 {
		 	echo "<script>alert('THIS EMPLOYEE NOT EXIST!!');</script>";
		 }		   
      }
  ?>
</div>
<br>
</div>
<div class="left" id="id1">
		<ul>
		  <li><a href="addemployee.php">Add Employee</a></li>
		  <li><a href="viewallemployees.php">Search & View Emp</a></li>
		  <li><a href="addattendance.php">Add Attendance</a></li>
		  <li><a href="newadmin.php">Create New Admin</a></li>
		  <li><a href="changeadminpass.php">Change Password</a></li>
  		  <li><a href="logout.php">LogOUT</a></li>
		</ul>
</div>
<script type="text/javascript">
    var tday=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
    var tmonth=["January","February","March","April","May","June","July","August","September","October","November","December"];
    function GetClock(){
    var d=new Date();
    var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();
    var nhour=d.getHours(),nmin=d.getMinutes(),ap;
if(nhour==0){ap=" AM";nhour=12;}
else if(nhour<12){ap=" AM";}
else if(nhour==12){ap=" PM";}
else if(nhour>12){ap=" PM";nhour-=12;}
if(nmin<=9) nmin="0"+nmin;
var clocktext=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+ap+"";
document.getElementById('clockbox').innerHTML=clocktext;
}
GetClock();
setInterval(GetClock,1000);
function myFunction() {
  var x = document.getElementById("id1");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
</body>
</html>



</div>