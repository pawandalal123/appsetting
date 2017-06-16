<div id="page-content">

<ul class="breadcrumb breadcrumb-top">
<li>Admin</li>
<li><a href="pageContent">View Subscription List</a></li>
</ul>
<div class="block full">
<div class="block-title">
<h2><a href="addPlan" class="btn btn-primary" ><strong>Add Plan</strong></a>&nbsp;
<?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?></h2>


</div>

<div class="table-responsive">
<table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
<thead>
<tr>
<th class="text-center">ID</th>

<th>Plan name</th>
<th class="text-center">Plan amount</th>
<th class="text-center">Max install</th>
<th class="text-center">Content</th>
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

<td><?php echo $result->plan_name;?></td>
<td><?php echo $result->price;?></td>
<td><?php echo substr($result->description,0,150);?></td>
<td class="text-center"><?php echo $result->max_installtion;?></td>
<td class="text-center">
<div class="btn-group">
<?php if($result->status==1){?>
<a href="<?php echo SITE_URL.'admin/activeDeactivePlan';?>/<?php echo $result->id;?>/Active" title="Activated" ><img src="<?php echo WEBROOT_PATH_IMAGES_admin;?>green_icon.png" alt="Activated" /></a>
<?php } else{?>
<a href="<?php echo SITE_URL.'admin/activeDeactivePlan';?>/<?php echo $result->id;?>/deActive" title="Deactivated" ><img src="<?php echo WEBROOT_PATH_IMAGES_admin;?>red_icon.png" alt="Deactivated" /></a>
<?php }?>
</div>
</td>

<td class="text-center">
<div class="btn-group">
<a href="<?php echo SITE_URL.'admin/editPlan';?>/<?php echo $result->id;?>" data-toggle="modal" title="Edit" class="btn btn-xs btn-default editCategoy" rel="<?php echo $result->id;?>"><i class="fa fa-pencil"></i></a>


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

