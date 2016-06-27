<?php

//---------------------------------------------------javascript function to open in the same window -------------------------------------------------------

include("database/db_conection.php");
$edit_id=$_POST['edited_id'];
$edit_firstname=$_POST['edited_first_name'];
$edit_lastname=$_POST['edited_last_name'];
$edit_email=$_POST['edited_Email'];
$edit_password=$_POST['edited_Password'];
$edit_phone=$_POST['edited_Phone'];

$message = "failed";	
/*
echo "<script type='text/javascript'>alert('$edit_id');</script>";
echo "<script type='text/javascript'>alert('$edit_firstname');</script>";
echo "<script type='text/javascript'>alert('$edit_lastname');</script>";
echo "<script type='text/javascript'>alert('$edit_email');</script>";
echo "<script type='text/javascript'>alert('$edit_phone');</script>";
echo "<script type='text/javascript'>alert('$edit_password');</script>";
*/
$edit_query = "UPDATE users SET First_Name='$edit_firstname' , Last_Name='$edit_lastname' , Email='$edit_email', Phone='$edit_phone' , Password='$edit_password'  WHERE ID=$edit_id ";

$run=mysqli_query($dbcon,$edit_query);

// if edited ... this if will work 
if($run)
{
//---------------------------------------------------javascript function to open in the same window -------------------------------------------------------
    echo "<script>window.open('view_users2.php?edited=user has been edited','_self')</script>";
}
else
 echo "<script type='text/javascript'>alert('$message');</script>";



?>