<?php
include('session.php');
$id=$_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
	function myFunction() 
	{
  		var x = document.getElementById("id1");
  		if (x.style.display === "none") {
    	x.style.display = "block";
  	} 
  	else
  	{
    	x.style.display = "none";
  	}
}
</script>
</head>
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
<div class="body" id="addemployee" style="display: block;">
	<div class="red" style="margin:10px auto; height:560px;">
		<div class="admin">UPDATE EMPLOYEE</div>
		<div class="white" style="margin:0px auto; height:460px;">
	<form  method="post" name="login" enctype="multipart/form-data">
	<table style="margin:30px; text-align: left;">
		<tr>
			<th>Email:</th>
			<td><input id="emp" type="text" name="email" placeholder="Email Id" required></td>
		</tr>
		<tr>
			<th>Mobile Number:</th>
			<td><input id="emp" type="text" name="mob" placeholder="Mobile Number" required></td>
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
	<center><input class="btn" style="margin-top: 0px; width: 60%" type="submit" name="submit3" value="Update" onclick="stay()"></center>
    </form>
    <?php
      if(isset($_POST['submit3']))
      {
        $server="localhost";
		$username="root";
		$password="";
		$dbname="payroll";
		$conn= new mysqli($server,$username,$password,$dbname);
        
        
        $email=$_POST['email'];
        $mob=$_POST['mob'];
        $grade=$_POST['grade'];
        $add=$_POST['add'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $pin=$_POST['pin'];
        $filename=$_FILES["image"]["name"];
		$tempname=$_FILES["image"]["tmp_name"];
		$folder="empdata/".$filename;
        move_uploaded_file($tempname, $folder);

        $sql="update employee set email='$email',mob='$mob',grade='$grade',address='$add',city='$city',state='$state',pin='$pin',src='$folder' where eid='$id'";
		if(mysqli_query($conn, $sql))
		{
			echo "<script>alert('DATA UPDATED SUCCESSFULLY')</script>";
			header("Location: viewallemployees.php");

		}
		else
		{
			echo "ERROR OCCURED";
			header("Location: updateemployee.php?id='$id'");
		}
	 }
	 ?>
	</div>
</div>
</div>
</body>
</html>