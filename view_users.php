<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="css\bootstrap.css"> <!--css file link in bootstrap folder-->
    <title>View Users</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;
    }
    .table {
        margin-top: 50px;

    }

</style>

<body>

<div class="table-scrol">
    <h1 align="center">All the Users</h1>

<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->


    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
        <thead>

        <tr>

            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Delete User</th>
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



        ?>

        <tr>
<!--here showing results in the table -->
            <td><?php echo $ID;  ?></td>
            <td><?php echo $First_Name;  ?></td>
            <td><?php echo $Last_Name;  ?></td>
            <td><?php echo $Email;  ?></td>
            <td><?php echo $Password;  ?></td>
            <td><a href="delete.php?del=<?php echo $ID ?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->
        </tr>

        <?php } ?>

    </table>
        </div>
</div>


</body>

</html>
