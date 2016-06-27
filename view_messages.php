<?php 
session_start();
if (isset($_SESSION['type'])&& $_SESSION['type']=="admin")

{ 

    ?>

 
<head>
<script type="text/javascript" src="js/editevent.js" charset="UTF-8"></script>
<script type="text/javascript" src="jquery/jquery-2.0.0.min.js" charset="UTF-8"></script>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">



</head>




 <?php include("cpanel_header.php"); ?>


<body>

<div class="table-scrol">
    <h1 align="center" class="bg-primary">All Messages</h1>
    <h3 align="center" class="bg-info">View and Delete Panel</h3>

<div class="table-responsive" ng-app="myApp" ng-controller="customersCtrl"><!--this is used for responsive display in mobile and other devices-->


    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
        <thead>

        <tr>
            <th class="bg-danger" width="70px">ID</th>
            <th class="bg-success">First Name</th>
            <th class="bg-info">Last Name</th>
            <th class="bg-danger" width="230px">Email</th>
            <th class="bg-warning">Phone</th>
            <th class="bg-success" width="120px">Message</th>
            <th class="bg-info" width="100px">Delete Message</th>


        </tr>
        </thead>

        <?php
        include("database/db_conection2.php");
        $view_messages_query="select * from contactus";//select query for viewing users.
        $run=mysqli_query($dbcon,$view_messages_query);//here run the sql query.

        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {
            $ID=$row[0];
            $First_Name=$row[1];
            $Last_Name=$row[2];
            $Email=$row[3];
            $Phone=$row[4];
            $Message=$row[5];
            
        ?>

        <tr>
<!--here showing results in the table -->
            <td class="bg-danger" ><?php echo $ID;  ?></td>
            <td class="bg-success" ><?php echo $First_Name;  ?></td>
            <td class="bg-info" ><?php echo $Last_Name;  ?></td>
            <td class="bg-danger" ><?php echo $Email;  ?></td>
            <td class="bg-warning" ><?php echo $Phone;  ?></td>
            
            <!-- Trigger the modal with a button -->
<td class="bg-success" ><a type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" href="messagemodal.php?id=<?php echo $ID ?>" >Message</a></td>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p><?php echo $Message ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>







            <td class="bg-info" ><a href="delete_message.php?del=<?php echo $ID ?>" onclick="return confirm('You are about to delete this messege. Are you sure?')"><button class="btn btn-danger btn-lg">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->
        </tr>



       <?php } ?>

        <?php mysqli_close($dbcon); ?>
    </table>
        </div>
</div>

</body>


<?php include("cpanel_footer.php"); ?>

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
