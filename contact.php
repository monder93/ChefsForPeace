<?php
include_once 'common.php';
?>


<div class="custom-container ng-controller="submitCtr">
<form  class="form-horizontal" role="form" method="POST" action="do_contactus.php"  >
    <div class="form-group">
        <label for="name" class="col-sm-1 control-label"> <?php echo $lang['INFO_NAME']; ?> </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" style="text-align: center" placeholder="<?php echo $lang['INFO_NAME']; ?>" value="">
        </div>
    </div>
	<div class="form-group">
        <label for="last" class="col-sm-1 control-label"> <?php echo $lang['INFO_LAST_NAME']; ?></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="last" name="last" style="text-align: center" placeholder="<?php echo $lang['INFO_LAST_NAME']; ?>" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-1 control-label"> <?php echo $lang['INFO_EMAIL']; ?></label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" style="text-align: center" placeholder="<?php echo $lang['INFO_EMAIL']; ?>" value="">
        </div>
    </div>
	<div class="form-group">
        <label for="phone" class="col-sm-1 control-label"> <?php echo $lang['INFO_PHONE']; ?></label>
        <div class="col-sm-10">
            <input type="phone" class="form-control" id="phone" name="phone" style="text-align: center" placeholder="+972" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="message" class="col-sm-1 control-label"><?php echo $lang['INFO_MESSAGE']; ?></label>
        <div class="col-sm-10">
            <textarea  class="form-control" rows="4" name="message"></textarea>
        </div>
    </div>
   
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-1">
            <input class="btn btn-success btn-block" type="submit" value="<?php echo $lang['INFO_SUBMIT']; ?>" name="contactus" >
		</div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-1   ">
        </div>
    </div>
</form> 
</div>