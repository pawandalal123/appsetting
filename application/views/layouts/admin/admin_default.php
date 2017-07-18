<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> </html><![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8" />
<title><?php echo COMPANY_SIGNATURE;?></title>
<meta name="description" content="administrator" />
<meta name="author" content="pixelcave" />
<meta name="robots" content="noindex, nofollow" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0" />
<link rel="shortcut icon" href="<?php echo WEBROOT_PATH_IMAGES;?>favicon.ico" />

<link rel="stylesheet" href="<?php echo WEBROOT_PATH_ADMIN_CSS;?>bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo WEBROOT_PATH_ADMIN_CSS;?>plugins.css" />
<link rel="stylesheet" href="<?php echo WEBROOT_PATH_ADMIN_CSS;?>main.css" />
<link rel="stylesheet" href="<?php echo WEBROOT_PATH_ADMIN_CSS;?>themes.css" />
<script src="<?php echo WEBROOT_PATH_ADMIN_JS;?>jquery.min.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>websitecommon.js"></script>

<script>
var WEBROOT_PATH = '<?php echo SITE_URL; ?>';
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
<div id="page-container" class="sidebar-full">
<?php echo $this->load->view('/elements/admin/admin_left_sidebar');?>
<div id="main-container">
<?php echo $this->load->view('/elements/admin/admin_header');?>

<?php echo $this->load->view($view_file);?>
<?php //echo $this->load->view('/elements/admin/account_setting');?>

<?php echo $this->load->view('/elements/admin/admin_footer');?>
</div>
</div>

<script src="<?php echo WEBROOT_PATH_ADMIN_JS;?>vendor/bootstrap.min.js"></script>
<script src="<?php echo WEBROOT_PATH_ADMIN_JS;?>plugins.js"></script>
<script src="<?php echo WEBROOT_PATH_ADMIN_JS;?>app.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_ADMIN_CSS; ?>validationEngine.jquery.css" />
<script src="<?php echo WEBROOT_PATH_ADMIN_JS;?>vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>
<script src="<?php echo WEBROOT_PATH_ADMIN_JS;?>validation_engine/languages/jquery.validationEngine-en.js"></script>
<script src="<?php echo WEBROOT_PATH_ADMIN_JS;?>validation_engine/jquery.validationEngine.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo WEBROOT_PATH_ADMIN_JS; ?>custom_form_validation.js"></script>
<script src="<?php echo WEBROOT_PATH_ADMIN_JS;?>pages/tablesDatatables.js"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
<script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo WEBROOT_PATH_ADMIN_JS;?>vendor/jquery-1.11.0.min.js"%3E%3C/script%3E'));
</script>
<script src="<?php echo WEBROOT_PATH_ADMIN_JS;?>pages/readyInboxCompose.js"></script>
<script>
$(document).ready(function()
{
	$('body').on("click","#closemodel",function()
  {
      closemodel();
  });
	$(document).on('click','.makereply',function()
	{
		var messageid = $('input[name=messageid]').val();
		var message = $('#replymessage').val();
		var replyfor = $('input[name=replyfor]').val();
		if(message=='')
		{
			alert('Please enter message for reply.');

		}
		else
		{
			$.post(WEBROOT_PATH+'admin/savereply',{'messageid':messageid,'message':message,'replyfor':replyfor},function(data,status)
			{
				if(data=='success')
				{
					alert('done.');
					closemodel();

				}
				else
				{
					alert('error.');

				}

			}).fail(function(response)
			{
				alert('error.');

			});

		}

	});

});
$(function(){ ReadyInboxCompose.init(); });
function modelblock(header,body,size)
{
    closemodel();
    if(typeof(footer) == 'undefined'){
        footer = '';
    }
    if(typeof(size) == 'undefined'){
        size = 'small';
    }
   // $('#page_hide').show();
    var template = '<div id="modal-user-settings" class="modal" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header text-center"><button type="button" class="close" id="closemodel" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h2 class="modal-title">'+header+'</h2></div><div class="modal-body">'+body+'</div></div></div></div>';
    $('body').append(template);
     //$('#page_hide').hide();

}
function closemodel()
{
    $('#modal-user-settings').remove();
}
</script>
</body>
</html>
