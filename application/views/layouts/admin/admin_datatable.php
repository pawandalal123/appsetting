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
<link rel="apple-touch-icon" href="<?php echo WEBROOT_PATH_IMAGES;?>icon57.png" sizes="57x57" />
<link rel="apple-touch-icon" href="<?php echo WEBROOT_PATH_IMAGES;?>icon72.png" sizes="72x72" />
<link rel="apple-touch-icon" href="<?php echo WEBROOT_PATH_IMAGES;?>icon76.png" sizes="76x76" />
<link rel="apple-touch-icon" href="<?php echo WEBROOT_PATH_IMAGES;?>icon114.png" sizes="114x114" />
<link rel="apple-touch-icon" href="<?php echo WEBROOT_PATH_IMAGES;?>icon120.png" sizes="120x120" />
<link rel="apple-touch-icon" href="<?php echo WEBROOT_PATH_IMAGES;?>icon144.png" sizes="144x144" />
<link rel="apple-touch-icon" href="<?php echo WEBROOT_PATH_IMAGES;?>icon152.png" sizes="152x152" />
<link rel="stylesheet" href="<?php echo WEBROOT_PATH_CSS;?>bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo WEBROOT_PATH_CSS;?>plugins.css" />
<link rel="stylesheet" href="<?php echo WEBROOT_PATH_CSS;?>main.css" />
<link rel="stylesheet" href="<?php echo WEBROOT_PATH_CSS;?>themes.css" />
<link rel="stylesheet" href="<?php echo WEBROOT_PATH_ADMIN_CSS;?>jquery.dataTables_themeroller.css" />
<link rel="stylesheet" href="<?php echo WEBROOT_PATH_ADMIN_CSS;?>demo_table.css" />
<script src="<?php echo WEBROOT_PATH_JS;?>jquery.min.js"></script>
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
<?php echo $this->load->view('/elements/admin/account_setting');?>
<?php echo $this->load->view('/elements/admin/profile');?>
<?php echo $this->load->view('/elements/admin/change_pic');?>
<?php echo $this->load->view('/elements/admin/admin_footer');?>
</div>
</div>


<script src="<?php echo WEBROOT_PATH_JS;?>vendor/bootstrap.min.js"></script>
<script src="<?php echo WEBROOT_PATH_JS;?>plugins.js"></script>
<script src="<?php echo WEBROOT_PATH_JS;?>app.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS; ?>validationEngine.jquery.css" />
<script src="<?php echo WEBROOT_PATH_JS;?>vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>
<script src="<?php echo WEBROOT_PATH_JS;?>validation_engine/languages/jquery.validationEngine-en.js"></script>
<script src="<?php echo WEBROOT_PATH_JS;?>validation_engine/jquery.validationEngine.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo WEBROOT_PATH_JS; ?>custom_form_validation.js"></script>
<script src="<?php echo WEBROOT_PATH_ADMIN_JS;?>media/jquery.dataTables.js"></script>

<script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo WEBROOT_PATH_JS;?>vendor/jquery-1.11.0.min.js"%3E%3C/script%3E'));
</script>
<script src="<?php echo WEBROOT_PATH_JS;?>pages/readyInboxCompose.js"></script>
<script>$(function(){ ReadyInboxCompose.init(); });</script>
</body>
</html>
