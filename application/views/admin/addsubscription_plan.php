<div id="page-content">

<ul class="breadcrumb breadcrumb-top">
<li>Admin</li>
<li><a href="addPlan">Add Page Content</a></li>
</ul>
<div class="block full">
<div class="block-title">
<h2><a href="subscriptionlist" class="btn btn-primary" ><strong>View List</strong></a>
<?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?></h2>


</div>

<div class="table-responsive">

<div class="block">

<form action="<?php echo SITE_URL.'admin/saveplan';?>" method="post" id="contentFrm" class="form-horizontal form-bordered"  />
<div class="form-group">
<label class="col-md-3 col-lg-2 control-label" for="compose-to">Plan Name<span class="err">*</span></label>
<div class="col-md-9 col-lg-10">
<input type="text" id="Plan name" name="planame" class="form-control form-control-borderless validate[required]" placeholder="Enter page Title.." />
<?php echo form_error("planame");?>
</div>
</div>

<div class="form-group">
<label class="col-md-3 col-lg-2 control-label" for="compose-subject">Plan Amount<span class="err">*</span></label>
<div class="col-md-9 col-lg-10">
<input type="text" id="menu_label" name="amount" class="form-control form-control-borderless validate[required]" placeholder="Enter Menu Label.." />
<?php echo form_error("amount");?>
</div>
</div>
<div class="form-group">
<label class="col-md-3 col-lg-2 control-label" for="compose-subject">Max Installation</label>
<div class="col-md-9 col-lg-10">
<input type="text" id="position" name="maxinstall" class="form-control form-control-borderless" placeholder="Enter Menu position.." />
<?php echo form_error("amount");?>
</div>
</div>

<div class="form-group">
<label class="col-md-3 col-lg-2 control-label" for="compose-message">Page Content <span class="err">*</span></label>
<div class="col-md-9 col-lg-10">
<textarea id="compose-message" name="content" rows="20" class="form-control textarea-editor" placeholder="Enter Page Content.."></textarea>
<?php echo form_error("content");?>
</div>
</div>
<div class="form-group form-actions">
<div class="col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2">
<input type="submit" class="btn btn-sm btn-primary" name="save" value="Save">
</div>
</div>
</form>

</div>


</div>
</div>
</div>

