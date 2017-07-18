<script>
jQuery(document).ready(function(){
    jQuery( ".report-text .hide" ).click(function() {       
        jQuery(this).parent().parent().removeClass("active");
    }); 
    jQuery( ".report-table .row .submission" ).click(function() {
        jQuery(this).parent().siblings(".report-text").addClass("active");
    }); 
});
</script>


<div class="container">
    <div class="box">
        <div class="welcome-row">
            <div class="welcome-msg">
                <h4>Welcome <samp><?php echo $getuserdata->name?>!</samp> <span>CustomerID <?php echo $getuserdata->id?></span></h4>
            </div>
            <div class="profile-menu">
                <ul>
                    <li><a href="<?php echo SITE_URL.'user/productlist'; ?>" class="active">Your Products</a></li>
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
                    <li><a href="<?php echo SITE_URL.'user/edittemplate'.$templatedata->id ?>">Overview</a></li>
                     <li><a href="<?php echo SITE_URL.'user/modification/'.$templatedata->id ?>" >Modifications</a></li>
                     <li><a href="<?php echo SITE_URL.'user/reportbug/'.$templatedata->id ?>" class="active">Report Bug</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </div>
        </div>
        <div class="report-menu">
                <ul>
                    <li><a href="<?php echo SITE_URL.'user/reportbug/'.$templatedata->id ?>" >Request a Bug</a></li>
                    <li><a href="<?php echo SITE_URL.'user/modificationlist/'.$templatedata->id ?>" class="active">Previously Submitted<!-- <sup>2</sup> --></a></li>
                </ul>
          </div>
          
          <?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?>
            <div class="report-table">
               
                    <?php
                if(count($getbuglist)>0)
                { 
                    foreach($getbuglist as $getbuglist)
                    {

                    
                ?>
                 <div class="row">

                    <div class="col">Submission Id <strong>#<?php echo $getbuglist->id?></strong></div>
                    <div class="col2">Submission Subject <strong><?php echo $getbuglist->subject?></strong>    <a href="javascript:void(0)" class="submission">show this submission</a></div>
                    <div class="col3"><span class="green">Under Review</span></div>
                    <div class="report-text">
                        <h3><strong>Your Request</strong>   Submitted on <?php echo date('d M Y',strtotime(str_replace('-','/', $getbuglist->created_at)));?>     <span class="hide">hide</span></h3>
                        <p><?php echo $getbuglist->report_message?></p>
                        <!-- <h4>Our Response</h4>
                        <p>Buying the right telescope to take your love of astronomy to the next level is a big next step in the development of your passion for the stars. In many ways, it is a big step from someone who is just fooling around with astronomy to a serious student of the science. But you and I both know that there is still another big step after buying a telescope before you really know how to use it.</p> -->
                        
                    </div>
                     </div>
                    <?php 
                     }
                
                }
                else
                {
                    echo 'No record found..';

                }
                ?>
               
                
                
               
                
          </div>
    </div>
</div>






