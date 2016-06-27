<?php
        include("database/db_conection2.php");
$view_id=$_GET['id'];


        $view_one_message_query="select * from contactus WHERE ID='$view_id'";//select query for viewing users.
        $run=mysqli_query($dbcon,$view_one_message_query);//here run the sql query.

	if (	$row=mysqli_fetch_array($run)  )
     {
$the_sender_name= $row[1];     	
$the_sender_family=$row[2]; 
$one_message=$row[5];
       
?>
        <h4 class="modal-title bg-primary "><?php echo $the_sender_name ?> <?php echo $the_sender_family  ?></h4>


<div class="modal-body">

      <p>    <?php  echo wordwrap( $one_message, 84, "<br>\n", true);?>     </p>

      </div>

<div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close The Message</button>
      </div>
    </div>


<?php
      
      }
?>
<!-- reload function once closing the popup modal windows to let the information updated and can see new messages in new buttons -->
<script>
$('#myModal').on('hidden.bs.modal', function () {
 location.reload();
})
</script>

<?php 	
mysqli_close($dbcon);
        ?>