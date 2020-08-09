<?php
session_start();
   $server="localhost";
   $username="root";
   $password="";
   $dbname="payroll";
   $conn= new mysqli($server,$username,$password,$dbname);
   
   
   $user_check = $_SESSION['username'];
   $sql = mysqli_query($conn,"select email from users where email = '$user_check' ");
   
   $row = mysqli_fetch_array($sql);
   
   if(!isset($_SESSION['username'])){
      header("location:employeelogin.php");
   }
?>