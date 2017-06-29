<input type="hidden" name="template_id" value="<?php echo $templete_id;?>">

<div class="main-header">
<div class="site-hesder">
	<div class="site-logo"><a href="#"><img src="<?php  echo WEBROOT_PATH_SITE_IMAGES;?>/site-logo.jpg"></a></div>
    <div class="editing">
    	<label>You Are Editing</label>
        <div class="select-box">
        <select class="select changepage">
        	<option value="index">Home Page</option>
            <option value="about">About Us</option>
            <option value="contact">Contact</option>
            <option value="donate">Donate</option>
        </select>
        </div>
    </div>
    <div class="top-btn">
    <form method="post" action="">
    	<ul>
        	<li>
            <input type="submit" name="savehome" value="Save" class="active save-btn">
            <!-- <a href="#" title="Save" class="active">Save</a> -->
            </li>
            <li><a href="#" title="Close">Close</a></li>
        </ul>
        </form>
    </div>
</div>
<div class="header-top <?php if($pagename=='contact') { ?> inner<?php }?>">
	<div class="main-logo"><a href="#">
    <img class="logoupdate" src="<?php  echo WEBROOT_PATH_SITE_UPLODE;?><?php echo $homedata->logo;?>">

    </a>
    <div class="fileUpload btn logo-img">
        <span>Upload</span>
        <input type="file" name="background_image"  rel="logoupdate" class="none upload">
    </div>
    </div>
    <div class="header-right">
    	<div class="navigation">
        	<ul>
            	<li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="#" class="donate">Donate</a></li>
            </ul>
        </div>
    </div>
</div>
</div>
<input type="hidden" name="templateid" value="<?php echo $templete_id;?>">
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.changepage').change(function()
        {
            var value = $(this).val();
            var templateid = $('input[name=templateid]').val();
            window.location.href = WEBROOT_PATH+'website/'+value+'/'+templateid;

        });

    });
</script>