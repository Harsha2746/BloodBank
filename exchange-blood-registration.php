<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Exchange Blood Registeration</title>
    <link rel="stylesheet" type="text/css" href="css/s1.css">
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
            <form action="" method="post">
        <div id="form">
        <table>
            <tr>
                <td width="200px" height ="50px">Enter Name</td>
                <td width="200px" height ="50px"><input type="text" name="name" placeholder="Enter your name"></td>
                <td width="200px" height ="50px">Enter Father's Name</td>
                <td width="200px" height ="50px"><input type="text" name="fname" placeholder="Enter father's name"></td>
            </tr>
            <tr>
            <td width="200px" height ="50px">Enter Address</td>
                <td width="200px" height ="50px"><textarea name="address"></textarea></td>
                <td width="200px" height ="50px">Enter City</td>
                <td width="200px" height ="50px"><input type="text" name="city" placeholder="Enter city name"></td>
            </tr>
            <tr>
            <td width="200px" height ="50px">Enter Age</td>
            <td width="200px" height ="50px"><input type="text" name="age" placeholder="Enter your age"></td>
            <td width="200px" height ="50px">Enter E-mail</td>
                <td width="200px" height ="50px"><input type="text" name="email" placeholder="Enter your email"></td>   
            </tr>
            <tr>
                <td width="200px" height ="50px">Enter your mobile-no</td>
                <td width="200px" height ="50px"><input type="text" name="mno" placeholder="Enter mobile number"></td>
            </tr>
            <tr>
            <td width="200px" height ="50px">Select Your Blood Group</td>
                <td width="200px" height ="50px">
                    <select name="bgroup">
                        <option>O+</option>
                        <option>AB+</option>
                        <option>AB-</option>
                    </select>
                </td>
                <td width="200px" height ="50px">Select Exchange Blood Group</td>
                <td width="200px" height ="50px">
                    <select name="exbgroup">
                        <option>O+</option>
                        <option>AB+</option>
                        <option>AB-</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="sub" value="Save"></td>
            </tr>
        </table>    
    </form>
    <?php
    if(isset($_POST['sub']))
    {
        $name=$_POST['name'];
        $fname=$_POST['fname'];
        $address=$_POST['address'];
        $city=$_POST['city'];
        $age=$_POST['age'];
        $bgroup=$_POST['bgroup'];
        $mno=$_POST['mno'];
        $email=$_POST['email'];
        $exbgroup=$_POST['exbgroup'];

        $q2="select * from donor_registration where bgroup='$bgroup'";
        $st=$db->query($q2);
        $num_row=$st->fetch();
        $id=$num_row['id'];
        $name=$num_row['name'];
        $b1=$num_row['bgroup'];
        $mno=$num_row['mno'];
        $q1="insert into o_stock (bname,name,mno) value(?,?,?)";
        $st1=$db->prepare($q1);
        $st1->execute([$b1,$name,$mno]);

        $del_q="delete from donor_registration where id='$id'";
        $st=$db->prepare($del_q);
        $st->execute();


        $q=$db->prepare("INSERT INTO exchange_blood (name,fname,address,city,age,bgroup,email,mno,exbgroup) VALUES (:name,:fname,:address,:city,:age,:bgroup,:email,:mno,:exbgroup)");
        $q->bindValue('name',$name);
        $q->bindValue('fname',$fname);
        $q->bindValue('address',$address);
        $q->bindValue('city',$city);
        $q->bindValue('age',$age);
        $q->bindValue('bgroup',$bgroup);
        $q->bindValue('email',$email);
        $q->bindValue('mno',$mno);
        $q->bindValue('exbgroup',$exbgroup);
        if($q->execute())
        {
            echo "<script>alert('Exchange Successful')</script>";
        }
        else{
            echo "<script> alert('Exchange Fail')</script>";
        }
    }
    ?> 
        </div>
    </div>
    <div id="footer"><h4 align="center">Copyright@harshabbms</h4>
    <p align="center"><a href="logout.php">Logout</a></p></div>
   </div>
</div>
</body>
</html>