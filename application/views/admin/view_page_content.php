<div id="page-content">

<ul class="breadcrumb breadcrumb-top">
<li>Admin</li>
<li><a href="pageContent">View Page Content</a></li>
</ul>
<div class="block full">
<div class="block-title">
<h2><a href="addPage" class="btn btn-primary" ><strong>Add Page</strong></a>&nbsp;
<?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?></h2>
<?php
echo form_error("ptitle"); 
echo form_error("menu_label");
echo form_error("content");

?>

</div>

<div class="table-responsive">
<table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
<thead>
<tr>
<th class="text-center">ID</th>

<th>Page Title</th>

<th class="text-center">Page Content</th>

<th class="text-center">Status</th>
<th class="text-center">Actions</th>
</tr>
</thead>
<tbody>
<?php 
if(isset($rows)){
//pr($rows);
$c=0;
foreach($rows as $result){
$c++;

 ?>
<tr>
<td class="text-center"><?php echo $c;?></td>

<td><?php echo $result->page_name;?></td>

<td><?php echo substr($result->page_content,0,150);?></td>

<td class="text-center">
<div class="btn-group">
<?php if($result->status==1){?>
<a href="<?php echo SITE_URL.'admin/activeDeactivePage';?>/<?php echo $result->id;?>/Active" title="Activated" ><img src="<?php echo WEBROOT_PATH_IMAGES_admin;?>green_icon.png" alt="Activated" /></a>
<?php } else{?>
<a href="<?php echo SITE_URL.'admin/activeDeactivePage';?>/<?php echo $result->id;?>/deActive" title="Deactivated" ><img src="<?php echo WEBROOT_PATH_IMAGES_admin;?>red_icon.png" alt="Deactivated" /></a>
<?php }?>
</div>
</td>

<td class="text-center">
<div class="btn-group">
<a href="<?php echo SITE_URL.'admin/editPage';?>/<?php echo $result->id;?>" data-toggle="modal" title="Edit" class="btn btn-xs btn-default editCategoy" rel="<?php echo $result->id;?>"><i class="fa fa-pencil"></i>

</div>
</td>
<td></td>

</tr>
<?php } }?>
</tbody>
</table>
</div>
</div>
</div>
<div id="pageModal" class="modal" tabindex="-1" role="dialog" aria-hidden="true"></div>
