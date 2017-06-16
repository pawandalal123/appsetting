<script type="text/javascript" charset="utf-8">
$(document).ready(function()
{
var oTable = $('#example-datatable').dataTable
({
"bJQueryUI": true,
"bProcessing": true,
"sPaginationType": "full_numbers",
'bServerSide' : true,
"bDeferRender": true,
'sAjaxSource' : WEBROOT_PATH+"admin/subCatListDataTables",
"fnServerData": function ( sSource, aoData, fnCallback ) {
$.ajax( {
"dataType": 'json',
"type": "POST",
"url": sSource,
"data": aoData,
"success":fnCallback
});
}
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
      <h2><a href="#add_subcategory" class="btn btn-primary addsubcat" data-toggle="modal" ><strong>Add Manual</strong></a>&nbsp;
      <a href="#modalExcel" class="btn btn-primary addSubCatExcel" data-toggle="modal"><strong>Upload Excel</strong></a>
       <?php  if( $this->session->userdata('msg') ) {?>
<span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
 <?php $this->session->unset_userdata('msg');}?>
      </h2>
      <?php
		echo form_error("cat"); 
		echo form_error("subcat");

?>
    </div>
    <div class="table-responsive">
      <table id="example-datatable" class="display">
        <thead>
          <tr>
            <th>Sub Category</th>
            <th>Category</th>
           
            <th>Status</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
       
        </tbody>
      </table>
    </div>
  </div>
</div>
<div id="add_subcategory" class="modal" tabindex="-1" role="dialog" aria-hidden="true" ></div>
<div id="modalExcel" class="modal" tabindex="-1" role="dialog" aria-hidden="true"></div>
<div id="modal-regular2" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"> </div>
