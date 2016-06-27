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
     <div class="custom-container" style="text-align: center;">
<?php
     $query = "SELECT profile_picture, First_Name, Last_Name, ID FROM users WHERE Type='chef'";
     if ($query_exec = mysqli_query($dbcon, $query)) {
        $rownum = mysqli_num_rows($query_exec);
        $rows = $rownum / 3;
        //echo "rownum: ".$rownum." rows=".$rows;
          for ($i=0; $i<$rows; $i++) {
          ?>  <div class="row"> <?php
            for ($j=0; $j<3; $j++) {
              if ($query_row = mysqli_fetch_array($query_exec)) {
                $firstname  = $query_row['First_Name'];
                $lastname   = $query_row['Last_Name'];
                $picpath    = $query_row['profile_picture'];
                $user_id    = $query_row['ID'];
            ?>
              <div class="chef-container">  
                <div class="col-md-6">  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="chef-picture"><img src="<?php echo $picpath; ?>"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <h3 class="chef-name"><?php echo $firstname." ".$lastname; ?></h3>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <a class="btn btn-success btn-sm" role="button" data-toggle="modal" data-target="#myModal" href="personalprofile.php?id=<?php echo $user_id; ?>" style="text-align: left;"> More about <?php echo $firstname; ?> </a>
                    </div>
                  </div>
                </div>
              </div><br>

      <?php } 
          }
          ?> </div> <?php
          }
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
<body>
</html>