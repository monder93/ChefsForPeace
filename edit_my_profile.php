<?php
session_start();

//---------------------------------------------------javascript function to open in the same window -------------------------------------------------------

include("database/db_conection.php");
$edit_id=$_SESSION['user_id'];
$edit_firstname=$_POST['profile_first_name'];
$edit_lastname=$_POST['profile_last_name'];
$edit_email=$_POST['profile_email'];
$edit_password=$_POST['profile_password'];
$edit_phone=$_POST['profile_phone'];

$message = "failed";	
echo "<script type='text/javascript'>alert('$edit_id');</script>";
echo "<script type='text/javascript'>alert('$edit_firstname');</script>";
echo "<script type='text/javascript'>alert('$edit_lastname');</script>";
echo "<script type='text/javascript'>alert('$edit_email');</script>";
echo "<script type='text/javascript'>alert('$edit_phone');</script>";
echo "<script type='text/javascript'>alert('$edit_password');</script>";

$edit_query = "UPDATE users SET First_Name='$edit_firstname' , Last_Name='$edit_lastname' , Email='$edit_email', Phone='$edit_phone' , Password='$edit_password'  WHERE ID=$edit_id ";

$run=mysqli_query($dbcon,$edit_query);

// if edited ... this if will work 
if($run)
{
//---------------------------------------------------javascript function to open in the same window -------------------------------------------------------
	$_SESSION['user_id']=$edit_id;
	$_SESSION['firstname']=$edit_firstname;
	$_SESSION['lastname']=$edit_lastname;
	$_SESSION['email']=$edit_email;
	$_SESSION['password']=$edit_password;
	$_SESSION['phone']=$edit_phone;
    echo "<script>window.open('profilepage.php','_self')</script>";
}
else
 echo "<script type='text/javascript'>alert('$message');</script>";



?>