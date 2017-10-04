

<div id="page-content">
  <ul class="breadcrumb breadcrumb-top">
    <li>Admin</li>
    <li><a href="subcategory"> Sub Category</a></li>
  </ul>
  <div class="block full">
    <div class="block-title">
      <h2>
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

<th class="text-center">Admin Name</th>
<th class="text-center">Admin Email</th>
<th class="text-center">Admin Contact</th>
<!-- <th class="text-center">Image</th> -->
<th class="text-center">Status</th>


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

<td><?php echo $result->name;?></td>
<td><?php echo $result->email;?></td>
<td><?php echo $result->mobile;?></td>
<!-- <td class="text-center"><img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES;?>profile_img/<?php echo $result->profile_image;?>" alt="avatar" class="img-circle" width="64" height="64" /></td> -->
<td class="text-center">
<div class="btn-group">
<?php if($result->status==1){?>
<a href="<?php echo SITE_URL.'admin/activeDeactiveuser';?>/<?php echo $result->id;?>/Active" title="Activated" ><img src="<?php echo WEBROOT_PATH_IMAGES_admin;?>green_icon.png" alt="Activated" /></a>
<?php } else{?>
<a href="<?php echo SITE_URL.'admin/activeDeactiveuser';?>/<?php echo $result->id;?>/deActive" title="Deactivated" ><img src="<?php echo WEBROOT_PATH_IMAGES_admin;?>red_icon.png" alt="Deactivated" /></a>
<?php }?>
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

