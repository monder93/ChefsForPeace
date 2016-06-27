<?php 

//make connection here
 include("database/db_conection.php");
   
   //collecting information from $_POST
if(isset($_POST['newslettersend']))
{

	$newsletteremail=$_POST['newsletterEmail'];


// Checking if the email is register , if its register then cant register again
    $check_email_query="select * from newsletter WHERE Email='$newsletteremail'";
    if ($run_query=mysqli_query($dbcon,$check_email_query))
    {
       if(mysqli_num_rows($run_query)>0)  // if result>0 then there is email registered and cant register again 
    {
    echo "<script>alert('Email $newsletteremail is already exist in our database, Please try another one!')</script>";
            echo"<script>window.open('fail.php','_self')</script>";
exit();
    }
    }


//insert the user into the database.
    $insert_user="insert into newsletter (Email) VALUE ('$newsletteremail')";
    if(mysqli_query($dbcon,$insert_user))
    {
        $message = "inserting Successfull";
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
