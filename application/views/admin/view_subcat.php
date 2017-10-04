<div id="page-content">

<ul class="breadcrumb breadcrumb-top">
<li>Admin</li>
<li><a href="category">View Category</a></li>
</ul>
<div class="block full">
<div class="block-title">
<h2>&nbsp;
<?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?></h2>


</div>
         <form action="" method="post" id="uploadexcel" enctype="multipart/form-data" class="form-horizontal form-bordered"/>
        <div class="form-group">
          <label class="col-md-3 control-label" for="example-text-input">Category <span class="err">*</span></label>
          <div class="col-md-9">
            <select name="cat" id="cat" class="form-control validate[required]">
            
              <option value="">--select--</option>
              <?php if(isset($catrow)){
			
              foreach($catrow as $cat)
                {
                  $selected='';
                  if($cat->id==@$catdetails->category_id)
                  {
                    $selected='selected';

                  }
                  ?>
              <option value="<?php echo $cat->id;?>" <?php echo $selected;?>><?php echo $cat->name;?></option>
              <?php } }?>
              
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label" for="example-file-input">Subcategory name<span class="err">*</span></label>
          <div class="col-md-9">
            <input type="text" id="excelfile" name="subcatename" class="form-control validate[required]" value="<?php echo @$catdetails->name;?>"  />
          </div>
        </div>
         <div class="form-group">
          <label class="col-md-3 control-label" for="example-file-input">Susbcription Amount<span class="err">*</span></label>
          <div class="col-md-9">
            <input type="text" id="excelfile" name="amount" class="form-control validate[required,custom[integer]]" value="<?php echo @$catdetails->price;?>"  />
          </div>
        </div>
         <div class="form-group">
          <label class="col-md-3 control-label" for="example-file-input">Max install<span class="err">*</span></label>
          <div class="col-md-9">
            <input type="text" id="excelfile" name="maxinstall" class="form-control validate[required,custom[integer]]"  value="<?php echo @$catdetails->max_users;?>" />
          </div>
        </div>
        <div class="modal-footer">
          <div class="form-group form-actions">
            <div class="col-md-9 col-md-offset-3">
              <input type="submit" id="submit" class="btn btn-sm btn-primary" name="addsubcategory"  value="Save"/>
            
            </div>
          </div>
        </div>
        </form>

<div class="table-responsive">
<table  class="table table-vcenter table-condensed table-bordered">
<thead>
<tr>
<th class="text-center">ID</th>
<th>Subcategory </th>
<th>Category </th>
<th>Amount </th>
<th>Max install </th>
<th>Status</th>
<th class="text-center">Created at</th>



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

<td><?php echo $result->name;?></td>
<td><?php echo $result->catname;?></td>
<td><?php echo $result->price;?></td>
<td><?php echo $result->max_users;?></td>

<td class="text-center">
<div class="btn-group">
<?php if($result->status==1){?>
<a href="<?php echo SITE_URL.'admin/activeDeactivesubCategory';?>/<?php echo $result->id;?>/Active" title="Activated" ><img src="<?php echo WEBROOT_PATH_IMAGES_admin;?>green_icon.png" alt="Activated" /></a>
<?php } else{?>
<a href="<?php echo SITE_URL.'admin/activeDeactivesubCategory';?>/<?php echo $result->id;?>/deActive" title="Deactivated" ><img src="<?php echo WEBROOT_PATH_IMAGES_admin;?>red_icon.png" alt="Deactivated" /></a>
<?php }?>
</div>
<a href="<?php echo SITE_URL.'admin/subcategory';?>/<?php echo $result->id;?>">Edit</a>
</td>
<td><?php echo $result->created_at?></td>

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


