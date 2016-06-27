<?php 
session_start();
?>
<?php 
$commenter="guess";
 if (isset($_SESSION['firstname']))
{
$commenter=$_SESSION['firstname'];
}
?>
<html>
<head>
<script type="text/javascript" src="jquery/jquery-2.0.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="comment_style.css"/>
<script type="text/javascript">

function sendPost() {
var comment = document.getElementById("comment").value;
var name = document.getElementById("username").value;
if (comment && name) {
$.ajax
({
type: 'POST',
url: 'post_comment.php',
data: {
user_comm: comment,
user_name: name
},
success: function (response) {
console.log(response);
document.getElementById("all_comments").innerHTML = response + document.getElementById("all_comments").innerHTML;
document.getElementById("comment").value = "";
document.getElementById("username").value = "<?php echo $commenter ?>";

}
});

}

return false;
} 
</script>




</head>

<body>

<form method='post' action="" onsubmit="return sendPost();">
<textarea id="comment" name="comment" placeholder="Write Your Comment Here....."></textarea>
<br>
<input type="hidden" id="username" name="username" value="<?php echo $commenter ?>">
<br>
<input type="submit" value="Post Comment">
</form>

<p>****************************************************************************************************</p>
<div align="center" id="all_comments">
<?php
include_once 'dbConfig.php';
$comm = $connect->query("select name,comment,post_time from comments order by post_time desc ");
while($row=$comm->fetch_array(MYSQLI_ASSOC))
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
?>
</div>

</body>
</html>