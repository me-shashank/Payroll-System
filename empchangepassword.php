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
<div class="body" id="changepassword">
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
        $sql="update user set password='$pass2' where email='$email'";
         if(mysqli_query($conn, $sql))
		 {
		 	echo "<script>alert('Password Updated SUCCESSFULLY !!!');</script>";
	     }
	     else
	     	echo "<script>alert('Password Updation Failed !!');</script>";
	    
	 }
	 ?>
	</center>
	</div>
</div>
</div>
<div class="left" id="id1">
		<ul>
		  <li><a href="employeesalary.php">View Salary</a></li>
		  <?php echo'<li><a href="viewemployee.php?id='.$id.'">';?>View Profile</a></li>
		  <li><a href="empchangepassword.php">Change Password</a></li>
  		  <li><a href="employeelogout.php">LogOUT</a></li>
		</ul>
</div><script type="text/javascript">
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
