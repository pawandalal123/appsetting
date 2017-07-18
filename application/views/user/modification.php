

<div class="container">
	<div class="box">
    	<div class="welcome-row">
        	<div class="welcome-msg">
            	<h4>Welcome <samp><?php echo $getuserdata->name?>!</samp> <span>CustomerID <?php echo $getuserdata->id?></span></h4>
            </div>
            <div class="profile-menu">
                <ul>
                    <li><a href="<?php echo SITE_URL.'user/productlist'; ?>" class="active">Your Products</a></li>
                    <li><a href="#">Your Subscription</a></li>
                    <li><a href="<?php echo SITE_URL.'user/profile'; ?>">Your Profile</a></li>
                </ul>
            </div>
           <div class="kiptry-row">
                <a href="<?php echo SITE_URL.'user/productlist'; ?>"> < Change Product </a>
                <h2><?php echo $templatedata->temlete_name?></h2>
            </div>
            <div class="review-menu">
            	<ul>
                    <li><a href="<?php echo SITE_URL.'user/edittemplate'.$templatedata->id ?>">Overview</a></li>
                     <li><a href="<?php echo SITE_URL.'user/modification/'.$templatedata->id ?>" class="active">Modifications</a></li>
                     <li><a href="<?php echo SITE_URL.'user/reportbug/'.$templatedata->id ?>">Report Bug</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </div>
        </div>
        <div class="report-menu">
            	<ul>
                	<li><a href="#" class="active">Request a Modification</a></li>
                    <li><a href="<?php echo SITE_URL.'user/modificationlist/'.$templatedata->id ?>">Previously Submitted<!-- <sup>2</sup> --></a></li>
                </ul>
          </div>
          <div class="modifications-row">
          <?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>">
 <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?>
          	<div class="modifications-form">
            <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="templateid" value="<?php echo $templatedata->id;?>">
            <input type="hidden" name="reporttype" value="1">
            	<h4>Modifications start at $ 500</h4>
                <div class="row01">
                	<div class="col">
                    <div class="custom-check">
                    <input type="checkbox" id="test1" class="" name="modifi_for" value="app" checked>
                    <label for="test1">Mobile App</label></div></div>
                    <div class="col"><div class="custom-check">
                    <input type="checkbox" id="test2" class="" name="modifi_for" value="Website">
                    <label for="test2">Website</label></div></div>
                    <?php //echo form_error('modifi_for');?>
                </div>
                <div class="row01">
                <input type="text" class="input" placeholder="Subject" name="subject">
                <?php echo form_error('subject');?>
                 </div>
                <div class="row01">
                <textarea cols="" rows="" class="textarea" placeholder="Write your request here..." name="message"></textarea> 
                <?php echo form_error('message');?>
                </div>
                <div class="row01">
                	<div class="upload-btn btn-primary">
                        <span>Attatch A File (Optional)</span>
                        <input type="file" class="upload" name="attachment" />
                        <?php echo form_error('attachment');?>
                	</div>
                </div>
                <div class="row01"><input type="submit" class="btn" value="Submit" name="savemessage"> </div>
                </form>
            </div>
          </div>
    </div>
</div>





