<head>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/design.css" rel="stylesheet">


<script type="text/javascript" src="jquery/jquery-2.0.0.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>



</head>

<?php
session_start();

if (isset($_GET['id']) && !empty($_GET['id'])) {

	include("database/db_conection2.php");
	
	$event_id = $_GET['id'];
	
	/*
	$query = "SELECT user_id FROM user_event WHERE event_id=".$event_id;

	$query_exec = mysqli_query($dbcon, $query);

	if (mysqli_num_rows($query_exec) > 0)
		die("You are already signed in for this event");
	*/


	$query = "SELECT * FROM events WHERE event_id=".$event_id;

	if ($query_exec = mysqli_query($dbcon, $query)) {
		if ($query_row = mysqli_fetch_array($query_exec)){

			$event_title 	= $query_row['event_title'];
			$event_time	 	= $query_row['datetime'];
			$event_desc	 	= $query_row['event_description'];
			$event_contact	= $query_row['contact_info'];
			$event_poster	= $query_row['poster_url'];

			$time_format 	= date_format(new DateTime($event_time), 'd/m/Y H:i');
			?>

			<div class="modal-body">
				<p>
					<h1><?php echo wordwrap($event_title, 84, "<br>\n", true); ?></h1>
					<h3><?php echo wordwrap($time_format, 84, "<br>\n", true); ?></h3>
					<img src="<?php echo $event_poster; ?>" style="max-width: 100%;">
					<h5><?php echo wordwrap($event_desc, 84, "<br>\n", true); ?></h4>
					<hr>
					<div class="bg-info">
						<?php 
						$contact_msg = "<h4>Contact information:</h4>".$event_contact;
						?>
						<h5><?php echo wordwrap($contact_msg, 84, "<br>\n", true); ?></h5>
					</div>

					<?php if (isset($_SESSION['user_id'])) { ?>
					<div class="modal-footer"><center>
       					<form action="event_signup.php" method="POST">
							<input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
							<button class="btn btn-info" type="submit">Sign me up!</button>
						</form>	
       				</center></div>
       				<?php 
       				} else { ?>
       					<br>
       					<center><div class="row">
       						<div class="col-md-12">
       							<button class="btn btn-info"  onclick="alert('click')" disabled>Sign me up!</button>
       						</div>
       					</div>
       					<div class="row">
       						<div class="col-md-12">
       							<div class="alert alert-warning">
       								You must be logged in to sign up for an event. Please register/login.
       							</div>
       						</div>
       					</div>
       				</div></center>
       			<?php	} ?>
       			



				</p>
			</div>

			<?php

		}


	} else {
		die("Unable to execute query");
	}



} else {
	die ("Please log in");
}
?>