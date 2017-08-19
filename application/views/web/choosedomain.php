

<div class="container">
    <div class="box">
        <div class="account-process domain-ent">
            <div class="row first">
                <div class="box">
                    <div class="col-left">
                        <img src="<?php echo WEBROOT_PATH_IMAGES;?>img-domain.jpg" alt="">
                        <div class="price"><strong><?php echo $subscriptionData->price;?> <sup>$</sup></strong> / month</div>
                    </div>
                    <div class="col-right">
                        <h2>Please Enter a Domain</h2>
                        <form method="post">
                         <!-- <a href="javascript::void(0);" class="makeorder" id="<?php echo $subscriptionData->id;?>"> -->
                         <input type="hidden"  name="subscriptionplan" value="<?php echo $subscriptionData->id;?>">
                        <ul>
                            <li>
                                <input type="radio" id="test1" checked class="radio" name="choosedomain" value="1"><label for="test1"> <input type="text" name="subdomainname" value="demo<?php echo $gettempData->id?>">3appcloud.com
                                <?php 
                                echo form_error('subdomainname');
                                ?>
                                </label>
                                
                                <p>This will be the domain when you convert to a paying customer.Your demo site is 
                                <a href="<?php echo SITE_URL?>website/demopage/<?php echo $gettempData->id?>">here</a></p>
                            </li>
                            <li>
                                <input type="radio" id="test2" class="radio" name="choosedomain" value="2">
                                <label for="test2">I have my oen domain </label>
                                <p>You need to change your name servers to point to our servie.
                                 <a href="#" class="choosedomain">Find Out How</a>.</p>
                            </li>
                            <!--<li>
                                <input type="radio" id="test3" class="radio" name="radio-group"><label for="test3">Find me a domain</label>
                                <p>You will be required to pay now for this option</p>
                            </li>-->
                        </ul>
                        <a href="<?php echo SITE_URL?>website/demopage/<?php echo $gettempData->id?>" class="next-btn" style="margin-right: 180px;" >View Demo</a>
                       <!--  <a href="<?php echo SITE_URL?>website/subscription/<?php echo $gettempData->id?>" class="next-btn btn2">PAY</a> -->
                       <?php
                       if($subscriptionData!='')
                       {
                       ?>
                       <input type="submit" name="saveandpay" value="Pay" class="next-btn btn2">
                       <?php
                       }
                       ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function()
{
    $('.choosedomain').click(function()
    {
       
            modelboxsmall('')

        

    })
})
</script>


