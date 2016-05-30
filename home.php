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
     <script src="js/jquery.js"></script>
 
     <!-- Bootstrap Core JavaScript -->
     <script src="js/bootstrap.min.js"></script>
 
     <!-- Bootstrap Core CSS -->
     <link href="css/bootstrap.min.css" rel="stylesheet">
 
     <!-- Custom CSS -->
     <link href="css/business-frontpage.css" rel="stylesheet">
 
 
 
 </head>
 
 <body>
     <div class="custom-container">
 
             <div class="row"> <!--Welcome page first row-->
 
                 <div class="col-sm-4">
                 
                     <h1><img src="pic/photo_3.jpg" id="welcome_photo" class="img-rounded" alt="Cinque Terre"></h1>
             
                 </div>
                 <div class="col-sm-8" id="welcome_slogan">
 
                     <br/><br/>
                     <h1>Cooking together...</h1> 
                     <h4><p>We open our imaginations and create new experiences...</p></h4>
                    <br/>
                     <h1>Eating Together...</h1>
                     <h4><p>we discover a universal and heartfelt connection.</p></h4>
                 </div>
             </div>
     </div>
     
 
     <!--Brief about-us paragraph-->
     <div class="custom-container">
         <div class="row"> 
             <div class="col-sm-8">
                 <h1>About Chefs for Peace</h1>
                <h4>
                     <p>
                         Chefs for Peace is a non-profit, non-political organization founded in the Holy City of Jerusalem in November 2001 by a group of Jewish, Christian and Muslim chefs committed to exploring cultural identity, diversity and coexistence through food. 
                     </p>
                     <p>
                         Chefs for Peace understands food - its preparation, sharing, and enjoyment - as a powerful means of creating a bond with others and revealing that which is valued by all three faiths: food, family and friends.
                     </p>
                     <p>
                         Chefs For Peace is indifferent to politics, religion, or skin color. Our aim is to bring people together; we understand the power of food as a bridge to mutual acceptance and see peace as a delicious possibility. Our message is simple: only real people living and working together, not politicians, will create peace on the ground. For us, peace happens every day, in the kitchen and around the table!
                     </p>
                 </h4>
 
                 <br/>
                 <p>
                    <h5>More about the Chefs for Peace in our <a href="#/about">About Us</a> page.</h5>
                 </p>
             </div>
             <div class="col-sm-4">
                 <br/><br/>
                 <img src="pic/photo_4.jpg" id="about_photo" class="img-rounded" alt="Cinque Terre">
             </div>
         </div>
     </div>
 
 
     <!--Newsletter paragraph of homepage-->
     <div class="custom-container">
         <div class="row"> <!-- Newsletter row -->
             <div class="col-sm-6" id="newsletter">
                 <h1>Newsletter</h1>
                 <h4>
                     <p>
                         Stay close to our hearts. Sign up to our Newsletter and receive
                         the latest updates about Chefs for Peace and all upcoming events
                         and workshops straight to your e-mail.
                     </p>
                 </h4>
                 
             </div>
             <div class="col-sm-6" id="newsletter">
                 <h1>Keep the fire burning!</h1>
                 <h2>Sign up now:</h2>
                 <br>
                 <form class="form-inline">
                     <div class="form-group">
                         <input type="email" class="form-control" id="newsletterEmail" placeholder="<?php echo $lang['INFO_INSERT_YOUR_EMAIL_HERE']; ?>">
                    </div>
                    <br>
                     <button type="submit" class="btn btn-primary"><?php echo $lang['MENU_REGISTER']; ?></button>
                 </form>
             </div>
         </div>
     </div>
 

    <!--Events paragraph of homepage-->
     <div class="custom-container">
         <div class="events-container">
             <div class="row">
             
                 <div class="col-sm-12">
                     <p>
                         <img src="pic/photo_5_2.jpg" id="events_photo" class="img-rounded" alt="Cinque Terre">
                     </p>
                     <p>
                         <h1>Chefs for Peace Events!</h1>
                         <h4>
                             <p>
                                 Chefs for Peace regularly hosts various events all around the world... We would love to have you over!
                             </p>
                             <p>
                                 Check out our Events page to see all Chefs for Peace upcoming events.
                             </p>
                             <p>
                                 User our website to RSVP to any of Chefs for Peace upcoming events, by Singning Up for a free membership in our website.
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
