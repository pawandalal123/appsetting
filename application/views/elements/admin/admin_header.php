<header class="navbar navbar-default">
<ul class="nav navbar-nav-custom">
<li class="hidden-xs hidden-sm">
<a href="javascript:void(0)" id="sidebar-toggle-lg">
<i class="fa fa-list-ul fa-fw"></i>
</a>
</li>
<li class="hidden-md hidden-lg">
<a href="javascript:void(0)" id="sidebar-toggle-sm">
<i class="fa fa-bars fa-fw"></i>
</a>
</li>

</ul>

<ul class="nav navbar-nav-custom pull-right">

<li class="dropdown">
<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
<img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES;?>profile_img/<?php echo $this->session->userdata('photo');?>" alt="Login required" class="img-circle" width="40" height="40" /></a>
<ul class="dropdown-menu dropdown-custom dropdown-menu-right">
<li class="dropdown-header text-center">Account</li>
<li>
<a href="#modal-user-settings" data-toggle="modal">
<i class="fa fa-cog fa-fw pull-right"></i>
Settings
</a>
</li>
<li class="divider"></li>

<li class="divider"></li>
<li>
<a href="<?php echo SITE_URL.'admin/logout';?>"><i class="fa fa-ban fa-fw pull-right"></i>Logout</a>
</li>

</ul>
</li>
</ul>
</header>