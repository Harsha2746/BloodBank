<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stock Blood List</title>
    <link rel="stylesheet" type="text/css" href="css/s1.css">
    <style type="text/css">
        td{
            width:200px;
            height: 40px;
        }
    </style>
</head>
<body>
<div id="full">
   <div id="inner_full">
    <div id="header"><h2><a href= "admin-home.php" style= "text-decoration: none; color:black;">Blood Bank Management System</a></h2></div>
    <div id="body"><br>
        <?php
        $un=$_SESSION['un'];
        if(!$un)
        {
           header("Location:logout.php");
        }
        ?> 
        <h1>Donor Registration</h1><br>
        <center><div id="form">
            <table>
                <tr>
                    <td><center><b>Name</b></center></td>
                    <td><center><b>Qty</b></center></td>
                </tr>
                    <tr>
                    <td><center>O+</center></td>
                    <td><center>
                        <?php
                        $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='O+'");
                        echo $row=$q->rowcount();
                        ?>
                    </center></td>
                </tr>
                <tr>
                    <td><center>AB+</center></td>
                    <td><center><?php
                        $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='AB+'");
                        echo $row=$q->rowcount();
                        ?></center></td>
                </tr>
                <tr>
                    <td><center>AB-</center></td>
                    <td><center><?php
                        $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='AB-'");
                        echo $row=$q->rowcount();
                        ?></center></td>
                </tr>
            </table>
                     
        </div>
    </div>
    <div id="footer"><h4 align="center">Copyright@harshabbms</h4>
    <p align="center"><a href="logout.php">Logout</a></p></div>
   </div>
</div>
</body>
</html>