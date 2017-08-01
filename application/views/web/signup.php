<div class="container">
    <div class="box">
        <div class="login">
            <div class="col">
                <div class="inner-form">
                    <div class="login-nav">
                        <ul>
                            <li><a href="<?php echo SITE_URL.'userlogin/mainlogin'?>" >Login</a></li>
                            <li><a href="<?php echo SITE_URL.'userlogin/signup'?>" class="active">Sign Up</a></li>
                        </ul>
                    </div> 
                    <?php if(isset($err_msg)) {
                echo '<div class="error">'.$err_msg.'</div>';
                }?>
                 <form action="#" method="post">
                    <div class="row">
                        <div class="col3">
                            <label>Your Name</label>
                            <input type="text" class="input" placeholder="Your Name" name="useremail">
                             <?php echo form_error('yourname');?>
                        </div>
                         <div class="col3">
                            <label>Your Mobile</label>
                            <input type="Mobile" class="input" placeholder="Your Mobile" name="useremail">
                             <?php echo form_error('yourmobile');?>
                        </div>
                         <div class="col3">
                            <label>Your Email</label>
                            <input type="Email" class="input" placeholder="Your Email" name="useremail">
                             <?php echo form_error('youremail');?>
                        </div>
                        <div class="col4">
                            <label>Password</label>
                            <input type="password" class="input" placeholder="Password" name="password">
                            <?php echo form_error('password');?>
                        </div>
                        <div class="col4">
                            <label>Confirm Password</label>
                            <input type="password" class="input" placeholder="Password" name="password">
                            <?php echo form_error('password');?>
                            <div class="row">
                        <div class="right"><input type="submit" class="submit-btn" value="signup"  name="userlogin"></div>
                    </div>
                    </div>
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