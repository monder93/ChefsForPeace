<?php 

//make connection here
 include("database/db_conection2.php");

//collecting information from $_POST
if(isset($_POST['contactus']))
{

 $First_Name=mysqli_real_escape_string($dbcon, $_POST['name']);
 $Last_Name=mysqli_real_escape_string($dbcon, $_POST['last']);
 $Email=mysqli_real_escape_string($dbcon, $_POST['email']);
 $Phone=mysqli_real_escape_string($dbcon, $_POST['phone']);
 $Message=mysqli_real_escape_string($dbcon,$_POST['message']);

 //insert the user into the database.
    $insert_message="insert into contactus (First_Name,Last_Name,Email,Phone,Message) VALUE ('$First_Name','$Last_Name','$Email','$Phone','$Message')";
    if(mysqli_query($dbcon,$insert_message))
    {
        $message = "Registration Successfull";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo"<script>window.open('index.php','_self')</script>";

    }
    else
    {
        $message = "Registration failed";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo"<script>window.open('fail.php','_self')</script>"; 
    }

 }

 mysqli_close($dbcon); 

?>