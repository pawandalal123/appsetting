

<div class="container">
    <div class="box">
        <div class="account-process domain-ent">
            <div class="row first">
                <div class="box">
                    <div class="col-left">
                        <img src="<?php echo WEBROOT_PATH_IMAGES;?>img-domain.jpg" alt="">
                        <div class="price"><strong><?php echo $subscriptionData->price;?> <sup>$</sup></strong> / month</div>
                    </div>
                    <form method="post"> 
                    <div class="col-right">
                        <h3>Your Demo</h3>
                        <ul class="your-demo">
                            <li>
                                <strong>Website</strong>
                                <p>Your demo website is accesible at <a href="<?php echo SITE_URL?>website/viewdemo/<?php echo $gettempData->id?>" target="_blank">januka.3appcloud.com</a></p>
                            </li>
                            <li>
                                <strong>App</strong>
                                <p>Your demo app is accesible at <a href="#" class="previewtemp" id="<?php echo $gettempData->id?>">Apple AppStore</a></p>
                            </li>
                            <!--<li>
                                <input type="radio" id="test3" class="radio" name="radio-group"><label for="test3">Find me a domain</label>
                                <p>You will be required to pay now for this option</p>
                            </li>-->
                        </ul>
                       <!--  <a href="<?php echo SITE_URL?>website/subscription/<?php echo $gettempData->id?>" class="next-btn btn2">PAY</a> -->
                        <?php
                       if($subscriptionData!='')
                       {
                       ?>
                       <input type="submit" name="saveandpay" value="Pay" class="next-btn btn2">
                       <?php
                       }
                       ?>
                    </div>
                    </form>
                </div>
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

    $('.choosedomain').click(function()
    {
        var value = $(this).val();
        if(value==2)
        {
            modelboxsmall('')

        }

    })
})
</script>


