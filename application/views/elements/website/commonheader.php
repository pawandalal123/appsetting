<?php
$urisegment = $this->uri->segment(2);
$appid = $this->uri->segment(3)
?>
<input type="hidden" name="template_id" value="<?php echo $templete_id;?>">

<div class="main-header">
<?php
if(!isset($inviewmode))
{
?>
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
            <a class="changepagecolor">Change color</a>
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
<?php
}
?>
<style type="text/css">
    .colorclass
    {
        background: <?php echo $colorcode; ?> !important;
    }
    .maketextable
    {
        background: <?php echo $colorcode; ?> !important;

    }
</style>
<?php
if(isset($inviewmode))
{
    ?>
    <style type="text/css">
    .fileUpload
    {
        display: none !important;
    }
    .maketextable
    {
        display: none !important;
    }
    </style>
    <?php 

} 
?>
<div class="header-top <?php if($pagename=='contact') { ?> inner <?php }?>">
	<div class="main-logo"><a href="#">
    <img class="logoupdate" src="<?php  echo WEBROOT_PATH_SITE_UPLODE;?><?php echo $homedata->logo;?>">

    </a>
    <div class="fileUpload btn logo-img colorclass">
        <span >Upload</span>
        <input type="file" name="background_image"  rel="logoupdate" class="none upload">
    </div>
    </div>
    <div class="header-right">
    	<div class="navigation">
        	<ul>
            <?php
if(isset($inviewmode))
{
    ?>

            	<li><a href="<?php echo SITE_URL?>website/viewdemo/<?php echo $homedata->app_id?>">Home</a></li>
                <li><a href="<?php echo SITE_URL?>website/viewdemo/<?php echo $homedata->app_id?>/about">About</a></li>
                <!-- <li><a href="#">Events</a></li> -->
                <li><a href="<?php echo SITE_URL?>website/viewdemo/<?php echo $homedata->app_id?>/contact">Contact</a></li>
                <!-- <li><a href="#">Login</a></li> -->
                <li><a href="<?php echo SITE_URL?>website/viewdemo/<?php echo $homedata->app_id?>/donate" class="donate">Donate</a></li>
                <?php
                }
                else
                {
                     ?>
                     <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <!-- <li><a href="#">Events</a></li> -->
                <li><a href="#">Contact</a></li>
                <!-- <li><a href="#">Login</a></li> -->
                <li><a href="#" class="donate">Donate</a></li>
                      <?php

                } 
                ?>
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
         $(document).on('click','.changepagecolor',function()
        {
            var templateid = $('input[name=templateid]').val();
           $('#page_hide').show()
            modelbox('');
            $.post(WEBROOT_PATH+'website/getcoloroption',{'templateid':templateid},function(data,status)
            {
                $('#page_hide').hide()
                
                  $('.content').html(data);
              
              }).fail(function(response)
              {
                                 $('#page_hide').hide()
              });

        })
         $(document).on('click','.updatesitecolor',function()
         {
            var templateid = $('input[name=templateid]').val();
            var button_color  =$(this).attr('id');
            $.post(WEBROOT_PATH+'website/updatecolor',{'templateid':templateid,'button_color':button_color},function(data,status)
            {
                $('.sign-in').css('background',button_color);
                $(".web-overlay2").fadeOut()
            });

         });

    });
</script>

