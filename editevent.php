<?php
include("database/db_conection2.php"); //Connects to DB.
$mysql_table = "events";

if (isset($_GET['event_id'])) {

	$event_id = $_GET['event_id'];
	$query = "SELECT * FROM `".$mysql_table."` WHERE event_id=\"".$_GET['event_id']."\"";
	echo $query."<br><br>";

	if ($query_exec = mysqli_query($dbcon, $query)) {
		if ($query_row = mysqli_fetch_array($query_exec)){

			$event_name 	= $query_row['event_title'];
			$event_desc 	= $query_row['event_description'];
			$event_time 	= $query_row['datetime'];
			$event_contact	= $query_row['contact_info'];

			echo "Event name: ".$event_name."<br>";
			echo "Event desc: ".$event_desc."<br>";
			echo "Event time: ".$event_time."<br>";
			echo "Event cont: ".$event_contact."<br>";

		} else {
			echo exit("Couldn't fetch query. Check that event ID is valid.");
		}
		
	} else {
		echo exit("Unable to execute SELECT event query.");
	}



} else {
	echo "No event selected.";
}

	

?>

<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<script type="text/javascript" src="js/editevent.js" charset="UTF-8"></script>
<script type="text/javascript" src="jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>

<form role="form" action="eventeditor.php" method="POST">
	<div class="form-group">
		<label for="event_id">Event id:</label>
		<input type="text" class="form-control" name="event_id" 
				value="<?php echo $event_id; ?>" readonly="readonly">
	</div>
	<!--Event Name-->
	<div class="form-group">
		<label for="event_name">Event name:</label>
		<input type="text" class="form-control" name="event_name" 
				value="<?php echo $event_name; ?>" required>
	</div>
	<!--Event Description-->
	<div class="form-group">
		<label for="event_desc">Event description:</label>
		<textarea class="form-control" rows="3" name="event_desc"><?php echo $event_desc; ?></textarea>
	</div>
	<!--Event Date and Time-->
	<div class="form-group">
		<div class='input-group date' id='datetimepicker1'>
			<label for="date_time">Please pick a date</label>
            <input type='text' class="form-control" name="date_time" 
            	value="<?php echo $event_time?>" required/>
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
         </div>
	</div>
	<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
    </script>
    <!--Contact info-->
    <div class="form-group">
		<label for="event_name">Contact information:</label>
		<input type="text" class="form-control" name="contact_info"
			value="<?php echo $event_contact?>" required>
	</div>
    <!--Submit button-->
	<div>
	<button type="submit" class="btn btn-default">Submit</button>

</form>

<button type="button" class="btn btn-default" onclick="location.href='eventsmanager.php'">Back</button>
</div>
