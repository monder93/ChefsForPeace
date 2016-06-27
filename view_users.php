<?php 
session_start();
if (isset($_SESSION['type'])&& $_SESSION['type']=="admin")

{ 

    ?>


 <?php include("cpanel_header.php"); ?>
 
<head>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

<script type="text/javascript" src="js/editevent.js" charset="UTF-8"></script>
<script type="text/javascript" src="jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>


</head>
<body>

<div class="table-scrol">
    <h1 align="center" class="bg-primary">All Users </h1>
    <h3 align="center" class="bg-info">Delete Panel</h3>

<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->


    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
        <thead>

        <tr>

            <th class="bg-danger" width="70px">ID</th>
            <th class="bg-success">First Name</th>
            <th class="bg-info">Last Name</th>
            <th class="bg-danger" width="230px">Email</th>
            <th class="bg-warning">Phone</th>
            <th class="bg-success">Password</th>
            <th class="bg-info" width="100px">Delete User</th>

        </tr>
        </thead>

        <?php
        include("database/db_conection.php");
        $view_users_query="select * from users";//select query for viewing users.
        $run=mysqli_query($dbcon,$view_users_query);//here run the sql query.

        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {
            $ID=$row[0];
            $First_Name=$row[1];
            $Last_Name=$row[2];
            $Email=$row[3];
            $Password=$row[4];
            $Phone=$row[5];



        ?>

        <tr>
<!--here showing results in the table -->
            <td class="bg-danger"><?php echo $ID;  ?></td>
            <td class="bg-success"><?php echo $First_Name;  ?></td>
            <td class="bg-info"><?php echo $Last_Name;  ?></td>
            <td class="bg-danger"><?php echo $Email;  ?></td>
            <td class="bg-warning"><?php echo $Phone;  ?></td>
            <td class="bg-success"><?php echo $Password;  ?></td>
            <td class="bg-info"><a href="delete.php?del=<?php echo $ID ?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->
        </tr>

        <?php } ?>

        <?php mysqli_close($dbcon); ?>

    </table>
        </div>
</div>


</body>
<?php include("cpanel_footer.php"); ?>
</html>



<?php } 
else 
{
    ?>


<head>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/design.css" rel="stylesheet">


<script type="text/javascript" src="jquery/jquery-2.0.0.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>



</head>
<body class="bg-success"> 
<div class="bg-success">
<div class="alert alert-danger">
                    <h5 />You Need Admin Permission To Log In To The Admin Control Panel</h5>
                </div>

<div class="alert alert-info">
                    <h5 />You are about to be redirected to the main page in 5 seconds.
                    <h5 />If the page doesn't refresh, please click <a class="btn btn-danger" href="./">here</a>.
</div>

</div>
</body>
<?php

    header("refresh:5; url=./");
}
?>
