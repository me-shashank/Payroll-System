<!DOCTYPE html>
<html>
<head>
	<title>OPMS</title>
	<link rel="icon" href="fav.png" type="image/gif" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Germania+One|Gloria+Hallelujah|Indie+Flower|Lobster|Pacifico" rel="stylesheet">
</head>
<body>
<div class="header">
	<div class="pp">
		<img src="pp.png" height="100%">
	</div>
	<div class="panda">
		PAYROLL <font color="05AABC">PANDA</font>
	</div>
</div>
<div class="red">
	<div class="admin">EMPLOYEE LOGIN PANEL</div>
	<div class="white">
     <center>
     	<br>
     	<form action="" method="post" name="login" onsubmit="return validate()">
     	  <input type="text" placeholder="Email:" name="email" class="input"><br>
        <input type="password" placeholder="Password:" name="pass" class="input"><br>
        <input type="submit" name="submit" value="LOGIN" class="btn">
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
		    session_start();
        $sql="select * from users where email='$email' and password='$password'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0) 
          {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['email'];

            $sql1="select * from employee where email='$email'";
            $result1 = mysqli_query($conn,$sql1);
            $row1 = mysqli_fetch_assoc($result1);
            $_SESSION['id'] = $row1['eid'];
            header("Location: employeehome.php");
          }
        else
          echo "<script>Wrong Password!!!</script>";
	 }
	 ?>
	</center>
	</div>
</div>
</body>
</html>