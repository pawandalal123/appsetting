<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>landing page</title>
<!--------------- style css ---------------->

<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_SITE_CSS;?>style.css" media="screen">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700" rel="stylesheet">
<!--------------- style css ---------------->

<!--------------- google font Lato ---------------->
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<!--------------- google font Lato ---------------->

<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>jquery.min.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>websitecommon.js"></script>
<style type="text/css">
	
</style>

</head>
<script>
var WEBROOT_PATH = '<?php echo SITE_URL; ?>';
	$(document).ready(function(){
    $(document).on('click','.close',function()
    {
        $(".web-overlay2").remove()
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
function modelboxsmall(body)
{
    var template = '<div class="web-overlay2 small"><div class="inner-web"><div class="close"></div>'+
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
<body>
<div id="page_hide">
<img src="<?php echo WEBROOT_PATH_IMAGES;?>AjaxLoader.gif"/>
		</div>
 
 <div class="mainclass">
 <?php echo $this->load->view('/elements/website/commonheader');?>
 <?php echo $this->load->view($view_file);?> 
 <?php echo $this->load->view('/elements/website/commonfooter');?> 
 </div>
 
</body>
</html>