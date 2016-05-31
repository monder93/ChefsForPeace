<?php
//-------------------(host,username,password)
$dbcon=mysqli_connect("localhost","root","","chefsforpeace");

//selecting the database users 
mysqli_select_db($dbcon,"users");


?>