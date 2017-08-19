

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
        
        <div class="account-process" id="first">
        	
            <!-- <div class="change-package"><a href="#"> <  Change Package </a></div>
            <div class="row second">
            	<div class="box">
                	<div class="col-left">
                    	<h4>BASIC</h4>
                        <div class="price"><strong><?php echo $plan_data->price;?> <sup>$</sup></strong> / month</div>
                        <p>Up to 100 Users <br/>Other Factor</p>
                    </div>
                    <div class="col-right">
                    <?php if($plan_data->default_installation_price)
                    {  
                        ?>
                        <div class="radio-box">
                        <label>
                        <input type="radio" class="radio" name="installtiontype" value="1" <?php if($payments->installtion_type==1) {  echo 'checked';} ?>> DEFAULT INSTALLATION  ( + <?php echo $plan_data->default_installation_price?> $ )</label>
                        <p><strong>This is a one time fee.</strong> Small description about installation, and how it makes their life easier, estimated time to do the installation. </p>
                    
                        </div>
                        <?php } ?>
                    	
                        <div class="radio-box">
                        <label><input type="radio" class="radio" name="installtiontype" value="2" <?php if($payments->installtion_type==2) {  echo 'checked';} ?>> STANDALONE INSTALLATION  ( + <?php echo $plan_data->standerd_price?> $ )</label>
                        <p><strong>This is a one time fee.</strong> Small description about installation, and how it makes their life easier, estimated time to do the installation. </p></div>
                        <div class="total-amo">
                        	<h3>TOTAL AMOUNT</h3>
                            <?php 
                            $price = $plan_data->price;
                            if($payments->installtion_type==1)
                            {
                                $price+= $plan_data->default_installation_price;

                            }
                            if($payments->installtion_type==2)
                            {
                                $price+= $plan_data->standerd_price;

                            }
                            ?>
                            <h4><?php echo $price;?> $</h4>
                        </div>
                        <a href="#" class="next-btn">next</a>
                    </div>
                </div>
            </div> -->
            
          <!--   <div class="change-package"><a href="<?php echo SITE_URL.'website/subscription/'.$payments->app_id;?>"> <  Change Instllation Type </a></div>
            <div class="row third">
            	<div class="box">
                	<div class="col-left">
                    	<h4>BASIC</h4>
                        <div class="price"><strong><?php echo $plan_data->price;?> <sup>$</sup></strong> / month</div>
                        <p>Up to <?php echo $plan_data->max_installtion;?> Users <br/>Other Factor</p>
                        <p><strong>INSTALLATION  ( + <?php echo $plan_data->default_installation_price?> $ )</strong> (Default - Pay it Now)</p>
                    </div>
                    <div class="col-right">
                    	<h2>YOUR ORDER</h2>
                    	<div class="radio-box">
                    	<label class="padd25"> DEFAULT INSTALLATION  ( + <?php echo $plan_data->default_installation_price?> $ ) - PAY IT NOW</label>
                        <p><strong>This is a one time fee.</strong> Small description about installation, and how it makes their life easier, estimated time to do the installation. </p></div>
                    
                        <div class="total-amo">
                        	<h3>TOTAL AMOUNT</h3>
                            <h4><?php echo $plan_data->price+$plan_data->default_installation_price; ?>$</h4>
                            <input type="text" class="coupan" placeholder="I Have A Coupon">
                        </div>
                        <a href="<?php echo SITE_URL.'website/makepayment/'.$payments->id?>" class="next-btn">next</a>
                    </div>
                </div>
            </div> -->
            
           <!--  <div class="change-package"><a href="#"> <  Change Instllation Type </a></div>
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
            </div> -->
            
            <div class="change-package"><a href="<?php echo SITE_URL.'website/checkout/'.$payments->id;?>"> <  Review Order </a></div>
            <div class="row fourth">
            	<div class="box">
                	<div class="col-left">
                    	<h4>BASIC</h4>
                        <div class="price"><strong><?php echo $plan_data->price;?>  <sup>$</sup></strong> / month</div>
                        <p>Up to <?php echo $plan_data->max_installtion;?> Users <br/>Other Factor</p>
                        <p><strong>INSTALLATION  ( + <?php echo $plan_data->default_installation_price; ?> $ )</strong> (Default - Pay it Now)<strong>15% OFF COUPON APPLIED</strong></p>
                        <a href="#" class="price-btn"><?php echo $plan_data->price+$plan_data->default_installation_price; ?> $</a>
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
        
      
        
        
    </div>
</div>


