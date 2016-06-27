<head>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/design.css" rel="stylesheet">


<script type="text/javascript" src="jquery/jquery-2.0.0.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>



</head>

<div class="custom-container">

<?php
session_start();
if (	isset($_POST['first_name'])
	&&	isset($_POST['last_name'])
	&&	isset($_POST['email_addr']) 
	&&	isset($_POST['u_bio'])
	&&	isset($_POST['user_id'])
	&&	isset($_SESSION['user_id'])
	&&	isset($_POST['u_phone'])
	&&	isset($_POST['u_password'])
	&&	($_SESSION['user_id'])==$_POST['user_id']) {



	$user_id   = $_POST['user_id'];
	$firstname = $_POST['first_name'];
	$lastname  = $_POST['last_name'];
	$emailadd  = $_POST['email_addr'];
	$bio 	   = $_POST['u_bio'];
	$phone     = $_POST['u_phone'];
	$password  = $_POST['u_password'];

	//echo $firstname."<br>".$lastname."<br>".$emailadd."<br>".$upassword."<br>".$bio."<br>UID: ".$user_id;

	include("database/db_conection2.php");

	$query = "UPDATE users SET 
				First_Name = '".mysqli_real_escape_string($dbcon, $firstname)."',
				Last_Name  = '".mysqli_real_escape_string($dbcon, $lastname)."',
				Email  = '".mysqli_real_escape_string($dbcon, $emailadd)."',
				bio  = '".mysqli_real_escape_string($dbcon, $bio)."',
				Password  = '".mysqli_real_escape_string($dbcon, $password)."',
				Phone  = '".mysqli_real_escape_string($dbcon, $phone)."'
				WHERE ID=".mysqli_real_escape_string($dbcon, $user_id).";";


	//echo "<br>".$query."<br>";

	if ($query_exec = mysqli_query($dbcon, $query)) {
			$_SESSION['firstname']=$firstname;
			$_SESSION['lastname']=$lastname;
			$_SESSION['email']=$emailadd;
			$_SESSION['phone']=$phone;
			$_SESSION['password']=$password;
			?>
			<div class="alert alert-success">
							Your information has been successfully updated.
			</div>

			<?php
	} else {
			echo 'Unable to edit event to DB.<br>'.mysqli_error($dbcon);
	}


} else {
	echo "Something is not set.";
}


?>


	<div class="alert alert-info">
		<h5 />You are about to be redirected to the main page in 5 seconds.
		<h5 />If the page doesn't refresh, please click <a href="./index.php#/profilepage">here</a>.
	</div>
<?php
	header("refresh:5; url=./index.php#/profilepage");
?>