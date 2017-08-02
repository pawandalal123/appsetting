<script src="<?php echo WEBROOT_PATH_JS;?>jquery.min.js"></script>
<script>
$(document).ready(function() {
$('.webcontent').hide().fadeIn();
    $('.webnav li a').bind('click', function(e){
        $('.webnav li a.active').removeClass('active');
        $('.webcontent:visible').hide();
        $(this.hash).show();
        $(this).addClass('active');
        e.preventDefault();
    }).filter(':first').click();
    $('.webnav li a').bind('click', function(e){
        $(this.hash).hide().fadeIn().addClass('active');
	})
});
	
</script>
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
                <li><a href="<?php echo SITE_URL?>user/preview/<?php echo $gettempData->id; ?>" class="active">4</a></li>
            </ul>
            <h3>Its done! Well Almost</h3>
            <span>Please select the highlight color and font</span>
           
        </div>
         <div class="column">
            <div class="web-tab">
                <div class="webnav">
                    <ul>
                        <li><a href="#ios" class="active">My iOS App</a></li>
                        <li><a href="#website" class="active">My Website</a></li>
                    </ul>
                </div>
                <div class="webcontent" id="ios">
                    <h3>Your Website Is Incomplete</h3>
                    <h4>Finalize the pages of your website</h4>
                    <p>Press the  button below start the website builder</p>
                    <a href="#" class="button">Edit</a>
                    <h4>Hosting the Website</h4>
                    <p>During the demo phase the website will be hosted on 3AppCloud under our name. You can change this to your own name once you finalize the process. </p>
                  	<div class="domain-form"></div>
                    
                    <div class="tab-text">
                        <img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-apple.png" alt="">
                        <a href="#" class="link">Text Me The Link</a>
                    </div>
                    <h5>2. Login into the app using following credentials</h5>
                        <div class="tab-text">
                        <div class="email-box"><span>Email : <samp>januka@ingenslk.com</samp>  </span>
                        <span>Passcode :<samp> 814312</samp>  </span></div>
                    </div>
                    <h5>3. Wait for about 2 minutes for the content to load. Once done, Enjoy :)</h5>
                    <h4>How to Modify Your Screens</h4>
                    <h5>Press the button below to start app builder</h5>
                    <a href="#" class="button">Edit</a>
                </div>
                <div class="webcontent" id="website">
                	<h3>Your Website Is Incomplete</h3>
                    <h4>Finalize the pages of your website</h4>
                    <p>Press the  button below start the website builder</p>
                     <a href="<?php echo SITE_URL;?>website/index/<?php echo $templete_id; ?>" class="button">Edit</a>
                    <h4>Hosting the Website</h4>
                    <p>During the demo phase the website will be hosted on 3AppCloud under our name. You can change this to your own name once you finalize the process. </p>
                    <div class="domaiin-form">
                    	<label>Enter Desired Domain Name</label>
                    	<input type="text" class="input">
                        <span class="domain-name">.3AppCloud.com</span> 
                        <span class="not-avial">Not Available</span>  
                        <input type="submit" class="sumbit-btn">           
                    </div>
            </div>
            </div>
         </div>
    </div>
</div>
