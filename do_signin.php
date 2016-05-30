<?php

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
        echo "<script>window.open('home.php','_self')</script>";

        $_SESSION['email']=$user_email;//here session is used and value of $user_email store in $_SESSION.

    }
    else
    {
        echo "<script>window.open('index.php','_self')</script>";
        echo "<script>alert('Email or password is incorrect!')</script>";

exit();
    }

}
?>