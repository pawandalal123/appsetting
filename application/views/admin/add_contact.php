<div id="page-content">

<ul class="breadcrumb breadcrumb-top">
<li>Admin</li>
<li><a href="addContact">Add Contact Details</a></li>
</ul>
<div class="block full">
<div class="block-title">
<h2><a href="contactDetails" class="btn btn-primary" ><strong>View Contact Details</strong></a>&nbsp;
<?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?></h2>


</div>

<div class="table-responsive">

<div class="block">

<form action="<?php echo SITE_URL.'admin/addContactAddress';?>" method="post"  id="addContact" class="form-horizontal form-bordered"  />
<div class="form-group">
<label class="col-md-3 col-lg-2 control-label" for="compose-to">Company Name <span class="err">*</span></label>
<div class="col-md-9 col-lg-10">
<input type="text" id="company" name="company" class="form-control form-control-borderless validate[required]" placeholder="Enter comapny Name.." />
<?php echo form_error("company");?>
</div>
</div>

<div class="form-group">
<label class="col-md-3 col-lg-2 control-label" for="compose-subject">Email id <span class="err">*</span></label>
<div class="col-md-9 col-lg-10">
<input type="text" id="email" name="email" class="form-control form-control-borderless validate[required]" placeholder="Enter email Id.." />
<?php echo form_error("email");?>
</div>
</div>
<div class="form-group">
<label class="col-md-3 col-lg-2 control-label" for="compose-subject">Land Line No <span class="err">*</span></label>
<div class="col-md-9 col-lg-10">
<input type="text" id="phone" name="phone" class="form-control form-control-borderless validate[required]" placeholder="Enter phone No.." />
<?php echo form_error("phone");?>
</div>
</div>
<div class="form-group">
<label class="col-md-3 col-lg-2 control-label" for="compose-subject">Mobile No <span class="err">*</span></label>
<div class="col-md-9 col-lg-10">
<input type="text" id="mobile" name="mobile" class="form-control form-control-borderless validate[required]" placeholder="Enter Mobile No.." />
<?php echo form_error("mobile");?>
</div>
</div>
<div class="form-group">
<label class="col-md-3 col-lg-2 control-label" for="compose-subject">Executive Name </label>
<div class="col-md-9 col-lg-10">
<input type="text" id="executive" name="executive" class="form-control form-control-borderless" placeholder="Enter executive name.." />

</div>
</div>

<div class="form-group">
<label class="col-md-3 col-lg-2 control-label" for="compose-message">Address <span class="err">*</span></label>
<div class="col-md-9 col-lg-10">
<textarea id="address" name="address" rows="5" class="form-control validate[required]" placeholder="Enter full Adress.."></textarea>
<?php echo form_error("address");?>
</div>
</div>
<div class="form-group form-actions">
<div class="col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2">
<input type="submit" class="btn btn-sm btn-primary" name="save" value="Save">
<input type="reset" class="btn btn-sm btn-default" name="reset" value="Clear">
</div>
</div>
</form>

</div>


</div>
</div>
</div>

