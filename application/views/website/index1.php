

<div class="showcase">
<img class="homebanner" src="<?php  echo WEBROOT_PATH_SITE_UPLODE;?><?php echo $homedata->banner_image;?>" alt="god">
	<div class="showcase-text">
    	<h3 id="index_banner_head">
        <?php echo $homedata->banner_heading;?></h3>
        <span  href="javascript:void();" class="maketextable" rel="h3">Edit</span>
        <p id="index_banner_text"><?php echo $homedata->banner_text;?></p>
        <span  href="javascript:void();" class="maketextable" rel="p">Edit</span>
        <a href="#">Google.Play</a>
    </div>
</div>
<input type="file" name="background_image"  rel="homebannerimage">

<div class="container">
	<div class="category">
    	<div class="box">
        	<div class="col1">
            	<img src="<?php  echo WEBROOT_PATH_SITE_IMAGES?>img-god.jpg" alt="god">
                <h2>God  first</h2>
                <p>Doctus temporibus ius no, nec tollit conceptam definiebas te. Alii appetere dissentias. Doctus temporibus</p>
            </div>
            <div class="col1">
            	<img src="<?php  echo WEBROOT_PATH_SITE_IMAGES;?>img-burn.jpg" alt="burn">
                <h2>Burn Candles</h2>
                <p>Vel et munere expetenda honestatis. Ex sonet audiam Vel et munere expetenda honestatis. Ex sonet audiam set amet</p>
            </div>
            <div class="col1">
            	<img src="<?php  echo WEBROOT_PATH_SITE_IMAGES;?>img-follow.jpg" alt="follow">
                <h2>Follow the Path</h2>
                <p>Graeco aperiri nec no. Mea iusto detraxit an. Essent patrioque id. Graeco aperiri nec no. At ancillae dissentias eos</p>
            </div>
        </div>
    </div>
    <div class="testimonial">
    	<div class="textbox">
        	<p id="testmo_text"><?php echo $homedata->testomonial_text;?></p>
            <span  href="javascript:void();" class="maketextable" rel="p">Edit</span>
            <h5 id="testmo_by" class="client-name"><?php echo $homedata->testomonial_by;?></h5>
            <span  href="javascript:void();" class="maketextable" rel="h5">Edit</span>
        </div>
        <div class="imgbox">
        <img class="homeside" src="<?php  echo WEBROOT_PATH_SITE_UPLODE;?><?php echo $homedata->side_image;?>" alt="god"></div>
    </div>
    <input type="file" name="background_image"  rel="homesideimage">
    <div class="newsletter">
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
    </div>
   
</div>

