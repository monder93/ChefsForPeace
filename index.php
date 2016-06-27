<?php
include_once 'common.php';


?>
<!DOCTYPE html>
 
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  	<title>Chefs for Peace</title>
       <script src="jquery/jquery-2.0.0.min.js"></script>
              <script src="js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="css/design.css">
  	<link rel="stylesheet" href="css/bootstrap.css">
 
 
   <script src="js/angular.min.js"></script>
   <script src="js/angular-route.min.js"></script>
   <script src="js/app.js"></script>

 
 </head>


 <body ng-app="app" class="container">
 <?php if (isset($_SESSION['type'])) { } ?>
 <nav class="navbar navbar-custom navbar-collapse " >
   
     <div class="navbar-header" >
<div align="left" class="dropdown" >
<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">
  <span class="caret"></span>Languages</button>
  <ul class="dropdown-menu">
  <li><a  href="index.php?lang=en"><img src="images/en.png" />English</a></li>
	<li><a href="index.php?lang=ar"><img src="images/ar.png" />Arabic</a></li>
 	<li><a href="index.php?lang=he"><img src="images/he.png" />Hebrew</a></li>
  </ul>
 </div>


     <img id="header_image" src="pic/home_header.jpg" >   

 	
 	  <ul class="nav navbar-nav  navbar-right">
<?php       if (isset($_SESSION['type'])) { ?>
         <li><a href="#/profilepage"><span class="glyphicon glyphicon-user">Welcome:<?php echo $_SESSION['firstname']."-".$_SESSION['lastname'] ?> </span></a></li>
         <li><a class="btn btn-info btn-sm glyphicon glyphicon-log-out"  href="logout.php" ><span > logout</span></a></li>
<?php } else  { ?>
         <li><a href="#/registration"><span class="glyphicon glyphicon-user"></span> <?php echo $lang['MENU_REGISTER']; ?></a></li>
        <li><a href="#/signin"><span class="glyphicon glyphicon-log-in"></span> <?php echo $lang['MENU_LOGIN']; ?></a></li>
      <?php } ?>
      </ul>


	
     <ul class="nav navbar-nav navbar-left">
       <li class="active"><a href="#/home"><?php echo $lang['MENU_HOME']; ?></a></li>
       <li><a href="#/contact"><?php echo $lang['MENU_CONTACT_US']; ?></a></li>
       <li><a href="#/about"><?php echo $lang['MENU_ABOUT_US']; ?></a></li>
       <li><a href="#/gallery" ><?php echo $lang['MENU_GALLERY']; ?></a></li>
       <li><a href="#/events"><?php echo $lang['MENU_EVENTS']; ?></a></li>  
       <li><a href="#/chefs"><?php echo $lang['MENU_CHEFS']; ?></a></li>  
       <li><a href="#/comments"><?php echo $lang['MENU_COMMENTS']; ?></a></li>  

<?php       if (isset($_SESSION['type'])&& $_SESSION['type']=="admin") { ?>
 <li><a href="cpanel.php" ><?php echo "Admin Control Panel" ?></a></li>
 <?php } ?>


     </ul>
   </div>

 </nav>
 <div ng-view>
 
 </div>
 
 
 
 
 
 </body>
 </html>
