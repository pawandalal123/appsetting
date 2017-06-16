<div id="login-background">
 <img src="<?php echo WEBROOT_PATH_IMAGES;?>login_header.jpg" alt="Login Background" class="animation-pulseSlow" />
  </div>
<div id="login-container" class="animation-fadeIn">
  <div class="login-title text-center">
    <h1><img src="<?php echo WEBROOT_PATH_IMAGES;?>logo.png"><br />
      <small>Administrator <strong>Login Panel</strong></small> </h1>
  </div>
  <div class="block remove-margin">
  
   <?php echo $error; if(isset($error) && $error ==1){ echo "<span style='color:#900;font-size:14px;'>Invalid Username & Password </span>";
	  }else{
	  echo "";}?>
  <form action="<?php echo SITE_URL.'admin/login';?>"method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless" />
    <div class="form-group">
    
      <div class="col-xs-12">
        <div class="input-group"> <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
          <input type="text" id="login_id" name="login_id" class="form-control input-lg" placeholder="Login Id" />
          <?php echo form_error("login_id"); ?>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-xs-12">
        <div class="input-group"> <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
          <input type="password" id="login_password" name="login_password" class="form-control input-lg" placeholder="Password" />
          <?php echo form_error("login_password"); ?>
        </div>
      </div>
    </div>
    <div class="form-group form-actions">
      <div class="col-xs-4">
        <label class="switch switch-primary" data-toggle="tooltip" title="Remember Me?">
        <input type="checkbox" id="login-remember-me" name="login-remember-me" checked="" />
        <span></span> </label>
      </div>
      <div class="col-xs-8 text-right">
       <input type="submit" id="submit" name="login"  value="Login Now" class="btn btn-sm btn-primary"/>
       <!-- <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Login Now</button>-->
      </div>
    </div>
    <div class="form-group">
      <div class="col-xs-12">
        <p class="text-center remove-margin"><!--<small>Don't have an account?</small> <a href="javascript:void(0)" id="link-login"><small>Create one for free!</small></a>--></p>
      </div>
    </div>
    </form>
   
  </div>
</div>