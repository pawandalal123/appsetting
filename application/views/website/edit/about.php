
<div class="showcase2">
	<img class="bannerimageabout" src="<?php  echo WEBROOT_PATH_SITE_UPLODE.$aboutdata->banner_image;?>" alt="god">
    
	<div class="about-text">
    	<div class="showcase-title"><h2 id="about_banner_heading"><?php echo $aboutdata->banner_heading?></h2>
        <span  href="javascript:void();" class="maketextable edit-file" rel="h2">Edit</span></div>
        <div class="text-edit"><p id="banner_text"><?php echo $aboutdata->banner_text?></p>
        <span  href="javascript:void();" class="maketextable edit-file" rel="p">Edit</span></div>
    </div>
    
    <div class="fileUpload btn showcase-img colorclass">
        <span>Upload</span>
        <input type="file" name="background_image" id="<?php echo $aboutdata->product_id;?>" rel="abountimage" class="none upload">
    </div>
    
</div>
<div class="container">
    <div class="box">
        <div class="key-point">
        	<div class="key-maintile"><h3 id="aboutmainheading"><?php echo $aboutdata->top_heading_text?></h3>
            <span  href="javascript:void();" class="maketextable edit-file" rel="h3">Edit</span></div>
            <div class="col">
            	<div class="key-title"><h4 id="point_first_heading"><?php echo $aboutdata->point_first_heading;?></h4>
                <span  href="javascript:void();" class="maketextable edit-file" rel="h4">Edit</span></div>

                <div class="key-text"><p id="point_first_text"><?php echo $aboutdata->point_first_text;?></p>
                <span  href="javascript:void();" class="maketextable edit-file" rel="p">Edit</span></div>
            </div>
            <div class="col">
            	<div class="key-title"><h4 id="point_second_heading"><?php echo $aboutdata->point_second_heading;?></h4>
                <span  href="javascript:void();" class="maketextable edit-file" rel="h4">Edit</span></div>
                <div class="key-text"><p id="point_second_text"><?php echo $aboutdata->point_second_text;?></p>
                <span  href="javascript:void();" class="maketextable edit-file" rel="p">Edit</span></div>
            </div>
            <div class="col">
            	<div class="key-title"><h4 id="point_third_heading"><?php echo $aboutdata->point_third_heading;?></h4>
                <span  href="javascript:void();" class="maketextable edit-file" rel="h4">Edit</span></div>
                <div class="key-text"><p id="point_third_text"><?php echo $aboutdata->point_third_text;?></p>
                <span  href="javascript:void();" class="maketextable edit-file" rel="p">Edit</span></div>
            </div>
            <div class="row">
            	<div class="imgbox">
                	<img class="center_left_image" src="<?php  echo WEBROOT_PATH_SITE_UPLODE.$aboutdata->center_left_image;?>" alt="god">
                    <div class="title-overlay">
                    	       <div class="key-title">
                    <h4 id="center_left_heading"><?php echo $aboutdata->center_left_heading;?></h4>
                    <span  href="javascript:void();" class="maketextable edit-file" rel="h4">Edit</span>
                    </div>
                        <div  class="key-title">
                        <h4 id="center_left_heading_text"><?php echo $aboutdata->center_left_heading_text;?></h4>
                        <span  href="javascript:void();" class="maketextable edit-file" rel="h4" style="margin-top: 35px;">Edit</span>
                        </div>
                    </div>
                    <div class="fileUpload btn keypoint-img colorclass">
                        <span>Upload</span>
                        <input type="file" name="background_image" id="<?php echo $aboutdata->product_id;?>" rel="center_left_image" class="none upload">
                    </div>
                </div>
                

                
                <div class="imgbox right">
                	<img class="center_right_image" src="<?php  echo WEBROOT_PATH_SITE_UPLODE.$aboutdata->center_right_image;?>" alt="god">
                    <div class="title-overlay">
                 <div class="key-title">
                    <h4 id="center_right_heading"><?php echo $aboutdata->center_right_heading;?></h4>
                    <span  href="javascript:void();" class="maketextable edit-file" rel="h4">Edit</span>
                    </div>
                    	<div  class="key-title">
                        <h4 id="center_right_heading_text"><?php echo $aboutdata->center_right_heading_text;?></h4>
                        <span  href="javascript:void();" class="maketextable edit-file" rel="h4" style="margin-top: 35px;">Edit</span>
                        </div>
                    </div>
                    <div class="fileUpload btn keypoint-img colorclass">
                        <span>Upload</span>
                        <input type="file" name="background_image" id="<?php echo $aboutdata->product_id;?>" rel="center_right_image" class="none upload">
                    </div>
                </div>
                 
            </div>
        </div>
    </div>
    <div class="author">
    	<div class="imgbox"><img class="bootom_right_image" src="<?php  echo WEBROOT_PATH_SITE_UPLODE.$aboutdata->bootom_right_image;?>">
        <div class="fileUpload btn author-img colorclass">
            <span>Upload</span>
            <input type="file" name="background_image" id="<?php echo $aboutdata->product_id;?>" rel="bootom_right_image" class="none upload">
        </div>
        
        </div>
       
        <div class="textbox">
        	<div class="main-title"><h3  id="bootom_first_heading"><?php echo $aboutdata->bootom_first_heading?></h3>
            <span  href="javascript:void();" class="maketextable edit-file" rel="h3">Edit</span></div>
            <div class="author-post"><h4 id="bootom_second_heading"><?php echo $aboutdata->bootom_second_heading?></h4>
            <span  href="javascript:void();" class="maketextable edit-file" rel="h4">Edit</span></div>
            <div class="row">
                <div class="col">
                	<div class="text-edit"><p id="bootom_first_text"><?php echo $aboutdata->bootom_first_text?></p>
                    <span  href="javascript:void();" class="maketextable edit-file" rel="p">Edit</span></div>
                </div>
                <div class="col col2">
                	<div class="text-edit"><p id="bootom_second_text"><?php echo $aboutdata->bootom_second_text?></p>
                    <span  href="javascript:void();" class="maketextable edit-file" rel="p">Edit</span></div>
                </div>
            </div>
            <a href="#">Write to me ></a>
        </div>
    </div>
</div>
