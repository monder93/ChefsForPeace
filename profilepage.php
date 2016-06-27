<?php
session_start();
?>

<head>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/design.css" rel="stylesheet">


<script type="text/javascript" src="jquery/jquery-2.0.0.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>




</head>
<body>
<div class="custom-container">
<?php
if (isset($_SESSION['user_id'])) {
    include("database/db_conection2.php");
    $user_id = $_SESSION['user_id'];
    $query = "SELECT profile_picture, bio FROM users WHERE ID =".mysqli_real_escape_string($dbcon, $user_id);
    if ($query_exec = mysqli_query($dbcon, $query)) {
        if ($query_row = mysqli_fetch_array($query_exec))

            $pic_path = $query_row['profile_picture'];
            $bio      = $query_row['bio'];
            $firstname= $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $phone    = $_SESSION['phone'];
            $email    = $_SESSION['email'];
            $password = $_SESSION['password'];
            //echo $pic_path."<br>Bio<br>".$bio;

            ?>
            <div class="profile-container">
                <div class="row">
                    <div class="col-md-6">
                            <img class="profile-picture" src="<?php echo $pic_path; ?>">
                    </div>
                    <div class="col-md-6">
<!--Form for info update-->
<form role="form" action="updateprofile.php" method="POST">
    <div class="form-group">
        <input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id;?>">
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="first_name">First name:</label>
                <input type="text" class="form-control" name="first_name" value="<?php echo $firstname;?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="last_name">Last name:</label>
                <input type="text" class="form-control" name="last_name" value="<?php echo $lastname;?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="email_addr">Email address:</label>
                <input type="text" class="form-control" name="email_addr" value="<?php echo $email;?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="u_phone">Phone number:</label>
                <input type="number" class="form-control" name="u_phone" value="<?php echo $phone;?>">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="u_bio">Biography: </label>
                <textarea class="form-control" name="u_bio" rows="7"><?php echo $bio; ?></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="u_password">Password:</label>
                <input type="password" class="form-control" name="u_password" value="<?php echo $_SESSION['password'];?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <button type="submit" class="btn btn-default" style="margin-top: 25px;">Update info</button>
            </div>
        </div>
    </div>

</form>

<form action="changephoto.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
    <div class="row">
        <div class="col-md-12">
            <label for="uploaded_photo">Update profile photo here, select new one</label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <input type="file" name="uploaded_photo" id="uploaded_poster">
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-default">Upload new photo</button>
            </div>
    </div>
</form>

                





                    </div>

                </div>
            </div> <!--profile-container-->
            <?php
    }
} else {
    ?>
    <div class="alert alert-danger">
        <h5 />You cannot view this page without logging in.
    </div>
<?php
}

?>
</div>
</body>



