

<script>
$(document).ready(function() {
$('.tab-c').hide().fadeIn();
    $('.site-p a').bind('click', function(e){
        $('.site-p li a.active').removeClass('active');
        $('.tab-c:visible').hide();
        $(this.hash).show();
        $(this).addClass('active');
        e.preventDefault();
    }).filter(':first').click();
    $('.site-p a').bind('click', function(e){
        $(this.hash).hide().fadeIn().addClass('active');
	})
});
	
</script>
<script>
    $(document).ready(function() {

	   var owl = $("#owl-demo2");

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
    $(document).ready(function() {

      var owl = $("#owl-demo9");

      owl.owlCarousel({

      items : 1, //10 items above 1000px browser width
      itemsDesktop : [1000,1], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,1], // 3 items betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0;
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
    
    
 <!--------------- showcase ---------------->
<div class="showcase">
  <img src="<?php echo WEBROOT_PATH_IMAGES;?>header-image.jpg" alt="">
    <div class="showcase-text">
      <div class="box">
         <h2>We are building digital experience <span>of the future, today.</span></h2>
             <a href="#">Show Me How</a>
        </div>
    </div>
</div>
<!--------------- showcase ---------------->   
<!--------------- container ---------------->
<div class="container">
<div class="box">
<div class="inner-web church-temp">
    	<h3>You Have Previewing <span> Church Template </span></h3>
        <div class="popup-nav site-p">
        	<ul>
            	<li><a href="#app-tab" class="active">iOS Mobile App</a></li>
                <li><a href="#website-tab"> Website</a></li>
            </ul>
        </div>
        
       <div class="app-tab tab-c" id="app-tab">
        <div id="demo2">
            
            <div id="owl-demo2" class="owl-carousel">
            <?php 
            $template_id='';
            foreach($getproductsimages as $getproductslist)
            {
              $template_id = $getproductslist->template_id;
              if($getproductslist->type==1)
              {


             ?>

             <div class="item templateselect"  id="<?php echo $getproductslist->template_id?>">
                <img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES.'galleryimage/'.$getproductslist->image_name;?>" alt="">
                    
                </div>
                
              <?php
                  }
              }
              ?>
                
            </div>
            <input type="hidden" name="selectedtemplate" value="<?php echo $template_id;?>">
            </div>
            
        <div class="customNavigation">
            <a class="prev">Previous</a>
            <a class="next">Next</a>
        </div>
        </div>
        <div class="website-tab tab-c" id="website-tab">
        <div id="demo">
            <div id="owl-demo9" class="owl-carousel">
                <?php 
                
            foreach($getproductsimages as $getproducts)
            {
              // $template_id = $getproducts->template_id;
              if($getproducts->type==2)
              {


             ?>
             <div class="item templateselect"  id="<?php echo $getproducts->template_id?>">
                <img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES.'galleryimage/'.$getproducts->image_name;?>" alt="">
                   
                </div>
                
              <?php
                  }
              }
              ?>
            </div>
            </div>
       	 <div class="customNavigation">
            <a class="prev">Previous</a>
            <a class="next">Next</a>
        </div>
        </div>
        
        <p>Forget Ebay and other forms of advertising for your property that costs you hard earned money. Why not do it all for free? Investment Assets Properties have ready several locations around the world to take your free listings for any luxury property.</p>
        <div class="row"><a href="#" class="active" onclick="settemplete()">Start</a></div>
        <div class="social-popup social-popup2">
        	<h5>LIKE WHAT YOU SEE ? SHARE IT</h5>
            <ul>
            	<li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>/icon-facebook2.png" alt=""></a></li>
                <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>/icon-twitter2.png" alt=""></a></li>
                <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>/icon-googlep.png" alt=""></a></li>
                <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>/icon-message.png" alt=""></a></li>
            </ul>
        </div>
    </div>
</div>
<div class="simple-process">
	<div class="textbox">
    	<h3>Simple Process</h3>
        <h4><span>1.</span> GET IN TOUCH WITH US</h4>
        <p>With MySpace becoming more popular every day, there is the constant need to be different. There are millions of users, and there will be many who might even use the same layouts. If </p>
        <h4><span>2.</span> FINALIZE APP USER INTERFACE</h4>
        <p>Having a baby can be a nerve wracking expe-rience for new parents – not the nine months of pregnancy, I'm talking about after the infant is brought home from the hospital. It's </p>
        <h4><span>3.</span> PREPARED FILES FOR CODING</h4>
        <p>All the rumors have finally died down and many skeptics have tightened their lips, the iPod does support video format now on its fifth generation. While the iPod is not the  </p>
    </div>
    <div class="imgbox"><img src="<?php echo WEBROOT_PATH_IMAGES;?>/img-process.png" alt=""></div>
</div>

<div class="perfect-fit">
	<img src="<?php echo WEBROOT_PATH_IMAGES;?>/img-perfect.png" alt="" >
    <div class="fit-caption">
    	<h3>Feel like this is the perfect fit ?</h3>
        <p>Enter your email below and one of our representatives will contact you.</p>
        <form>
        	<input type="text" class="input">
            <input type="submit" class="btn" value="Contact Me">
        </form>
    </div>
</div>

</div>
<!--------------- container ---------------->