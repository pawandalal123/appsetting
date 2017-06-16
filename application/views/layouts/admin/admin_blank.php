<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> </html><![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8" />
<title>ProUI - Responsive Admin Dashboard Template | DEMO</title>
<meta name="description" content="ProUI is a Responsive Admin Dashboard Template created by pixelcave and published on Themeforest. This is the demo of ProUI! You need to purchase a license for legal use!" />
<meta name="author" content="pixelcave" />
<meta name="robots" content="noindex, nofollow" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0" />

<link rel="stylesheet" href="<?php echo WEBROOT_PATH_ADMIN_CSS;?>bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo WEBROOT_PATH_ADMIN_CSS;?>plugins.css" />
<link rel="stylesheet" href="<?php echo WEBROOT_PATH_ADMIN_CSS;?>main.css" />
<link rel="stylesheet" href="<?php echo WEBROOT_PATH_ADMIN_CSS;?>themes.css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_ADMIN_CSS; ?>validationEngine.jquery.css" />
<script src="<?php echo WEBROOT_PATH_ADMIN_JS;?>vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
<div id="page-container" class="sidebar-full">


<?php echo $this->load->view($view_file);?>


<script src="<?php echo WEBROOT_PATH_ADMIN_JS;?>jquery.min.js"></script>
<script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo WEBROOT_PATH_ADMIN_JS;?>admin/vendor/jquery-1.11.0.min.js"%3E%3C/script%3E'));
</script>
<script src="<?php echo WEBROOT_PATH_ADMIN_JS;?>vendor/bootstrap.min.js"></script>
<script src="<?php echo WEBROOT_PATH_ADMIN_JS;?>plugins.js"></script>
<script src="<?php echo WEBROOT_PATH_ADMIN_JS;?>app.js"></script>
<script src="<?php echo WEBROOT_PATH_ADMIN_JS;?>pages/login.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo WEBROOT_PATH_ADMIN_JS; ?>validation_engine/jquery.validationEngine.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo WEBROOT_PATH_ADMIN_JS; ?>validation_engine/languages/jquery.validationEngine-en.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo WEBROOT_PATH_ADMIN_JS; ?>custom_form_validation.js"></script>

</body>
</html>
