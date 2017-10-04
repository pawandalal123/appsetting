<style type="text/css">
    .input-group-btn
    {
        display: none;

    }
     .colorpicker-element
    {
        display: none !important;
    }
</style>
  <link href="<?php echo WEBROOT_PATH_CSS;?>bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="<?php echo WEBROOT_PATH_CSS;?>bootstrap-colorpicker-plus.css" rel="stylesheet">

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
                <li><a href="<?php echo SITE_URL?>user/setaddress/<?php echo $gettempData->id; ?>">4</a></li>
                <li><a href="<?php echo SITE_URL?>user/preview/<?php echo $gettempData->id; ?>">5</a></li>
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
                  
                    <!-- <div class="imgbox" style="margin-left: -150px; height: 192px" > -->
                    <div class="imgbox" >
                            
                                 <div class="color-plate">
                                    <div class="well">
                                     <input type="hidden" class="hovercolor" name="colorhover" value="<?php echo $gettempData->color_code_hover; ?>">
                         <!--  <input type="hidden" value="" id="demo3"/> -->
                          <div class="colorpickerplus-embed">
                            <div class="colorpickerplus-container"></div>
                          </div>

                       </div>
                    </div>
                     <input type="hidden" class="colorInput" name="colorInput" value="<?php echo $gettempData->color_code; ?>">

                                <input type="hidden" class="colorforback" name="colorforback" value="<?php echo $gettempData->color_code; ?>">
                                <input type="hidden" class="colorfortext" name="colorfortext" value="<?php echo $gettempData->text_color; ?>">

                    </div>
                    <div class="customize-detail">

                    <input type="text" class="text-box" placeholder="eg.#ffffff" name="userdefinecode" value="">
                    <a href="#" class="updatesitecolor">Apply</a>
                    	
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
                              <a href="#" class="sign-in firstbtn" style="background: <?php echo $gettempData->color_code; ?>!important; ">Sign In</a>
                        <a href="#" class="sign-in-second" style="color: <?php echo $gettempData->text_color; ?>">Sign Up</a>
                        </div>
                   
                          </div>
                        
                    </div>
                     <div class="imgbox second">
                     <img src="<?php echo WEBROOT_PATH_IMAGES.'whiteimage.png';?>" alt="" >
                    <div class="overlay-chuch">
                        <!-- <h3><?php echo $gettempData->temlete_name;?></h3>
                        <p><?php echo $gettempData->tag_line;?></p> -->
                        <div class="btn-bott">
                             <!--  <a href="#" class="sign-in" style="background: <?php echo $gettempData->color_code; ?>!important">Sign In</a> -->
                        <a href="#" class="sign-in firstbtn" style="background: <?php echo $gettempData->color_code; ?>!important ; ">Call Now</a>
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

<input type="hidden" name="templateid" value="<?php echo $gettempData->id;?>">
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="<?php echo WEBROOT_PATH_JS;?>bootstrap-colorpicker.min.js"></script>
    <script src="<?php echo WEBROOT_PATH_JS;?>bootstrap-colorpicker-plus.js"></script>
    <script type="text/javascript">
    $(function(){
   
    
    var demo3 = $('.colorpickerplus-embed .colorpickerplus-container');
        demo3.colorpickerembed();
        demo3.on('changeColor', function(e,color)
        {
            $('.firstbtn').css('background',color);
            //$('.sign-up').css('background',color);
            $('.sign-in-second').css('color',color);
            $('.colorforback').val(color);
            $('.colorfortext').val(color);
        });
 
    });
    $(document).ready(function()
    {
     $(document).on('click','.updatesitecolor',function()
         {
            var templateid = $('input[name=templateid]').val();
            var button_color  =$('input[name=userdefinecode]').val();
            if(button_color)
            {
                $.post(WEBROOT_PATH+'user/updatecolor',{'templateid':templateid,'button_color':button_color},function(data,status)
                {
                    $('.sign-in').css('background',button_color);
                    $('.colorforback').val(button_color);
                    
                });

            }
            else
            {
                alert('Please enter valid color code.');
            }
          

         });
      });
    </script>



  

