<div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header text-center">
<h2 class="modal-title"><i class="fa fa-pencil"></i> Change Password</h2>
</div>
<div class="modal-body">
<form action="<?php echo SITE_URL.'admin/changePassword';?>" method="post" id="changePass" enctype="multipart/form-data" class="form-horizontal form-bordered"  />

<fieldset>

<div class="form-group">
<label class="col-md-4 control-label" for="user-settings-password">New Password <span class="err">*</span></label>
<div class="col-md-8">
<input type="password" id="user-settings-password" name="npassword" class="form-control validate[required]" value="" placeholder="Please choose a complex one.." />
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="user-settings-repassword">Confirm New Password <span class="err">*</span></label>
<div class="col-md-8">
<input type="password" id="user-settings-repassword" name="repassword" class="form-control validate[required]" value="" placeholder="..and confirm it!" />
</div>
</div>
</fieldset>
<div class="form-group form-actions">
<div class="col-xs-12 text-right">
<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
<input type="submit" class="btn btn-sm btn-primary" value="Save Changes"/>
</div>
</div>
</form>
</div>
</div>
</div>
</div>