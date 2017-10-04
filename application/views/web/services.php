
<script>
$(document).ready(function(){
  $("select.select").each(function() {
        var e = $(this).attr("title");
        if ($("option:selected", this).val() != "") e = $("option:selected", this).text();
        $(this).css({
            "z-index": 10,
            opacity: 0,
            "-khtml-appearance": "none"
        }).after('<span class="select">' + e + "</span>").change(function() {
            val = $("option:selected", this).text();
            $(this).next().text(val)
        })
    })

  $(document).on('change','.changesubcat',function()
  {
    var subcatid = $(this).val();
    window.location.href=WEBROOT_PATH+'services/'+subcatid;

  });
});
function settempletesubcat(subcatid)
{
    //alert('');

       $.post(WEBROOT_PATH+'user/settempletesubcat',{'subcatid':subcatid},function(data,status)
        {
          
           if(data.status=='success')
           {
              if(data.islogin=='yes')
              {
                  //alert();
                  window.location.href=WEBROOT_PATH+'user/setcolor/'+data.temoleteid;

              }
              else
              {
                  //alert('pawan');
                  window.location.href=WEBROOT_PATH+'userlogin/login';
              }

           }
        
        },'json').fail(function(response)
        {
                          
                          });

   

}
</script>
<!--------------- showcase ---------------->
<div class="showcase service-show">
	<img src="<?php echo WEBROOT_PATH_IMAGES;?>showcase-service.jpg" alt="">
    <div class="outer-box">
        <div class="showcase-text">
            <div class="box">
                 <h2>Data infrastucture <span>for the Internet of Things</span></h2>
                 <p>Iobeam makes it easy to collect, sotre, analyze and build on top of your data.</p>
                 <ul>
                 	<li><img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-service1.png" alt=""><span>GYM</span><strong class="line"></strong></li>
                    <li><img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-service2.png" alt=""><span>CHURCH</span><strong class="line"></strong></li>
                    <li><img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-service3.png" alt=""><span>FITNESS</span><strong class="line"></strong></li>
                    <li><img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-service4.png" alt=""><span>COOKING</span><strong class="line"></strong></li>
                    <li><img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-service5.png" alt=""><span>SALON</span><strong class="line"></strong></li>
                 </ul>
            </div>
        </div>
    </div>
</div>
<!--------------- showcase ---------------->
<!--------------- container ---------------->
<div class="container">
	<div class="box">
    	<div class="app-cloud2">
        	<div class="leftdotted"></div>
            <div class="rightdotted"></div>
        	<div class="three-appcloud">
                <img src="<?php echo WEBROOT_PATH_IMAGES;?>3appcloud.png" alt="">
            </div>
             <div class="core-services padd">
                    <div class="col">
                        <img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-one.png" alt="">
                        <h4>MOBILE</h4>
                        <p>Lorem ipsum dolor sit amet, te usu alii scripta, at tollit tibique. </p>
                    </div>
                    <div class="col">
                        <img src="<?php echo WEBROOT_PATH_IMAGES;?>ico-two.png" alt="">
                        <h4 class="web">WEBSITE</h4>
                        <p>Lorem ipsum dolor sit amet, te usu alii scripta, at tollit tibique. </p>
                    </div>
                    <div class="col">
                        <img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-three.png" alt="">
                        <h4>HOSTING</h4>
                        <p>Lorem ipsum dolor sit amet, te usu alii scripta, at tollit tibique. </p>
                    </div>
            </div>
        </div>
        <div class="research-text">
        	<p>Research in advertising is done in order to produce better advertisements that are more efficient in motivating customers to buy a product or a service. </p>
        </div>
        <div class="account-step servic2">
        	<h3>Payment Plans</h3>
            <div class="editing">
            	<label>Displaying Prices For</label>
                <div class="select-box">
                <select class="select changesubcat">
                <?php
                if(count($subcatdata)>0)
                {
                    foreach ($subcatdata as $subcatdata)
                     {
                        ?>
                        <option value="<?php echo $subcatdata->id;?>" <?php if($subcatdata->id==$idtomatch) echo 'selected' ?>><?php echo $subcatdata->name;?></option>
                        <?php
                    }

                } 
                ?>
                </select>
                </div>
            </div>
            <?php 
            if($planlist)
            {
                ?>
        	<ul>
            <!-- <input type="hidden" name="selectedtemplate" value="<?php echo $template_id;?>"> -->
           
            	<li class="basic">
                    <div class="iner-box">
                        <h4><?php echo $planlist->name;?></h4>
                        <div class="price"><strong><?php echo $planlist->price;?> <sup>$</sup></strong> / month</div>
                        <p>Up to <?php echo $planlist->max_users?> Users <br/>Other Factor</p>
                        <a href="#" onclick="settempletesubcat(<?php echo $planlist->id;?>)">SELECT</a>
                    </div>
                </li>
                
      
            </ul>
            <?php 
        }
            ?>
            <div class="textbox">
            	<p>I have been questioned by many people to disclose some of the greatest traffic generating techniques that I know of. I am not to immediate to reveal them because I know the majority doesn't even take battle on them. All I know is that they work and you should be familiar with this too.</p>
            </div>
        </div>
    </div>
</div>
<!--------------- container ---------------->