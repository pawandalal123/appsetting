<script>
$(document).ready(function() {
	$(".account-process").hide();
	$("#first").show();
	$(".account-step li.basic").click(function(){
    	$("#first").show();
		$("#second").hide();
		$("#third").hide();
	});
	$(".account-step li.advance").click(function(){
    	$("#second").show();
		$("#first").hide();
		$("#third").hide();
	});
	$(".account-step li.superior").click(function(){
		$("#third").show();
    	$("#second").hide();
		$("#first").hide();
	});
	$(".account-step li").click(function(){
		$(".account-step li").removeClass("active");
    	$(this).addClass("active");
	});

	$('.makeorder').click(function()
	{
		$('#page_hide').show();
		var obj = {};
		obj['app_id'] = $('input[name=app_id]').val();
		obj['plan_id'] = $(this).attr('id');
		$.post(WEBROOT_PATH+'website/makesubscription',obj,function(data,status)
          {
          	$('#page_hide').hide();
          	if(data.response.bookingstatus=='success')
          	{
          		var paymentid = data.response.payment_id;
          		window.location.href=WEBROOT_PATH+'website/checkout/'+paymentid;

          	}
          	else
          	{
          		$('#page_hide').hide();
                 alert('please try later');

          	}
            
          },'json').fail(function(response)
           {
           	$('#page_hide').hide();
              alert('please try later');
          });

	});
});
	
</script>
<div class="container">
	<div class="box">
    <!-- 	<div class="welcome-mess">Welcome <span>Januka!</span></div>
        <div class="account-nav">
        	<ul>
            	<li><a href="#">Your Products</a></li>
                <li><a href="#" class="active">Your Subscription</a></li>
            </ul>
        </div> -->
        <div class="account-title">
        	<h2>Choose Your Subscription</h2>
            <!-- <h3>Your demo account expires on <span>20th March, 2017</span></h3> -->
        </div>
        
        <div class="account-step">
        <div class="box">
        <input type="hidden" name="app_id" value="<?php echo $gettempData->id;?>">
        <?php
        if(count($subscriptionData)>0)
        {

       ?>
        	<ul>
        	<?php
        	foreach($subscriptionData as $subscriptionData)
        	{
        		?>
        		<li class="basic active">
                    <div class="iner-box">
                        <!-- <div class="divine">
                    <div class="imgbox"> -->
                    <img class="templeteimgclass" src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES.$gettempData->background_image;?>" alt="" style="width: 287px; height: 200px;">
                    <!-- </div>
                    </div> -->
                    <div class="price"><strong><?php echo $subscriptionData->price;?> <sup>$</sup></strong> / month</div>
                    
                        <a href="javascript::void(0);" class="makeorder" id="<?php echo $subscriptionData->id;?>">SELECT</a>
                    </div>
                </li>
        		<?php

        	}
        	?>
            	
               
            </ul>
            <?php 
             } 
        ?>
        </div>
        </div>
        
        
        
    </div>
</div>
