

<div class="container">
	<div class="box">
   		<div class="announcement daily-update">
        	<h3>Update Daily</h3>
             <?php  if( $this->session->userdata('msg') ) {?>
                <span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
                 <?php $this->session->unset_userdata('msg');}?>
            <form action="" method="post">
          	<div class="calender">
                <h2></h2>
                <table id="calendar-demo" class="calendar" border="0" cellspacing="0" cellpadding="0" >
                    
                </table>
        	</div>
            <label>Daily Text</label>
            <textarea name="dailytext" cols="" rows="" class="textarea" placeholder="Type Daily Here"><?php set_value('dailytext');?></textarea>
            <?php echo form_error('dailytext');?>
            <div class="row">
            	<input type="submit" class="btn-submit" value="Submit" name="saveform">
            </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>calender.js"></script>

<script>
$('#demo').dcalendarpicker();
$('#calendar-demo').dcalendar(); //creates the calendar
</script>

