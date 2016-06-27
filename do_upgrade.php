<?php

//---------------------------------------------------javascript function to open in the same window -------------------------------------------------------

include("database/db_conection.php");
$user_id=$_GET['userid'];
$user_type=$_GET['type'];
$message = "failed";	

echo "<script type='text/javascript'>alert('$user_id');</script>";
echo "<script type='text/javascript'>alert('$user_type');</script>";

$upgrade_query = "UPDATE users SET Type='$user_type'  WHERE ID=$user_id ";

$run=mysqli_query($dbcon,$upgrade_query);

// if edited ... this if will work 
if($run)
{
//---------------------------------------------------javascript function to open in the same window -------------------------------------------------------
    echo "<script>window.open('upgradeuser.php?upgraded=user has been edited','_self')</script>";
}
else
 echo "<script type='text/javascript'>alert('$message');</script>";



?>