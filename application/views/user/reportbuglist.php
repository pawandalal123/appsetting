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
                    <li><a href="<?php echo SITE_URL.'user/edittemplate'..$templatedata->id ?>">Overview</a></li>
                     <li><a href="<?php echo SITE_URL.'user/modification/'.$templatedata->id ?>" >Modifications</a></li>
                     <li><a href="<?php echo SITE_URL.'user/reportbug/'.$templatedata->id ?>" class="active">Report Bug</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </div>
        </div>
        <div class="report-menu">
                <ul>
                    <li><a href="<?php echo SITE_URL.'user/reportbug/'.$templatedata->id ?>" >Request a Bug</a></li>
                    <li><a href="<?php echo SITE_URL.'user/reportbuglist/'.$templatedata->id ?>" class="active">Previously Submitted<sup>2</sup></a></li>
                </ul>
          </div>
          
          <?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?>
            <div class="report-table">
                <div class="row">
                    <div class="col">Submission Id <strong>#345</strong></div>
                    <div class="col2">Submission Subject <strong>Add New Custom Page</strong>    <a href="javascript:void(0)" class="submission">show this submission</a></div>
                    <div class="col3"><span class="green">Under Review</span></div>
                    <div class="report-text">
                        <h3><strong>Your Request</strong>   Submitted on 04, Jun 2017     <span class="hide">hide</span></h3>
                        <p>The 2005 Toll-free Numbers in Television Advertising study, commissioned by 800response, concluded that 35 percent of all television commercials feature phone numbers, and 82 percent of those phone numbers are toll-free. Furthermore, 74 percent of the toll-free numbers in television ads use the 800 prefix. Of the 800 numbers, 61 percent are "vanity" numbers, meaning they spell out a word or company name.</p>
                        <h4>Our Response</h4>
                        <p>Buying the right telescope to take your love of astronomy to the next level is a big next step in the development of your passion for the stars. In many ways, it is a big step from someone who is just fooling around with astronomy to a serious student of the science. But you and I both know that there is still another big step after buying a telescope before you really know how to use it.</p>
                        <div class="btn-row2">
                            <h5>This Edit will be performed for $ 600</h5>
                            <a href="#" class="sky">Approve</a>
                            <a href="#" class="yellow">Submit More Info</a>
                            <a href="#" class="pink">Reject</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">Submission Id <strong>#345</strong></div>
                    <div class="col2">Submission Subject <strong>Add New Custom Page</strong>    <a href="javascript:void(0)" class="submission">show this submission</a></div>
                    <div class="col3"><span class="green">Bug Fixed</span></div>
                     <div class="report-text">
                        <h3><strong>Your Request</strong>   Submitted on 04, Jun 2017     <span class="hide">hide</span></h3>
                        <p>The 2005 Toll-free Numbers in Television Advertising study, commissioned by 800response, concluded that 35 percent of all television commercials feature phone numbers, and 82 percent of those phone numbers are toll-free. Furthermore, 74 percent of the toll-free numbers in television ads use the 800 prefix. Of the 800 numbers, 61 percent are "vanity" numbers, meaning they spell out a word or company name.</p>
                        <h4>Our Response</h4>
                        <p>Buying the right telescope to take your love of astronomy to the next level is a big next step in the development of your passion for the stars. In many ways, it is a big step from someone who is just fooling around with astronomy to a serious student of the science. But you and I both know that there is still another big step after buying a telescope before you really know how to use it.</p>
                        <div class="btn-row2">
                            <h5>This Edit will be performed for $ 600</h5>
                            <a href="#" class="sky">Approve</a>
                            <a href="#" class="yellow">Submit More Info</a>
                            <a href="#" class="pink">Reject</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">Submission Id <strong>#345</strong></div>
                    <div class="col2">Submission Subject <strong>Add New Custom Page</strong>    <a href="javascript:void(0)" class="submission">show this submission</a></div>
                    <div class="col3"><span class="red">Need more Info</span></div>
                     <div class="report-text">
                        <h3><strong>Your Request</strong>   Submitted on 04, Jun 2017     <span class="hide">hide</span></h3>
                        <p>The 2005 Toll-free Numbers in Television Advertising study, commissioned by 800response, concluded that 35 percent of all television commercials feature phone numbers, and 82 percent of those phone numbers are toll-free. Furthermore, 74 percent of the toll-free numbers in television ads use the 800 prefix. Of the 800 numbers, 61 percent are "vanity" numbers, meaning they spell out a word or company name.</p>
                        <h4>Our Response</h4>
                        <p>Buying the right telescope to take your love of astronomy to the next level is a big next step in the development of your passion for the stars. In many ways, it is a big step from someone who is just fooling around with astronomy to a serious student of the science. But you and I both know that there is still another big step after buying a telescope before you really know how to use it.</p>
                        <div class="btn-row2">
                            <h5>This Edit will be performed for $ 600</h5>
                            <a href="#" class="sky">Approve</a>
                            <a href="#" class="yellow">Submit More Info</a>
                            <a href="#" class="pink">Reject</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">Submission Id <strong>#345</strong></div>
                    <div class="col2">Submission Subject <strong>Add New Custom Page</strong>    <a href="javascript:void(0)" class="submission">show this submission</a></div>
                    <div class="col3"><span class="green">Not a Bug</span></div>
                     <div class="report-text">
                        <h3><strong>Your Request</strong>   Submitted on 04, Jun 2017     <span class="hide">hide</span></h3>
                        <p>The 2005 Toll-free Numbers in Television Advertising study, commissioned by 800response, concluded that 35 percent of all television commercials feature phone numbers, and 82 percent of those phone numbers are toll-free. Furthermore, 74 percent of the toll-free numbers in television ads use the 800 prefix. Of the 800 numbers, 61 percent are "vanity" numbers, meaning they spell out a word or company name.</p>
                        <h4>Our Response</h4>
                        <p>Buying the right telescope to take your love of astronomy to the next level is a big next step in the development of your passion for the stars. In many ways, it is a big step from someone who is just fooling around with astronomy to a serious student of the science. But you and I both know that there is still another big step after buying a telescope before you really know how to use it.</p>
                        <div class="btn-row2">
                            <h5>This Edit will be performed for $ 600</h5>
                            <a href="#" class="sky">Approve</a>
                            <a href="#" class="yellow">Submit More Info</a>
                            <a href="#" class="pink">Reject</a>
                        </div>
                    </div>
                </div>
                
          </div>
    </div>
</div>






