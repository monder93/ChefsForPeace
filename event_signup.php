<head>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/design.css" rel="stylesheet">


<script type="text/javascript" src="jquery/jquery-2.0.0.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>



</head>

<div class="custom-container">
	<?php
		session_start();

		if (	isset($_POST['event_id'])
			&&	!empty($_POST['event_id'])
			&&	isset($_SESSION['user_id'])) {

			$event_id = $_POST['event_id'];
			$user_id  = $_SESSION['user_id'];


			include("database/db_conection2.php"); //Connects to DB.

			//Check if user already signed in for this event:
			$query = "SELECT * FROM user_event WHERE event_id=".$event_id." AND user_id=".$user_id.";";
			

			if ($query_exec = mysqli_query($dbcon, $query)) 
			{
				$row_count = mysqli_num_rows($query_exec); 
				if ($row_count == 0) {
					$query = "INSERT INTO user_event VALUES ('$event_id', '$user_id')";
					if ($query_exec = mysqli_query($dbcon, $query)) 
					{
						?>
						<div class="alert alert-success">
							You have been successfully added to the event! Enjoy it! :)
						</div>
						<?php
					} else {
						?>
						<div class="alert alert-danger">
							Error adding you to events database. Please contact site admin.
						</div>
						<?php
					}
				}
				else { //USER ALREADY IN THIS EVENT
					?>
						<div class="alert alert-warning">
							You are already signed up for this event! We hope you enjoy it :)
						</div>
					<?php
				}

			} else {
				echo mysqli_error($dbcon)."<br>";
			}

			$query = "INSERT INTO user_event VALUES (".mysqli_real_escape_string($dbcon, $event_id).", ".mysqli_real_escape_string($dbcon, $user_id).");";
			

		}

		else { ?>

				<div class="alert alert-danger">
					<h5 />An error has occured. Please make sure that you are logged in.
				</div>


		<?php }



?>
				<div class="alert alert-info">
					<h5 />You are about to be redirected to the main page in 5 seconds.
					<h5 />If the page doesn't refresh, please click <a href="./">here</a>.
				</div>
</div>
<?php
	header("refresh:5; url=./");
?>
