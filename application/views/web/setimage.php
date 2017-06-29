 
       <script>
    $(document).ready(function() 
    {
     var owl = $("#owl-demo4");
      owl.owlCarousel({

      items : 5, //10 items above 1000px browser width
      itemsDesktop : [1000,5], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0;
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
      
      });

      // Custom Navigation Events
      $(".next").click(function(){
        owl.trigger('owl.next');
      })
      $(".prev").click(function(){
        owl.trigger('owl.prev');
      })
      


    });
    </script>   
    
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
});
</script>
<script>
$(document).ready(function()
{
    $(".web-overlay3 .inner-web .close").click(function(){
        $(".web-overlay3").fadeOut()
		$("body").removeClass("active");
    });
    $(".gallery").click(function(){
        $(".web-overlay3").fadeIn();
		$("body").addClass("active");
    });
	
	 $(".web-overlay2 .inner-web .close").click(function(){
        $(".web-overlay2").remove()
    });
    $(".app-template").click(function(){
        $(".web-overlay2").fadeIn();
    });
    var _URL = window.URL || window.webkitURL;

    $('input[name=background_image]').change(function()
    {
      var file, img;
      var fileField  = this.files[0];

      var name = fileField.name;
      var size = fileField.size;
      img = new Image();
      var imgwidth = 0;
      var imgheight = 0;
      var maxwidth = 232;
      var maxheight = 391;

      if ((file = this.files[0])) 
      {
          img = new Image();
          img.onload = function() 
          {
            imgwidth=this.width ;
            imgheight=this.height;
            var id = $('input[name=updateid]').val();
            var formerr = 0;
            var fileExt =  name.split('.').pop().toLowerCase();
            if($.inArray(fileExt, ['gif','png','jpg','jpeg','svg','PNG','GIF']) == -1)
            {
                alert('invalid file !');
                formerr++;
                return false;
            }
            else
            {
              var form_data = new FormData();
              form_data.append('fileField',fileField);
              form_data.append('updateid',id);
              form_data.append('upadtefor','image');
              $.ajax({
                    type: "POST",
                    url: WEBROOT_PATH+'user/upatdeimge',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                      success: function (response) {
                          //alert(response.detailsubmit);
                          if(response.status=='success')
                          {
                            $('.templeteimgclass').attr('src',response.imagelink);
                            if(imgwidth > maxwidth && imgheight > maxheight)
                            {
                                modelbox('');
                               $('.content').html('<h3>You Have Previewing <span> Crop Image</span></h3><div class="imgbox" style="height:300px;"><div class="item crop-images"><img src="'+response.imagelink+'" alt="" id="photo"><input type="hidden" name="image_name" id="image_name" value="'+response.imagename+'"  /></div></div>');
                               $('img#photo').imgAreaSelect(
                                    { maxWidth: 300, maxHeight: 600, handles: true,
                                    onSelectEnd: getSizes
                                });
                            }

                          }
                          else
                          {
                            alert('some thing wrong with your input');

                          }
                      },
                      error: function (response) {
                         alert('some technical issue.');
                          
                      }
                      });
            }
          };
          img.onerror = function() 
          {
              alert( "not a valid file: ");
          };
          img.src = _URL.createObjectURL(file);
      }
     


    });


    $(document).on('click','.imagefromgel',function()
    {
      //alert();
      var imagename = $(this).attr('rel');
      var id = $('input[name=updateid]').val();
      $.post(WEBROOT_PATH+'user/upatdeimge',{'imagename':imagename,'updateid':id},function(data,status)
      {
          if(data.status=='success')
          {
            $('.templeteimgclass').attr('src',data.imagelink);
            $(".web-overlay2").fadeOut()

          }
          else
          {
            alert('some technical issue.');
            $(".web-overlay2").fadeOut()
          }
      
      },'json').fail(function(response)
      {
            alert('some technical issue.');
            $(".web-overlay2").fadeOut()
                        
                        });

        })

});

</script>
<link rel="stylesheet" type="text/css" href="http://www.shaadisaath.com/assets/css/imgareaselect-animated.css" />
<script type="text/javascript" src="http://www.shaadisaath.com/assets/js/jquery.imgareaselect.js"></script>
<script type="text/javascript">
function getSizes(im,obj)
  {
    var x1 = obj.x1;
    var x2_axis = obj.x2;
    var y1 = obj.y1;
    var y2_axis = obj.y2;
    var thumb_width = obj.width;
    var thumb_height = obj.height;
    var id = $('input[name=updateid]').val();
    
    if(thumb_width> 0)
      {
        if(confirm("Do you want to save image..!"))
          {
            var img = $("#image_name").val();
            var t= 'ajax';
                 $.post(WEBROOT_PATH+'user/upload_thumbnail',{"templeteid":id,"img":img,"t":t,"x1":x1,"y1":y1,"thumb_width":thumb_width,"thumb_height":thumb_height},function(data,status)
         {
                    // $(".web-overlay2").remove()
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

$(document).ready(function () {
    
});
</script>
<!--------------- js ---------------->



<input type="hidden" name="updateid" value="<?php echo $gettempData->id?>">

<div class="container">
	<div class="box">
		<div class="preview-form">
            <h2>Get a free preview with your content</h2>
            <ul>
                <li><a href="#" class="next">1</a></li>
                <li><a href="#" class="next">2</a></li>
                <li><a href="#" class="active">3</a></li>
                <li><a href="#">4</a></li>
            </ul>
            <h3>Customize The App Screens</h3>
            <span>Choose an elemant from the screen to customize it.</span>
           
        </div>
         <div class="column">
         		<div class="customize">
                	<div class="crousal1">         
                    <div class="divine">
                    <div class="imgbox">
                    <img class="templeteimgclass" src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES.$gettempData->background_image;?>" alt="">
                    <div class="overlay-chuch">
                      <h3 class="templetename"><?php echo $gettempData->temlete_name;?></h3>
                        <p class="templetetag"><?php echo $gettempData->tag_line;?></p>
                        <div class="btn-bott">
                        <a href="#" class="sign-in" style="background: <?php echo $gettempData->color_code; ?>!important">Sign In</a>
                        <a href="#" class="sign-in" style="background: <?php echo $gettempData->color_code; ?>!important">Sign In</a>
                         </div>
                        <input type="hidden" class="hovercolor" name="colorhover" value="<?php echo $gettempData->color_code_hover; ?>">
                    </div>
                        
                    </div>
                    </div>
             

                    </div>
                    <div class="customize-detail">
                    	<h3>Current Selection : <span>Church Name and Tag Line</span></h3>
                        <label class="grey padding">Background Image</label>
                        <a href="#" class="gallery">Gallery</a>
                        
                        
                    <div class="fileUpload btn btn-primary">
                        <span>Upload</span>
                        <input type="file" name="background_image" id="" class="none upload">
                    </div>
                        
                    </div>
                </div>
                <div class="btn-row"><p>Your Progress is Automatically Saved <span>Last Save 07:29 p.m</span></p>
                <a href="<?php echo SITE_URL;?>user/preview/<?php echo $gettempData->id;?>">Save And Exit</a>
                <a href="<?php echo SITE_URL;?>user/preview/<?php echo $gettempData->id;?>" class="grey">Next</a></div>
            </div>
    </div>
</div>
<?php
if(count($gelimageArray)>0)
{
?>

<div class="web-overlay3" style="display: none;">
	<div class="inner-web">
    	<h3>Choose an Image</h3>	
        <div id="demo">
            <div class="close"></div>
            <div id="owl-demo4" class="owl-carousel">
            <?php foreach($gelimageArray as $gelimageArray)
            {
            ?>
                <div class="item imagefromgel" rel="<?php echo $gelimageArray->background_image;?>">
                <img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES.$gelimageArray->background_image;?>" rel="<?php echo $gelimageArray->background_image;?>"></div>
                <?php
            } ?>
              
            </div>
            <div class="customNavigation">
                <a class="prev">Previous</a>
                <a class="next">Next</a>
            </div>
        </div>
        <div class="row"><a href="#">Use Selected</a></div>
    </div>
</div>
<?php
}
?>

