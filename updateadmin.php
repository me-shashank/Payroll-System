
<?php
include('session.php');
$mail=$_SESSION['username'];
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
<div class="body" id="createnewadmin"><br><br><br><br>
	<div class="red" style="margin:0px auto; height: 250px;">
	<div class="admin">UPDATE IMAGE</div>
	<div class="white" style="height: 150px;">
     <center>
     	<br>
     	<form action="" method="post" name="login" onsubmit="return validate()" enctype="multipart/form-data">
        <input type="file" name="image" placeholder="Upload Image" id="emp" required><br>
        <input type="submit" name="submit" value="Update" class="btn">
      </form>
     <?php
      if(isset($_POST['submit']))
      {
        $server="localhost";
		$username="root";
		$password="";
		$dbname="payroll";
		$conn= new mysqli($server,$username,$password,$dbname);
		$filename=$_FILES["image"]["name"];
		$tempname=$_FILES["image"]["tmp_name"];
		$folder="empdata/".$filename;
        move_uploaded_file($tempname, $folder);

        $sql="update admin set src='$folder' where email='$mail'";
        if(mysqli_query($conn, $sql))
        {
        	header("Location: adminhome.php");
        }
	 }
	 ?>
	</center>
	</div>
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