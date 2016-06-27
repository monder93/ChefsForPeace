<?php 
session_start();
if (isset($_SESSION['type'])&& $_SESSION['type']=="admin")

{ 

	?>


<?php
include("database/db_conection2.php"); //Connects to DB.
$mysql_table = "gallery";

$valid_formats = array("jpg", "png", "gif", "bmp");
$max_file_size = 1024*50000; //100 kb
$path = "uploads/gallery/"; // Upload directory


if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to exeicute all files
	foreach ($_FILES['filesToUpload']['name'] as $f => $name) {     
	    if ($_FILES['filesToUpload']['error'][$f] == 4) {
	    	echo "An error occurred on file:'".$name."'. File will not be uploaded.<br>";
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['filesToUpload']['error'][$f] == 0) {	           
	        if ($_FILES['filesToUpload']['size'][$f] > $max_file_size) {
	            echo $name." is too large!. File will not be uploaded.<br>";
	            continue; // Skip large files
	        }
			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				echo "Error: ".$name." is not a valid format. File will not be uploaded.<br>";
				continue; // Skip invalid file formats
			}
	        else{
	        	 // No error found! Move uploaded files 
            	$target_file = $path . basename($_FILES["filesToUpload"]["tmp_name"][$f]);
            	$target_file = $target_file .'.'.pathinfo($name,PATHINFO_EXTENSION);
            	echo "TARGET FILE: ".$target_file."<br>";
	            if(move_uploaded_file($_FILES["filesToUpload"]["tmp_name"][$f],  $target_file)) {

	            	$query = "INSERT INTO ".$mysql_table." (added_on, path) 
	            				VALUES (NOW(), '".$target_file."');";
	            	echo "Query: ".$query."<br>";

	            	if ($query_exec = mysqli_query($dbcon, $query)) {
						echo 'Image added.';
					} else {
						echo 'Unable to add event to DB.<br>ERROR: '.mysqli_error();
						unlink($target_file);
					}

	            }
	            	
	        }
	    }
	}
}
 
?>

<head>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

<script type="text/javascript" src="js/editevent.js" charset="UTF-8"></script>
<script type="text/javascript" src="jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
</head>

 <?php include("cpanel_header.php"); ?>

<body>
<div class="custom-container">
	<div class="row">
		<div class="col-sm-12">
		<p>
			Please select photos to upload to the gallery.<br>
			You may select multiple photos.<br>
			After photos have been uploaded, you may add a caption to each photo.<br>
		</p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<form method="post" action="gallerymanager.php" enctype="multipart/form-data">
  				<input name="filesToUpload[]" id="filesToUpload" type="file" multiple="" accept="image/*" /><br>
  				<button type="submit" class="btn btn-default">Click to upload</button>
			</form>
		</div>
	</div>
</div>
</body>

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
