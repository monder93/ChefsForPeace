<head>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/design.css" rel="stylesheet">


<script type="text/javascript" src="jquery/jquery-2.0.0.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>



</head>

<div class="custom-container">
<?php
include("database/db_conection2.php");
$mysql_table = "users";

if (isset($_POST['user_id'])) {
		
		$user_id = $_POST['user_id'];
		//echo "POST RECEIVED<br>event id: ".$event_id."<br>";

		$maxFileSize = 15000000; //15MB
		$addEvent = true;
		if (!empty($_FILES['uploaded_photo']['name'])) {
			$name = $_FILES['uploaded_photo']['name'];
			echo "received file name: ".$name."<br>";

			$check_format = getimagesize($_FILES['uploaded_photo']['tmp_name']);

			if ($check_format) { //File is an image.
				//echo "It's an image: ". $check_format["mime"] . ".<br>";;
			} else {
				echo "It's not an image<br>";
				$addEvent = false;
			}

			if ($_FILES['uploaded_photo']['size'] > $maxFileSize) {
    			echo "Sorry, your file is too large.";
    			$addEvent = false;
			}

			if ($addEvent) { //Checks passed -> Upload image.

				$query = 
					"SELECT profile_picture FROM ".$mysql_table." WHERE ID=".mysqli_real_escape_string($dbcon, $user_id);

				echo $query."<br>";
				$event_poster_url="";
				if ($query_exec = mysqli_query($dbcon, $query)) {
					if ($query_row = mysqli_fetch_array($query_exec)){
						echo "fetching poster url: ";
						$event_poster_url 	= $query_row['profile_picture'];
					}
				}





				$target_dir = "uploads/profile/";

				$target_file = $target_dir . basename($_FILES['uploaded_photo']['tmp_name']);
				$target_file = $target_file.'.'.pathinfo($_FILES['uploaded_photo']['name'],PATHINFO_EXTENSION);
				echo "path info: ".pathinfo($_FILES['uploaded_photo']['name'],PATHINFO_EXTENSION)."<br>";
				if (move_uploaded_file($_FILES['uploaded_photo']['tmp_name'], $target_file)) {
					echo "Uploading image<br>";
					
					$query = 
					"UPDATE ".$mysql_table." SET profile_picture='".mysqli_real_escape_string($dbcon, $target_file)."' WHERE ID=".mysqli_real_escape_string($dbcon, $user_id);

					if ($query_exec = mysqli_query($dbcon, $query)) {
						echo 'Table successfully updated.<br>';
					} else {
						echo 'Unable to edit event to DB.<br>'.mysqli_error($dbcon);
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
	<div class="alert alert-info">
		<h5 />You are about to be redirected to the main page in 5 seconds.
		<h5 />If the page doesn't refresh, please click <a href="./index.php#/profilepage">here</a>.
	</div>
<?php
	header("refresh:5; url=./index.php#/profilepage");
?>

</div>