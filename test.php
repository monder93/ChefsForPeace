<!DOCTYPE html>

 
 <head>
 
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="">
     <meta name="author" content="">
 
     <!-- jQuery -->
     <script src="js/jquery.js"></script>
 
     <!-- Bootstrap Core JavaScript -->
     <script src="js/bootstrap.min.js"></script>
 
     <!-- Bootstrap Core CSS -->
     <link href="css/bootstrap.min.css" rel="stylesheet">
 
     <!-- Custom CSS -->
     <link href="css/business-frontpage.css" rel="stylesheet">
     <link href="css/style.css" rel="stylesheet" rel="stylesheet">

 </head>
<?php

if (isset($_POST['caption']) && (!empty($_POST['caption']))) {
	$fn = $_POST['caption'];
	echo "caption: ".$fn."<br>";
}

if (isset($_POST['toDel[]'])) {
	echo "Isset <br>";
	$toDel = $_POST['toDel[]'];
	if (!empty($toDel)) {
		echo "not empty<br>";
		foreach ($toDel as $d) {
			echo "id to del: ".$d."<br>";
		}
	}
}


?>
<form role="form" action="test.php" method="POST">
<?php
for ($i = 0; $i < 5; $i++) {
	?>

		<form role="form" action="test.php" method="POST">
			<input type="text" name="caption" value="<?php echo $i;  ?>">
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
		<input type="checkbox" name="toDel[]" value="<?php echo $i; ?>">

	



	<?php 
}
?>
<input type="submit" name="del" value="Delete selected" />
	
</form>
</html>
