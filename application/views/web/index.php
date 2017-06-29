<script>
$(document).ready(function() {
$('.tab-content').hide().fadeIn();
    $('.tabnav a').bind('click', function(e){
        $('.tabnav li a.active').removeClass('active');
        $('.tab-content:visible').hide();
        $(this.hash).show();
        $(this).addClass('active');
        e.preventDefault();
    }).filter(':first').click();
    $('.tabnav a').bind('click', function(e){
        $(this.hash).hide().fadeIn().addClass('active');
	})
});

function maketempletelist(subcatid)
{
  $('#page_hide').show()
    modelbox('');
  $.post(WEBROOT_PATH+'user/gettempletes',{'subcatid':subcatid},function(data,status)
  {
    $('#page_hide').hide()
    
      $('.content').html(data);
  
  }).fail(function(response)
  {
                     $('#page_hide').hide()
                    });
}

function settemplete(templeteid)
{
    //alert('');
  
  $.post(WEBROOT_PATH+'user/settemplete',{'templeteid':templeteid},function(data,status)
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



    
    
   
    

<script>
$(document).ready(function(){
    $(".toggle-menu").click(function(){
        $(".navigation").slideToggle();
    });
});
</script>




<!--------------- showcase ---------------->
<div class="showcase">
  <img src="<?php echo WEBROOT_PATH_IMAGES;?>header-image.jpg" alt="">
    <div class="showcase-text">
      <div class="box">
         <h2>We are building digital experience <span>of the future, today.</span></h2>
             <a href="#">Show Me How</a>
        </div>
    </div>
</div>
<!--------------- showcase ---------------->

<!--------------- container ---------------->
<div class="container">
  <div class="box">
      <div class="our-template">
          <h3>OUR TEMPLATES</h3>
            <p>Mauris non tempor quam, et lacinia sapien. Mauris accumsan eros eget libero posuere vulputate. Etiam elit elit, elementum sed varius at, adipiscing vitae est..</p>
        </div>
        <?php 
        if(count($productArray)>0)
        {
        ?>
        <div class="tab">
          <div class="tabnav">
              <ul>
              <?php 
              foreach($productArray as $key=>$valArray)
              {
                ?>
                    <li><a href="#newest<?php echo $key;?>"><?php echo $key;?></a></li>
                    <?php } ?>
                </ul>
                <div class="search-box">
                	<input type="submit" value="search" class="search" />
                    <input type="text" placeholder="SEARCH" class="input2">
                </div>
                
            </div>
            <div class="tab-content" id="newest<?php echo $key;?>">
              <ul>
              <?php 
              foreach($valArray as $subcatid=>$templeteval)
              {
                ?>
             
                    <li>
                        <div class="imgbox">
                            <img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES.$templeteval['background_image']?>" alt="" style="width: 270px; height: 270px;">
                            <div class="overlay"><h4><?php echo $templeteval['temlete_name'];?></h4><span><?php echo $templeteval['tag_line'];?></span></div>
                        </div>
                        <a href="javascript::void(0);" <?php if($subcatid==1)  {?> onclick="maketempletelist('<?php echo $subcatid;?>')" <?php } ?>>Preview</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
           
        </div>
        <?php } ?>
    </div>
</div>