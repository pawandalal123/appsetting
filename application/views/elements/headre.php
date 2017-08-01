<!--------------- header ---------------->
<?php

if($this->uri->segment(1)=='' || $this->uri->segment(1)=='services' || $this->uri->segment(1)=='contact')
{
    ?>
    <div class="header">
  <div class="box">
      <div class="logo"><a href="<?php echo SITE_URL;?>"><img src="<?php echo WEBROOT_PATH_IMAGES;?>logo-header.png" alt=""></a></div>
        <div class="header-right">
            <div class="search"></div>
            <div class="toggle-menu"></div>
            <div class="navigation">
                <ul>
                    <li><a href="<?php echo SITE_URL;?>">HOME</a></li>
                    <li><a href="<?php echo SITE_URL;?>services">SERVICES</a></li>
                    <li><a href="<?php echo SITE_URL;?>aboutus">ABOUT US</a></li>
                    <li><a href="<?php echo SITE_URL.'user/templates'?>">TEMPLATES</a></li>
                    <?php
                   if($this->session->userdata('logged_in'))
                    {
                        ?>
                    
                    <li><a href="<?php echo SITE_URL.'user/profile'?>">MY ACCOUNT</a></li>
                    <li><a href="<?php echo SITE_URL.'user/training'?>">TRAINING</a></li>
                    <?php }
                    else
                    {
                        ?>
                        <li><a href="<?php echo SITE_URL.'user/training'?>">TRAINING</a></li>
                        <?php
                        } ?>
                    
                    <li><a href="<?php echo SITE_URL.'user/contact'?>">CONTACT</a></li>
                    <?php
                   if($this->session->userdata('logged_in'))
                    {
                        ?>
                        <li><a href="<?php echo SITE_URL.'userlogin/logout'?>">LOGOUT</a></li>

                        <?php
                    }
                    else
                    {
                        ?>
                        <li><a href="<?php echo SITE_URL.'userlogin/mainlogin'?>">LOGIN</a></li>
                        <?php

                    }

                        ?>
                </ul>
            </div>
        </div>
    </div>
</div>
    <?php

}
else
{
?>
<div class="header inner">
  <div class="box">
      <div class="logo"><a href="<?php echo SITE_URL;?>"><img src="<?php echo WEBROOT_PATH_IMAGES;?>logo.png" alt=""></a></div>
        <div class="header-right">
            <div class="search"></div>
            <div class="toggle-menu"></div>
            <div class="navigation">
                <ul>
                    <li><a href="<?php echo SITE_URL;?>">HOME</a></li>
                    <li><a href="<?php echo SITE_URL;?>services">SERVICES</a></li>
                    <li><a href="<?php echo SITE_URL;?>aboutus">ABOUT US</a></li>
                    <li><a href="<?php echo SITE_URL.'user/templates'?>">TEMPLATES</a></li>
                      <?php 
                    if($this->session->userdata('logged_in'))
                    {
                        ?>
                    
                    <li><a href="<?php echo SITE_URL.'user/profile'?>">MY ACCOUNT</a></li>
                    <li><a href="<?php echo SITE_URL.'user/training'?>">TRAINING</a></li>
                    <?php }
                    else
                    {
                        ?>
                        <li><a href="<?php echo SITE_URL.'user/training'?>">TRAINING</a></li>
                        <?php
                        } ?>
                    <li><a href="<?php echo SITE_URL.'user/contact'?>">CONTACT</a></li>
                    <?php
                    if($this->session->userdata('logged_in'))
                    {
                        ?>
                        <li><a href="<?php echo SITE_URL.'userlogin/logout'?>">Logout</a></li>

                        <?php
                    }
                    else
                    {
                        ?>
                        <li><a href="<?php echo SITE_URL.'userlogin/mainlogin'?>">LOGIN</a></li>
                        <?php

                    }

                        ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<!--------------- header ---------------->
