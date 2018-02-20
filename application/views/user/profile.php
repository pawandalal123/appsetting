<input type="hidden" name="update_for" value="<?php echo $getuserdata->id?>">
<input type="hidden" class="oldemail" name="oldemail" value="<?php echo $getuserdata->email?>">


<div class="container profileclass">

	<div class="box">
    	<?php echo $this->load->view('/user/commonsection');?>
        
        <div class="profile-column">
        	<div class="your-detail">
            	<h3>Your Details</h3>
                <ul>
                	<li><strong>Email</strong> 
                    <a id="useremail"><?php echo $getuserdata->email;?></a> 
                    <span  class="profileeditable" rel="a">edit</span></li>
                    <li><strong>Mobile</strong>
                     <a id="usermobile"><?php echo $getuserdata->mobile;?> </a>
                     <span class="profileeditable" rel="a">edit</span>
                    
                     </li>
                </ul>
            </div>
            <div class="pass-change">
            	<h3>Request Password Change</h3>
                <a href="<?php echo SITE_URL.'user/resetpassword'?>" class="admin-btn">Reset Password</a>
            </div>
        </div>
    </div>
</div>
 



