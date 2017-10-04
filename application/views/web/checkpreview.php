<script src="<?php echo WEBROOT_PATH_JS;?>jquery.min.js"></script>

<div class="container">
    <div class="box">
<?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?>

        <div class="preview-form">
            <h2>Get a free preview with your content</h2>
            <ul>
             
                <li><a href="<?php echo SITE_URL?>user/setcolor/<?php echo $gettempData->id; ?>" class="next">1</a></li>
                <li><a href="<?php echo SITE_URL?>user/settags/<?php echo $gettempData->id; ?>" class="next">2</a></li>
                <li><a href="<?php echo SITE_URL?>user/setimage/<?php echo $gettempData->id; ?>" class="next">3</a></li>
                 <li><a href="<?php echo SITE_URL?>user/setaddress/<?php echo $gettempData->id; ?>" class="next">4</a></li>
                <li><a href="<?php echo SITE_URL?>user/preview/<?php echo $gettempData->id; ?>" class="active">5</a></li>
            </ul>
            <h3>Its done! Well Almost</h3>
            <span>Please select the highlight color and font</span>
           
        </div>
         <div class="column">
            <div class="web-tab">
                <div class="webnav">
                    <ul>
                        <li><a href="#" class="">My iOS App</a></li>
                        <li><a href="#" class="active">My Website</a></li>
                    </ul>
                </div>
                <div class="webcontent">
                	<h3>Your Website Is Incomplete</h3>
                    <h4>Finalize the pages of your website</h4>
                    <p>Press the  button below start the website builder</p>
                     <a href="<?php echo SITE_URL;?>website/index/<?php echo $templete_id; ?>" class="button">Start Website</a>
                    <div class="crousal1">         
                     <div class="divine">
                    <div class="imgbox">
                     <img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES.$gettempData->background_image;?>" alt="" >
                    <div class="overlay-chuch">
                        <h3><?php echo $gettempData->temlete_name;?></h3>
                        <p><?php echo $gettempData->tag_line;?></p>
                        <div class="btn-bott">
                              <a href="#" class="sign-in" style="background: <?php echo $gettempData->color_code; ?>!important; ">Sign In</a>
                       
                        <a href="#" class="sign-in-second" style="color: <?php echo $gettempData->text_color; ?>!important ;">Sign Up</a>
                        </div>
                   
                          </div>
                        
                    </div>
                     <div class="imgbox">
                     <img src="<?php echo WEBROOT_PATH_IMAGES.'Home-church-web.jpg';?>" alt="" >
                
                        
                    </div>
                     
                    </div>

             

                    </div>

            </div>
            </div>
         </div>
    </div>
</div>
