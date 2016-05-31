<?php 

//make connection here
 include("database/db_conection.php");
   

//collecting information from $_POST
if(isset($_POST['register']))
{

 $First_Name=$_POST['firstname'];
 $Last_Name=$_POST['lastname'];
 $Email=$_POST['email'];
 $Password=$_POST['password'];
 $Confirm_Password=$_POST['confirm_password'];


 // test to check inputs 

 if($First_Name=='')
    {
        //javascript use for input checking
        echo"<script>alert('Please enter the first name')</script>";
exit();//this use if first is not work then other will not show
    }

    if($Last_Name=='')
    {
        echo"<script>alert('Please enter the Last_Name')</script>";
exit();
    }

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
      if($Confirm_Password=='')
     {
               echo"<script>alert('Please Confirm password')</script>";
exit();
     }  
      if($Password!=$Confirm_Password)
     {
               echo"<script>alert('please use same password in password and confirm password')</script>";
exit();
     }


// Checking if the email is register , if its register then cant register again
    $check_email_query="select * from users WHERE Email='$Email'";
    if ($run_query=mysqli_query($dbcon,$check_email_query))
    {
       if(mysqli_num_rows($run_query)>0)  // if result>0 then there is email registered and cant register again 
    {
    echo "<script>alert('Email $Email is already exist in our database, Please try another one!')</script>";
            echo"<script>window.open('fail.php','_self')</script>";
exit();
    }
}

//insert the user into the database.
    $insert_user="insert into users (First_Name,Last_Name,Email,Password) VALUE ('$First_Name','$Last_Name','$Email','$Password')";
    if(mysqli_query($dbcon,$insert_user))
    {
        $message = "Registration Successfull";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo"<script>window.open('view_users.php','_self')</script>";

    }

}



?>

