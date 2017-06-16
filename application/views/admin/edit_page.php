<div id="page-content">

<ul class="breadcrumb breadcrumb-top">
<li>Admin</li>
<li><a href="../editPage/<?php echo $rows->id;?>">Edit Page Content</a></li>
</ul>
<div class="block full">
<div class="block-title">
<h2><a href="../pageContent" class="btn btn-primary" ><strong>View Page</strong></a>&nbsp;
<?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?></h2>
<?php //pr($rows);?>

</div>

<div class="table-responsive">

<div class="block">

<form action="<?php echo SITE_URL.'admin/updatePage';?>" method="post" class="form-horizontal form-bordered"  />
<div class="form-group">
<label class="col-md-3 col-lg-2 control-label" for="compose-to">Page Title <span class="err">*</span></label>
<div class="col-md-9 col-lg-10">
<input type="text" id="title" name="title" class="form-control form-control-borderless" value="<?php echo $rows->page_name;?>" placeholder="Enter page Title.." />
<?php echo form_error("title");?>
</div>
</div>



<div class="form-group">
<label class="col-md-3 col-lg-2 control-label" for="compose-message">Page Content <span class="err">*</span></label>
<div class="col-md-9 col-lg-10">
<textarea id="compose-message" name="content" rows="20" class="form-control textarea-editor" placeholder="Enter Page Content..">
<?php echo $rows->page_content;?>
<?php echo form_error("content");?>
</textarea>

</div>
</div>
<div class="form-group form-actions">
<div class="col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2">
<input type="hidden" name="page_id" value="<?php echo $rows->id;?>" />
<input type="submit" class="btn btn-sm btn-primary" name="save" value="Update">
<input type="reset" class="btn btn-sm btn-default" name="reset" value="Clear">
</div>
</div>
</form>

</div>


</div>
</div>
</div>

