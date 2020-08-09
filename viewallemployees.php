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
<body>
<div class="header" id="header">
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
<br>
<br>
<center>
<table id="salary">
    <tr>
    <th style="width:5%;">EID</th>
    <th style="width:10%;">PIC</th>
    <th style="width:20%;">NAME</th>
    <th style="width:20%;">EMAIL</th>
    <th style="width:10%;">PHONE</th>
    <th style="width:15%;">DEPARTMENT</th>
    <th style="width:20%;">ACTION</th>
    </tr>
    <?php
     $server="localhost";
		$username="root";
		$password="";
		$dbname="payroll";
		$conn= new mysqli($server,$username,$password,$dbname);
		$sql = "Select * from employee";
		$result=mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
		{
			echo '
			<tr>
			<td>'.$row['eid'].'</td>
			<td ><center><img src="'.$row['src'].'" height="200px;"></center></td>
			<td>'.$row['name'].'</td>
			<td>'.$row['email'].'</td>
			<td>'.$row['mob'].'</td>
			<td>'.$row['dept'].'</td>
			<td>
			<a href="viewempadmin.php?id='.$row['eid'].'"><button id="b5" style="margin:10px;"  name="sbt"><font style="color:white;font-size:15px;">PROFILE</font></button></a><br>

            <a href="deleteemployee.php?id='.$row['eid'].'"><button id="b5" style="margin:10px;"><font style="color:white;font-size:15px;">DELETE</font></button></a><br>

           <a href="updateemployee.php?id='.$row['eid'].'"><button id="b5" style="margin:10px;"><font style="color:white;font-size:15px;">UPDATE</font></button></a><br>
           </td>
			</tr>';
        }
         ?>
     </table>
 </center>
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
