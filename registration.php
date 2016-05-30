<?php
include_once 'common.php';
?>

<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="css\bootstrap.css">
    <title>Registration</title>
</head>
<style>
    .login-panel {
        margin-top: 5px; 

</style>
<body>

<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
    <div class="row"><!-- row class is used for grid system in Bootstrap-->
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $lang['MENU_REGISTER']; ?></h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="do_signup.php">
                        <fieldset>
    <! --------firstname ---- -->
                            <div class="form-group">
                                <input class="form-control" placeholder="<?php echo $lang['INFO_NAME']; ?>" name="firstname" type="text" autofocus>
                            </div>
    <! --------lastname ------ -->
                            <div class="form-group">
                                <input class="form-control" placeholder="<?php echo $lang['INFO_LAST_NAME']; ?>" name="lastname" type="text" autofocus>
                            </div>
    <! --------email ------ -->
                            <div class="form-group">
                                <input class="form-control" placeholder="<?php echo $lang['INFO_EMAIL']; ?>" name="email" type="email" autofocus>
                            </div> 
    <! --------password ------ -->
                            <div class="form-group">
                                <input class="form-control" placeholder="<?php echo $lang['INFO_PASSWORD']; ?>" name="password" type="password" value="">
                            </div>
   <! --------confirm_password ------ -->
                            <div class="form-group">
                                <input class="form-control" placeholder="<?php echo $lang['INFO_CONFIRM_PASSWORD']; ?>" name="confirm_password" type="password" value="">
                            </div>

                            <input class="btn btn-lg btn-success btn-block" type="submit" value="<?php echo $lang['MENU_REGISTER']; ?>" name="register" >

                        </fieldset>
                    </form>
                    <center><b><?php echo $lang['MENU_ALREADY_REGISTERED']; ?></b> <br></b><a href="#signin"><?php echo $lang['MENU_LOGIN']; ?></a></center><!--for centered text-->
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>

 



