<?PHP date_default_timezone_set('Asia/Kolkata');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>landing page</title>
<!--------------- style css ---------------->

<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS;?>style.css" media="screen">
<!--------------- style css ---------------->

<!--------------- google font Lato ---------------->
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<!--------------- google font Lato ---------------->

<script type="text/javascript" src="http://www.shaadisaath.com/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>owl-crousel.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>websitecommon.js"></script>


</head>
<script>
var WEBROOT_PATH = '<?php echo SITE_URL; ?>';
	$(document).ready(function(){
    $(document).on('click','.close',function()
    {
        // $(".web-overlay2").fadeOut();
        $(".web-overlay2").remove()

    });
$(".sign-in").hover(function()
{
    var color = $('.hovercolor').val();
  $(this).css("background-color",color)
});
    
});
function modelbox(body)
{
    var template = '<div class="web-overlay2"><div class="inner-web"><div class="close"></div>'+
                   '<div class="content">'+body+'</div>'+
                '</div></div>';
                $(".web-overlay2").fadeIn();
                $(".web-overlay2").show();
                 $('body').append(template);
           
}
</script>
<style type="text/css">
	#page_hide{display:none;background:#000;position:fixed;left:0;top:0;width:100%;height:100%;opacity:.8;z-index:9999}
#page_hide img{position:fixed;top:50%;left:45%}
</style>
<body class="home">
<div id="page_hide">
<img src="<?php echo WEBROOT_PATH_IMAGES;?>AjaxLoader.gif"/>
		</div>
 <?php echo $this->load->view('/elements/headre');?>
 <?php echo $this->load->view($view_file);?> 
 <?php echo $this->load->view('/elements/footer');?> 
 
</body>
</html>