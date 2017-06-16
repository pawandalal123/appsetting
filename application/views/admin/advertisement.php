<div id="page-content">
  <ul class="breadcrumb breadcrumb-top">
    <li>Admin</li>
    <li><a href="advertisement"> Advertisement Details</a></li>
  </ul>
  <div class="block full">
    <div class="block-title">
      <h2><a href="#modal-regular" class="btn btn-primary" data-toggle="modal"><strong>Add New</strong></a>&nbsp;
       <?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?>
      </h2>
      <?php
		echo form_error("type"); 
		echo form_error("position");
		echo form_error("end_date");

?>
    </div>
    <div class="table-responsive">
      <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
        <thead>
          <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Ads Type</th>
            <th class="text-center">Ads position</th>
            
            <th class="text-center">Image</th>
            <th class="text-center">Start Date</th>
            <th class="text-center">Valid Till</th>
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
$c++;

 ?>
          <tr>
            <td class="text-center"><?php echo $c;?></td>
            <td><?php echo $result->image_for;?></td>
            <td><?php echo $result->position;?></td>
            
            <td class="text-center"><img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES;?>ads_image/<?php echo $result->image_name;?>" alt="avatar" class="img-circle" width="64" height="64" /></td>
            <td><?php echo $result->start_date;?></td>
            <td><?php echo $result->end_date;?></td>
            <td class="text-center"><div class="btn-group">
                <?php if($result->status==1){?>
                <a href="<?php echo SITE_URL.'admin/activeDeactiveAds';?>/<?php echo $result->image_id;?>/Active" title="Activated" >
                <img src="<?php echo WEBROOT_PATH_IMAGES;?>green_icon.png" alt="Activated" /></a>
                <?php } else{?>
                <a href="<?php echo SITE_URL.'admin/activeDeactiveAds';?>/<?php echo $result->image_id;?>/deActive" title="Deactivated" >
                <img src="<?php echo WEBROOT_PATH_IMAGES;?>red_icon.png" alt="Deactivated" /></a>
                <?php }?>
              </div></td>
            <td class="text-center"><div class="btn-group"> <a href="#modal_image" data-toggle="modal" title="Edit" class="btn btn-xs btn-default editImage" rel="<?php echo $result->image_id;?>"><i class="fa fa-pencil"></i></a> 
            <a href="deleteAds/<?php echo $result->image_id;?>" onclick="return confirm('Are you sure to delete ?')" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a> </div></td>
            <td></td>
          </tr>
          <?php } }?>
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
        <h3 class="modal-title">Add Sub Category</h3>
      </div>
      <div class="modal-body">
        <form action="<?php echo SITE_URL.'admin/addAds';?>" method="post" id="add_Adv" enctype="multipart/form-data" class="form-horizontal form-bordered"/>
         <div class="form-group">
          <label class="col-md-3 control-label" for="example-text-input">Ads Type <span class="err">*</span></label>
          <div class="col-md-9">
            <select name="type" id="type" class="form-control validate[required]">
            
              <option value="">--select--</option>
                <option value="slider">Slider</option>
                <option value="ads">Ads Image</option>
                </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-md-3 control-label" for="example-text-input">Display Position <span class="err">*</span></label>
          <div class="col-md-9">
            <select name="position" id="position" class="form-control validate[required]">
            
              <option value="">--select--</option>
                <option value="left">Left</option>
                <option value="right">Right </option>
                <option value="footer">Footer</option>
                <option value="header">Header</option>
               </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-md-3 control-label" for="example-file-input">Valid Till <span class="err">*</span></label>
          <div class="col-md-9">
          <input type="text" id="example-datepicker2" name="end_date" value="" class="form-control input-datepicker validate[required]" data-date-format="dd/mm/yyyy" placeholder="dd-mm-yyyy" />
           
          </div>
        </div>
        <div class="form-group">
        <label class="col-md-3 control-label" for="example-file-input">Ads Image</label>
        <div class="col-md-9">
        <input type="file" id="image" name="image" class="validate[required]" />
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
<div id="modal_image" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"> </div>
