

<div class="container">
	<div class="box">
    	<div class="welcome-row">
        	<div class="welcome-msg">
            	<h4>Welcome <samp><?php echo $getuserdata->name?>!</samp> <span>CustomerID <?php echo $getuserdata->id?></span></h4>
            </div>
            <div class="profile-menu">
                <ul>
                    <li><a href="#" class="active">Your Products</a></li>
                    <li><a href="#">Your Subscription</a></li>
                    <li><a href="<?php echo SITE_URL.'user/profile'; ?>">Your Profile</a></li>
                </ul>
            </div>
            <div class="kiptry-row">
            	<a href="<?php echo SITE_URL.'user/productlist'; ?>"> < Change Product </a>
            	<h2><?php echo $templatedata->temlete_name?></h2>
            </div>
            <div class="review-menu">
            	<ul>
                    <li><a href="#" class="active" >Overview</a></li>
                    <li><a href="<?php echo SITE_URL.'user/modification/'.$templatedata->id ?>">Modifications</a></li>
                    <li><a href="<?php echo SITE_URL.'user/reportbug/'.$templatedata->id ?>">Report Bug</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </div>
        </div>
        <div class="registration">
        	<h3>User Registrations</h3>
            <strong class="user-count"><?php echo $totalcount?></strong>
        </div>
        <div class="registration-col">
        	<div class="mobile-app">
            	<h3>Mobile App</h3>
                <a href="#" class="previewtemp" id="<?php echo $templatedata->id;?>">Preview</a>
                <a href="<?php echo SITE_URL.'user/setcolor/'.$templatedata->id ?>">Edit</a>
            </div>
            <div class="mobile-app website">
            	<h3>Website</h3>
                <a href="#">Preview</a>
                <a href="<?php echo SITE_URL.'website/index/'.$templatedata->id ?>">Edit</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function()
    {
        $(document).on('click','.previewtemp',function()
        {
            var templateid = $(this).attr('id');
           $('#page_hide').show()
            modelboxsmall('');
            $.post(WEBROOT_PATH+'user/setpreview',{'templateid':templateid},function(data,status)
            {
                $('#page_hide').hide()
                
                  $('.content').html(data);
              
              }).fail(function(response)
              {
                                 $('#page_hide').hide()
              });

        })

    })
</script>





