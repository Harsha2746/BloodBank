<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Outstock Blood List</title>
    <link rel="stylesheet" type="text/css" href="css/s1.css">
    <style type="text/css">
        #form1{
    width: 80%;
    height: 280px;
    background-color: violet;
    color: black;
    border-radius: 10px;
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
        <h1>Donor List</h1><br>
        <center><div id="form1">
            <table>
                <tr>
                    <td><center><b>Name</b></center></td>
                    <td><center><b>Mobile No</b></center></td>
                    <td><center><b>Blood Group</b></center></td>
                </tr>
                <?php
                $q=$db->query("SELECT * FROM o_stock");
                while($r1=$q->fetch(PDO::FETCH_OBJ))
                {
                    ?>
                    <tr>
                    <td><center><?= $r1->name; ?></center></td>
                    <td><center><?=$r1->mno; ?></center></td>
                    <td><center><?=$r1->bname; ?></center></td>
                </tr>
                    <?php
                }
                ?>
            </table>
                     
        </div>
    </div>
    <div id="footer"><h4 align="center">Copyright@harshabbms</h4>
    <p align="center"><a href="logout.php">Logout</a></p></div>
   </div>
</div>
</body>
</html>