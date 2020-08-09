<?php
		$server="localhost";
		$username="root";
		$password="";
		$dbname="payroll";
		$conn= new mysqli($server,$username,$password,$dbname);
		$id=$_GET['id'];
		//echo "<script>alert($id)</script>";
		$sql = "delete from employee where eid='$id'";
		if(mysqli_query($conn, $sql))
		{
			echo "<script>alert('Successfully deleted')</script>";
			header("Location: viewallemployees.php");
		}
		else
		{
			echo "<script>alert('Data not deleted')</script>";
			header("Location: viewallemployees.php");
		}

?>