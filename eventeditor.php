<?php
include("database/db_conection2.php"); //Connects to DB.
$mysql_table = "events";


if (isset($_POST['event_id'])
	&& isset($_POST['event_name'])
	&& isset($_POST['event_desc'])
	&& isset($_POST['date_time'])
	&& isset($_POST['contact_info'])) {


	$event_id		= $_POST['event_id'];
	$event_name 	= $_POST['event_name'];
	$event_desc 	= $_POST['event_desc'];
	$event_time 	= $_POST['date_time'];
	$event_contact	= $_POST['contact_info'];


	$query = "UPDATE `".$mysql_table."` SET `event_title` = '".mysqli_real_escape_string($dbcon, $event_name)."', 
	`event_description` = '".mysqli_real_escape_string($dbcon, $event_desc)."', 
	`contact_info` = '".mysqli_real_escape_string($dbcon, $event_contact)."',
	`datetime` = '".mysqli_real_escape_string($dbcon, $event_time)."'
	WHERE `".$mysql_table."`.`event_id` = ".mysqli_real_escape_string($dbcon, $event_id);
	echo $query."<br/><br/>";

	if ($query_exec = mysqli_query($dbcon, $query)) {
			echo 'Event successfuly edited.';
	} else {
			echo 'Unable to edit event to DB.';
	}


}



?>
<p>
<a href="eventsmanager.php">[Back]</a>
</p>