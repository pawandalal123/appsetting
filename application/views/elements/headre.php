<!--------------- header ---------------->
<?php

if($this->uri->segment(1)=='')
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
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">SERVICES</a></li>
                    <li><a href="#">FEATURES</a></li>
                    <li><a href="#">TEMPLATES</a></li>
                    <?php 
                    if($this->session->userdata('logged_in'))
                    {
                        ?>
                    
                    <li><a href="#">MY ACCOUNT</a></li>
                    <?php } ?>
                    <li><a href="#">TRAINING</a></li>
                    <li><a href="#">CONTACT</a></li>
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
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">SERVICES</a></li>
                    <li><a href="#">FEATURES</a></li>
                    <li><a href="#">TEMPLATES</a></li>
                    <?php 
                    if($this->session->userdata('logged_in'))
                    {
                        ?>
                    
                    <li><a href="#">MY ACCOUNT</a></li>
                    <?php } ?>
                    <li><a href="#">TRAINING</a></li>
                    <li><a href="#">CONTACT</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<!--------------- header ---------------->
