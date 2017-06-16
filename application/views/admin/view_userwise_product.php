<div id="page-content">

<ul class="breadcrumb breadcrumb-top">
<li>Admin</li>
<li><a href="userwiseProduct">View Individual User's Products</a> 
 </li>
</ul>
<div class="block full">
<div class="block-title">
<h2><a href="<?php echo SITE_URL.'admin/users';?>" class="btn btn-primary" ><strong>Back</strong></a>
<?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?>

</h2>


</div>

<div class="table-responsive">
<table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
<thead>
<tr>
<th class="text-center">ID</th>

<th class="text-center">Contact Person</th>
<th class="text-center">Company Name </th>
<th class="text-center">Bussiness Nature</th>
<th class="text-center">Contact Person</th>
<th class="text-center">State</th>
<th class="text-center">City</th>
<th class="text-center">Status</th>
<th class="text-center">Actions</th>

<th></th>

</tr>
</thead>
<tbody>
<?php 
if(isset($rows)){

//pr($rows);
$c=0;
foreach($rows as $result){
$c++; ?>
<tr>
<td class="text-center"><?php echo $c;?></td>

<td><?php echo $result->contect_person;?></td>
<td><?php echo $result->company_name;?></td>
<td><?php echo $result->bussiness_nature ;?></td>
<td ><?php echo $result->contect_person ;?> </td>

<td><?php echo $result->state;?></td>
<td><?php echo $result->city;?></td>
<td class="text-center">
<div class="btn-group">
<?php if($result->Status=='Approved'){?>
<a  class="suc" href="<?php echo SITE_URL.'admin/activeDeactiveUserWiseProduct';?>/<?php echo $result->id ;?>/<?php echo $result->product_id;?>/Active" title="Approved" >
<?php echo $result->Status;?></a>
<?php } else{?>
<a class='err' href="<?php echo SITE_URL.'admin/activeDeactiveUserWiseProduct';?>/<?php echo $result->id ;?>/<?php echo $result->product_id;?>/deActive" title="Not Approved" >
<?php echo $result->Status;?></a>
<?php }?>
</div>
</td>

<td class="text-center">
<div class="btn-group">
<!--<a href="#modal-regular2" data-toggle="modal" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>-->
<a href="<?php echo SITE_URL.'admin/deleteUserWise';?>/<?php echo $result->id ;?>/<?php echo $result->product_id ;?>" onclick="return confirm('Are you sure to delete ?')" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger" rel=""><i class="fa fa-times"></i></a>


</div>
</td>
<td></td>

</tr>
<?php }
}?>
</tbody>
</table>
</div>
</div>
</div>

<div id="modal-regular" class="modal" tabindex="-1" role="dialog" aria-hidden="true">


<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h3 class="modal-title">Add New Admin</h3>


</div>


<div class="modal-body">
<form action="<?php echo SITE_URL.'admin/add_admin';?>" method="post" id="addAdmin" enctype="multipart/form-data" class="form-horizontal form-bordered"/>
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">First Name <span class="err">*</span></label>
<div class="col-md-9">
<input type="text" id="fname" name="fname" class="form-control validate[required]" placeholder="Enter first Name" />

</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label" for="example-file-input">Last Name <span class="err">*</span></label>
<div class="col-md-9">
<input type="text" id="lname" name="lname" class="form-control validate[required]" placeholder="Enter last Name"/>
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="example-file-input">Email Id <span class="err">*</span></label>
<div class="col-md-9">
<input type="text" id="email" name="email" class="form-control validate[required]" placeholder="Enter email id"/>
<span class="help-block">This will be Login Id</span>
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="example-file-input">Password <span class="err">*</span></label>
<div class="col-md-9">
<input type="text" id="password" name="password" class="form-control validate[required]" placeholder="Enter password "/>
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="example-file-input">Contact No <span class="err">*</span></label>
<div class="col-md-9">
<input type="text" id="mobile" name="mobile" class="form-control validate[required]" placeholder="Enter mobile no "/>
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="example-file-input">Country <span class="err">*</span></label>
<div class="col-md-9">
<input type="text" id="country" name="country" class="form-control validate[required]" placeholder="Enter country Name"/>
</div>
</div>


<div class="modal-footer">
<div class="form-group form-actions">
<div class="col-md-9 col-md-offset-3">
<input type="submit" id="submit" class="btn btn-sm btn-primary" name="submit"  value="Submit"/>
<input type="reset" id="reset" class="btn btn-sm btn-warning" name="reset"  value="Reset"/>
<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</form>
</div>


</div>
</div>
</div>
