<?php
$urisegment = $this->uri->segment(2);
$appid = $this->uri->segment(3)
?>
<input type="hidden" name="template_id" value="<?php echo $templete_id;?>">

<div class="main-header">
<div class="site-hesder">
	<div class="site-logo"><a href="#"><img src="<?php  echo WEBROOT_PATH_SITE_IMAGES;?>/site-logo.jpg"></a></div>
    <div class="editing">
    	<label>You Are Editing</label>
        <div class="select-box">
        <select class="select changepage">
        	<option value="index" <?php if($urisegment=='index') echo 'selected'; ?>>Home Page</option>
            <option value="about" <?php if($urisegment=='about') echo 'selected'; ?>>About Us</option>
            <option value="contact" <?php if($urisegment=='contact') echo 'selected'; ?>>Contact</option>
            <option value="donate" <?php if($urisegment=='donate') echo 'selected'; ?>>Donate</option>
        </select>
        </div>
    </div>
    <div class="top-btn">
    <form method="post" action="">
    	<ul>
        	<li>
            <input type="submit" name="savehome" value="Save" class="active save-btn">
            <!-- <a href="#" title="Save" class="active">Save</a> -->
            </li>
            <?php
            if($urisegment=='donate')
            {
                ?>
                <input type="submit" name="saveandpay" value="Save and Pay" class="save-btn">
                <?php

            }
            else
            {
                ?>
                <input type="submit" name="nextpage" value="Next" class="save-btn">
                <!-- <li><a href="#" title="Close">Close</a> --></li>
                <?php
            }
            ?>
            
        </ul>
        </form>
    </div>
</div>
<div class="header-top <?php if($pagename=='contact') { ?> inner<?php }?>">
	<div class="main-logo"><a href="#">
    <img class="logoupdate" src="<?php  echo WEBROOT_PATH_SITE_UPLODE;?><?php echo $homedata->logo;?>">

    </a>
    <div class="fileUpload btn logo-img">
        <span>Upload</span>
        <input type="file" name="background_image"  rel="logoupdate" class="none upload">
    </div>
    </div>
    <div class="header-right">
    	<div class="navigation">
        	<ul>
            	<li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="#" class="donate">Donate</a></li>
            </ul>
        </div>
    </div>
</div>
</div>
<input type="hidden" name="templateid" value="<?php echo $templete_id;?>">
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.changepage').change(function()
        {
            var value = $(this).val();
            var templateid = $('input[name=templateid]').val();
            window.location.href = WEBROOT_PATH+'website/'+value+'/'+templateid;

        });

    });
</script>