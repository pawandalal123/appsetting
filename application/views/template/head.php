
<!--------------- style css ---------------->
<link href="<?php echo WEBROOT_PATH_CSS_CHURCH; ?>style.css" rel="stylesheet" type="text/css" />

<!--------------- style css ---------------->

<!--------------- google font Lato ---------------->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700" rel="stylesheet">
<!--------------- google font Lato ---------------->
<!--------------- js ---------------->
<script src="<?php echo WEBROOT_PATH_JS_CHURCH; ?>jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$(".call-to-action li .col").click(function(){
			$(this).parent().toggleClass("active");
		});
	});
</script>
<script>
var WEBROOT_PATH = '<?php echo SITE_URL; ?>';
	$(document).ready(function(){
    $(document).on('click','.close',function()
    {
        // $(".web-overlay2").fadeOut();
        $(".overlay-main").remove()

    });

    
});
function modelbox(body,header)
{
    var template = '<div class="overlay-main"><div class="overlay-in announcement-n"><span class="close">Close</span>'+
                   '<div class="content"><div class="announcement add-announce"><h3>'+header+'</h3>'+body+'</div></div></div></div>'+
                '</div></div></div>';
                //$(".overlay-main").fadeIn();
                $(".overlay-main").show();
                 $('body').append(template);
           
}

function modelboxsmall(body)
{
    var template = '<div class="overlay-main small"><div class="inner-web"><div class="close"></div>'+
                   '<div class="content">'+body+'</div>'+
                '</div></div>';
                $(".overlay-main").fadeIn();
                $(".overlay-main").show();
                 $('body').append(template);
           
}
</script>
<!--------------- js ---------------->