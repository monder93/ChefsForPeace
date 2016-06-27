<?php
session_start();
include("database/db_conection2.php"); //Connects to DB.

?>


<!DOCTYPE html>
<html lang="en">
 
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
 
     <!-- Custom CSS -->
     <link href="css/design.css" rel="stylesheet">

 </head>


<body>

<div class="custom-container">

       <?php
 		$query = "SELECT `event_title`, `datetime`, `event_id` FROM `events`";
 		if ($query_exec = mysqli_query($dbcon, $query)) {
			while($query_row = mysqli_fetch_array($query_exec)) {
                $event_id    = $query_row['event_id'];
				$event_title = $query_row['event_title'];
				$event_time  = $query_row['datetime'];
                $month       = date_format(new DateTime($event_time), 'M');
                $day         = date_format(new DateTime($event_time), 'dS');
                $day_text    = date_format(new DateTime($event_time), 'D');
                ?>
            <a data-toggle="modal" data-target="#myModal" href="joinevent.php?id=<?php echo $event_id; ?>">
                <div class="events-custom-container">
                    <div class="row" style="text-align: center;">
                        <div class="col-md-12">

                            <h1 /> <?php echo $event_title; ?>
                        </div>
                    </div>
                    <div class="row" style="text-align: center;">
                        <div class="col-md-12">

                            <h3 /> <?php echo $day_text." the ".$day." of ".$month; ?>

                        </div>
                    </div>
                </div>
            </a>



<?php
            }
        }
        mysqli_close($dbcon);     
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





<!--here showing results in the table -->

<!-- Modal content-->

</body>
</html>