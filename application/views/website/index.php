

<div class="showcase">
<img class="homebanner" src="<?php  echo WEBROOT_PATH_SITE_UPLODE;?><?php echo $homedata->banner_image;?>" alt="god">
	<div class="showcase-text">
    	<div class="title-show"><h3 id="index_banner_head">
      <?php echo $homedata->banner_heading;?></h3>
        <span  href="javascript:void();" class="maketextable edit-file" rel="h3">Edit</span></div>
       <div class="show-edit"><p id="index_banner_text"><?php echo $homedata->banner_text;?></p>
       <span  href="javascript:void();" class="maketextable edit-file show-text" rel="p">Edit</span>
       </div>
        <a href="#">Google.Play</a>
    </div>
<div class="fileUpload btn showcase-img">
    <span>Upload</span>
    <input type="file" name="background_image" rel="homebannerimage" class="none upload">
</div>
</div>

<div class="container">
	<div class="category">
    	<div class="box">
        	<div class="col1">
            	<img  class="keypoint_first_image" src="<?php  echo WEBROOT_PATH_SITE_UPLODE.$homedata->keypoint_first_image;?>" alt="god">
                <div class="fileUpload fileUpload2 btn category-icon">
                    <span>Upload</span>
                    <input type="file" name="background_image" rel="keypoint_first_image" class="none upload">
                </div>
                <div class="main-title"><h2>God  first</h2>
                <span  href="javascript:void();" class="maketextable edit-file" rel="h2">Edit</span></div>
                <div class="edit-text"><p id="home_keypoint_first">Doctus temporibus ius no, nec tollit conceptam definiebas te. Alii appetere dissentias. Doctus temporibus</p>
                <span  href="javascript:void();" class="maketextable edit-file" rel="p">Edit</span></div>
            </div>
            <div class="col1">
            	<img class="keypoint_second_image" src="<?php  echo WEBROOT_PATH_SITE_UPLODE.$homedata->keypoint_second_image;?>" alt="burn">
                <div class="fileUpload fileUpload2 btn category-icon">
                    <span>Upload</span>
                    <input type="file" name="background_image" rel="keypoint_second_image" class="none upload">
                </div>
                <div class="main-title"><h2>Burn Candles</h2>
                <span  href="javascript:void();" class="maketextable edit-file" rel="h2">Edit</span></div>
                <div class="edit-text"><p id="home_keypoint_second">Vel et munere expetenda honestatis. Ex sonet audiam Vel et munere expetenda honestatis. Ex sonet audiam set amet</p>
                <span  href="javascript:void();" class="maketextable edit-file" rel="p">Edit</span></div>
            </div>
            <div class="col1">
            	<img class="keypoint_third_image" src="<?php  echo WEBROOT_PATH_SITE_UPLODE.$homedata->keypoint_third_image;?>" alt="follow">
                <div class="fileUpload fileUpload2 btn category-icon">
                    <span>Upload</span>
                    <input type="file" name="background_image" rel="keypoint_third_image" class="none upload">
                </div>
                <div class="main-title"><h2>Follow the Path</h2>
                <span  href="javascript:void();" class="maketextable edit-file" rel="h2">Edit</span></div>
                <div class="edit-text"><p id="home_keypoint_third">Graeco aperiri nec no. Mea iusto detraxit an. Essent patrioque id. Graeco aperiri nec no. At ancillae dissentias eos</p>
                <span  href="javascript:void();" class="maketextable edit-file" rel="p">Edit</span></div>
            </div>
        </div>
    </div>
    <div class="testimonial">
    	<div class="textbox">
        	<div class="test-edit"><p id="testmo_text"><?php echo $homedata->testomonial_text;?></p>
            <span  href="javascript:void();" class="maketextable edit-file" rel="p">Edit</span></div>
            <div class="client-edit"><h5 id="testmo_by" class="client-name"><?php echo $homedata->testomonial_by;?></h5>
            <span  href="javascript:void();" class="maketextable edit-file" rel="h5">Edit</span></div>
        </div>
        <div class="imgbox">
        <img class="homeside" src="<?php  echo WEBROOT_PATH_SITE_UPLODE;?><?php echo $homedata->side_image;?>" alt="god">
        	 <div class="fileUpload btn clients-img">
                <span>Upload</span>
                <input type="file" name="background_image" rel="homesideimage" class="none upload">
            </div>
        </div>
    </div>
    <div class="newsletter-main">
   
    <div class="newsletter">
    <img class="homebottomimage" src="<?php  echo WEBROOT_PATH_SITE_UPLODE;?><?php echo $homedata->home_bootom_image;?>" />
    	<div class="newsletter-form">
        	<h3>Get Our Newsletter</h3>
            <div class="row">
            	<div class="col">
                	<label>First name</label>
                    <input type="text" class="input">
                </div>
                <div class="col col2">
                	<label>last name</label>
                    <input type="text" class="input">
                </div>
            </div>
            <div class="row">
                <label>E-mail</label>
                <input type="text" class="input">
             </div>
             <div class="row btn">
                <input type="submit" class="signup-btn" value="Sign Up">
             </div>
             <div class="terms">By Sign Up, you agree to our Terms and Data Policy</div>
        </div>
        
      <div class="fileUpload btn showcase-img">
            <span>Upload</span>
            <input type="file" name="background_image" rel="homebottomimage" class="none upload">
        </div>  
        
    </div>
    </div>
   
</div>

