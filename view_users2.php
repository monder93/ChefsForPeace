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
    <h1 align="center" class="bg-primary">All Users</h1>
    <h3 align="center" class="bg-info">Edit Panel</h3>

<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->


    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
        <thead>

        <tr>

            <th class="bg-danger" width="50px">ID</th>
            <th class="bg-success"  width="100px">First Name</th>
            <th class="bg-info" width="100px">Last Name</th>
            <th class="bg-danger" width="150px">Email</th>
            <th class="bg-warning"  width="100px">Phone</th>
            <th class="bg-success"  width="100px">Password</th>
            <th class="bg-info" width="100px">Edit User</th>

        </tr>
        </thead>

        <?php
        include("database/db_conection.php");
        $view_users_query="select * from users";//select query for viewing users.
        if (!($run=mysqli_query($dbcon,$view_users_query)))
            echo "Unable to exec query<br>";//here run the sql query.
        

        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {
            $ID=$row[0];
            $First_Name=$row[1];
            $Last_Name=$row[2];
            $Email=$row[3];
            $Password=$row[4];
            $Phone=$row[5];


        ?>
    <form role="form" action="edit.php" method="POST">

        <tr>
<!--here showing results in the table -->
            <td class="bg-danger"><input   size="1" readonly="readonly" type="text" name="edited_id" value="<?php echo $ID;  ?>"></td>
            <td class="bg-success" ><input  size="15" type="text" name="edited_first_name" value="<?php echo $First_Name;  ?>"></td>
            <td class="bg-info"  ><input   size="15" type="text" name="edited_last_name" value="<?php echo $Last_Name;  ?>"></td>
            <td class="bg-danger" ><input size="26" type="text" name="edited_Email" value="<?php echo $Email;  ?>"></td>
            <td class="bg-warning" ><input size="15" type="text" name="edited_Phone" value="<?php echo $Phone;  ?>"></td>
            <td class="bg-success"  ><input size="15" type="text" name="edited_Password" value="<?php echo $Password;  ?>"></td>
            <td class="bg-info"  ><button  onclick="return confirm('You are about to delete this messege. Are you sure?')" class="btn btn-danger" type="submit">Edit User</button></td> <!--btn btn-danger is a bootstrap button to show danger-->
        </tr>

</form>
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
