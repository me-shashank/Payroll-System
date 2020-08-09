<?php
$id=$_GET['id'];
?>


<?php
$server="localhost";
$username="root";
$password="";
$dbname="payroll";
$conn= new mysqli($server,$username,$password,$dbname);
$id=$_GET['id'];
$sql = "Select * from employee where eid='$id'";
$result=mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{
$name=$row['name'];
$fname=$row['fname'];
$mname=$row['mname'];
$email=$row['email'];
$mob=$row['mob'];
$gender=$row['gender'];
$dept=$row['dept'];
$grade=$row['grade'];
$add=$row['address'];
$city=$row['city'];
$state=$row['state'];
$pin=$row['pin'];
$src=$row['src'];
}		

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
<div class="header">
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
<div class="c" style="background-color:#D0D3D4; width: 800px; height:auto;margin:20px auto; border-radius: 20px;">
<div class="c1" style="background-color:#273746  ; width: 800px; height: 250px;margin:20px auto;border-radius: 20px;">
	<div class="c2" style="background-color: ;width:40%;height:250px;float:left;border-radius: 20px;">
		<center>
		<div class="c4" style="width:65%;height:250px;margin-top: 20%;">
			<?php echo '<img src="'.$src.'" height="100%" width="100%" style="border-radius:40px;border:4px solid white;">' ?>
		</div>
	</div>
	<div class="c3" style="background-color:;width:60%;height:250px;float:left;border-radius: 20px;">
		
		<p style=" font-weight: bold;font-size:20px;color:white;margin-top:90px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;"><font size="20px" ><?php echo"$name";?> </font><br>
		Employee ID:<?php echo"$id";?><br>
		<?php echo"$dept";?> DEPARTMENT<br>
		</p>
		
	</div>
</div>
<center>
	<table id="empdata" style="margin:30px; text-align: left;"><br><br>
		<tr>
			<th style="width:10%;">Father's Name:</th>
			<td><?php echo"$fname";?></td>
			
		</tr>
		<tr>
			<th>Mother's Name:</th>
			<td><?php echo"$mname";?></td>
		</tr>
	
		<tr>
			<th>Email:</th>
			<td><?php echo"$email";?></td>
		</tr>
		<tr>
			<th>Mobile Number:</th>
			<td><?php echo"$mob";?></td>
		</tr>
		<tr>
			<th>Emp Grade:</th>
			<td><?php echo"$grade";?> Grade</td>
		</tr>
		<tr>
			<th>Address:</th>
			<td><?php echo"$add";?></td>
		</tr>
		<tr>
			<th></th>
			<td><?php echo"$city";?></td>
		</tr>
		
		<tr>
			<th></th>
			<td><?php echo"$state";?>,<?php echo"$pin";?></td>
		</tr>
		
		
	</table>
</center>
</div>
<div class="left" id="id1">
		<ul>
		  <li><a href="mysalaryslip.php">View Salary</a></li>
		  <?php echo'<li><a href="viewemployee.php?id='.$id.'">';?>View Profile</a></li>
		  <li><a href="empchangepassword.php">Change Password</a></li>
  		  <li><a href="employeelogout.php">LogOUT</a></li>
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