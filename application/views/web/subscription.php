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
            <h3>Your demo account expires on <span>20th March, 2017</span></h3>
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
                        <h4><?php echo $subscriptionData->plan_name;?></h4>
                        <div class="price"><strong><?php echo $subscriptionData->price;?> <sup>$</sup></strong> / month</div>
                        <p>Up to <?php echo $subscriptionData->max_installtion;?> Users <br/><?php echo substr($subscriptionData->description,0,100);?></p>
                        <a href="javascript::void(0);" class="makeorder" id="<?php echo $subscriptionData->id;?>">SELECT</a>
                    </div>
                </li>
        		<?php

        	}
        	?>
            	
                <!-- <li class="advance">
                	<div class="iner-box">
                        <h4>ADVANCE</h4>
                        <div class="price"><strong>35 <sup>$</sup></strong> / month</div>
                        <p>Up to 100 Users <br/>Other Factor</p>
                        <a href="#">SELECT</a>
                    </div>
                </li>
                <li class="superior">
                	<div class="iner-box">
                        <h4>SUPERIOR</h4>
                        <div class="price"><strong>49 <sup>$</sup></strong> / month</div>
                        <p>Up to 100 Users <br/>Other Factor</p>
                        <a href="#">SELECT</a>
                    </div>
                </li> -->
            </ul>
            <?php 
             } 
        ?>
        </div>
        </div>
        <!-- <div class="account-process" id="second">
        	<div class="change-package"><a href="#"> <  Change Package </a></div>
        	<div class="row first">
            	<div class="box">
                	<div class="col-left">
                    	<h4>BASIC</h4>
                        <div class="price"><strong>23 <sup>$</sup></strong> / month</div>
                        <p>Up to 100 Users <br/>Other Factor</p>
                    </div>
                    <div class="col-right">
                    	<div class="radio-box">
                    	<label><input type="radio" class="radio" name="radio"> DEFAULT INSTALLATION  ( + 1000 $ )</label>
                        <p><strong>This is a one time fee.</strong> Small description about installation, and how it makes their life easier, estimated time to do the installation. </p></div>
                        <div class="radio-box">
                        <label><input type="radio" class="radio" name="radio"> STANDALONE INSTALLATION  ( + 1000 $ )</label>
                        <p><strong>This is a one time fee.</strong> Small description about installation, and how it makes their life easier, estimated time to do the installation. </p></div>
                        <div class="total-amo">
                        	<h3>TOTAL AMOUNT</h3>
                            <h4>1023 $</h4>
                        </div>
                        <a href="#" class="next-btn">next</a>
                    </div>
                </div>
            </div>
            <div class="change-package"><a href="#"> <  Change Package </a></div>
            <div class="row second">
            	<div class="box">
                	<div class="col-left">
                    	<h4>BASIC</h4>
                        <div class="price"><strong>23 <sup>$</sup></strong> / month</div>
                        <p>Up to 100 Users <br/>Other Factor</p>
                    </div>
                    <div class="col-right">
                    	<div class="radio-box">
                    	<label><input type="radio" class="radio" name="radio"> DEFAULT INSTALLATION  ( + 1000 $ )</label>
                        <p><strong>This is a one time fee.</strong> Small description about installation, and how it makes their life easier, estimated time to do the installation. </p>
                        <div class="row">
                        	<label><input type="radio" class="radio"> Pay It Now</label>
                            <label><input type="radio" class="radio"> Pay It Now</label>
                        </div>
                        </div>
                        <div class="radio-box">
                        <label><input type="radio" class="radio" name="radio"> STANDALONE INSTALLATION  ( + 1000 $ )</label>
                        <p><strong>This is a one time fee.</strong> Small description about installation, and how it makes their life easier, estimated time to do the installation. </p></div>
                        <div class="total-amo">
                        	<h3>TOTAL AMOUNT</h3>
                            <h4>1023 $</h4>
                        </div>
                        <a href="#" class="next-btn">next</a>
                    </div>
                </div>
            </div>
            
            <div class="change-package"><a href="#"> <  Change Instllation Type </a></div>
            <div class="row third">
            	<div class="box">
                	<div class="col-left">
                    	<h4>BASIC</h4>
                        <div class="price"><strong>23 <sup>$</sup></strong> / month</div>
                        <p>Up to 100 Users <br/>Other Factor</p>
                        <p><strong>INSTALLATION  ( + 1000 $ )</strong> (Default - Pay it Now)</p>
                    </div>
                    <div class="col-right">
                    	<h2>YOUR ORDER</h2>
                    	<div class="radio-box">
                    	<label class="padd25"> DEFAULT INSTALLATION  ( + 1000 $ ) - PAY IT NOW</label>
                        <p><strong>This is a one time fee.</strong> Small description about installation, and how it makes their life easier, estimated time to do the installation. </p></div>
                    
                        <div class="total-amo">
                        	<h3>TOTAL AMOUNT</h3>
                            <h4>1023 $</h4>
                            <input type="text" class="coupan" placeholder="I Have A Coupon">
                        </div>
                        <a href="#" class="next-btn">next</a>
                    </div>
                </div>
            </div>
            
            <div class="change-package"><a href="#"> <  Change Instllation Type </a></div>
            <div class="row fourth">
            	<div class="box">
                	<div class="col-left">
                    	<h4>BASIC</h4>
                        <div class="price"><strong>23 <sup>$</sup></strong> / month</div>
                        <p>Up to 100 Users <br/>Other Factor</p>
                        <p><strong>INSTALLATION  ( + 1000 $ )</strong> (Default - Pay it Now)</p>
                    </div>
                    <div class="col-right">
                    	<h2>YOUR ORDER</h2>
                    	<div class="radio-box">
                    	<label class="padd25"> DEFAULT INSTALLATION  ( + 1000 $ ) - PAY IT NOW</label>
                        <p><strong>This is a one time fee.</strong> Small description about installation, and how it makes their life easier, estimated time to do the installation. </p></div>
                    
                        <div class="total-amo">
                        	<h3>TOTAL AMOUNT</h3>
                            <h4>1023 $</h4>
                            <input type="text" class="coupan apply">
                            <input type="submit" class="btn-apply" value="Apply">
                        </div>
                        <a href="#" class="next-btn">next</a>
                    </div>
                </div>
            </div>
            
            <div class="change-package"><a href="#"> <  Review Order </a></div>
            <div class="row fourth">
            	<div class="box">
                	<div class="col-left">
                    	<h4>BASIC</h4>
                        <div class="price"><strong>23 <sup>$</sup></strong> / month</div>
                        <p>Up to 100 Users <br/>Other Factor</p>
                        <p><strong>INSTALLATION  ( + 1000 $ )</strong> (Default - Pay it Now)<strong>15% OFF COUPON APPLIED</strong></p>
                        <a href="#" class="price-btn">1023 $</a>
                    </div>
                    <div class="col-right">
                    	<span class="credit-info">Your Credit card information is encryted</span>
                        <div class="payment-form">
                        	<div class="row2">
                                <label>Card Number</label>
                                <input class="input3 card" type="text" placeholder="0987 0912 1234 9876 1273">
                            </div>
                            <div class="row2">
                                <label>Name on Card</label>
                                <input class="input3 card" type="text" placeholder="Januka Wijesinghe">
                            </div>
                            <div class="row2">
                            	<div class="col">
                                    <label>Expires on</label>
                                    <input class="input3 card" type="text" placeholder="06 / 21">
                                </div>
                                <div class="col co2">
                                    <label>CVC</label>
                                    <input class="input3 card" type="text" placeholder="221">
                                </div>
                                <div class="select-payment">
                                	<span>or select other payment method</span> 
                                    <strong><img src="images/img-paypal.jpg"></strong>
                                </div>
                            </div>
                        </div>
                        
                        <a href="#" class="next-btn">PAY</a>
                    </div>
                </div>
            </div>
            
        </div> -->
        
       <!--  <div class="account-process" id="second">
        	<div class="change-package"><a href="#"> <  Change Package  </a></div>
        	<div class="row first">
            	<div class="box">
                	<div class="col-left">
                    	<h4>ADVANCE</h4>
                        <div class="price"><strong>35 <sup>$</sup></strong> / month</div>
                        <p>Up to 100 Users <br/>Other Factor</p>
                    </div>
                    <div class="col-right">
                    	<div class="radio-box">
                    	<label><input type="radio" class="radio" name="radio"> DEFAULT INSTALLATION  ( + 1000 $ )</label>
                        <p><strong>This is a one time fee.</strong> Small description about installation, and how it makes their life easier, estimated time to do the installation. </p></div>
                        <div class="radio-box">
                        <label><input type="radio" class="radio" name="radio"> STANDALONE INSTALLATION  ( + 1000 $ )</label>
                        <p><strong>This is a one time fee.</strong> Small description about installation, and how it makes their life easier, estimated time to do the installation. </p></div>
                        <div class="total-amo">
                        	<h3>TOTAL AMOUNT</h3>
                            <h4>1023 $</h4>
                        </div>
                        <a href="#" class="next-btn">next</a>
                    </div>
                </div>
            </div>
            <div class="change-package"><a href="#"> <  Change Package </a></div>
            <div class="row second">
            	<div class="box">
                	<div class="col-left">
                    	<h4>ADVANCE</h4>
                        <div class="price"><strong>35 <sup>$</sup></strong> / month</div>
                        <p>Up to 100 Users <br/>Other Factor</p>
                    </div>
                    <div class="col-right">
                    	<div class="radio-box">
                    	<label><input type="radio" class="radio" name="radio"> DEFAULT INSTALLATION  ( + 1000 $ )</label>
                        <p><strong>This is a one time fee.</strong> Small description about installation, and how it makes their life easier, estimated time to do the installation. </p>
                        <div class="row">
                        	<label><input type="radio" class="radio"> Pay It Now</label>
                            <label><input type="radio" class="radio"> Pay It Now</label>
                        </div>
                        </div>
                        <div class="radio-box">
                        <label><input type="radio" class="radio" name="radio"> STANDALONE INSTALLATION  ( + 1000 $ )</label>
                        <p><strong>This is a one time fee.</strong> Small description about installation, and how it makes their life easier, estimated time to do the installation. </p></div>
                        <div class="total-amo">
                        	<h3>TOTAL AMOUNT</h3>
                            <h4>1023 $</h4>
                        </div>
                        <a href="#" class="next-btn">next</a>
                    </div>
                </div>
            </div>
            
            <div class="change-package"><a href="#"> <  Change Instllation Type </a></div>
            <div class="row third">
            	<div class="box">
                	<div class="col-left">
                    	<h4>ADVANCE</h4>
                        <div class="price"><strong>35 <sup>$</sup></strong> / month</div>
                        <p>Up to 100 Users <br/>Other Factor</p>
                        <p><strong>INSTALLATION  ( + 1000 $ )</strong> (Default - Pay it Now)</p>
                    </div>
                    <div class="col-right">
                    	<h2>YOUR ORDER</h2>
                    	<div class="radio-box">
                    	<label class="padd25"> DEFAULT INSTALLATION  ( + 1000 $ ) - PAY IT NOW</label>
                        <p><strong>This is a one time fee.</strong> Small description about installation, and how it makes their life easier, estimated time to do the installation. </p></div>
                    
                        <div class="total-amo">
                        	<h3>TOTAL AMOUNT</h3>
                            <h4>1023 $</h4>
                            <input type="text" class="coupan" placeholder="I Have A Coupon">
                        </div>
                        <a href="#" class="next-btn">next</a>
                    </div>
                </div>
            </div>
            
            <div class="change-package"><a href="#"> <  Change Instllation Type </a></div>
            <div class="row fourth">
            	<div class="box">
                	<div class="col-left">
                    	<h4>ADVANCE</h4>
                        <div class="price"><strong>35 <sup>$</sup></strong> / month</div>
                        <p>Up to 100 Users <br/>Other Factor</p>
                        <p><strong>INSTALLATION  ( + 1000 $ )</strong> (Default - Pay it Now)</p>
                    </div>
                    <div class="col-right">
                    	<h2>YOUR ORDER</h2>
                    	<div class="radio-box">
                    	<label class="padd25"> DEFAULT INSTALLATION  ( + 1000 $ ) - PAY IT NOW</label>
                        <p><strong>This is a one time fee.</strong> Small description about installation, and how it makes their life easier, estimated time to do the installation. </p></div>
                    
                        <div class="total-amo">
                        	<h3>TOTAL AMOUNT</h3>
                            <h4>1023 $</h4>
                            <input type="text" class="coupan apply">
                            <input type="submit" class="btn-apply" value="Apply">
                        </div>
                        <a href="#" class="next-btn">next</a>
                    </div>
                </div>
            </div>
            
            <div class="change-package"><a href="#"> <  Review Order </a></div>
            <div class="row fourth">
            	<div class="box">
                	<div class="col-left">
                    	<h4>BASIC</h4>
                        <div class="price"><strong>23 <sup>$</sup></strong> / month</div>
                        <p>Up to 100 Users <br/>Other Factor</p>
                        <p><strong>INSTALLATION  ( + 1000 $ )</strong> (Default - Pay it Now)<strong>15% OFF COUPON APPLIED</strong></p>
                        <a href="#" class="price-btn">1023 $</a>
                    </div>
                    <div class="col-right">
                    	<span class="credit-info">Your Credit card information is encryted</span>
                        <div class="payment-form">
                        	<div class="row2">
                                <label>Card Number</label>
                                <input class="input3 card" type="text" placeholder="0987 0912 1234 9876 1273">
                            </div>
                            <div class="row2">
                                <label>Name on Card</label>
                                <input class="input3 card" type="text" placeholder="Januka Wijesinghe">
                            </div>
                            <div class="row2">
                            	<div class="col">
                                    <label>Expires on</label>
                                    <input class="input3 card" type="text" placeholder="06 / 21">
                                </div>
                                <div class="col co2">
                                    <label>CVC</label>
                                    <input class="input3 card" type="text" placeholder="221">
                                </div>
                                <div class="select-payment">
                                	<span>or select other payment method</span> 
                                    <strong><img src="images/img-paypal.jpg"></strong>
                                </div>
                            </div>
                        </div>
                        
                        <a href="#" class="next-btn">PAY</a>
                    </div>
                </div>
            </div>
            
        </div>
        
        <div class="account-process" id="third">
        	<div class="change-package"><a href="#"> <  Change Package </a></div>
        	<div class="row first">
            	<div class="box">
                	<div class="col-left">
                    	<h4>ADVANCE</h4>
                        <div class="price"><strong>49 <sup>$</sup></strong> / month</div>
                        <p>Up to 100 Users <br/>Other Factor</p>
                    </div>
                    <div class="col-right">
                    	<div class="radio-box">
                    	<label><input type="radio" class="radio" name="radio"> DEFAULT INSTALLATION  ( + 1000 $ )</label>
                        <p><strong>This is a one time fee.</strong> Small description about installation, and how it makes their life easier, estimated time to do the installation. </p></div>
                        <div class="radio-box">
                        <label><input type="radio" class="radio" name="radio"> STANDALONE INSTALLATION  ( + 1000 $ )</label>
                        <p><strong>This is a one time fee.</strong> Small description about installation, and how it makes their life easier, estimated time to do the installation. </p></div>
                        <div class="total-amo">
                        	<h3>TOTAL AMOUNT</h3>
                            <h4>1023 $</h4>
                        </div>
                        <a href="#" class="next-btn">next</a>
                    </div>
                </div>
            </div>
            <div class="change-package"><a href="#"> <  Change Package </a></div>
            <div class="row second">
            	<div class="box">
                	<div class="col-left">
                    	<h4>BASIC</h4>
                        <div class="price"><strong>49 <sup>$</sup></strong> / month</div>
                        <p>Up to 100 Users <br/>Other Factor</p>
                    </div>
                    <div class="col-right">
                    	<div class="radio-box">
                    	<label><input type="radio" class="radio" name="radio"> DEFAULT INSTALLATION  ( + 1000 $ )</label>
                        <p><strong>This is a one time fee.</strong> Small description about installation, and how it makes their life easier, estimated time to do the installation. </p>
                        <div class="row">
                        	<label><input type="radio" class="radio"> Pay It Now</label>
                            <label><input type="radio" class="radio"> Pay It Now</label>
                        </div>
                        </div>
                        <div class="radio-box">
                        <label><input type="radio" class="radio" name="radio"> STANDALONE INSTALLATION  ( + 1000 $ )</label>
                        <p><strong>This is a one time fee.</strong> Small description about installation, and how it makes their life easier, estimated time to do the installation. </p></div>
                        <div class="total-amo">
                        	<h3>TOTAL AMOUNT</h3>
                            <h4>1023 $</h4>
                        </div>
                        <a href="#" class="next-btn">next</a>
                    </div>
                </div>
            </div>
            
            <div class="change-package"><a href="#"> <  Change Instllation Type </a></div>
            <div class="row third">
            	<div class="box">
                	<div class="col-left">
                    	<h4>BASIC</h4>
                        <div class="price"><strong>49 <sup>$</sup></strong> / month</div>
                        <p>Up to 100 Users <br/>Other Factor</p>
                        <p><strong>INSTALLATION  ( + 1000 $ )</strong> (Default - Pay it Now)</p>
                    </div>
                    <div class="col-right">
                    	<h2>YOUR ORDER</h2>
                    	<div class="radio-box">
                    	<label class="padd25"> DEFAULT INSTALLATION  ( + 1000 $ ) - PAY IT NOW</label>
                        <p><strong>This is a one time fee.</strong> Small description about installation, and how it makes their life easier, estimated time to do the installation. </p></div>
                    
                        <div class="total-amo">
                        	<h3>TOTAL AMOUNT</h3>
                            <h4>1023 $</h4>
                            <input type="text" class="coupan" placeholder="I Have A Coupon">
                        </div>
                        <a href="#" class="next-btn">next</a>
                    </div>
                </div>
            </div>
            
            <div class="change-package"><a href="#"> <  Change Instllation Type </a></div>
            <div class="row fourth">
            	<div class="box">
                	<div class="col-left">
                    	<h4>BASIC</h4>
                        <div class="price"><strong>49 <sup>$</sup></strong> / month</div>
                        <p>Up to 100 Users <br/>Other Factor</p>
                        <p><strong>INSTALLATION  ( + 1000 $ )</strong> (Default - Pay it Now)</p>
                    </div>
                    <div class="col-right">
                    	<h2>YOUR ORDER</h2>
                    	<div class="radio-box">
                    	<label class="padd25"> DEFAULT INSTALLATION  ( + 1000 $ ) - PAY IT NOW</label>
                        <p><strong>This is a one time fee.</strong> Small description about installation, and how it makes their life easier, estimated time to do the installation. </p></div>
                    
                        <div class="total-amo">
                        	<h3>TOTAL AMOUNT</h3>
                            <h4>1023 $</h4>
                            <input type="text" class="coupan apply">
                            <input type="submit" class="btn-apply" value="Apply">
                        </div>
                        <a href="#" class="next-btn">next</a>
                    </div>
                </div>
            </div>
            
            <div class="change-package"><a href="#"> <  Review Order </a></div>
            <div class="row fourth">
            	<div class="box">
                	<div class="col-left">
                    	<h4>BASIC</h4>
                        <div class="price"><strong>23 <sup>$</sup></strong> / month</div>
                        <p>Up to 100 Users <br/>Other Factor</p>
                        <p><strong>INSTALLATION  ( + 1000 $ )</strong> (Default - Pay it Now)<strong>15% OFF COUPON APPLIED</strong></p>
                        <a href="#" class="price-btn">1023 $</a>
                    </div>
                    <div class="col-right">
                    	<span class="credit-info">Your Credit card information is encryted</span>
                        <div class="payment-form">
                        	<div class="row2">
                                <label>Card Number</label>
                                <input class="input3 card" type="text" placeholder="0987 0912 1234 9876 1273">
                            </div>
                            <div class="row2">
                                <label>Name on Card</label>
                                <input class="input3 card" type="text" placeholder="Januka Wijesinghe">
                            </div>
                            <div class="row2">
                            	<div class="col">
                                    <label>Expires on</label>
                                    <input class="input3 card" type="text" placeholder="06 / 21">
                                </div>
                                <div class="col co2">
                                    <label>CVC</label>
                                    <input class="input3 card" type="text" placeholder="221">
                                </div>
                                <div class="select-payment">
                                	<span>or select other payment method</span> 
                                    <strong><img src="images/img-paypal.jpg"></strong>
                                </div>
                            </div>
                        </div>
                        
                        <a href="#" class="next-btn">PAY</a>
                    </div>
                </div>
            </div>
            
        </div> -->
        
        
    </div>
</div>
