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
<form action="" method="post"  id="addcategory" enctype="multipart/form-data" class="form-horizontal form-bordered"/>
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
<input type="text" id="videotitle" name="templatetitle" class="form-control validate[required]" placeholder="Enter Video Name"  value="" />
<?php echo form_error("templatetitle"); ?>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">Tag line<span class="err">*</span></label>
<div class="col-md-9">
<input type="text" id="tagline" name="tagline" class="form-control validate[required]" placeholder="Enter Video Name"  value="" />
<?php echo form_error("tagline"); ?>
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">Background Image<span class="err">*</span></label>
<div class="col-md-9">
<input type="file" id="videourl" name="attachment" class="form-control validate[required]" />
<?php echo form_error("attachment"); ?>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">IOS preview Image<span class="err">*</span></label>
<div class="col-md-9">
<input type="file" id="videourl" name="iosfiles[]" class="form-control validate[required]" />
<?php echo form_error("iosfiles"); ?>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label" for="example-text-input">Website Image<sspan class="err">*</span></label>
<div class="col-md-9">
<input type="file" id="videourl" name="websitefiles[]" class="form-control validate[required]" />
<?php echo form_error("websitefiles"); ?>
</div>
</div>

<div class="form-group form-actions">
<div class="col-md-9 col-md-offset-3">
<input type="submit" id="submit" class="btn btn-sm btn-primary" name="savetemplate"  value="Submit"/>

</div>

</div>
</form>

<script type="text/javascript">
$(document).ready(function() { 
  
  $("#addcategory").validate({
                rules: {
                  // templatetitle:
                  // {
                  //   required: true,

                  // },
            attachment: {
              required: true,
              accept: "jpg|png|jpeg|pjpeg|gif"
            },
            websitefiles: {
              required: true,
              accept: "jpg|png|jpeg|pjpeg|gif"
            },
            iosfiles: {
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
</div>
</div>

