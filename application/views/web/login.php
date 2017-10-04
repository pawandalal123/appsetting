
<div class="container">
	<div class="box">
		<div class="preview-form">
            <h2>Get a free preview with your content</h2>
            <ul>
                <li><a href="#" class="active">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
            </ul>
            <h3>Get Started By Entering Your Details</h3>
            <span>Choose an elemant from the screen to customize it.</span>
            
            <?php  if(isset($err_msg)) {
                echo '<div class="error">'.$err_msg.'</div>';
                }?>
            <div class="form">
            <form action="#" method="post">
            	
                <input type="text" class="input" placeholder="Your Email" name="useremail"><br>
                <?php echo form_error('useremail');?>
                <!-- <input type="text" class="input" placeholder="Confirm Email" ><br> -->
                <input type="password" class="input" placeholder="Enter Password" name="password"><br>
                <?php echo form_error('password');?>
                
                <input type="submit" class="button" value="Login" name="userlogin">
                <a href="<?php echo SITE_URL.'userlogin/register'?>" class="button" value="Register">Register</a>
            </form>
            </div>
        </div>
    </div>
</div>


