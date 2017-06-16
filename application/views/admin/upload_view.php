<div id="container">
 
<?php echo  form_open_multipart('admin/uploadfile')?>
 
<input type="file" name="userfile" />
 
<p><input type="submit" name="submit" value="submit" /></p>
 
<?php echo form_close();?>