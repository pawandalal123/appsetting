<link rel="stylesheet" href="<?php echo WEBROOT_PATH_CSS;?>tinycolorpicker.css" type="text/css" media="screen"/>

    <script src="<?php echo WEBROOT_PATH_JS;?>tinycolorpicker.js"></script>
    <script type="text/javascript">
           window.onload = function()
        {
            // The plain javascript api is very similar to the jquery version with some exceptions.
            // There is no chaining like in the jquery api. So when you create a instance it
            // will return all methods and properties.
            //
            var $picker = document.getElementById("colorPicker")
            ,   picker  = tinycolorpicker($picker)
            ;
        }
    </script>
<div class="container">
<?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?>
	<div class="box">
		<div class="preview-form">
            <h2>Get a free preview with your content</h2>
            <ul>
                <li><a href="#" class="active next">1</a></li>
                <li><a href="#" class="active">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
            </ul>
            <h3>Look and Feel</h3>
            <span>Please select the highlight color and font</span>
           
        </div>
        <form method="post" accept="">
         <div class="column">
            	<div class="hightight">
                	<h3>Highlight Color</h3>
                    <h4>Will be used to highlight items such as buttons and special actions.</h4>
                    <div class="imgbox">
                            <div id="colorPicker">
                                <a class="color"><div class="colorInner"></div></a>
                                <div class="track"></div>
                                <ul class="dropdown"><li></li></ul>
                            
                                <input type="hidden" class="colorInput" name="colorInput" value="<?php echo $gettempData->color_code; ?>">
                               </div>
                    </div>
                    <div class="color-plate">
                    	<ul>
                        	<li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>img-color1.jpg" alt=""></a></li>
                            <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>img-color2.jpg" alt=""></a></li>
                            <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>img-color3.jpg" alt=""></a></li>
                            <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>img-color4.jpg" alt=""></a></li>
                            <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>img-color5.jpg" alt=""></a></li>
                            <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>img-color6.jpg" alt=""></a></li>
                            <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>img-color7.jpg" alt=""></a></li>
                            <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>img-color8.jpg" alt=""></a></li>
                            <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>img-color9.jpg" alt=""></a></li>
                            <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>img-color10.jpg" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            
                  <div class="preview">
                    <h3>Preview</h3>
                    <ul>
                        <li><a href="#" class="active">Application</a></li>
                        <li><a href="#">Website</a></li>
                    </ul>
                    <div class="imgbox">
                          <div class="item">
                    <img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES.$gettempData->background_image;?>" alt="" style="height: 391px; width: 291px;">
                    <div class="overlay-chuch">
                        <h3><?php echo $gettempData->temlete_name;?></h3>
                        <p><?php echo $gettempData->tag_line;?></p>
                        <a href="#" class="sign-in" style="background: <?php echo $gettempData->color_code; ?>!important">Sign In</a>
                        <a href="#" class="sign-in" style="background: <?php echo $gettempData->color_code; ?>!important">Sign In</a>
                        
                    </div>
                </div>
                       
                    </div>
                </div>
                <div class="btn-row">
                <input type="submit" class="save-exit" name="savecolor" value="Next">
                <!-- <a href="<?php echo SITE_URL;?>user/settags/<?php echo $templete_id?>">Next</a> -->
                </div>
                </form>
            </div>
    </div>
</div>





