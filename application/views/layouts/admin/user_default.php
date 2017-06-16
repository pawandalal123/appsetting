<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<title><?php echo COMPANY_SIGNATURE;?></title>
<link href="<?php echo WEBROOT_PATH_CSS;?>styles.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>scripts.js"></script>
<script src="<?php echo WEBROOT_PATH_JS;?>jquery.min.js"></script>
<script src="<?php echo WEBROOT_PATH_JS;?>jquery.flexslider-min.js"></script>
</head>
<body>
<?php echo $this->load->view('/elements/user_header');?>
<section class="main-content clearfix">
<?php echo $this->load->view('/elements/user_left_sidebar');?>
<?php echo $this->load->view($view_file);?>
</section>
<?php echo $this->load->view('/elements/user_footer');?>
</body>
</html>

