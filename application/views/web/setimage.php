
<script>
    $(document).ready(function() {
	  var owl = $("#owl-demo3");

      owl.owlCarousel({

      items :1, //10 items above 1000px browser width
      itemsDesktop : [1000,1], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,1], // 3 items betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0;
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
      
      });
	  
	   var owl = $("#owl-demo4");

      owl.owlCarousel({

      items :4, //10 items above 1000px browser width
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
        $(".web-overlay2").fadeOut()
    });
    $(".app-template").click(function(){
        $(".web-overlay2").fadeIn();
    });

    $('input[name=background_image]').change(function()
    {
      alert();
      var fileField  = this.files[0];
      var name = fileField.name;
      var size = fileField.size;
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
                    	
                    	  
          <div class="owl-carousel owl-theme">
                  <div class="item">
                  <img class="templeteimgclass" src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES.$gettempData->background_image;?>" alt="">
                    <div class="overlay-chuch">
                      <h3><?php echo $gettempData->temlete_name;?></h3>
                        <p><?php echo $gettempData->tag_line;?></p>
                        <a href="#" class="sign-in" style="background: <?php echo $gettempData->color_code; ?>!important">Sign In</a>
                        <a href="#" class="sign-up">Sign Up</a>
                    </div>
                </div>
              </div>
                       
                     <!--    <div class="landing-box">
                        	<div class="select-box">
                        	<select class="select">
                            	<option>Landing</option>
                                <option>Landing-1</option>
                                <option>Landing-2</option>
                                <option>Landing-3</option>
                                <option>Landing-4</option>
                            </select>
                            </div>
                        	<h4>Edited Elemants : 0/4 </h4>
                        </div> -->
                    </div>
                    <div class="customize-detail">
                    	<h3>Current Selection : <span>Church Name and Tag Line</span></h3>
                        <label class="grey padding">Background Image</label>
                        <a href="#" class="gallery">Gallery</a>
                        <input type="file" name="background_image" id="">Upload
                        
                        
                    </div>
                </div>
                <div class="btn-row"><p>Your Progress is Automatically Saved <span>Last Save 07:29 p.m</span></p><a href="#">Save And Exit</a><a href="#" class="grey">Next</a></div>
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

