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
	<div style="width:600px;height:300px;margin:100px auto;">
		<form action="delete2employee.php" method="POST">
			<center>
		<input type="text" name="id" placeholder="Enter EmployeeID" class="input" required style="width:80">
		<input type="submit" name="submit" value="Delete Employee" class="btn" onclick="fun()">
	</center>
	<script type="text/javascript">
		function fun()
		{
			var res=confirm("Do you really want to delete?");
			if(res==true)
			{
				<?php
				$server="localhost";
				$username="root";
				$password="";
				$dbname="payroll";
				$conn= new mysqli($server,$username,$password,$dbname);
				if(isset($_POST['submit']))
				{
					$id=$_POST['id'];
					//echo "<script>alert($id)</script>";
					$sql = "delete from employee where eid='$id'";
					if(mysqli_query($conn, $sql))
					{
						echo "<script>alert('Successfully deleted !!!')</script>";
						//header("Location: delete2employees.php");
					}
					else
					{
						echo "<script>alert('Employee Not Found !!!')</script>";
						//header("Location: viewallemployees.php");
					}
				}
				?>
			}
		}
	</script>
	</div>
	</body>
</html>