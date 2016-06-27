<?php
session_start();
include("database/db_conection.php");

if(isset($_POST['login']))
{
    $Email=$_POST['email'];
    $Password=$_POST['pass'];

    if($Email=='')
    {
        echo"<script>alert('Please enter the email')</script>";
exit();
    }
    if($Password=='')
     {
               echo"<script>alert('Please enter the password')</script>";
exit();
     } 

    $check_user="select * from users WHERE Email='$Email' AND Password='$Password'";

   $run=mysqli_query($dbcon,$check_user);
    
        if(mysqli_num_rows($run))
    {
        $row=mysqli_fetch_array($run);
        $_SESSION['user_id']=$row['ID'];//here session is used and value of Email store in $_SESSION.
        $_SESSION['firstname']=$row['First_Name'];//here session is used and value of Email store in $_SESSION.
        $_SESSION['lastname']=$row['Last_Name'];//here session is used and value of Email store in $_SESSION.
        $_SESSION['phone']=$row['Phone'];//here session is used and value of Email store in $_SESSION.
        $_SESSION['email']=$row['Email'];//here session is used and value of Email store in $_SESSION.
        $_SESSION['password']=$row['Password'];//here session is used and value of Email store in $_SESSION.
        $_SESSION['type']=$row['Type'];//here session is used and value of Email store in $_SESSION.


        echo "<script>window.open('index.php','_self')</script>";


    }
    else
    {
        echo "<script>window.open('fail.php','_self')</script>";
        echo "<script>alert('Email or password is incorrect!')</script>";

exit();
    }

}


?> 
