<div class="container">
	<div class="box">
        <div class="login">
            <div class="col">
            	<div class="inner-form">
                	<div class="login-nav">
                    	<ul>
                        	<li><a href="#" class="active">Login</a></li>
                            <li><a href="<?php echo SITE_URL.'userlogin/signup'?>">Sign Up</a></li>
                        </ul>
                    </div>
                    <?php  if(isset($err_msg)) {
                echo '<div class="error">'.$err_msg.'</div>';
                }?>
                 <form action="#" method="post">
                    <div class="row">
                        <div class="col3">
                            <label>E-mail</label>
                            <input type="text" class="input" placeholder="Your Email" name="useremail">
                             <?php echo form_error('useremail');?>
                        </div>
                        <div class="col4">
                            <label>Password</label>
                            <input type="password" class="input" placeholder="Password" name="password">
                            <?php echo form_error('password');?>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="right"><input type="submit" class="submit-btn" value="Login"  name="userlogin"></div>
                        <label class="left"><input type="checkbox" class="cehck">  Remember me</label>
                    </div>
                    <div class="row forget">
                    	<a href="#">Forgot password?</a>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col2 social-acc">
            	<!-- <h3>Social accounts</h3> -->
                <p>After a while, finding that nothing more happened, she decided on going into the garden</p>
                <!-- <a href="#">Login with Facebook</a> -->
                <span class="replace-acc">Don't have a Replacer account yet?</span>
            </div>
        </div>
    </div>
</div>