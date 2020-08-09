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
<div class="header">
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
<div class="body1" style="width: 100%;height: 400px;background-color:;top:200px;position: absolute;">
	<div class="d1" style="margin-left: 200px;">
		<div class="d2">
			<div class="d3">
			<center><img src="images/9.png" height="100px"></center>
		    </div>
		</div>
		<p class="d4">
			<a href="mysalaryslip.php" >VIEW SALARY</a>
		</p>
	</div>

	<div class="d1">
		<div class="d2">
			<div class="d3">
			<center><img src="images/4.png" height="100px"></center>
		    </div>
		</div>
		<p class="d4">
		  <?php echo'<a href="viewemployee.php?id='.$id.'">';?>VIEW PROFILE</a>
		</p>
	</div>
	<div class="d1">
		<div class="d2">
			<div class="d3">
			<center><img src="images/8.png" height="100px"></center>
		    </div>
		</div>
		<p class="d4">
			<a href="empchangepassword.php">CHANGE PASSWORD</a>
		</p>
	</div>
	<div class="d1">
		<div class="d2">
			<div class="d3">
			<center><img src="images/6.png" height="100px"></center>
		    </div>
		</div>
		<p class="d4">
			<a href="employeelogout.php">LOGOUT</a>
		</p>
	</div>
	
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