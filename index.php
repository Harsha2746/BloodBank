<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/s1.css">
</head>
<body>
<div id="full">
   <div id="inner_full">
    <div id="header"><h2>Blood Bank Management System</h2></div>
    <div id="body">
        <br><br><br><br><br>
        <form action="" method="post">
        <table align="center">
            <tr>
                <td width="200px" height="70px"><b>Enter User Name</b></td>
                <td width="200px" height="70px"><b><input type="text" name="un" placeholder="Enter Username" style="width:180px;height:40px;border-radius:5px;"></b></td>
            </tr>
            <tr>
                <td width="200px" height="70px"><b>Enter password</b></td>
                <td width="200px" height="70px"><b><input type="password" name="ps" placeholder="Enter Password" style="width:180px;height:40px;border-radius:5px;"></b></td>
            </tr> 
            <tr>
                <td><input type="submit" name="sub" value="Login" style="width:70px;height:30px;border-radius:5px"></td>
            </tr>   
        </table>
       </form>
       <?php
         if(isset($_POST['sub']))
         {
            $un=$_POST['un'];
            $ps=$_POST['ps'];
            $q=$db->prepare("SELECT * FROM admin WHERE uname='$un'AND pass='$ps'");
            $q->execute();
            $res=$q->fetchAll(PDO::FETCH_OBJ);
            if($res)
            {
                $_SESSION['un']="$un";
                header("Location:admin-home.php");
            }
            else{
                echo "wrong $un";
            }
            // else{
            //     if(=='$un'){
            //         echo "Wrong user name";
            //     }
            //     else if(pass=='$ps')
            //     {
            //         echo "Wrong password";
            //     } 
            //     else
            //     echo "wrong user and password";
            // }
         }
       ?>
    </div>
    <div id="footer"><h4 align="center">Copyright@harshabbms</h4></div>
   </div>
</div>
</body>
</html>