<?php
 $stateData= $this->common->selectAllState('state');
 $CategoryListData= $this->common->CategoryList();?>
<div class="mainContainer">
    <div class="topBanner clearfix container">
    <!-- left sidebar start -->
    <!-- left sidebar end -->
        	<!-- category start -->
         
 
   <div class="our_team_sub">
	<h1>Feedback</h1>
<div class="our_team_fix_main_sub">

<div class="feedback_left">
	<h3>IndiaBiztrade Feedback</h3>
    <p>Please use the form below to send us your comments and feedback. We appreciate you taking the
time to provide us with your views so that we can best meet the needs of users.</p>-

	<h3>IndiaBiztrade Feedback</h3>
    <p>Please use the form below to send us your comments and feedback. We appreciate you taking the
time to provide us with your views so that we can best meet the needs of users.</p>

	<h3>IndiaBiztrade Feedback</h3>
    <p>Please use the form below to send us your comments and feedback. We appreciate you taking the
time to provide us with your views so that we can best meet the needs of users.</p>

</div>

<div class="feedback_right">
	<h3>IndiaBiztrade Feedback</h3>
    
      <form id="form1" method="post" action="">
                      <li> <?php
				if($succ_msg)
				{
					echo $succ_msg;
				}
				?></li>

    <div class="feedback_right_box">
    	<p><span>*</span> Your Message:  ( <span>2000</span> Characters Remaining )</p>
        <textarea class="text_area" cols="50" rows="6" name="message"></textarea>
    </div>
    
    <h3>Your Contact Information</h3>
    
    <div class="feedback_right_box">
    	<div class="feedback_right_text">Full Name<span>*</span></div>
        <div class="feedback_right_text_box_right"><input type="text" placeholder="First Name" name="name" class="textfield_box" data-bvalidator="required"/></div>
    </div>
    
    <div class="feedback_right_box">
    	<div class="feedback_right_text">Company Name</div>
        <div class="feedback_right_text_box_right"><input type="text" placeholder="Company Name" name="companyname" class="textfield_box" data-bvalidator="required"/></div>
    </div>
    
    <div class="feedback_right_box">
    	<div class="feedback_right_text">Email Id<span>*</span></div>
        <div class="feedback_right_text_box_right"><input type="text" placeholder="Email Id" name="email" class="textfield_box" data-bvalidator="required"/></div>
    </div>
    
    <div class="feedback_right_box">
    	<div class="feedback_right_text">State<span>*</span></div>
         <div class="select select2">
                                <select  class="statelist" name="state">
                                   <?php foreach($stateData as  $state)
				{
					echo ' <option value='.$state->state_id.'>'.$state->state.'</option>';
				}
				?>
                                </select>
                            </div>
                            
                            
    </div>
    	<div class="feedback_right_text">City<span>*</span></div>
    <div class="select select3">
                                <select class="districList" name="city">
                <option selected>Select District</option>
                </select>
                            </div>
                          
    <div class="feedback_right_box">
    	<div class="feedback_right_text">Mobile Cell phone<span>*</span></div>
        <div class="feedback_right_text_box_right">
        <select class="select_box">
        	<option>113</option>
            <option>113</option>
            <option>113</option>
        </select>
        <input type="text" placeholder="Mobile Cell phone" name="mobile" class="textfield_box_2" /></div>
    </div>
    
    
    
    <div class="feedback_right_box">
    	<div class="submir_butoon"> <input name="submitFeedback" value="Submit" class="btn btn-blue" type="submit" /></div>
    </div>
    </form>
</div>

</div>

</div>
 </div></div>