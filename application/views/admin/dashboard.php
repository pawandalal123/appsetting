<div id="page-content">
<div class="content-header content-header-media">
<div class="header-section">
<div class="row">
<div class="col-md-4 col-lg-6 hidden-xs hidden-sm">

<h1>Welcome to<strong>  Administrator!</strong><br /><small>Area</small></h1>
<?php  if( $this->session->userdata('msg') ) { echo $this->session->userdata('msg');
 $this->session->unset_userdata('msg');}?>
<?php echo form_error("email"); 
      echo form_error("npassword");
	  echo form_error("repassword");
 
?>
</div>
<div class="col-md-8 col-lg-6">
<div class="row text-center">
<div class="col-xs-4 col-sm-3">
<h2 class="animation-hatch">
$<strong>93.7k</strong><br />
<small><i class="fa fa-thumbs-o-up"></i> Great</small>
</h2>
</div>
<div class="col-xs-4 col-sm-3">
<h2 class="animation-hatch">
<strong>167k</strong><br />
<small><i class="fa fa-heart-o"></i> Likes</small>
</h2>
</div>
<div class="col-xs-4 col-sm-3">
<h2 class="animation-hatch">
<strong>101</strong><br />
<small><i class="fa fa-calendar-o"></i> Events</small>
</h2>
</div>
<div class="col-sm-3 hidden-xs">
<h2 class="animation-hatch">
<strong>27&deg; C</strong><br />
<small><i class="fa fa-map-marker"></i> India</small>
</h2>
</div>
</div>
</div>
</div>
</div>
<img src="<?php echo WEBROOT_PATH_IMAGES;?>placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow" />
</div>
<div class="row">
<div class="col-sm-6 col-lg-3">
<div class="widget">
<div class="widget-simple">
<a href="./page_ready_article.php.html" class="widget-icon pull-left themed-background-autumn animation-fadeIn">
<i class="fa fa-file-text"></i>
</a>
<h3 class="widget-content text-right animation-pullDown">
New <strong>Article</strong><br />
<small>Mountain Trip</small>
</h3>
</div>
</div>
</div>
<div class="col-sm-6 col-lg-3">
<div class="widget">
<div class="widget-simple">
<a href="./page_comp_charts.php.html" class="widget-icon pull-left themed-background-spring animation-fadeIn">
<i class="gi gi-usd"></i>
</a>
<h3 class="widget-content text-right animation-pullDown">
+ <strong>250%</strong><br />
<small>Sales Today</small>
</h3>
</div>
</div>
</div>
<div class="col-sm-6 col-lg-3">
<div class="widget">
<div class="widget-simple">
<a href="./page_ready_inbox.php.html" class="widget-icon pull-left themed-background-fire animation-fadeIn">
<i class="gi gi-envelope"></i>
</a>
<h3 class="widget-content text-right animation-pullDown">
5 <strong>Messages</strong>
<small>Support Center</small>
</h3>
</div>
</div>
</div>
<div class="col-sm-6 col-lg-3">
<div class="widget">
<div class="widget-simple">
<a href="./page_comp_gallery.php.html" class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
<i class="gi gi-picture"></i>
</a>
<h3 class="widget-content text-right animation-pullDown">
+30 <strong>Photos</strong>
<small>Gallery</small>
</h3>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="widget">
<div class="widget-simple">
<a href="./page_comp_charts.php.html" class="widget-icon pull-left themed-background animation-fadeIn">
<i class="gi gi-wallet"></i>
</a>
<div class="pull-right">
<span id="mini-chart-sales"></span>
</div>
<h3 class="widget-content animation-pullDown visible-lg">
Latest <strong>Sales</strong>
<small>Per hour</small>
</h3>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="widget">
<div class="widget-simple">
<a href="./page_widgets_stats.php.html" class="widget-icon pull-left themed-background animation-fadeIn">
<i class="gi gi-crown"></i>
</a>
<div class="pull-right">
<span id="mini-chart-brand"></span>
</div>
<h3 class="widget-content animation-pullDown visible-lg">
Our <strong>Brand</strong>
<small>Popularity over time</small>
</h3>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="widget">

<div class="widget">
<div class="widget-advanced widget-advanced-alt">
<div class="widget-header text-left">
<img src="<?php echo WEBROOT_PATH_IMAGES;?>placeholders/headers/widget5_header.jpg" alt="background" class="widget-background animation-pulseSlow" />
<h3 class="widget-content widget-content-image widget-content-light clearfix">
<span class="widget-icon pull-right">
<i class="fa fa-sun-o animation-pulse"></i>
</span>
Weather <strong>Station</strong><br />
<small><i class="fa fa-location-arrow"></i> The Mountain</small>
</h3>
</div>
<div class="widget-main">
<div class="row text-center">
<div class="col-xs-6 col-lg-3">
<h3>
<strong>10&deg;</strong> <small>C</small><br />
<small>Sunny</small>
</h3>
</div>
<div class="col-xs-6 col-lg-3">
<h3>
<strong>80</strong> <small>%</small><br />
<small>Humidity</small>
</h3>
</div>
<div class="col-xs-6 col-lg-3">
<h3>
<strong>60</strong> <small>km/h</small><br />
<small>Wind</small>
</h3>
</div>
<div class="col-xs-6 col-lg-3">
<h3>
<strong>5</strong> <small>km</small><br />
<small>Visibility</small>
</h3>
</div>
</div>
</div>
</div>
</div>

</div>
</div>


<div class="col-md-6">
<div class="widget">
<div class="widget-extra themed-background-dark">
<div class="widget-options">
<div class="btn-group btn-group-xs">
<a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Edit Widget"><i class="fa fa-pencil"></i></a>
<a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Quick Settings"><i class="fa fa-cog"></i></a>
</div>
</div>
<h3 class="widget-content-light">
Your <strong>VIP Plan</strong>
<small><a href="./page_ready_pricing_tables.php.html"><strong>Upgrade</strong></a></small>
</h3>
</div>
<div class="widget-extra-full">
<div class="row text-center">
<div class="col-xs-6 col-lg-3">
<h3>
<strong>35</strong> <small>/50</small><br />
<small><i class="fa fa-folder-open-o"></i> Projects</small>
</h3>
</div>
<div class="col-xs-6 col-lg-3">
<h3>
<strong>25</strong> <small>/100GB</small><br />
<small><i class="fa fa-hdd-o"></i> Storage</small>
</h3>
</div>
<div class="col-xs-6 col-lg-3">
<h3>
<strong>65</strong> <small>/1k</small><br />
<small><i class="fa fa-building-o"></i> Clients</small>
</h3>
</div>
<div class="col-xs-6 col-lg-3">
<h3>
<strong>10</strong> <small>k</small><br />
<small><i class="fa fa-envelope-o"></i> Emails</small>
</h3>
</div>
</div>
</div>
</div>
<div class="widget">
<div class="widget-advanced widget-advanced-alt">

<div class="widget-main">
<div class="row text-center">
<div class="col-xs-4">
<h3 class="animation-hatch"><strong>7.500</strong><br /><small>Clients</small></h3>
</div>
<div class="col-xs-4">
<h3 class="animation-hatch"><strong>10.970</strong><br /><small>Sales</small></h3>
</div>
<div class="col-xs-4">
<h3 class="animation-hatch">$<strong>31.230</strong><br /><small>Earnings</small></h3>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
