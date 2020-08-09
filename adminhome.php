<?php
include('session.php');
		$server="localhost";
		$username="root";
		$password="";
		$dbname="payroll";
		$conn= new mysqli($server,$username,$password,$dbname);
$sql="SELECT count(*) as total from employee";
$result=mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$nop=$row['total'];
$mail= $_SESSION['username'];
$sql="select * from admin where email='$mail'";
$res=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
$name=$row['name'];
$src=$row['src'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>OPMS</title>
	<link rel="icon" href="fav.png" type="image/gif" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Germania+One|Gloria+Hallelujah|Indie+Flower|Lobster|Pacifico" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<style type="text/css">
	 .a1 a
		{
			text-decoration: none;
			color:gray;
			text-align: center;
			font-size: 20px;
		}
		.d1{
			width:200px;margin:20px;height:140px;background-color:grey;border:3px solid black;float:left;
			border-radius: 10PX;
		    box-shadow: 3px 5px 7px gray;
		}
		.d2{
			width:100%;height:100px;background-color:white; border-top-right-radius:5px;border-top-left-radius: 5px;
		}
		.d3{
			width:100%;height:100px;float:left;
		}
		.d4{
			font-size:15px;color:#D7DBDD;text-align: center;font-weight: bold;line-height: 40px;
		}
		.d4 a
		{
			text-decoration: none;
			color:white;
		}
	</style>
</head>
<body class="back">
<div class="header" style="position: fixed;">
	<div class="icon">
	
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
<div class="con2" style="width:100%;height:970px;top:100px;position: absolute;z-index:-8;background-color:#D0D3D4">
<div class="a1" style="width:20%;height:570px;background-color:#17202A;float:left;top:100px;position:fixed;">
	<div class="admimg" style="width:70%;height:200px;background-color:grey;border-radius: 20px; margin:25px auto;">
		<img src="<?php echo $src; ?>" width="100%" height="100%" style="border-radius: 20px; border:3px solid white;">
	</div>
	<br><p style="color:white;text-align: center; font-size: 18px; font-family: verdana;font-weight: bold;">Hello <?php echo $name; ?></p>
	<br>
	<ul>
	<li><a href="updateadmin.php">Update Profile </a></li>
	<li><a href="logout.php">LogOut</a></li>
    </ul>
</div>
<div class="a2"style="width:60%;left:20%;top:0px;height:970px;position: absolute;background-color: #D0D3D4 ;">

	<div class="d1" style="margin-left: 40px;">
		<div class="d2">
			<div class="d3">
			<center><img src="images/users.png" height="100px"></center>
		    </div>
		</div>
		<p class="d4">
			<a href="addemployee.php" >ADD EMPLOYEES</a>
		</p>
	</div>

	<div class="d1">
		<div class="d2">
			<div class="d3">
			<center><img src="images/2.png" height="100px"></center>
		    </div>
		</div>
		<p class="d4">
			<a href="addattendance.php">ADD ATTENDANCE</a>
		</p>
	</div>

	<div class="d1">
		<div class="d2">
			<div class="d3">
			<center><img src="images/all.png" height="100px"></center>
		    </div>
		</div>
		<p class="d4">
			<a href="viewallemployees.php" >VIEW ALL</a>
		</p>
	</div>

	<div class="d1" style="margin-left: 40px;">
		<div class="d2">
			<div class="d3">
			<center><img src="images/4.png" height="100px"></center>
		    </div>
		</div>
		<p class="d4">
			<a href="searchemployee.php">SEARCH EMPLOYEES</a>
		</p>
	</div>

	<div class="d1">
		<div class="d2">
			<div class="d3">
			<center><img src="images/5.png" height="100px"></center>
		    </div>
		</div>
		<p class="d4">
			<a href="update.php" >UPDATE NEW EMPLOYEE</a>
		</p>
	</div>

	<div class="d1">
		<div class="d2">
			<div class="d3">
			<center><img src="images/6.png" height="100px"></center>
		    </div>
		</div>
		<p class="d4">
			<a href="delete2employee.php">DELETE EMPLOYEE</a>
		</p>
	</div>

	<div class="d1" style="margin-left: 40px;">
		<div class="d2">
			<div class="d3">
			<center><img src="images/9.png" height="100px"></center>
		    </div>
		</div>
		<p class="d4">
			<a href="employeesalary.php" >VIEW SALARY
		</p>
	</div>

	<div class="d1" >
		<div class="d2">
			<div class="d3">
			<center><img src="images/7.png" height="100px"></center>
		    </div>
		</div>
		<p class="d4">
			<a href="newadmin.php" >CREATE NEW ADMIN</a>
		</p>
	</div>

	<div class="d1">
		<div class="d2">
			<div class="d3">
			<center><img src="images/8.png" height="100px"></center>
		    </div>
		</div>
		<p class="d4">
			<a href="changeadminpass.php">CHANGE PASSWORD</a>
		</p>
	</div>

</div>
<div class="a3" style="width:20%;float:left;top:100px;height:970px;position:fixed;left:80%;">
	<br>
	<br>
	<div style="width:100%;margin-bottom:20px;height:140px;background-color:grey; border-radius:15px;">
		<div style="width:100%;height:100px;background-color:#3498DB; border-top-right-radius:15px; border-top-left-radius: 15px;">
			<div style="width:50%;height:100px;float:left">
			<img src="images/users.png" height="100px">
		    </div>
		    <div style="width:50%;height:100px;float:left">
			  <p style="line-height:100px;font-weight: bold;font-size:35px;color:white;"><?php echo $nop; ?></p>
		    </div>
		</div>
		<p style="font-size:15px;color:white;text-align: center;font-weight: bold;line-height: 40px;">
			TOTAL NO OF EMPLOYEES
		</p>
		
	</div>

	<div style="width:100%;margin-bottom:20px;height:140px;background-color:grey; border-radius: 15px;">
		<div style="width:100%;height:100px;background-color:#F1C40F; border-top-right-radius:15px; border-top-left-radius: 15px;"><center>
			<p style="line-height:100px;font-weight: bold;color:black;font-size: 40px;">RS 100000
		</div>
		<p style="font-size:15px;color:white;text-align: center;font-weight: bold;line-height: 40px;">
			NET SALARY PAID THIS MONTH
		</p>
		
	</div>
	<div style="width:100%;margin-bottom:20px;height:140px;background-color:grey; border-radius: 15px;">
		<div style="width:100%;height:100px;background-color:#2ECC71  ;border-top-right-radius:15px; border-top-left-radius: 15px;"><center>
			<img src="images/order.png" height="100px"></center>
		</div>
		<p style="font-size:15px;color:white;text-align: center;font-weight: bold;line-height: 40px;">
			NEW MAILS
		</p>
		
	</div>
	
</div>
</div>



<!--div class="left" id="id1">
		<ul>
		  <li><a href="addemployee.php">Add Employee</a></li>
		  <li><a href="viewallemployees.php">Search & View Emp</a></li>
		  <li><a href="addattendance.php">Add Attendance</a></li>
		  <li><a href="newadmin.php">Create New Admin</a></li>
		  <li><a href="changeadminpass.php">Change Password</a></li>
		  <li><a href="mysalaryslip.php">View Salary</a></li>
  		  <li><a href="logout.php">LogOUT</a></li>
		</ul>
</div-->
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