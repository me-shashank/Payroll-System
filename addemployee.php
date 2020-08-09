<?php
include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>OPMS</title>
	<link rel="icon" href="fav.png" type="image/gif" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Germania+One|Gloria+Hallelujah|Indie+Flower|Lobster|Pacifico" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
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
<div class="body" id="addemployee">
	<div class="red" style="margin:10px auto; height:780px;">
		<div class="admin">ADD NEW EMPLOYEE</div>
		<div class="white" style="margin:0px auto; height:680px;">
	<form  method="post" name="login" enctype="multipart/form-data">
	<table style="margin:30px; text-align: left;">
		<tr>
			<th>Name:</th>
			<td><input id="emp" type="text" name="name" placeholder="Name" required></td>
		</tr>
		<tr>
			<th>Father's Name:</th>
			<td><input id="emp" type="text" name="fathername" placeholder="Father's Name" required></td>
		</tr>
		<tr>
			<th>Mother's Name:</th>
			<td><input id="emp" type="text" name="mothername" placeholder="Mother's Name" required></td>
		</tr>
		<tr>
			<th>Email:</th>
			<td><input id="emp" type="text" name="email" placeholder="Email Id" required></td>
		</tr>
		<tr>
			<th>Mobile Number:</th>
			<td><input id="emp" type="text" name="mob" placeholder="Mobile Number" required></td>
		</tr>
		<tr>
			<th>Gender:</th>
			<td><input id="r" type="radio" name="gender" value="Male">Male &nbsp;<input id="r" type="radio" name="gender" value="Female">Female</td>
			
		</tr>
		<tr>
			<th>Department:</th>
			<td><input id="emp" type="text" name="dep" placeholder="Department" required></td>
		</tr>
		<tr>
			<th>Grade:</th>
			<td><select id="emp" name="grade" required>
				<option>Select Grade</option>
				<option>A</option>
				<option>B</option>
				<option>C</option>
			</select></td>
		</tr>
		<tr>
			<th>Address:</th>
			<td><input id="emp" type="text" name="add" placeholder="Area/Road/Street" required></td>
		</tr>
		<tr>
			<th>City:</th>
			<td><input id="emp" type="text" name="city" placeholder="City" required></td>
		</tr>
		<tr>
			<th>State:</th>
			<td><input id="emp" type="text" name="state" placeholder="State" required></td>
		</tr>
		<tr>
			<th>PIN Code:</th>
			<td><input id="emp" type="text" name="pin" placeholder="PIN Number" required></td>
		</tr>
		<tr>
			<th>Upload Image:</th>
			<td>&nbsp;<input type="file" name="image" placeholder="Upload Image" id="emp" required></td>
		</tr>
		
		
	</table>
	<center><input class="btn" style="margin-top: 0px; width: 60%" type="submit" name="submit3" value="ADD EMPLOYEE" onclick="stay()"></center>
    </form>
    <?php

      if(isset($_POST['submit3']))
      {
        $server="localhost";
		$username="root";
		$password="";
		$dbname="payroll";
		$conn= new mysqli($server,$username,$password,$dbname);
        
        $name=$_POST['name'];
        $fname=$_POST['fathername'];
        $mname=$_POST['mothername'];
        $email=$_POST['email'];
        $mob=$_POST['mob'];
        $gender=$_POST['gender'];
        $dep=$_POST['dep'];
        $grade=$_POST['grade'];
        $add=$_POST['add'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $pin=$_POST['pin'];
        $filename=$_FILES["image"]["name"];
		$tempname=$_FILES["image"]["tmp_name"];
		$folder="empdata/".$filename;
        move_uploaded_file($tempname, $folder);

        $sql="insert into employee values('$name','$fname','$mname','$email','$mob','$gender','$dep','$grade','$add','$city','$state','$pin','$folder')";
		
		if(mysqli_query($conn, $sql))
		{
			echo "<script>alert('DATA ADDED SUCCESSFULLY')</script>";
		}
		else
		{
			echo "<script>alert('ERROR IN INSERTING DATA!')</script>";
		}
		$query="insert into users values('$email','$mob')";
		mysqli_query($conn, $query);
	 }
	 ?>
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


