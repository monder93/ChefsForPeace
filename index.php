<?php
include_once 'common.php';
?>
<!DOCTYPE html>
 
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  	<title>Chefs for Peace</title>
  	<link rel="stylesheet" href="css/bootstrap.css">
 	<link rel="stylesheet" href="css/design.css">
 
 
   <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="js/bootstrap.js"></script>
   <script src="js/angular.min.js"></script>
   <script src="js/angular-route.min.js"></script>
   <script src="js/app.js"></script>

 
 </head>
 <body ng-app="app">

 <nav class="navbar navbar-custom">
   
     <div class="navbar-header">
     <img id="header_image" src="pic/home_header.jpg">    

 	
 	  <ul class="nav navbar-nav navbar-right">

         <li><a href="#/registration"><span class="glyphicon glyphicon-user"></span> <?php echo $lang['MENU_REGISTER']; ?></a></li>
        <li><a href="#/signin"><span class="glyphicon glyphicon-log-in"></span> <?php echo $lang['MENU_LOGIN']; ?></a></li>
      </ul>

 
 <a href="index.php?lang=en"><img src="images/en.png" /></a>
<a href="index.php?lang=ar"><img src="images/ar.png" /></a>
<a href="index.php?lang=he"><img src="images/he.png" /></a>

 	  	
     <ul class="nav navbar-nav navbar-left">
       <li class="active"><a href="#/home"><?php echo $lang['MENU_HOME']; ?></a></li>
       <li><a href="#/contact"><?php echo $lang['MENU_CONTACT_US']; ?></a></li>
       <li><a href="#/about"><?php echo $lang['MENU_ABOUT_US']; ?></a></li>
       <li><a href="#/gallery"><?php echo $lang['MENU_GALLERY']; ?></a></li>
       <li><a href="#/events"><?php echo $lang['MENU_EVENTS']; ?></a></li>
       </li>

     </ul>
   </div>

 </nav>
 
 <div ng-view>
 
 </div>
 
 
 
 
 
 </body>
 </html>
