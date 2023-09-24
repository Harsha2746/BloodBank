<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/s1.css">
</head>
<body>
<div id="full">
   <div id="inner_full">
    <div id="header"><h2><a href= "admin-home.php" style= "text-decoration: none; color:black;">Blood Bank Management System</a></h2></div>
    <div id="body">
        <br><br><br><br><br>
        <?php
        $un=$_SESSION['un'];
        if(!$un)
        {
           header("Location:logout.php");
        }
        ?> 
        <h1>Welcome Admin</h1><br>
        <ul>
            <li><a href='donor-red.php'>Donor Registeration</a></li>
            <li><a href='donor-list.php'>Donor List</a></li>
            <li><a href='stock-blood-list.php'>Stock Blood List</a></li>
        </ul><br><br><br>
        <ul>
            <li><a href='out-stock-blood-list.php'>Out Stock Blood List</a></li>
            <li><a href='exchange-blood-registration.php'>Exchange Blood Registration</a></li>
            <li><a href='exchange-blood-list.php'>Exchange Blood List</a></li>
        </ul>
    </div>
    <div id="footer"><h4 align="center">Copyright@harshabbms</h4>
    <p align="center"><a href="logout.php">Logout</a></p></div>
   </div>
</div>
</body>
</html>