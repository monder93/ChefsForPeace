<?php 
session_start();
if (isset($_SESSION['type'])&& $_SESSION['type']=="admin")

{ 

	?>






<?php
include("database/db_conection2.php"); //Connects to DB.
$mysql_table = "events";


$event_name 	= "";
$event_desc 	= "";
$event_time 	= "";
$event_contact	= "";

if (isset($_POST['event_name']) 
	&& isset($_POST['event_desc']) 
	&& isset($_POST['date_time'])
	&& isset($_POST['contact_info'])) {



		$event_name 	= $_POST['event_name'];
		$event_desc 	= $_POST['event_desc'];
		$event_time 	= $_POST['date_time'];
		$event_contact	= $_POST['contact_info'];

		$target_file = "";
		


		$addEvent = true;
		$maxFileSize = 20000000; //20MB

		/* Check image */
		if (!empty($_FILES['event_poster']['name'])) { //Event poster included.
			$check_format = getimagesize($_FILES['event_poster']['tmp_name']);

			if ($check_format) { //File is an image.
			} else {
				$addEvent = false;
			}

			if ($_FILES['event_poster']['size'] > $maxFileSize) {
    			$addEvent = false;
			}

			if ($addEvent) { //Checks passed -> Upload image.
				$target_dir = "uploads/events/";

				$target_file = $target_dir . basename($_FILES['event_poster']['tmp_name']);
				$target_file = $target_file.'.'.pathinfo($_FILES['event_poster']['name'],PATHINFO_EXTENSION);
				if (move_uploaded_file($_FILES['event_poster']['tmp_name'], $target_file)) {
					} else {
				}
			}	
		}

		if ($addEvent) {
			//$query = "INSERT INTO `".$mysql_table."` VALUES ('','".mysql_real_escape_string($event_time)."','','','".mysql_real_escape_string($event_name)."','".mysql_real_escape_string($event_desc)."','".mysql_real_escape_string($event_contact)."')<br>";
			$query = "INSERT INTO ".$mysql_table." (datetime, poster_url, event_title, event_description, contact_info) 
			VALUES ('".mysqli_real_escape_string($dbcon, $event_time)."', '".mysqli_real_escape_string($dbcon, $target_file)."', '".mysqli_real_escape_string($dbcon, $event_name)."', '".mysqli_real_escape_string($dbcon, $event_desc)."', '".mysqli_real_escape_string($dbcon, $event_contact)."')";
		} else {
		}
		
		if ($query_exec = mysqli_query($dbcon, $query)) {
			$event_name 	= "";
			$event_desc 	= "";
			$event_time 	= "";
			$event_contact	= "";
		} else {
			echo 'Unable to add event to DB.<br>ERROR: '.mysql_error();
		}
		


		


}






?>

<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">


<script type="text/javascript" src="jquery/jquery-2.0.0.min.js" charset="UTF-8"></script>



 <?php include("cpanel_header.php"); ?>

<form role="form" action="eventsmanager.php" method="POST" enctype="multipart/form-data">
	<!--Event Name-->
	<div class="form-group">
		<label for="event_name">Event name:</label>
		<input type="text" class="form-control" name="event_name"
				value="<?php echo $event_name?>" required>
	</div>
	<!--Event Description-->
	<div class="form-group">
		<label for="event_name">Event description:</label>
		<textarea class="form-control" rows="3" name="event_desc"><?php echo $event_desc; ?></textarea>
	</div>
	<!--Event Date and Time-->
	<div class="form-group">
		<label for="date_time">Event date and time:</label>
		<input type="datetime-local" class="form-control" name="date_time" 
				id="entry-day-time" value="<?php echo $event_time?>" required>
	</div>
    <!--Contact info-->
    <div class="form-group">
		<label for="contact_info">Contact information:</label>
		<input type="text" class="form-control" name="contact_info" 
				value="<?php echo $event_contact?>" required>
	</div>
	<!--Event poster-->
    <div class="form-group">
		<label for="event_poster">Event poster:</label>
		<input type="file" class="form-control" name="event_poster">
	</div>
    <!--Submit button-->
	<button type="submit" class="btn btn-default">Submit</button>

</form>
<br/>
<?php
	/*if (!(empty($event_name) || empty($event_desc) || empty($event_time))){
		echo '<b>Event name:</b> '.$event_name.'<br><b>Event Description:</b> '.nl2br($event_desc).'<br><b>Event time:</b> '.$event_time;
	}else{
		echo 'not yet.';
	}*/

	$query = "SELECT `event_title`, `datetime`, `event_id` FROM `events` ORDER BY `event_id` DESC";
	if ($query_exec = mysqli_query($dbcon, $query)) {
		?>
		<div class="custom-container">
			<?php
		while($query_row = mysqli_fetch_array($query_exec)) {
			$event_title = $query_row['event_title'];
			$event_dtime = $query_row['datetime'];
			$event_id	 = $query_row['event_id'];
			?>
			<div class="row">
				<div class="col-sm-12">
					<h3><?php echo $event_title.' </h3><h4>at '.$event_dtime?> </h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
				<a href="editevent.php?event_id=<?php echo $event_id; ?>" role="button" class="btn btn-info"> 
					Edit Event Info
				</a> 
				</div>
				<div class="col-sm-2">
					<a href="editeventposter.php?event_id=<?php echo $event_id; ?>" role="button" class="btn btn-info"> 
					Edit Event Poster
					</a> 
				</div>
				<div class="col-sm-2">
					<form action="deleteevent.php" method="POST">
						<input type="hidden" name="event_id" value="<?php echo $event_id;?>">
						<button class="btn btn-danger" type="submit" onclick="return confirm('WARNING: You are about to PERMANENTLY erase this event from database! Are you sure you want to continue?')">Delete Event</button>
					</form>
				</div>
			</div>

		<?php
		} ?>
		</div> <?php

	} else {
		echo 'No events retrieved from Database.';
	}

?>

 <?php include("cpanel_footer.php"); ?>

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
					<h5 />You Need Admin Permission To Log In To The Cpanel</h5>
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



