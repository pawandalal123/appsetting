
<script>
$(document).ready(function(){
  $("select.select").each(function() {
        var e = $(this).attr("title");
        if ($("option:selected", this).val() != "") e = $("option:selected", this).text();
        $(this).css({
            "z-index": 10,
            opacity: 0,
            "-khtml-appearance": "none"
        }).after('<span class="select">' + e + "</span>").change(function() {
            val = $("option:selected", this).text();
            $(this).next().text(val)
        })
    })
  $('input[name=tempname]').keyup(function()
  {
    var nameval = $(this).val();
    $('.templetename').text(nameval);

  });
  $('.taglinetext').keyup(function()
  {
    var nameval = $(this).val();
    $('.templetetag').text(nameval);

  });
});
</script>



<div class="container">
<?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?>
<form method="post" action="">
  <div class="box">
    <div class="preview-form">
      <h2>Get a free preview with your content</h2>
      <ul>
        <li><a href="<?php echo SITE_URL?>user/setcolor/<?php echo $gettempData->id; ?>" class="active next">1</a></li>
        <li><a href="<?php echo SITE_URL?>user/settags/<?php echo $gettempData->id; ?>" class="active ">2</a></li>
        <li><a href="<?php echo SITE_URL?>user/setimage/<?php echo $gettempData->id; ?>" class="">3</a></li>
        <li><a href="<?php echo SITE_URL?>user/setaddress/<?php echo $gettempData->id; ?>"  class="">4</a></li>
        <li><a href="<?php echo SITE_URL?>user/preview/<?php echo $gettempData->id; ?>">5</a></li>
      </ul>
      <h3>Customize The iOS<span>*</span> App Screens</h3>
      <span>Choose an elemant from the screen to customize it.</span> </div>

          <div class="column" >
       <div class="customize">
        <div class="crousal1">
          <!-- <h3>1 of 25</h3> -->

              <div class="divine">
                    <div class="imgbox">
            <img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES.$gettempData->background_image;?>" alt="">
                    <div class="overlay-chuch">
                      <h3 class="templetename"><?php echo $gettempData->temlete_name;?></h3>
                        <p class="templetetag"><?php echo $gettempData->tag_line;?></p>
                        <div class="btn-bott">
                        <a href="#" class="sign-in" style="background: <?php echo $gettempData->color_code; ?>!important; ">Sign In</a>
                        <a href="#" class="sign-in-second" style="color: <?php echo $gettempData->text_color; ?>!important; ">Sign Up</a>
                        </div>
                        <input type="hidden" class="hovercolor" name="colorhover" value="<?php echo $gettempData->color_code_hover; ?>">
                    </div>
                        
                    </div>
                    </div>
              
            </div>
         
        <div class="customize-detail">
          <h3>Current Selection : <span>Church Name and Tag Line</span></h3>
          <label>Church Name</label>
          <input type="text" class="text-box" placeholder="" name="tempname" value="<?php echo $gettempData->temlete_name;?>">
          <?php echo form_error('tempname');?>
          <label class="grey">Tag Line</label>
          <textarea placeholder="" class="taglinetext"  name="tagline" class="text-box"><?php echo $gettempData->tag_line?></textarea>
         <!--  <input type="text" class="text-box" placeholder="" name="tagline" value="<?php echo $gettempData->tag_line?>"> -->
          <?php echo form_error('tagline');?>
            <div class="btn-row">
        
        <!-- <a href="#">Save And Exit</a> -->
        <input class="save-exit" type="submit" name="savedetails" value="Save And Exit">
        <input class="save-exit" type="submit" name="savedetails" value="Next">
        <!-- <a href="#" class="grey">Next</a></div> -->
        
    </div>
        </div>   
            
          </div>
        </div>
    
      </div>
    
    </form>
  </div>
</div>
