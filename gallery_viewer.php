<?php 
session_start();
if (isset($_SESSION['type'])&& $_SESSION['type']=="admin")

{ 

	?>


<?php
include("database/db_conection2.php"); //Connects to DB.
$mysql_table = "gallery";

$start				= 0;
$rows_per_page 		= 2;
$columns_per_page 	= 4;
$images_per_page 	= $rows_per_page * $columns_per_page;

?>


 <?php include("cpanel_header.php"); ?>
 
<head>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

<script type="text/javascript" src="js/editevent.js" charset="UTF-8"></script>
<script type="text/javascript" src="jquery/jquery-2.0.0.min.js" charset="UTF-8"></script>


<body>


 <?php
if (isset($_GET['start']) && $_SERVER['REQUEST_METHOD'] == "GET") {
	$start = $_GET['start'];
}

if ($_SERVER['REQUEST_METHOD'] == "POST"
	&& isset($_POST['caption'])) {
			
			$start_page = $_POST['start_page'];
			$caption 	= $_POST['caption'];
			$img_id 	= $_POST['img_id'];
			echo $start_page.": ".$caption."<br>";

			$query = "UPDATE ".$mysql_table." SET caption = '".$caption."' WHERE id=".$img_id;
			echo $query."<br>";
			if (!mysqli_query($dbcon, $query))
				echo "Unable to update caption. Failed to send mysqli query.<br>";

			
}

	
$query = "SELECT * FROM ".$mysql_table." ORDER BY id DESC
			LIMIT ".$start.", ".$images_per_page.";";

if ($query_exec = mysqli_query($dbcon, $query)) {
	$rows_returned = mysqli_num_rows($query_exec);



	?><div class="custom-container"> <?php
	for ($i=0; $i<$rows_per_page; $i++) {
		?><p><div class="row" style="position: relative;"><?php
		for ($j=0; $j<$columns_per_page; $j++) {
			if ($query_row = mysqli_fetch_array($query_exec)) {
				$path 		= $query_row['path'];
				$imgid		= $query_row['id'];
				$imgcaption = $query_row['caption'];
			?>
			<div class="col-md-3">
				<img src="<?php echo $path; ?>" style="width: 250px; height: 200px;">
	
					<p><div class="row">
						<form action="gallery_viewer.php" method="POST">
							<div class="form-group">
								<input type="hidden" name="start_page" value="<?php echo $start;?>">
								<input type="hidden" name="img_id" value="<?php echo $imgid;?>">
								<div class="col-sm-8">
									<input type="text" name="caption" class="form-control" value="<?php echo $imgcaption; ?>">
								</div>
								<div class="col-sm-2">
									<button type="submit" class="btn btn-default" >Update</button>
								</div>
							</div>
						</form>
					</div></p>
					<div class="row">
						<div class="col-sm-10">
							<form action="delete_photo.php" method="POST">
								<input type="hidden" name="start_page" value="<?php echo $start;?>">
								<input type="hidden" name="photo_id" value="<?php echo $imgid;?>">
							<button class="btn btn-danger" type="submit" onclick="return confirm('WARNING: You are about to PERMANENTLY erase this photo from database! Are you sure you want to continue?')">Delete Photo</button>
						</form>
						</div>
					</div>

			</div>
			<?php
			}
		} ?> 
		</div></p>
	
	<?php
	} ?>
	 <br/><center><?php




	if ($start != 0) { //not on first page
	?>
		<a href="<?php echo "gallery_viewer.php?start=".($start-$images_per_page); ?>" class="btn btn-info" role="button">[Prev]</a>
	<?php
	}
	if ($rows_returned == $images_per_page) { //not on the last page
	?>

		<a href="<?php echo "gallery_viewer.php?start=".($start+$images_per_page);?>" class="btn btn-info" role="button">[Next]</a></center>
		
		</div>
	<?php
	}

} else {
	exit("Unable to execute mySQL query.");
}



?>

</body>
 <?php include("cpanel_footer.php"); ?>
 </html>

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
