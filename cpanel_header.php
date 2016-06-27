
<!DOCTYPE html>
<html lang="en">
 
 <head>
 
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="">
     <meta name="author" content="">
 
     <!-- jQuery -->

     <script type="text/javascript" src="jquery/jquery-2.0.0.min.js" charset="UTF-8"></script>

 
     <!-- Bootstrap Core JavaScript -->
     <script src="js/bootstrap.min.js"></script>
 
     <!-- Bootstrap Core CSS -->
     <link href="css/bootstrap.min.css" rel="stylesheet">
 
     <!-- Custom CSS -->
     <link href="css/design.css" rel="stylesheet">
     <link href="css/cpanel.css" rel="stylesheet">

 </head>


<div class="custom-container">
    <div class="row">
        <div class="col-sm-2">
            <nav class="navbar navbar-default" role="navigation">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">Site Manager</a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                  <li><a href="eventsmanager.php">Manage events</a></li>
                  <li><a href="eventusers.php">Event attendees</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gallery <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="gallerymanager.php">Add photos</a></li>
                      <li><a href="gallery_viewer.php">Manage photos</a></li>
                    </ul>
                  </li>
                  <li><a href="view_messages.php">Read messages</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="view_users.php">View and Delete users</a></li>
                      <li><a href="view_users2.php">Edit User info</a></li>
                      <li><a href="UpgradeUser.php">Upgrade User</a></li>

                    </ul>
                  </li>
                  <li><a href="newsletteradmin.php">Newsletter</a></li>
                  <li><a class="btn btn-info" href="index.php"><?php echo "back to website"?></a></li>

                </ul>

              </div><!-- /.navbar-collapse -->
              


            </nav>
        </div> <!-- col -->

<div class="col-sm-10">
<div id="content-wrapper">

