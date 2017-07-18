<div id="page-content">

<ul class="breadcrumb breadcrumb-top">
<li>Admin</li>
<li><a href="category">View Training Videos</a></li>
</ul>
<div class="block full">
<div class="block-title">
<h2>&nbsp;
<?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?></h2>


</div>
<form action="" method="post"  id="addimages" enctype="multipart/form-data" class="form-horizontal form-bordered"/>
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">Category<span class="err">*</span></label>
<div class="col-md-9">
 <select name="cat" id="cat" class="form-control categorychange validate[required]">
            
              <option value="">--select--</option>
              <?php if(isset($catrow))
              {
			
              foreach($catrow as $cat){?>
              <option value="<?php echo $cat->id;?>" <?php if(@$editdata->cat_id==$cat->id){ ?> selected <?php }?>><?php echo $cat->name;?></option>
              <?php } }?>
              
            </select>
<?php echo form_error("cat"); ?>
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">Sub Category<span class="err">*</span></label>
<div class="col-md-9">
<select name="subcat" id="subcat" class="form-control subcat validate[required]">
<option value="">--select--</option>
</select>
<?php echo form_error("subcat"); ?>
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">Title<span class="err">*</span></label>
<div class="col-md-9">
<input type="text" id="videotitle" name="videotitle" class="form-control validate[required]" placeholder="Enter Video Name"  value="<?php echo @$editdata->video_title;?>" />
<?php //echo form_error("videourl"); ?>
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">Youtube link<span class="err">*</span></label>
<div class="col-md-9">
<input type="file" id="videourl" name="attachment" class="form-control validate[required]" />
<?php echo form_error("videourl"); ?>
</div>
</div>

<div class="form-group form-actions">
<div class="col-md-9 col-md-offset-3">
<input type="submit" id="submit" class="btn btn-sm btn-primary" name="savevideo"  value="Submit"/>

</div>

</div>
</form>

<div class="table-responsive">
<table  class="table table-vcenter table-condensed table-bordered">
<thead>
<tr>
<th class="text-center">ID</th>


<th>Image Link</th>
<th>Created At</th>
<th class="text-center">Action</th>



</tr>
</thead>
<tbody>
<?php 
if(isset($getvideos)){
//pr($rows);
$c=0;
foreach($getvideos as $result){
$c++;

 ?>
<tr>
<td class="text-center"><?php echo $c;?></td>

<td><?php echo $result->video_link?></td>
<td><?php echo $result->created_at?></td>
<td class="text-center">
<div class="btn-group">
<?php if($result->status==1){?>
<a href="<?php echo SITE_URL.'admin/activeDeactivevideo';?>/<?php echo $result->id;?>/Active" title="Activated" ><img src="<?php echo WEBROOT_PATH_IMAGES_admin;?>green_icon.png" alt="Activated" /></a>
<?php } else{?>
<a href="<?php echo SITE_URL.'admin/activeDeactivevideo';?>/<?php echo $result->id;?>/deActive" title="Deactivated" ><img src="<?php echo WEBROOT_PATH_IMAGES_admin;?>red_icon.png" alt="Deactivated" /></a>
<?php }?>
</div>
<a href="<?php echo SITE_URL.'admin/training';?>/<?php echo $result->id;?>">Edit</a>
</td>


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
<script type="text/javascript">
$(document).ready(function() { 
  
  $("#addimages").validate({
                rules: {
            attachment: {
              required: true,
              accept: "jpg|png|jpeg|pjpeg|gif"
            },
            name: {
              lettersspecialonly: true
            }
                },
                messages: {
                             
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
});

</script>
