<head>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/design.css" rel="stylesheet">


<script type="text/javascript" src="jquery/jquery-2.0.0.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>



</head>

<?php
if (isset($_GET['imgid'])) {
	$imgid = $_GET['imgid'];
	include("database/db_conection2.php");
	$query = "SELECT * FROM gallery WHERE id=".$imgid.";";
	if ($query_exec = mysqli_query($dbcon, $query)) {
		if ($query_row = mysqli_fetch_array($query_exec)) {
			$imgpath = $query_row['path'];
			$caption = $query_row['caption'];
			$addedon = $query_row['added_on'];
		?>

			<div class="modal-body"><p>
				<img src="<?php echo $imgpath; ?>" style="max-width: 100%;">
				<h3><?php echo wordwrap($caption, 84, "<br>\n", true); ?></h3>
				<h6>added on: <?php echo $addedon; ?></h6>
			</p></div>
	<?php
		}
	}
}


?>

