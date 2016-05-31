<?php
# Fill our vars and run on cli
# $ php -f db-connect-test.php
$dbname = 'chefsforpeace';
$dbuser = 'root';
$dbpass = '';
$dbhost = 'localhost';
$dbtable = 'users';


$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($connect,$dbtable) or die("Could not open the db '$dbname'");
$test_query = "SHOW TABLES FROM $dbname";
$result = mysql_query($test_query);
$tblCnt = 0;
while($tbl = mysql_fetch_array($result)) {
  $tblCnt++;
  #echo $tbl[0]."<br />\n";
}
if (!$tblCnt) {
  echo "There are no tables<br />\n";
} else {
  echo "There are $tblCnt tables<br />\n";
}