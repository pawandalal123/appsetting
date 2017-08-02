
<div class="container">
	<div class="box">
		<div class="preview-form">
            <h2>Get a free preview with your content</h2>
            <ul>
                <li><a href="#" class="active">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
            </ul>
            <h3>Get Started By Entering Your Details</h3>
            <span>Choose an elemant from the screen to customize it.</span>
            <div class="form">
            <form action="#" method="post">
            	<input type="text" class="input" placeholder="Your Name" name="username" value="<?php echo  set_value('username');?>"><br>
            	<?php echo form_error('username');?>
                <input type="text" class="input" placeholder="Your Mobile" name="usermobile" value="<?php echo  set_value('usermobile');?>"><br>
                <?php echo form_error('usermobile');?>
                <input type="text" class="input" placeholder="Your Email" name="useremail" value="<?php echo  set_value('useremail');?>"><br>
                <?php echo form_error('useremail');?>
                <!-- <input type="text" class="input" placeholder="Confirm Email" ><br> -->
                <input type="password" class="input" placeholder="Enter Password" name="password"><br>
                <?php echo form_error('password');?>
                <input type="password" class="input" placeholder="Confirm Password" name="repassword"><br>
                 <?php echo form_error('repassword');?>
                <input type="submit" class="button" value="Next" name="registerwithus">
            </form>
            </div>
        </div>
    </div>
</div>


