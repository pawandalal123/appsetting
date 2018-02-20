

<div class="main-header">
<div class="header-top">
    <div class="main-logo"><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES_CHURCH; ?>main-logo.png"></a></div>
    <div class="header-right">
        <div class="navigation">
            <ul>
                <li><a href="<?php echo SITE_URL?>openwebsite/<?php echo $domanname;?>">Home</a></li>
                <li><a href="<?php echo SITE_URL?>openwebsite/<?php echo $domanname;?>/about">About</a></li>
                <li><a href="<?php echo SITE_URL?>user/eventlist/<?php echo $app_id;?>">Event</a></li>
                <!-- <li><a href="#">Events</a></li> -->
                <li><a href="<?php echo SITE_URL?>openwebsite/<?php echo $domanname;?>/contact">Contact</a></li>
                <!-- <li><a href="#">Login</a></li> -->
                <li><a href="<?php echo SITE_URL?>openwebsite/<?php echo $domanname;?>/donate" >Donate</a></li>
                
                <?php if($this->session->userdata('app_logged_in')) { ?>
                <li><a href="<?php echo SITE_URL?>user/appdetails/<?php echo $app_id?>" class="">Account</a></li>
                <li><a href="<?php echo base_url(); ?>userlogin/logoutweb">Logout</a></li>
                <?php } else { ?>
                <li><a href="<?php echo SITE_URL?>userlogin/login" class="donate">Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
</div>