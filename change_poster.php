<?php
include("database/db_conection2.php"); //Connects to DB.
$mysql_table = "events";


	if (isset($_POST['event_id'])) {
		
		$event_id = $_POST['event_id'];
		echo "POST RECEIVED<br>event id: ".$event_id."<br>";

		$maxFileSize = 15000000; //15MB
		$addEvent = true;
		if (!empty($_FILES['uploaded_poster']['name'])) {
			$name = $_FILES['uploaded_poster']['name'];
			echo "received file name: ".$name."<br>";

			$check_format = getimagesize($_FILES['uploaded_poster']['tmp_name']);

			if ($check_format) { //File is an image.
				echo "It's an image: ". $check_format["mime"] . ".<br>";;
			} else {
				echo "It's not an image<br>";
				$addEvent = false;
			}

			if ($_FILES['uploaded_poster']['size'] > $maxFileSize) {
    			echo "Sorry, your file is too large.";
    			$addEvent = false;
			}

			if ($addEvent) { //Checks passed -> Upload image.

				$query = 
					"SELECT poster_url FROM ".$mysql_table." WHERE event_id=".mysqli_real_escape_string($dbcon, $event_id);

				echo $query."<br>";
				$event_poster_url="";
				if ($query_exec = mysqli_query($dbcon, $query)) {
					if ($query_row = mysqli_fetch_array($query_exec)){
						echo "fetching poster url: ";
						$event_poster_url 	= $query_row['poster_url'];
					}
				}





				$target_dir = "uploads/events/";

				$target_file = $target_dir . basename($_FILES['uploaded_poster']['tmp_name']);
				$target_file = $target_file.'.'.pathinfo($_FILES['uploaded_poster']['name'],PATHINFO_EXTENSION);
				echo "path info: ".pathinfo($_FILES['uploaded_poster']['name'],PATHINFO_EXTENSION)."<br>";
				if (move_uploaded_file($_FILES['uploaded_poster']['tmp_name'], $target_file)) {
					echo "Uploading image<br>";
					
					$query = 
					"UPDATE ".$mysql_table." SET poster_url='".mysqli_real_escape_string($dbcon, $target_file)."' WHERE event_id=".mysqli_real_escape_string($dbcon, $event_id);

					if ($query_exec = mysqli_query($dbcon, $query)) {
						echo 'Table successfully updated.<br>';
					} else {
						echo 'Unable to edit event to DB.<br>';
					}

					

					if ((!empty($event_poster_url))&&(!unlink($event_poster_url)))
						{		
							echo ("Error deleting $event_poster_url");
						} else {
							echo ("Deleted $event_poster_url");
						}


				} else {
					echo "Failed to upload image. <a href=\"\"></a>";
				}

			}



			


		} else {
			echo "No file received<br>";
		}



	} else {
		echo "No event specified<br>";
	}




?>

<a href="eventsmanager.php">[Back]</a>