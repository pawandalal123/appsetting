<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />
       
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<style type="text/css">
  .selectedtemplate
  {
    background-color: #3ec6ff;
  }
</style>
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

    $(document).on('click','.templateselect',function()
    {
      var templeteid = $(this).attr('id');
      $('.item').removeClass('selectedtemplate');
       $(this).addClass('selectedtemplate');
       $('input[name=selectedtemplate]').val(templeteid);

    });
    $( "#makesubcatlist" ).autocomplete({
      source: WEBROOT_PATH+'commonfunc/getsubcatlist',
      minlength: 1,
      select: function( event, ui )
      {
       
        var subcatid = ui.item.id;
        $.post(WEBROOT_PATH+'commonfunc/searchlist',{'searhval':subcatid},function(data,status)
          {

            $('.searchresult').html(data);
            $('.tabshowhide').hide();
            $('.tabnav ui li').removeClass('active');
            
          }).fail(function(response)
           {
              alert('please try later');
          });
      }
      });

    
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
    var templeteid = $('input[name=selectedtemplate]').val();
    if(templeteid!='')
    {
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
    else
    {
      alert('Please select template');
    }


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
        <div class="tab tablist">
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
                    <input type="text" placeholder="SEARCH" class="input2" id="makesubcatlist" autocomplete="off">
                </div>
                
            </div>
            
            <?php 

              foreach($productArray as $key=>$valArray)
              {
                ?>
           
            <div class="tab-content tabshowhide" id="newest<?php echo $key;?>">
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
            <?php } ?>
            <div class="searchresult">

              
            </div>
            </div>

           
        
        <?php } ?>
         
    </div>
</div>