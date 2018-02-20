<script>
$(document).ready(function(){
    $(".call-to-action li .col").click(function()
    {
        //alert('');
        $('.main-col').removeClass('active');
        $(this).parent().addClass("active");
    });
});
</script>

<!--------------- js ---------------->



<div class="container">
	<div class="box">
   		<div class="announcement add-announce">
        	<h3>Add Announcment</h3>
            <?php  if( $this->session->userdata('msg') ) {?>
                <span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
                 <?php $this->session->unset_userdata('msg');}?>
            <form method="post" action="" enctype="multipart/form-data">
            <div class="form-in">
            	<div class="row2">
                    <label>Titile</label>
                    <input class="input" type="text" placeholder="Donations Are Now Open" value="<?php echo  @$details->title ? @$details->title : set_value('title');?>" name="title" />
                        <?php echo form_error('title');?>
                </div>
                <div class="row2">
                    <label>Description</label>
                    <textarea name="description" cols="" rows="" class="textarea" placeholder="Edit Description"><?php echo  @$details->description ? @$details->description : set_value('Description');?></textarea>
                     <?php echo form_error('Description');?>
                </div>
                <div class="row2">
                    <label>Add Image</label>
                    <div class="upload-btn btn-primary">
                        <span>+</span>
                        <input type="file" class="upload" name="announcementfile" />
                	</div>
                </div>
                <div class="row2">
                    <label>Call to Action</label>
                    <div class="call-to-action">
                    	<ul>
                            <li>
                                <div class="main-col">
                                <div class="col check">
                                <input type="radio" name="calltoaction" value="Email">
                                <label>Email</label><div class="bullet"></div>
                                </div>
                                 <div class="input-sec">
                                 <input type="text" name="callemail" class="input2" placeholder="Enter Email"></div>
                                </div>
                            </li>
                            <li>
                                <div class="main-col"><div class="col placeholder"><input type="radio" name="calltoaction" value="Phone"><label>Phone</label><div class="bullet"></div></div>
                                <div class="input-sec"><input type="text" name="callphone" class="input2" placeholder="Enter Phone"></div>
                                </div>
                            </li>
                            <li>
                                <div class="main-col">
                                <div class="col placeholder">
                                <input type="radio" name="calltoaction" value="Web">
                                <label>Web</label> <div class="bullet"></div></div>
                                <div class="input-sec">
                                <input type="text" class="input2" name="callweb" placeholder="Enter Web"></div>
                                </div>
                            </li>
                            <li>
                                <div class="main-col"><div class="col placeholder"><input type="radio" name="calltoaction" value="Payment"><label>Payment</label> <div class="bullet"></div></div>
                                <div class="input-sec"><input type="text" class="input2" name="callpay" placeholder="Enter Payment"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
            
                <!-- <input type="Submit" name="savepreview" value="Preview" class="btn-addnew"> -->
                <input type="Submit" name="saveform" value="Submit" class="btn-addnew">
            </div>
            </form>
        </div>
    </div>
</div>



