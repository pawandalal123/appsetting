<?php 
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "http://" : "http://";
    $isSecure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? true : false;
    define('HTTP_HOST', $protocol. $_SERVER['HTTP_HOST'].'/appset/appsetting/');
    define('SITE_URL', HTTP_HOST);
    define('isSecure', $isSecure);
    define('HTTP_HOST_LINK',SITE_URL.'index.php');
    define('COMPANY_NAME', 'Test Pvt. Ltd.');
    define('COMPANY_SIGNATURE', 'App Seeting'); 
	define('metaname','<meta name="google-site-verification" content="GBY6-Cw7u1f_7Ed5Tni7d1eMtrlRu7hoFDvgZrs5Skg" />');   
    define('SITE_DIRECTORY',$_SERVER['DOCUMENT_ROOT'].'/');
    define('ADMIN_EMAIL','');
    define('ADMIN_EMAIL_NAME','App Seeting');
    define('WEBROOT_PATH_IMAGES', SITE_URL.'assets/images/');
    define('WEBROOT_PATH_CSS', SITE_URL.'assets/css/');
	define('WEBROOT_PATH_ADMIN_CSS', SITE_URL.'assets/admin/css/');
	define('WEBROOT_PATH_ADMIN_JS', SITE_URL.'assets/admin/js/');
    define('WEBROOT_PATH_IMAGES_admin', SITE_URL.'assets/img/');
    define('WEBROOT_PATH_JS', SITE_URL.'assets/js/');
    
	define('WEBROOT_PATH_sell', SITE_URL.'upload/Document/');
	define('WEBROOT_PATH_UPLOAD_IMAGES', SITE_URL.'upload/');
    define('SITE_DEFAULT_TITLE', 'App Seeting');
    define('FROM_EMAIL', 'pawan.dalal123@gmail.com');

    define('WEBROOT_PATH_SITE_JS', SITE_URL.'assets/website/js/');
    define('WEBROOT_PATH_SITE_IMAGES', SITE_URL.'assets/website/images/');
    define('WEBROOT_PATH_SITE_CSS', SITE_URL.'assets/website/css/');
    define('WEBROOT_PATH_SITE_UPLODE', SITE_URL.'assets/website/uplode/');
	
?>
