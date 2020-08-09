<?php
include('session2.php');
$id=$_SESSION['id'];
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
<body>
<div class="header" id="header">
	<div class="icon">
		<a href="employeehome.php"><img src="images/house.png" height="60px"></a>
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
<div class="form" style="width:100%;height:100px;background-color:#6B96AD;">
	<center>
	<form action="" method="post" name="login" onsubmit="return validate()">
		<!--input type="text" placeholder="EmployeeId" name="eid" class="input" style="width:200px;margin-right:30px;height:25px;"-->
		<select class="month" name="month" style="width:200px;margin-right:30px;">
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
        <input type="submit"  name="submit" value="Search" class="btn"style="width:200px;" onclick="disp()">
        <br>
        <br>
      </form>
</div>
<div>
	<center>
		<?php
$server="localhost";
$username="root";
$password="";
$dbname="payroll";
$conn= new mysqli($server,$username,$password,$dbname);
if(isset($_POST['submit']))
{
$month=$_POST['month'];

$sql = "Select * from employee where eid='$id'";
$result=mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) 
{
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{
$name=$row['name'];
$email=$row['email'];
$dept=$row['dept'];
}	
		$sql = "Select * from salary where eid='$id' and month='$month'";
		$result=mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0) 
		{
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
			{
				$twd=$row['twd'];
				$ndp=$row['ndp'];
				$ndo=$row['ndo'];
				$basic=$row['basic'];
				$ta=$row['ta'];
				$hra=$row['hra'];
				$medical=$row['medical'];
				$overtime=$row['overtime'];
				$bonus=$row['bonus'];
				$tax=$row['tax'];
				$netpay=$row['netpay'];
				$month=$row['month'];			
			}
			$sum=$tax+$netpay;
			echo '<table id="salary">
			<tr>
				<th rowspan="3" style="text-align:center;">PAYROLL PANDA</th>
				<td rowspan="2" colspan="2" style="text-align:center;">SALARY SLIP</td>
				<th rowspan="3" style="text-align:center;">CONFIDENTIAL</th>
			</tr>
			<tr>

			</tr> 
			<tr>
					<td colspan="2" style="text-align:center;">'.$month.'</td>
			</tr>
			<tr>
				<td >NAME:'.$name.'</td><td>EMPLOYEEID:'.$id.'</td>
				<td >EMAIL:'.$email.'</td><td>DEPARTMENT:'.$dept.'</td>
			</tr>
			<tr>
				<td colspan="2">Total Number of Working Days</td>
				<td colspan="2">'.$twd.'</td>
			</tr>
			<tr>
				<td colspan="2">No of Days Present</td>
				<td colspan="2">'.$ndp.'</td>
			</tr>
			<tr>
				<td colspan="2">No of Days Overtime done</td>
				<td colspan="2">'.$ndo.'</td>
			</tr>
			<tr>
				<th colspan="2">Description</th>
				<th>Earning</th>
				<th>Deduction</th>
			</tr>
			<tr>
				<td colspan="2">Basic Salary</td>
				<td>'.$basic.'</td>
				<td>0</td>
			</tr>
			<tr>
				<td colspan="2">Transport Allowance(TA)</td>
				<td>'.$ta.'</td>
				<td>0</td>
			</tr>
			<tr>
				<td colspan="2">HomeRentAllowance(HRA)</td>
				<td>'.$hra.'</td>
				<td>0</td>
			</tr>
			<tr>
				<td colspan="2">Medical Allowance</td>
				<td>'.$medical.'</td>
				<td>0</td>
			</tr>
			<tr>
				<td colspan="2">Overtime </td>
				<td>'.$overtime.'</td>
				<td>0</td>
			</tr>
			<tr>
				<td colspan="2">Bonus</td>
				<td>'.$bonus.'</td>
				<td>0</td>
			</tr>
			<tr>
				<td colspan="2">Income Tax</td>
				<td>0</td>
				<td>'.$tax.'</td>
			</tr>
			<tr>
				<td colspan="2">TOTAL</td>
				<th>'.$sum.'</th>
				<th>'.$tax.'</th>
			</tr>
			<tr>
				<td>BANK NAME</td>
				<td>XXXXXXXX</td>
				<th colspan="2" style="text-align: center;">NET PAY</th>	
			</tr>
			<tr>
				<td>Transaction Id</td>
				<td>XXXXXXXX</td>
				<td colspan="2" rowspan="3" style="text-align: center;font-size: 50px;font-weight: bold;">RS '.$netpay.'</td>	
			</tr>
			<tr>
				<td>Account Number</td>
				<td>XXXXXXXX</td>
					
			</tr>
			<tr>
				<td>Date</td>
				<td>XXXXXXXX</td>
					
			</tr>	
			<tr>
				<td colspan="4"><center><input type="button" name="button" id="btn1" value="Download PaySlip" class="btn" onclick="download()" style="width:40%;"></center></td>
			</table>';
		}
		else
		{
			echo "<script>alert('SALARY OF THIS MONTH IS NOT CREDITED')</script>";
		}
		}
		else
		{
			echo "<script>alert('Employee Not Exists')</script>";
		}	

		}

		
		?>
	<div id="sign"style="width:100%;height:30px;line-height:30px;background-color: grey;border:1px solid grey;visibility: hidden; margin-top: 30px;">VERIFIED BY PAYROLLPANDA
	</div>
	<br>
		</center>
		<br><br><br>
		<br>
	<script>
		function download() 
		{
	        var printButton = document.getElementById("btn1");
	        var sign= document.getElementById("sign");
	        printButton.style.visibility = 'hidden';
	        var header = document.getElementById("header");
	        header.style.visibility = 'hidden';
	        sign.style.visibility = 'visible';
	        window.print()
	        printButton.style.visibility = 'visible';
	        header.style.visibility = 'visible';
	        sign.style.visibility = 'hidden';
    	}
	</script>
</div>
</html>