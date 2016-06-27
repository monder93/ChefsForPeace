<?php
session_start();
include("database/db_conection2.php"); //Connects to DB.
$mysql_table = "gallery";

?>

<html>
<head>
 
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="">
     <meta name="author" content="">
 
     <!-- jQuery -->
     <script src="js/jquery.js"></script>

 
     <!-- Bootstrap Core CSS -->
     <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/design.css" rel="stylesheet">
 
</head>

<body>
	<div class="custom-container">
	<?php $query = "SELECT * FROM ".$mysql_table." ORDER BY id DESC;";
	if ($query_exec = mysqli_query($dbcon, $query)) {
		$rownum = mysqli_num_rows($query_exec);
		$rows = $rownum/4;
		for ($i=0; $i<$rows; $i++) {
		?>	<div class="row">
	<?php	for ($j=0; $j<4; $j++) {
				if ($query_row = mysqli_fetch_array($query_exec)) {
			?>	<div class="col-md-3"> <?php
					$path 		= $query_row['path'];
					$imgid		= $query_row['id'];
			?>		
				<a data-toggle="modal" data-target="#myModal" href="gallery_display.php?imgid=<?php echo $imgid; ?>" >
					<img class="img-thumb" src="<?php echo $path; ?>">
				</a>	
				</div> <!--col-md-3-->
		<?php	}
			}
	?>		</div> <br>  <!--row-->
<?php	}
}
				
?>
	</div>

<!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <p></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
</body>
</html>

