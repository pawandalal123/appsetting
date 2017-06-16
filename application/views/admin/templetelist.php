

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

<th>Templete Name</th>

<th class="text-center">Tag Line</th>
<th class="text-center">colorcode</th>
<th class="text-center">image</th>
<th class="text-center">Status</th>
<!-- <th class="text-center">Actions</th> -->


<th></th>

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

<td><?php echo $result->temlete_name;?></td>
<td><?php echo $result->tag_line;?></td>
<td><?php echo $result->color_code;?>
</td>
<td class="text-center"><img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES.$result->background_image;?>" style="width: 100px;"></td>
<td class="text-center">
<div class="btn-group">
<?php if($result->status==1){?>
<a href="<?php echo SITE_URL.'admin/activeDeactivetemp';?>/<?php echo $result->id;?>/Active" title="Activated" ><img src="<?php echo WEBROOT_PATH_IMAGES_admin;?>green_icon.png" alt="Activated" /></a>
<?php } else{?>
<a href="<?php echo SITE_URL.'admin/activeDeactivetemp';?>/<?php echo $result->id;?>/deActive" title="Deactivated" ><img src="<?php echo WEBROOT_PATH_IMAGES_admin;?>red_icon.png" alt="Deactivated" /></a>
<?php }?>
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

