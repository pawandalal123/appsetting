

<div class="container">
	<div class="box">
        <div class="login-form reset">
            <div class="login-box">
    <?php echo $this->load->view('/user/commonsection');?>
        
                <h2>Request Password Change</h2>
               
            </div>
        
       
        <?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?>
          <div class="modifications-form">
          <form action="#" method="post">
                <div class="row01"><input type="text" class="input" placeholder="New Password" name="npassword">
                <?php echo form_error('npassword');?>
                 </div>
               <!--  <span class="error-msg">Please enter valid text</span>
                <span class="sucess-msg">Please enter valid text</span> -->
                <div class="row01">
                <input type="text" class="input" placeholder="Retype new Password" name="repassword"> 
                <?php echo form_error('repassword');?>
                </div>
                <div class="row01"><input type="submit" class="btn" value="Submit" name="changepassword"> </div>
                </form>
            </div>
    </div>
</div>
</div>
</div>
 



