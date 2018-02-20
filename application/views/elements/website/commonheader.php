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
<?php
$urisegment = $this->uri->segment(2);
$appid = $this->uri->segment(3);
$addclss='';
if($urisegment=='contact' || @$pagename=='contact')
{
  $addclss='logotext_inner';

}
?>
<input type="hidden" name="template_id" value="<?php echo $templete_id;?>">

<div class="main-header">
<?php
if(!isset($inviewmode) && !isset($inopenmode))
{
?>
<style type="text/css">
    .web-overlay2.small .inner-web{width:40%;height:500px;}
</style>
<div class="site-hesder">
	<div class="site-logo">
     
    
    <a href="#"><img src="<?php  echo WEBROOT_PATH_SITE_IMAGES;?>/site-logo.jpg"></a>

    </div>
    <div class="editing">
<label><a href="<?php echo SITE_URL?>user/profile" style="color: #fff!important;">My account</a></label>
    	<label>You Are Editing</label>
        <div class="select-box">
        <select class="select changepage">
        	<option value="index" <?php if($urisegment=='index') echo 'selected'; ?>>Home Page</option>
            <option value="about" <?php if($urisegment=='about') echo 'selected'; ?>>About Us</option>
            <option value="contact" <?php if($urisegment=='contact') echo 'selected'; ?>>Contact</option>
            <option value="donate" <?php if($urisegment=='donate') echo 'selected'; ?>>Donate</option>
            <!-- <option value="myaccount">My Account</option> -->
        </select>
        </div>
    </div>
    <div class="top-btn">
    <form method="post" action="">
    	<ul>
      <li><a class="changepagecolor save-btn">Change color</a></li>
      <li><a class="save-btn" href="<?php echo SITE_URL;?>website/viewdemo/<?php echo $templete_id;?>" target="_blank">Preview</a></li>
        	<li>
            
            <input type="submit" name="savehome" value="Save" class="active save-btn">
            <!-- <a href="#" title="Save" class="active">Save</a> -->
            </li>
            <li>
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
                <!-- <li><a href="#" title="Close">Close</a> -->
                <?php
            }
            ?>
            </li>
            
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
if(isset($inviewmode) || isset($inopenmode))
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
    .logo-ch
    {
      display: none;
    }
    </style>
    <?php 

} 
?>
<div class="header-top <?php if($pagename=='contact') { ?> inner <?php }?>">
	<div class="main-logo">
    <div class="logotexdiv" <?php if($homedata->logo_type==2) {?> style="display: none;" <?php } ?>>
    <h2 id="logotext" class="<?php echo $addclss;?>" ><?php echo $homedata->logo_text;?></h2>
    <span  href="javascript:void();" class="maketextable edit-file show-text" rel="h2">Edit</span>
    </div>
    <div class="logoimagediv" <?php if($homedata->logo_type==1) {?> style="display: none;" <?php } ?>>
    <a href="#">
    <img class="logoupdate" src="<?php  echo WEBROOT_PATH_SITE_UPLODE;?><?php echo $homedata->logo;?>">
    </a>
     <div class="fileUpload btn logo-img colorclass">
        <span >Upload</span>
        <input type="file" name="background_image"  rel="logoupdate" class="none upload">
    </div>
    </div>
    <div class="logo-ch">
  <ul>
    <li>
      <input type="radio" id="f-option" name="logotype" value="1" <?php if($homedata->logo_type==1) {?> checked <?php } ?>>
      <label for="f-option">Text</label>
      <div class="check"></div>
    </li>
    <li>
      <input type="radio" id="s-option" name="logotype" value="2" <?php if($homedata->logo_type==2) {?> checked <?php } ?>>
      <label for="s-option">Image</label>
      <div class="check"></div>
    </li>
  </ul>
</div>
   
    </div>
    <div class="header-right">
    	<div class="navigation">
        	<ul>
            <?php
if(isset($inviewmode))
{
    ?>

            	<li><a href="<?php echo SITE_URL?>website/viewdemo/<?php echo $homedata->product_id?>">Home</a></li>
                <li><a href="<?php echo SITE_URL?>website/viewdemo/<?php echo $homedata->product_id?>/about">About</a></li>
                <!-- <li><a href="#">Events</a></li> -->
                <li><a href="<?php echo SITE_URL?>website/viewdemo/<?php echo $homedata->product_id?>/contact">Contact</a></li>
                <!-- <li><a href="#">Login</a></li> -->
                <li><a href="<?php echo SITE_URL?>website/viewdemo/<?php echo $homedata->product_id?>/donate" class="donate">Donate</a></li>
                <?php
                }
                elseif(isset($inopenmode))
                {
                  ?>

              <li><a href="<?php echo SITE_URL?>openwebsite/<?php echo $viewform?>">Home</a></li>
                <li><a href="<?php echo SITE_URL?>openwebsite/<?php echo $viewform?>/about">About</a></li>
                
                <li><a href="<?php echo SITE_URL?>user/eventlist/<?php echo $homedata->product_id?>">Event</a></li>
               
                <!-- <li><a href="#">Events</a></li> -->
                <li><a href="<?php echo SITE_URL?>openwebsite/<?php echo $viewform?>/contact">Contact</a></li>
                <!-- <li><a href="#">Login</a></li> -->
                <li><a href="<?php echo SITE_URL?>openwebsite/<?php echo $viewform?>/donate" class="donate">Donate</a></li>
                
                <?php if($this->session->userdata('app_logged_in')) { ?>
                <li><a href="<?php echo SITE_URL?>user/appdetails/<?php echo $homedata->product_id?>" class="">My Account</a></li>
                <li><a href="<?php echo base_url(); ?>userlogin/logoutweb">Logout</a></li>
                <?php } else { ?>
                <li><a href="<?php echo base_url(); ?>userlogin/applogin/<?php echo $homedata->product_id?>">Login</a></li>
                <?php
                }
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
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>jquery.Jcrop.css" />
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>jquery.Jcrop.js"></script>

<script type="text/javascript">
    $(document).ready(function()
    {
        $('.changepage').change(function()
        {
            var value = $(this).val();
            if(value=='myaccount')
            {
               window.location.href = WEBROOT_PATH+'user/profile';
            }
            else
            {
              var templateid = $('input[name=templateid]').val();
              window.location.href = WEBROOT_PATH+'website/'+value+'/'+templateid;
            }
        });
         $(document).on('click','.changepagecolor',function()
        {
            var templateid = $('input[name=templateid]').val();
           $('#page_hide').show()
            modelboxsmall('');
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
            var button_color  =$('input[name=userdefinecode]').val();
            if(button_color)
            {
                 $.post(WEBROOT_PATH+'website/updatecolor',{'templateid':templateid,'button_color':button_color},function(data,status)
                {
                    $('.colorclass').css('background',button_color);
                    $('.maketextable').css('background',button_color);
                    $(".web-overlay2").remove();
                    window.location.reload();
                });

            }
            else
            {
               alert('Please enter valid color code.');
            }
           

         });
         $('input[name=logotype]').click(function()
         {
            var logotype = $('input[name=logotype]:checked').val();
            if(logotype==1)
            {
                $('.logotexdiv').show();
                $('.logoimagediv').hide();

            }
            else
            {
                 $('.logotexdiv').hide();
                $('.logoimagediv').show();
            }

         });



    });

function getSizesweb(c)
  {
    var x1 = c.x;
    // var x2_axis = obj.x2;
    var y1 = c.y;
    // var y2_axis = obj.y2;
    var thumb_width = c.w;
    var thumb_height = c.h;
    var id = $('input[name=template_id]').val();
    var upadtefor = $('.imageupadtefor').val();
    //alert(upadtefor);
    
    if(thumb_width> 0)
      {
        if(confirm("Do you want to save image..!"))
          {
            var img = $("#image_name").val();
            var t= 'ajax';
            $.post(WEBROOT_PATH+'website/upload_thumbnail',{"upadtefor":upadtefor,"templeteid":id,"img":img,"t":t,"x1":x1,"y1":y1,"thumb_width":thumb_width,"thumb_height":thumb_height},function(data,status)
           {
             if(data.status=='success')
                          {
                            if(upadtefor=='abountimage')
                            {
                              $('.bannerimageabout').attr('src',data.imagelink);

                            }
                            else if(upadtefor=='homebannerimage')
                            {
                              $('.homebanner').attr('src',data.imagelink);

                            }
                             else if(upadtefor=='homesideimage')
                            {
                              $('.homeside').attr('src',data.imagelink);

                            }
                             else if(upadtefor=='logoupdate')
                            {
                              $('.logoupdate').attr('src',data.imagelink);

                            }
                            else if(upadtefor=='donatebannerimage')
                            {
                              $('.donatebanner').attr('src',data.imagelink);

                            }
                            else if(upadtefor=='bootom_right_image')
                            {
                              $('.bootom_right_image').attr('src',data.imagelink);

                            }
                            else if(upadtefor=='center_right_image')
                            {
                              $('.center_right_image').attr('src',data.imagelink);

                            }
                            else if(upadtefor=='center_left_image')
                            {
                              $('.center_left_image').attr('src',data.imagelink);

                            }
                            else if(upadtefor=='homebottomimage')
                            {
                              $('.homebottomimage').attr('src',data.imagelink);

                            }
                            else if(upadtefor=='keypoint_second_image')
                            {
                              $('.keypoint_second_image').attr('src',data.imagelink);

                            }
                            else if(upadtefor=='keypoint_first_image')
                            {
                              $('.keypoint_first_image').attr('src',data.imagelink);

                            }
                            else if(upadtefor=='keypoint_third_image')
                            {
                              $('.keypoint_third_image').attr('src',data.imagelink);

                            }
                        }
                $(".web-overlay2").remove()
                             //$("#cropimage").hide();
                    //  var imgSrc = SITE_URL+"upload/Document/"+userId+"/"+data;
                    //   $("#thumbs").html("");
                    // $("#thumbs").html("<img src="+imgSrc+" />");
                    // $("#finalimage").html("");
                    // $("#finalimage").html("<img src="+imgSrc+" />");
                    // $('.button').show();
          });
            
    };
            
          }
      
    else
      alert("Please select portion..!");
  }
</script>

