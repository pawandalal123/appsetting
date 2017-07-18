

<div class="container">
	<div class="box">
    	<div class="welcome-row overview">
        	<div class="welcome-msg">
            	<h4>Welcome <samp>
                <?php echo $getuserdata->name?>!</samp> <span>CustomerID <?php echo $getuserdata->id?></span></h4>
            </div>
            <div class="profile-menu">
                <ul>
                    <li><a href="" class="active">Your Products</a></li>
                    <li><a href="#">Your Subscription</a></li>
                    <li><a href="<?php echo SITE_URL.'user/profile'; ?>">Your Profile</a></li>
                </ul>
            </div>
            <div class="kiptry-row">
            	<h2>Overview of Products</h2>
            </div>
            <?php
            if(count($templateArray)>0)
            {
            ?>
            <div class="product-table">
            	<div class="row title">
                	<div class="col1"></div>
                	<div class="col1">Product Id</div>
                    <div class="col1">Subscription</div>
                    <div class="col1">Remaining Time</div>
                    <div class="col1">Settings</div>
                </div>
                <?php
                foreach($templateArray as $key=>$templist)
                {

               ?>
                <div class="row">
                	<div class="col1 kipty"><?php echo $templist['tempname'];?></div>
                	<div class="col1"><?php echo $key;?></div>
                    <div class="col1"><?php echo $templist['subscription'];?></div>
                    <div class="col1"><?php echo $templist['remaining_days'];?> Days</div>
                    <div class="col1">
                    <?php 
                    $lastupadte = $templist['last_updated_page'] ?  $templist['last_updated_page'] : 'edittemplate';
                    ?>
                    <a href="<?php echo SITE_URL.'user/'.$lastupadte.'/'.$key?>" class="btn">Edit</a>
                    </div>
                </div>
                <?php
                 }
                ?>
           
            </div>
            <?php
            } ?>
        </div>
    </div>
</div>





