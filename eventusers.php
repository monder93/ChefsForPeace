<?php 
session_start();
if (isset($_SESSION['type'])&& $_SESSION['type']=="admin")

{ 

	?>


<head>



<script type="text/javascript" src="jquery/jquery-2.0.0.min.js" charset="UTF-8"></script>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/design.css" rel="stylesheet">


</head>

<body>
<?php 
include("cpanel_header.php"); 
include("database/db_conection2.php");
?>
<div class="custom-container">
<?php
if (	isset($_GET['event_id'])
	&&	!empty($_GET['event_id'])) {


	$event_id = $_GET['event_id'];

	$query = "SELECT * FROM users CROSS JOIN user_event WHERE user_event.user_id=users.ID AND user_event.event_id=".$event_id.";";

	include("database/db_conection2.php"); //Connects to DB.
	if ($query_exec = mysqli_query($dbcon, $query)) {
		?>
			<div class="row">
				<div class="col-md-5">
					<h4 />Full name
				</div>
				<div class="col-md-5">
					<h4 />e-mail address
				</div>
				<div class="col-md-2">
					<h4 />Phone number
				</div>
			</div>
			<hr>
		<?php
		while($query_row = mysqli_fetch_array($query_exec)) {
		
			$fullname	= $query_row['First_Name']." ".$query_row['Last_Name'];
			$email		= $query_row['Email'];
			$phone		= $query_row['Phone'];
			
			//echo $fullname." - ".$email." - ".$phone."<br>";

			?>
			<div class="row">
				<div class="col-md-5">
					<h4 /><?php echo $fullname; ?>
				</div>
				<div class="col-md-5">
					<h4 /><?php echo $email; ?>
				</div>
				<div class="col-md-2">
					<h4 /><?php echo $phone; ?>
				</div>
			</div>
			<br />



			<?php

		}
		?>
	</div>
		<a href="eventusers.php" role="button" class="btn btn-info">Back</a>
		<div>	
		<?php					
	}

} else { //Display all events.
	

			$query = "SELECT event_title, datetime, event_id FROM events";
			if ($query_exec = mysqli_query($dbcon, $query)) {
				while($query_row = mysqli_fetch_array($query_exec)) {
					$event_id 	= $query_row['event_id'];
					$event_time = $query_row['datetime'];
					$event_title= $query_row['event_title'];

					?>
						<div class="row">
							<div class="col-sm-10">
								<h3><?php echo $event_title.' at '.$event_time; ?></h3>
							</div>
							<div class="col-sm-2">
								<a href="eventusers.php?event_id=<?php echo $event_id ?>" role="button" class="btn btn-info" 
									style="padding-bottom: 30px; padding-top: 30px;">
									View attendees
								</a>
							</div>
						</div><br>
					




					<?php

				}
			}

}



?>
</div>
<?php include("cpanel_footer.php"); ?>

</body>
<?php } 
else 
{
	?>


<head>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/design.css" rel="stylesheet">


<script type="text/javascript" src="jquery/jquery-2.0.0.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>



</head>
<body class="bg-success"> 
<div class="bg-success">
<div class="alert alert-danger">
					<h5 />You Need Admin Permission To Log In To The Admin Control Panel</h5>
				</div>

<div class="alert alert-info">
					<h5 />You are about to be redirected to the main page in 5 seconds.
					<h5 />If the page doesn't refresh, please click <a class="btn btn-danger" href="./">here</a>.
</div>

</div>
</body>
<?php

	header("refresh:5; url=./");
}
?>
