<div id="page-content">

<ul class="breadcrumb breadcrumb-top">
<li>Admin</li>
<li><a href="contactDetails">View Contact Details</a></li>
</ul>
<div class="block full">
<div class="block-title">
<h2><a href="addContact" class="btn btn-primary" ><strong>Add Contact</strong></a>&nbsp;
<?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?></h2>


</div>

<div class="table-responsive">
<table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
<thead>
<tr>
<th class="text-center">ID</th>
<th class="text-center">Comapany Name</th>
<th class="text-center">Email id</th>
<th class="text-center">LandLine No</th>
<th class="text-center">Mobile No</th>
<th class="text-center">Executive Name</th>
<th class="text-center">Address</th>
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

<td><?php echo $result->company_name;?></td>
<td><?php echo $result->contact_email;?></td>
<td><?php echo $result->contact_no;?> </td>
<td><?php echo $result->mobile;?> </td>
<td><?php echo $result->executive_name;?></td>
<td><?php echo $result->address;?></td>
<td class="text-center">
<div class="btn-group">
<?php if($result->status==1){?>
<a href="<?php echo SITE_URL.'admin/activeDeactiveContact';?>/<?php echo $result->id;?>/Active" title="Activated" ><img src="<?php echo WEBROOT_PATH_IMAGES;?>green_icon.png" alt="Activated" /></a>
<?php } else{?>
<a href="<?php echo SITE_URL.'admin/activeDeactiveContact';?>/<?php echo $result->id;?>/deActive" title="Deactivated" ><img src="<?php echo WEBROOT_PATH_IMAGES;?>red_icon.png" alt="Deactivated" /></a>
<?php }?>
</div>
</td>

<td class="text-center">
<div class="btn-group">
<a href="<?php echo SITE_URL.'admin/editContact';?>/<?php echo $result->id;?>" title="Edit" class="btn btn-xs btn-default">
<i class="fa fa-pencil"></i></a>
<a href="<?php echo SITE_URL.'admin/deleteContact';?>/<?php echo $result->id;?>" onclick="return confirm('Are you sure to delete ?')" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>

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
<div id="pageModal" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
