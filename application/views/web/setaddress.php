
<script>
$(document).ready(function(){ 
	$('select.select-c').each(function(){
		var title = $(this).attr('title');
		if( $('option:selected', this).val() != ''  ) title = $('option:selected',this).text();
		$(this)
		.css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
		.after('<span class="select-c">' + title + '</span>')
		.change(function(){
			val = $('option:selected',this).text();
			$(this).next().text(val);
		})
	});
});
</script>





<div class="container">
  <div class="box">
    <div class="preview-form">
      <h2>Get a free preview with your content</h2>
      <ul>
         <li><a href="<?php echo SITE_URL?>user/setcolor/<?php echo $gettempData->id; ?>" class="active next">1</a></li>
                <li><a href="<?php echo SITE_URL?>user/settags/<?php echo $gettempData->id; ?>" class="next">2</a></li>
                <li><a href="<?php echo SITE_URL?>user/setimage/<?php echo $gettempData->id; ?>" class="next">3</a></li>
                <li><a href="<?php echo SITE_URL?>user/setaddress/<?php echo $gettempData->id; ?>"  class="active">4</a></li>
       
        <li><a href="<?php echo SITE_URL?>user/preview/<?php echo $gettempData->id; ?>" >5</a></li>
      </ul>
      <h3>Enter the Church Details</h3>
      <span>Your Church Name and Address is how others can identify your Church</span> </div>
    <div class="column">
      <div class="customize">
        <div class="crousal1">         
                    <div class="divine">
                    <div class="imgbox">
                    <img class="templeteimgclass" src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES.$gettempData->background_image;?>" alt="">
                    <div class="overlay-chuch">
                      <h3 class="templetename"><?php echo $gettempData->temlete_name;?></h3>
                        <p class="templetetag"><?php echo $gettempData->tag_line;?></p>
                        <div class="btn-bott">
                        <a href="#" class="sign-in" style="background: <?php echo $gettempData->color_code; ?>!important; ">Sign In</a>
                        <a href="#" class="sign-in-second" style="color: <?php echo $gettempData->color_code; ?>!important; ">Sign Up</a>
                         </div>
                        <input type="hidden" class="hovercolor" name="colorhover" value="<?php echo $gettempData->color_code_hover; ?>">
                    </div>
                        
                    </div>
                    </div>
             

                    </div>
                    <form accept="" method="post">
        <div class="form-c">
		<div class="row">
			<label>Church Name</label>
			<input type="text" class="input-m" placeholder="Enter the Church Name" name="church_name" value="<?php echo  @$gettempData->temlete_name ? @$gettempData->temlete_name : set_value('church_name');?>" readonly> 
      <?php echo form_error('church_name');?>
		</div>
		<div class="row">
			<label>Address Line 1</label>
			<input type="text" class="input-m" placeholder="Enter Address" name="address1" value="<?php echo  @$gettempData->address1 ? @$gettempData->address1 : set_value('address1');?>">
      <?php echo form_error('address1');?>
		</div>
		<div class="row">
			<label>Address Line 2</label>
			<input type="text" class="input-m" name="address2" value="<?php echo  @$gettempData->address2 ? @$gettempData->address2 : set_value('address2');?>">
      <?php echo form_error('address2');?>
		</div>
		<div class="row">
			<label>Country</label>
			<div class="style-select">
				<select name="country" class="select-c countries">
				<option>Select country</option>
					<?php
					foreach($countrylist as $country)
					{
						$selected='';
						if(@$gettempData->country==$country->name)
						{
							$selected='selected';

						}
						echo '<option value='.$country->name.' '.$selected.' id='.$country->id.'>'.$country->name.'</option>';
					} 
					?>
				</select>
			</div>
		</div>
		<div class="row">
			<label>State/Providence/Region</label>
			<div class="style-select">
				<select name="state" class="select-c states">
					<option>Select state</option>
					<?php
					foreach($getstatelist as $getstatelist)
					{
						$selected='';
						if(@$gettempData->state==$getstatelist->name)
						{
							$selected='selected';

						}
						echo '<option value='.$getstatelist->name.' '.$selected.'>'.$getstatelist->name.'</option>';
					} 
					?>
				</select>
			</div>
		</div>
		<div class="row">
			<label>City/Down</label>
			<input type="text" class="input-m" name="city" value="<?php echo  @$gettempData->city ? @$gettempData->city : set_value('city');?>">
		</div>
		<div class="row">
			<label>Postal Code</label>
			<input type="text" class="input-m" placeholder="Enter Postal Code" name="pin" value="<?php echo  @$gettempData->pin ? @$gettempData->pin : set_value('pin');?>">
      <?php echo form_error('pin');?>
		</div>
	</div>
      </div>
      <div class="btn-row">
        <input class="save-exit" type="submit" name="savenext" value="Save And Exit">
         <input class="save-exit" type="submit" name="savedetails" value="Next">
                 <!--  <a href="<?php echo SITE_URL;?>user/preview/<?php echo $gettempData->id;?>" class="save-exit">Next</a> -->
                  </div>
    </div>
    </form>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function()
{
	$('.countries').change(function()
	{
		var country =$(this).find('option:selected').attr('id');
		if(country!='')
		{
			//alert(country);
			getStates(country);
		}
		else
		{
			$(".states option:gt(0)").remove();
		}

	});

});
  function getStates(id)
  {
  	$(".states option:gt(0)").remove();
    $('.states').find("option:eq(0)").html("Please wait..");
    $.getJSON(WEBROOT_PATH+'user/getstate',{'country':id},function(data,status)
    {
    	$('.states').find("option:eq(0)").html("Select State");
    	if(data.status=='success')
    	{
    		$.each(data.result,function(key,val)
    		{
    				var option=$('<option />');
    				option.attr('value',val).text(val);
    				$('.states').append(option);});
    		        $(".states").prop("disabled",false);
    	}
    	else
    	{
    		alert(data.msg);
    	}

    }).fail(function(response) {
            //alert('Error: ' + response.responseText);
            alert('Some Technical Issue');
            });
};
	
</script>

