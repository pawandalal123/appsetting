<div id="sidebar">
<div class="sidebar-scroll">
<div class="sidebar-content">
<a href="<?php echo SITE_URL.'admin/dashboard';?>" class="sidebar-brand">

<img src="<?php echo WEBROOT_PATH_IMAGES;?>logo-header.png" style="width: 200px;"></a>
<div class="sidebar-section sidebar-user clearfix">
<div class="sidebar-user-avatar">
<?php if($this->session->userdata('photo')){?>

<img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES;?>profile_img/<?php echo $this->session->userdata('photo');?>" alt="Login required" class="img-circle" width="68" height="68" />
<?php }?>
</div>
<div class="sidebar-user-name"><?php if( $this->session->userdata('isLoggedIn') ) { echo $this->session->userdata('name');}?></div>
<div class="sidebar-user-links">
<a href="#modal-user-profile" data-toggle="modal" id="profile" data-placement="bottom" title="Profile" rel="<?php echo $this->session->userdata('id');?>">
<i class="gi gi-user"></i></a>
<a href="#" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
<a href="#modal-user-settings" data-toggle="modal" class="enable-tooltip" data-placement="bottom" title="Settings"><i class="gi gi-cogwheel"></i></a>
<a href="<?php echo SITE_URL.'admin/logout';?>" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
</div>
</div>
<ul class="sidebar-section sidebar-themes clearfix">

</ul>
<ul class="sidebar-nav">
<li>
<a href="<?php echo SITE_URL.'admin/dashboard';?>" class=" active"><i class="gi gi-stopwatch sidebar-nav-icon"></i>Dashboard</a>
</li>

<li>
<a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-certificate sidebar-nav-icon">
</i>User Management</a>
<ul>
<li>
<a href="<?php echo SITE_URL.'admin/view_admin';?>">Manage Admin</a>
</li>
<li>
<a href="<?php echo SITE_URL.'admin/users';?>">Manage User</a>
</li>

</ul>
</li>
<!-- <li>
<a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
<i class="gi gi-notes_2 sidebar-nav-icon"></i>Contact Management</a>
<ul>
<li>
<a href="<?php echo SITE_URL.'admin/contactDetails';?>">Manage Contact Us</a>
</li>

</ul>
</li> -->
<li>
<a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
<i class="gi gi-table sidebar-nav-icon"></i>Data Management</a>
<ul>
<li>
<a href="<?php echo SITE_URL.'admin/category';?>">Manage Category</a>
</li>
<li>
<a href="<?php echo SITE_URL.'admin/subcategory';?>">Manage Subcategory</a>
</li>
</ul>
</li>
<li>
<a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
<i class="gi gi-table sidebar-nav-icon"></i>Templetes</a>
<ul>
<li>
<a href="<?php echo SITE_URL.'admin/templetelist';?>">Defaults Templetes</a>
<a href="<?php echo SITE_URL.'admin/templetelist/users';?>">User Templetes</a>
</li>
</ul>
</li>
<li>
<a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
<i class="gi gi-table sidebar-nav-icon"></i>Plan Management</a>
<ul>
<li>
<a href="<?php echo SITE_URL.'admin/subscriptionlist';?>">Subscription Plans</a>
</li>
</ul>
</li>
<li>
<a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
<i class="gi gi-table sidebar-nav-icon"></i>Page Management</a>
<ul>
<li>
<a href="<?php echo SITE_URL.'admin/pageContent';?>">Page Management</a>
</li>
</ul>
</li>
</ul>


</div>
</div>
</div>