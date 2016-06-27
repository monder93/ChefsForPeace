<?php
include("database/db_conection2.php"); //Connects to DB.
$mysql_table = "gallery";

if (isset($_POST['photo_id'])) {
	$photo_id = $_POST['photo_id'];
	$start_page = $_POST['start_page'];
	$query = 
		"SELECT path FROM ".$mysql_table." WHERE id=".mysqli_real_escape_string($dbcon, $photo_id);


	if ($query_exec = mysqli_query($dbcon, $query)) {
		if ($query_row = mysqli_fetch_array($query_exec)){
			echo "fetching poster url: ";
			$photo_path 	= $query_row['poster_url'];
		}
	}

	if ((!empty($photo_path))&&(!unlink($photo_path)))
  	{
  		echo ("Error deleting $photo_path");
  	} else {
  		echo ("Deleted $photo_path");
  	}

  	$query = "DELETE FROM `".$mysql_table."` WHERE `".$mysql_table."`.`id` = ".mysqli_real_escape_string($dbcon, $photo_id);


	if ($query_exec = mysqli_query($dbcon, $query)) {
			echo 'Photo deleted.<br>';
	} else {
			echo 'Unable to edit event to DB.';
		}

} else {
	echo exit("Couldn't fetch query. Check that event ID is valid."); 
}

header('Location: gallery_viewer.php?start='.$start_page);


?>