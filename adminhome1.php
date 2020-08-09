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
	<script>
		function viewemployee() 
		{
			var a = document.getElementById("profile");
	        a.style.display = "block";
			var b = document.getElementById("addemployee");
	        b.style.display = "none";
	        var x = document.getElementById("changepassword");
	        x.style.display = "none";
	        var y = document.getElementById("createnewadmin");
	        y.style.display = "none";
	        var z = document.getElementById("id1");
	        z.style.display = "none";
      }
		function addnewemployee() 
		{
			var a = document.getElementById("addemployee");
	        a.style.display = "block";
	        var x = document.getElementById("changepassword");
	        x.style.display = "none";
	        var y = document.getElementById("createnewadmin");
	        y.style.display = "none";
	        var z = document.getElementById("id1");
	        z.style.display = "none";
      }
		function changepassword() {
        var x = document.getElementById("changepassword");
         x.style.display = "block";
         var y = document.getElementById("createnewadmin");
          y.style.display = "none";
          var z = document.getElementById("id1");
          z.style.display = "none";
      }
      function createnewadmin() {
        var x = document.getElementById("createnewadmin");
         x.style.display = "block";
         var y = document.getElementById("changepassword");
          y.style.display = "none";
          var z = document.getElementById("id1");
          z.style.display = "none";
      }
	</script>
</head>
<body>
<div class="header">
	<div class="icon">
		<i class="fa fa-bars fa-3x" aria-hidden="true" onclick="myFunction()"></i>
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
	<div class="red" style="margin:0px auto;">
	<div class="admin">CREATE NEW ADMIN</div>
	<div class="white">
     <center>
     	<br>
     	<form action="" method="post" name="login" onsubmit="return validate()">
     	<input type="text" placeholder="Email:" name="email" class="input"><br>
        <input type="password" placeholder="Password:" name="pass" class="input"><br>
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

		$email=$_POST['email'];
		$password=$_POST['pass'];
        $sql="insert into  admin values('$email','$password')";
        if(mysqli_query($conn, $sql))
		 {
	        echo("New Admin Created SUCCESSFULLY !!!");
	     }
	     else
	     echo("Admin Creation Failed");
         
	 }
	 ?>
	</center>
	</div>
</div>
</div>
<div class="body" id="changepassword"  >
	<br><br><br><br>
	<div class="red" style="margin:0px auto;">
	<div class="admin">CHANGE PASSWORD</div>
	<div class="white">
     <center>
     	<br>
     	<form action="" method="post" name="login" onsubmit="return validate()">
     		<input type="text" placeholder="Email:" name="email" class="input"><br>
     	<input type="text" placeholder="New Password:" name="pass1" class="input"><br>
        <input type="password" placeholder="Confirm Password:" name="pass2" class="input"><br>
        <input type="submit" name="submit2" value="Change Password" class="btn">
      </form>
     <?php
      if(isset($_POST['submit2']))
      {
        $server="localhost";
		$username="root";
		$password="";
		$dbname="payroll";
		$conn= new mysqli($server,$username,$password,$dbname);
        $email=$_POST['email'];
		$pass1=$_POST['pass1'];
		$pass2=$_POST['pass2'];
        $sql="update admin set password='$pass2' where email='$email'";
         if(mysqli_query($conn, $sql))
		 {
	        echo("Password Updated SUCCESSFULLY !!!");
	     }
	     else
	     echo("Password Updation Failed !!");
	 }
	 ?>
	</center>
	</div>
</div>
</div>

<div class="body" id="addemployee">
	<div class="red" style="margin:10px auto; height:600px;">
		<div class="admin">ADD NEW EMPLOYEE</div>
		<div class="white" style="margin:0px auto; height:500px;">
	<table style="margin:30px; text-align: left;">
		<tr>
			<th>Name:</th>
			<td><input id="emp" type="text" name="name" placeholder="Name"></td>
		</tr>
		<tr>
			<th>Father's Name:</th>
			<td><input id="emp" type="text" name="fathername" placeholder="Father's Name"></td>
		</tr>
		<tr>
			<th>Mother's Name:</th>
			<td><input id="emp" type="text" name="mothername" placeholder="Mother's Name"></td>
		</tr>
		<tr>
			<th>Email:</th>
			<td><input id="emp" type="text" name="email" placeholder="Email Id"></td>
		</tr>
		<tr>
			<th>Mobile Number:</th>
			<td><input id="emp" type="text" name="mob" placeholder="Mobile Number"></td>
		</tr>
		<tr>
			<th>Gender:</th>
			<td><input id="r" type="radio" name="male">Male</td>
			<td><input id="r" type="radio" name="female">Female</td>
		</tr>
		<tr>
			<th>Department:</th>
			<td><input id="emp" type="text" name="dep" placeholder="Department"></td>
		</tr>
		<tr>
			<th>Grade:</th>
			<td><select id="emp">
				<option>Select Grade</option>
				<option>Grade A</option>
				<option>Grade B</option>
				<option>Grade C</option>
			</select></td>
		</tr>
		<tr>
			<th>Address:</th>
			<td><input id="emp" type="text" name="add" placeholder="Address"></td>
		</tr>
		<tr>
			<th>City:</th>
			<td><input id="emp" type="text" name="city" placeholder="City"></td>
		</tr>
		<tr>
			<th>State:</th>
			<td><input id="emp" type="text" name="state" placeholder="State"></td>
		</tr>
		<tr>
			<th>PIN Number:</th>
			<td><input id="emp" type="text" name="pin" placeholder="PIN Number"></td>
		</tr>
	</table>
	</div>
</div>
</div>

<div class="body" id="profile">
	<div class="red" style="margin:0px auto; width: 100%; height:700px;">
	<div class="admin">MY PRPFILE</div>
	<div class="white" style="margin:0px auto; width: 1300px; height:600px;">

		<div class="1" style="margin:50px ; float: left;">
			<img src="fav.png" width="100px" height="100px">
		</div>
		<div class="2" style="margin:50px; background-color: #05AABC; float: left;">
			<h1>Persional Details</h1>
		</div>
		<div class="3" style=" ">
			<h1>Organizational Details</h1>
		</div>
	</div>
	</div>
</div>



<div class="left" id="id1">
		<ul>
		  <li><a onclick="addnewemployee()">Add Employee</a></li>
		  <li><a onclick="viewemployee()">Search & View Emp</a></li>
		  <li><a >Add Attendance</a></li>
		  <li><a onclick="createnewadmin()">Create New Admin</a></li>
		  <li><a onclick="changepassword()">Change Password</a></li>
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