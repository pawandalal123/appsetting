<div class="welcome-row profile">
            <div class="welcome-msg">
                <h4>Welcome <samp><?php echo $getuserdata->name?>!</samp> <span>CustomerID <?php echo $getuserdata->id?></span></h4>
            </div>
            <div class="profile-menu">
                <ul>
                    <li><a href="<?php echo SITE_URL.'user/productlist'; ?>">Your Products</a></li>
                    <li><a href="#">Your Subscription</a></li>
                    <li><a href="<?php echo SITE_URL.'user/profile'; ?>" class="active">Your Profile</a></li>
                </ul>
            </div>
        </div>
        <div class="profile-row">
            <div class="profile-box">
            <div class="profile-img">
            <?php
            $link=WEBROOT_PATH_IMAGES.'img-icon7.png';
            if($getuserdata->profile_image)
            {
                $link=WEBROOT_PATH_UPLOAD_IMAGES.'profileimages/'.$getuserdata->profile_image;

            } 
            ?>
                <img class="userprofileimage" src="<?php echo $link;?>">
                <div class="upload-btn btn-primary">
                                <span>file</span>
                                <input type="file" class="upload" />
                            </div>
                            </div>
                <h3 id="username"><?php echo $getuserdata->name?></h3>
                 <a href="#" class="profileeditable" rel="h3">edit</a>
            </div>
            <
        </div>