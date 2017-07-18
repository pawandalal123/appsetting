
<script type="text/javascript">

$(document).ready(function()
{
  $('.clickme').click(function()
  {
    var messageid = $(this).attr('id');
    var body='<div class="modalcontent"></div>';
    modelblock('Make Reply',body);
    $.post(WEBROOT_PATH+'admin/makereply',{'messageid':messageid},function(data,status)
    {
      $('.modalcontent').html(data);

    });

  });
  

});
   
</script>

<div id="page-content">
  <ul class="breadcrumb breadcrumb-top">
    <li>Admin</li>
    <li><a href="subcategory"> Sub Category</a></li>
  </ul>
  <div class="block full">
    <div class="block-title">
      <h2>
       <?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?>
      </h2>
      
    </div>
  
<div class="table-responsive">
<table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
<thead>
<tr>
<th class="text-center">ID</th>

<th class="text-center">Report For</th>
<th class="text-center">Subject</th>
<th class="text-center">Message</th>
<!-- <th class="text-center">Image</th> -->
<th class="text-center">Action</th>


<th></th>

</tr>
</thead>
<tbody>
<?php 
if(isset($reportdata)){
//pr($rows);
$c=0;
foreach($reportdata as $result)
{
$c++; ?>
<tr>
<td class="text-center"><?php echo $c;?></td>

<td><?php echo $result->username;?></td>
<td><?php echo $result->subject;?></td>
<td><?php echo $result->report_message;?></td>
<!-- <td class="text-center"><img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES;?>profile_img/<?php echo $result->profile_image;?>" alt="avatar" class="img-circle" width="64" height="64" /></td> -->
<td class="text-center">
<div class="btn-group">

<a class="clickme" href="#" title="Activated"  id="<?php echo  $result->id;?>">Reply</a>

</div>
</td>


<td></td>

</tr>
<?php }
}?>
</tbody>
</table>
</div>
  </div>
</div>

