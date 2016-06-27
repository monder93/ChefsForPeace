<head>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/design.css" rel="stylesheet">


<script type="text/javascript" src="jquery/jquery-2.0.0.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>



</head>

<?php
session_start();
include("database/db_conection2.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
	$user_id=$_GET['id'];
	$query = "SELECT * FROM users WHERE ID=".$user_id;
	if ($query_exec = mysqli_query($dbcon, $query)) {
		if ($query_row = mysqli_fetch_array($query_exec)) {
			$firstname = $query_row['First_Name'];
			$lastname  = $query_row['Last_Name'];
			$email	   = $query_row['Email'];
			$phone	   = $query_row['Phone'];
			$picpath   = $query_row['profile_picture'];
			$bio	   = $query_row['bio'];
			$fullname  = $firstname." ".$lastname;
		?>
		<div class="modal-body"><p>
			<h1><?php echo wordwrap($fullname, 84, "<br>\n", true); ?></h1>
			<img src="<?php echo $picpath; ?>" style="max-width: 100%;">
			<h3><?php echo wordwrap($email, 84, "<br>\n", true); ?></h3>
			<h3><?php echo wordwrap("Phone: ".$phone, 84, "<br>\n", true); ?></h3>
			<br>
			<h3><?php echo wordwrap("About me:" , 84, "<br>\n", true); ?></h3>
			<h5><?php echo wordwrap($bio, 84, "<br>\n", true); ?></h4>
		</p></div>
<?php   }
	}
?>
	
<?php
} else 
{
	die ("Please select a chef.");
}