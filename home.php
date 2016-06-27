<?php 
include_once 'common.php';
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
     <script src="jquery/jquery-2.0.0.min"></script>
 

 
     <!-- Bootstrap Core CSS -->
     <link href="css/bootstrap.min.css" rel="stylesheet">
 
    
 
 
 </head>
 
 <body >
     <div class="custom-container" >
 
             <div class="row"> <!--Welcome page first row-->
 
                 <div class="col-sm-4">
                 
                     <h1><img src="pic/photo_3.jpg" id="welcome_photo" class="img-rounded" alt="Cinque Terre"></h1>
             
                 </div>
                 <div class="col-sm-8" id="welcome_slogan">
 
                     <br/><br/>
                     <h1><?php echo $lang['pargraph1_1'] ?></h1> 
                     <h4><p><?php echo $lang['pargraph1_2'] ?></p></h4>
                    <br/>
                     <h1><?php echo $lang['pargraph1_3'] ?></h1>
                     <h4><p><?php echo $lang['pargraph1_4'] ?></p></h4>
                 </div>
             </div>
     </div>
     
 
     <!--Brief about-us paragraph-->
     <div class="custom-container" >
         <div class="row"> 
             <div align="center" class="col-sm-8">
                 <h1>  <?php  echo $lang['pargraph2_1'] ?> </h1>
                <h4>
                     <p>
                         <?php echo $lang['pargraph2_2'] ?> 
                     </p>
                     <p>
                        <?php echo $lang['pargraph2_3'] ?> 

                     </p>
                     <p>
                        <?php echo $lang['pargraph2_4'] ?> 

                     </p>
                 </h4>
 
                 <br/>
                 <p>
                    <h5><?php echo $lang['pargraph2_5'] ?><a href="#/about"><?php echo $lang['MENU_ABOUT_US'] ?></a><?php echo $lang['paragraphdown'] ?></h5>
                 </p>
             </div>
             <div class="col-sm-4">
                 <br/><br/>
                 <img src="pic/photo_4.jpg" id="about_photo" class="img-rounded" alt="Cinque Terre">
             </div>
         </div>
     </div>
 
 
     <!--Newsletter paragraph of homepage-->
     <div class="custom-container" >
         <div class="row"> <!-- Newsletter row -->
             <div class="col-sm-6" id="newsletter">
                 <h1><?php echo $lang['pargraph3_1'] ?></h1>
                 <h4>
                     <p>
                        <?php echo $lang['pargraph3_2'] ?>
                         
                     </p>
                 </h4>
                 
             </div>
             <div class="col-sm-6" id="newsletter">
                 <h1><?php echo $lang['pargraph3_3'] ?></h1>
                 <h2><?php echo $lang['pargraph3_4'] ?></h2>
                 <br>
                 <form role="form" class="form-inline" action="add_email_to_newsletter.php" method="POST">
                     <div class="form-group">
                         <input type="email" class="form-control" id="newsletterEmail" name="newsletterEmail" placeholder="<?php echo $lang['INFO_INSERT_YOUR_EMAIL_HERE']; ?>">
                    </div>
                    <br>
                     <button name="newslettersend" type="submit" class="btn btn-primary"><?php echo $lang['MENU_REGISTER']; ?></button>
                 </form>
             </div>
         </div>
     </div>
 

    <!--Events paragraph of homepage-->
     <div class="custom-container" >
         <div class="events-container">
             <div class="row">
             
                 <div class="col-sm-12">
                     <p>
                         <img src="pic/photo_5_2.jpg" id="events_photo" class="img-rounded" alt="Cinque Terre">
                     </p>
                     <p>
                         <h1><?php echo $lang['pargraph4_1'] ?></h1>
                         <h4>
                             <p>
                                <?php echo $lang['pargraph4_2'] ?> 
                             </p>
                             <p>
                                <?php echo $lang['pargraph4_3'] ?> 
                             </p>
                             <p>
                                <?php echo $lang['pargraph4_4'] ?> 
                             </p>
                         </h4>
                     </p>
                 </div>
             </div>
         
 
             <div class="row">
                 <div class="col-sm-6">
                      <a href="#/events">
                         <h3><?php echo $lang['INFO_GO_TO_OUR_EVENTS']; ?></h3>
                     </a>
                 </div>
                 <div class="col-sm-6">
                     <a href="#/registration">
                         <h3><?php echo $lang['INFO_SIGNUP_AS_A_WEBSITE_MEMBER']; ?></h3>
                     </a>
                 </div>
             </div>
         </div>
     </div>
 
     
        
 

     
 
 </body>
 
 </html>
