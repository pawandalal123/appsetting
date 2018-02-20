 <div class="bottom-text">
        <div class="textbox">
        <p id="footertext"><?php echo $homedata->bottom_text;?></p>
        <span  href="javascript:void();" class="maketextable edit-file" rel="p">Edit</span>
        </div>
    </div>

<div class="footer">
	<div class="box">
    	<div class="social">
        	<ul>
            	<li class="facebook"><a href="#">facebook</a></li>
                <li class="twitter"><a href="#">twitter</a></li>
                <li class="instagram"><a href="#">instagram</a></li>
            </ul>
        </div>
    	<div class="footer-logo"><a href="#"><img class="logoupdate" src="<?php  echo WEBROOT_PATH_SITE_UPLODE;?><?php echo $homedata->logo;?>"></a></div>
        <div class="footer-menu">
        	<ul>
            <?php 
            if(isset($inopenmode))
            {
                ?>
                <li><a href="<?php echo SITE_URL?>openwebsite/<?php echo $viewform?>">Home</a></li>
                <li><a href="<?php echo SITE_URL?>openwebsite/<?php echo $viewform?>/about">About</a></li>
                
                <li><a href="<?php echo SITE_URL?>user/eventlist/<?php echo $homedata->product_id?>">Event</a></li>
               
                <!-- <li><a href="#">Events</a></li> -->
                <li><a href="<?php echo SITE_URL?>openwebsite/<?php echo $viewform?>/contact">Contact</a></li>
                <?php if(!$this->session->userdata('app_logged_in')) { ?>
                <li><a href="<?php echo base_url(); ?>userlogin/applogin/<?php echo $homedata->product_id?>">Login</a></li>
                <?php }  ?>
                
                <!-- <li><a href="#">Login</a></li> -->
                <li><a href="<?php echo SITE_URL?>openwebsite/<?php echo $viewform?>/donate" class="donate">Donate</a></li>
                <?php 

            }
            else
            {
                ?>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="#">Donate</a></li>
                <?php 

            }
            ?>
            	
            </ul>
        </div>
    </div>
</div>

<script type="text/javascript">
    
</script>