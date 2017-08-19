<div class="container">
	<div class="box">
        <div class="contact">
            <div class="col">
            	<div class="main-title"><h3 id="contact_main_heading"><?php echo $homedata->contact_main_heading;?></h3>
                <span  href="javascript:void();" class="maketextable edit-file" rel="h3">Edit</span></div>
                <div class="row">
                    <div class="col3">
                        <input type="text" class="input" placeholder="Your name">
                    </div>
                    <div class="col4">
                        <input type="text" class="input" placeholder="Company">
                    </div>
            	</div>
                <div class="row">
                	<textarea name="" cols="" rows="" class="textarea" placeholder="Write your message here..."></textarea>
                </div>
                <div class="row">
                	<div class="right">
                    <a id="contactemail"><?php echo $homedata->contact_email;?></a>
                    <span  href="javascript:void();" class="maketextable" rel="a">Edit</span>
                    </div>
                	<input type="submit" class="submit-btn colorclass" value="Submit">
                </div>
            </div>
            <div class="col2">
            	<div class="main-title">
            	<h3 id="contact_right_heading"><?php echo $homedata->contact_right_heading;?></h3>
                <span  href="javascript:void();" class="maketextable edit-file" rel="h3">Edit</span></div>
                <div class="text-edit"><p id="contact_right_text"><?php echo $homedata->contact_right_text;?></p>
                <span  href="javascript:void();" class="maketextable edit-file" rel="p">Edit</span></div>
                <div class="social">
                    <ul>
                        <li class="facebook"><a href="#">facebook</a></li>
                        <li class="twitter"><a href="#">twitter</a></li>
                        <li class="instagram"><a href="#">instagram</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>




