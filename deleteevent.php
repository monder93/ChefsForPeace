<?php
include("database/db_conection2.php"); //Connects to DB.
$mysql_table = "events";

if (isset($_POST['event_id'])) {
	$event_id = $_POST['event_id'];

	$query = 
		"SELECT poster_url FROM ".$mysql_table." WHERE event_id=".mysqli_real_escape_string($dbcon, $event_id);

	echo $query."<br>";

	if ($query_exec = mysqli_query($dbcon, $query)) {
		if ($query_row = mysqli_fetch_array($query_exec)){
			echo "fetching poster url: ";
			$event_poster_url 	= $query_row['poster_url'];
		}
	}

	if ((!empty($event_poster_url))&&(!unlink($event_poster_url)))
  	{
  		echo ("Error deleting $event_poster_url");
  	} else {
  		echo ("Deleted $event_poster_url");
  	}

	

	$query = "DELETE FROM `".$mysql_table."` WHERE `".$mysql_table."`.`event_id` = ".mysqli_real_escape_string($dbcon, $event_id);
	echo $query."<br><br>";

	if ($query_exec = mysqli_query($dbcon, $query)) {
			echo 'Event successfully deleted.<br>';
		} else {
			echo 'Unable to delete event from DB table.';
		}

} else {
	echo exit("Couldn't fetch query. Check that event ID is valid."); 
}


	header("refresh:0; url=./eventsmanager.php");

?>
