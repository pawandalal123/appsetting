<div id="page-content">

<ul class="breadcrumb breadcrumb-top">
<li>Admin</li>
<li><a href="category">View Category</a></li>
</ul>
<div class="block full">
<div class="block-title">
<h2>&nbsp;
<?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?></h2>


</div>
<form action="" method="post"  id="addcategory" enctype="multipart/form-data" class="form-horizontal form-bordered"/>
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">Category Name <span class="err">*</span></label>
<div class="col-md-9">
<input type="text" id="cat" name="cat" class="form-control validate[required]" placeholder="Enter Category Name"  value="<?php echo @$catdetails->name;?>" />
<?php echo form_error("cat"); ?>
</div>
</div>

<div class="form-group form-actions">
<div class="col-md-9 col-md-offset-3">
<input type="submit" id="submit" class="btn btn-sm btn-primary" name="addcategory"  value="Submit"/>

</div>

</div>
</form>

<div class="table-responsive">
<table  class="table table-vcenter table-condensed table-bordered">
<thead>
<tr>
<th class="text-center">ID</th>

<th>Category Name</th>
<th>Created At</th>
<th class="text-center">Acton</th>



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

<td><?php echo $result->name;?></td>

<td class="text-center">
<div class="btn-group">
<?php if($result->status==1){?>
<a href="<?php echo SITE_URL.'admin/activeDeactiveCategory';?>/<?php echo $result->id;?>/Active" title="Activated" ><img src="<?php echo WEBROOT_PATH_IMAGES_admin;?>green_icon.png" alt="Activated" /></a>
<?php } else{?>
<a href="<?php echo SITE_URL.'admin/activeDeactiveCategory';?>/<?php echo $result->id;?>/deActive" title="Deactivated" ><img src="<?php echo WEBROOT_PATH_IMAGES_admin;?>red_icon.png" alt="Deactivated" /></a>
<?php }?>
</div>
<a href="<?php echo SITE_URL.'admin/category';?>/<?php echo $result->id;?>">Edit</a>
</td>
<td><?php echo $result->created_at?></td>

<!-- <td class="text-center">
<div class="btn-group">
<a href="deleteCat/<?php echo $result->id;?>" onclick="return confirm('Are you sure to delete ?')" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>

</div>
</td> -->


</tr>
<?php } }?>
</tbody>
</table>
</div>
</div>
</div>


