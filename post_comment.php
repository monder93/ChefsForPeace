<?php
session_start();
include_once 'dbConfig.php';
if(isset($_POST['user_comm']) && isset($_POST['user_name']))
{
$comment=$_POST['user_comm'];
$name=$_POST['user_name'];
$insert=$connect->query("insert into comments values('','$name','$comment',CURRENT_TIMESTAMP)");

$id= $connect->insert_id;
$select=$connect->query("select name,comment,post_time from comments where name='$name' and comment='$comment' and id='$id' LIMIT 2");

if($row=$select->fetch_array(MYSQLI_ASSOC))
{
$name=$row['name'];
$comment=$row['comment'];
$time=$row['post_time'];
?>

<div class="comment_div">
<p class="name">Posted By:<?php echo $name;?></p>
<p class="comment"><?php echo $comment;?></p>
<p class="time"><?php echo $time;?></p>
</div>
<p>****************************************************************************************************</p>

<?php
}
exit;
}
else{
echo "No Data Is set";
}

?>