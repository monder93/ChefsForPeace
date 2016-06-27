<?php
$conn_error = "Could not connect to database.";

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "chefsforpeace";

@mysql_connect($dbhost, $dbuser, $dbpass) or die($conn_error);
@mysql_select_db($dbname) or die($conn_error);

?>