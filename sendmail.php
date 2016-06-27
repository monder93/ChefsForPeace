<?php
error_reporting(E_ALL);
require("PHPMailer_5.2.4/class.phpmailer.php");


		include("database/db_conection.php");	
        $view_emails_query="select * from newsletter";//select query for viewing emails.
        $run=mysqli_query($dbcon,$view_emails_query);//here run the sql query.

        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {
            $EMAIL=$row[1];

$message=$_POST['message'];
if($message=="")
{
	$message="ChefsForPeace Team";
}	

$mail = new PHPMailer();
$mail->IsSMTP(); // set mailer to use SMTP
$mail->SMTPDebug  = 2; 
$mail->From = "admin@chefs4peace.com";
$mail->FromName = "ChefsForPeace Team";
$mail->Host = "mail.chefs4peace.com"; // specif smtp server
$mail->SMTPSecure= "ssl"; // Used instead of TLS when only POP mail is selected
$mail->Port = 465; // Used instead of 587 when only POP mail is selected
$mail->SMTPAuth = true;
$mail->Username = "admin@chefs4peace.com"; // SMTP username
$mail->Password = "chefs123"; // SMTP password
$mail->AddAddress("$EMAIL", ""); //replace myname and mypassword to yours
$mail->WordWrap = 50; // set word wrap
//$mail->AddAttachment("c:\\temp\\js-bak.sql"); // add attachments
//$mail->AddAttachment("c:/temp/11-10-00.zip");

// file to attach 

$mail->AddAttachment($_FILES['attachment']['tmp_name'],$_FILES['attachment']['name']);



$mail->IsHTML(true); // set email format to HTML
$mail->Subject = 'ChefsForPeace Team';
$mail->Body = $message;

if($mail->Send())
 { ?>
 	<script>window.open('newsletteradmin.php','_self')</script>";
 
 <?php }
else 
{
?>
    <script type='text/javascript'>alert("Send Mail Failed");</script>;
 	<script>window.open('newsletteradmin.php','_self')</script>";
<?php 


} 

}
?>