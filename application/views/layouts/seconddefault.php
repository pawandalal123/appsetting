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

<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>jquery.min.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS;?>owl-crousel.js"></script>

</head>
<script>
var WEBROOT_PATH = '<?php echo SITE_URL; ?>';
</script>
<body>

 <?php echo $this->load->view('/elements/headre');?>
 <?php echo $this->load->view($view_file);?> 
 <?php echo $this->load->view('/elements/footer');?> 
 
</body>
</html>