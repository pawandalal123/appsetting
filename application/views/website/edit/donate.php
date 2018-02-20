<div class="showcase2">
    <img class="donatebanner" src="<?php  echo WEBROOT_PATH_SITE_UPLODE.$homedata->donate_banner;?>" alt="god">
    <div class="donate-text">
        <div class="main-title"><h2 id="donate_banner_heading"><?php echo $homedata->donate_banner_heading;?></h2>
        <span  href="javascript:void();" class="maketextable edit-file" rel="h2">Edit</span></div>
        <div class="edit-text"><p id="donate_banner_text"><?php echo $homedata->donate_banner_text;?></p>
        <span  href="javascript:void();" class="maketextable edit-file" rel="p">Edit</span></div>
        <a href="#" class="colorclass">Donate Now</a>
    </div>
    <div class="fileUpload btn showcase-img colorclass">
        <span>Upload</span>
        <input type="file" name="background_image" rel="donatebannerimage" class="none upload">
    </div>
</div>
<div class="container">
    <div class="donate-text">
        <div class="box">
            <div class="main-title"><h3 id="donate_center_heading"><?php echo $homedata->donate_center_heading;?></h3>
            <span  href="javascript:void();" class="maketextable edit-file" rel="h3">Edit</span></div>
            <div class="edit-text"><p id="donate_center_text"><?php echo $homedata->donate_center_text;?></p>
            <span  href="javascript:void();" class="maketextable edit-file" rel="p">Edit</span></div>
        </div>
    </div>
    <div class="donat-column">
        <div class="donateform">
            <div class="inner-form">
                <h3>Donate Now</h3>
                <div class="padding">
                    <div class="row">
                        <label>Your Name</label>
                        <input type="text" class="input">
                    </div>
                    <div class="row">
                        <label>Email Adress</label>
                        <input type="text" class="input">
                    </div>
                    <div class="row check">
                        <label class="amount">Amount</label>
                        <label><input name="" type="checkbox" class="checkbox" value=""> $ 10</label>
                        <label><input name="" type="checkbox" class="checkbox" value=""> $ 50</label>
                        <label><input name="" type="checkbox" class="checkbox" value=""> $ 100</label>
                        <label><input name="" type="checkbox" class="checkbox" value=""> Custom</label>
                    </div>
                    <div class="row">
                        <input type="submit" class="submit-btn colorclass" value="Submit">
                        <span class="left">Your Data is Secured.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="textbox">
            <div class="main-title"><h3 id="donate_right_heading"><?php echo $homedata->donate_right_heading;?></h3>
            <span  href="javascript:void();" class="maketextable edit-file" rel="h3">Edit</span></div>
            <div class="edit-test"><p id="donate_right_text"><?php echo $homedata->donate_right_text;?> </p>
            <span  href="javascript:void();" class="maketextable edit-file" rel="p">Edit</span></div>
        </div>
    </div>
</div>





