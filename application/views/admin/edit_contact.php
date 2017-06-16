<div id="page-content">

<ul class="breadcrumb breadcrumb-top">
<li>Admin</li>
<li><a href="../editContact/<?php echo $rows->id;?>">Edit Contact Details</a></li>
</ul>
<div class="block full">
<div class="block-title">
<h2><a href="../contactDetails" class="btn btn-primary" ><strong>View Contact Details</strong></a>&nbsp;
<?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?></h2>


</div>

<div class="table-responsive">

<div class="block">

<form action="<?php echo SITE_URL.'admin/updateContact';?>" method="post" id="editContact" class="form-horizontal form-bordered"  />
<div class="form-group">
<label class="col-md-3 col-lg-2 control-label" for="compose-to">Company Name <span class="err">*</span></label>
<div class="col-md-9 col-lg-10">
<input type="text" id="company" name="company" value="<?php echo $rows->company_name;?>" class="form-control form-control-borderless validate[required]"
 placeholder="Enter comapny Name.." />
<?php echo form_error("company");?>
</div>
</div>

<div class="form-group">
<label class="col-md-3 col-lg-2 control-label" for="compose-subject">Email id <span class="err">*</span></label>
<div class="col-md-9 col-lg-10">
<input type="text" id="email" name="email" value="<?php echo $rows->contact_email;?>" class="form-control form-control-borderless validate[required]" placeholder="Enter email Id.." />
<?php echo form_error("email");?>
</div>
</div>
<div class="form-group">
<label class="col-md-3 col-lg-2 control-label" for="compose-subject">Land Line No <span class="err">*</span></label>
<div class="col-md-9 col-lg-10">
<input type="text" id="phone" name="phone" value="<?php echo $rows->contact_no;?>" class="form-control form-control-borderless validate[required]" placeholder="Enter phone No.." />
<?php echo form_error("phone");?>
</div>
</div>
<div class="form-group">
<label class="col-md-3 col-lg-2 control-label" for="compose-subject">Mobile No <span class="err">*</span></label>
<div class="col-md-9 col-lg-10">
<input type="text" id="mobile" name="mobile" value="<?php echo $rows->mobile;?>" class="form-control form-control-borderless validate[required]" placeholder="Enter Mobile No.." />
<?php echo form_error("mobile");?>
</div>
</div>
<div class="form-group">
<label class="col-md-3 col-lg-2 control-label" for="compose-subject">Executive Name </label>
<div class="col-md-9 col-lg-10">
<input type="text" id="executive" name="executive" value="<?php echo $rows->executive_name;?>" class="form-control form-control-borderless" placeholder="Enter executive name.." />

</div>
</div>

<div class="form-group">
<label class="col-md-3 col-lg-2 control-label" for="compose-message">Address <span class="err">*</span></label>
<div class="col-md-9 col-lg-10">
<textarea id="address" name="address" rows="5" class="form-control validate[required]" placeholder="Enter full Adress..">
<?php echo $rows->address;?>
</textarea>
<?php echo form_error("address");?>
</div>
</div>
<div class="form-group form-actions">
<div class="col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2">
<input type="hidden" name="contact_id" value="<?php echo $rows->id;?>" />
<input type="submit" class="btn btn-sm btn-primary" name="save" value="Update">
<input type="reset" class="btn btn-sm btn-default" name="reset" value="Clear">
</div>
</div>
</form>

</div>


</div>
</div>
</div>

