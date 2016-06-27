<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<script type="text/javascript" src="jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>




<?php
include("database/db_conection2.php"); //Connects to DB.
$mysql_table = "events";

if (isset($_GET['event_id'])) {


	$event_id = $_GET['event_id'];
	$query = 
		"SELECT poster_url FROM ".$mysql_table." WHERE event_id=".mysqli_real_escape_string($dbcon, $event_id);
	
	if ($query_exec = mysqli_query($dbcon, $query)) {
		if ($query_row = mysqli_fetch_array($query_exec)){
			$event_poster_url 	= $query_row['poster_url'];
		}
	}

}


?>

<body>

<form action="change_poster.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="event_id" value="<?php echo $_GET['event_id']; ?>" />
    <h5>Select a new poster to upload:</h5><br/>
    <input type="file" name="uploaded_poster" id="uploaded_poster">
    <input type="submit" value="Upload Image" name="submit">
</form>

<button type="button" class="btn btn-default" onclick="location.href='eventsmanager.php'">Back</button>
<br/><br/>
<?php
if (!empty($event_poster_url)) {
		echo "Current poster:<br><img width=\"50%\" src=\"".$event_poster_url."\"><br>";
	} else {
		echo "No poster available for this event.<br>";
	}
?>
</body>


