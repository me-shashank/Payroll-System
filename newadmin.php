
<?php
include('session.php');
?><!DOCTYPE html>
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
<div class="body" id="createnewadmin"><br><br><br><br>
	<div class="red" style="margin:0px auto; height: 450px;">
	<div class="admin">CREATE NEW ADMIN</div>
	<div class="white" style="height: 350px;">
     <center>
     	<br>
     	<form action="" method="post" name="login" onsubmit="return validate()" enctype="multipart/form-data">
     	<input type="text" placeholder="Name:" name="name" class="input"><br>
     	<input type="text" placeholder="Email:" name="email" class="input"><br>
        <input type="password" placeholder="Password:" name="pass" class="input"><br>
        <input type="file" name="image" placeholder="Upload Image" id="emp" required><br>
        <input type="submit" name="submit" value="CreateNewAdmin" class="btn">
      </form>
     <?php
      if(isset($_POST['submit']))
      {
        $server="localhost";
		$username="root";
		$password="";
		$dbname="payroll";
		$conn= new mysqli($server,$username,$password,$dbname);
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['pass'];
		$filename=$_FILES["image"]["name"];
		$tempname=$_FILES["image"]["tmp_name"];
		$folder="empdata/".$filename;
        move_uploaded_file($tempname, $folder);

        $sql="insert into  admin values('$email','$password','$name','$folder')";
        if(mysqli_query($conn, $sql))
		 {
		 	echo "<script>alert('New Admin Created SUCCESSFULLY !!!');</script>";
	        
	     }
	     else
	     	echo "<script>alert('Admin Creation Failed');</script>";
         
	 }
	 ?>
	</center>
	</div>
</div>
</div>
<div class="left" id="id1">
		<ul>
		  <li><a href="addemployee.php">Add Employee</a></li>
		  <li><a href="viewallemployees.php">Search & View Emp</a></li>
		  <li><a href="addattendance.php">Add Attendance</a></li>
		  <li><a href="newadmin.php">Create New Admin</a></li>
		  <li><a href="changeadminpass.php">Change Password</a></li>
		   <li><a href="mysalaryslip.php">View Salary</a></li>
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