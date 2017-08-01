<link rel="stylesheet" href="<?php echo WEBROOT_PATH_CSS;?>tinycolorpicker.css" type="text/css" media="screen"/>
  <link href="<?php echo WEBROOT_PATH_CSS;?>bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="<?php echo WEBROOT_PATH_CSS;?>bootstrap-colorpicker-plus.css" rel="stylesheet">

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
                <li><a href="<?php echo SITE_URL?>user/setcolor/<?php echo $gettempData->id; ?>" class="active">1</a></li>
                <li><a href="<?php echo SITE_URL?>user/settags/<?php echo $gettempData->id; ?>" class="">2</a></li>
                <li><a href="<?php echo SITE_URL?>user/setimage/<?php echo $gettempData->id; ?>">3</a></li>
                <li><a href="<?php echo SITE_URL?>user/preview/<?php echo $gettempData->id; ?>">4</a></li>
            </ul>
            <h3>Look and Feel</h3>
            <span>Please select the highlight color and font</span>
           
        </div>
        <form method="post" accept="">
         <div class="column">
            	<div class="hightight">
                	<h3>Highlight Color</h3>
                    <h4>Will be used to highlight items such as buttons and special actions.</h4>
                    <input checked type="hidden" name="colorfor" value="1">
                  
                    <div class="imgbox" style="margin-left: -150px; height: 192px" >
                            <div id="colorPicker">
                                <a class="color"><div class="colorInner"></div></a>
                                <div class="track"></div>
                                <ul class="dropdown"><li></li></ul>
                            
                                <input type="hidden" class="colorInput" name="colorInput" value="<?php echo $gettempData->color_code; ?>">

                                <input type="hidden" class="colorforback" name="colorforback" value="<?php echo $gettempData->color_code; ?>">
                                <input type="hidden" class="colorfortext" name="colorfortext" value="<?php echo $gettempData->text_color; ?>">
                               
                               </div>
                    </div>
                    <input type="hidden" class="hovercolor" name="colorhover" value="<?php echo $gettempData->color_code_hover; ?>">
                    
                </div>
            
                  <div class="preview">
                    <h3>Preview</h3>
                    <ul>
                        <!-- <li><a href="#" class="active">Application</a></li> -->
                        <!-- <li><a href="#">Website</a></li> -->
                    </ul>
                     <div class="divine">
                    <div class="imgbox">
                     <img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES.$gettempData->background_image;?>" alt="" >
                    <div class="overlay-chuch">
                        <h3><?php echo $gettempData->temlete_name;?></h3>
                        <p><?php echo $gettempData->tag_line;?></p>
                        <div class="btn-bott">
                              <a href="#" class="sign-in" style="background: <?php echo $gettempData->color_code; ?>!important; ">Sign In</a>
                        <a href="#" class="sign-in" style="background: <?php echo $gettempData->color_code; ?>!important ;">Sign In</a>
                        </div>
                   
                          </div>
                        
                    </div>
                     <div class="imgbox">
                     <img src="<?php echo WEBROOT_PATH_IMAGES.'whiteimage.png';?>" alt="" >
                    <div class="overlay-chuch">
                        <!-- <h3><?php echo $gettempData->temlete_name;?></h3>
                        <p><?php echo $gettempData->tag_line;?></p> -->
                        <div class="btn-bott">
                             <!--  <a href="#" class="sign-in" style="background: <?php echo $gettempData->color_code; ?>!important">Sign In</a> -->
                        <a href="#" class="sign-in" style="background: <?php echo $gettempData->color_code; ?>!important ; ">Sign In</a>
                        </div>
                   
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



  

