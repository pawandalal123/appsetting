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



 <div class="messagedisplay"></div>
            
            
            <div class="form-in">
                <div class="row2">
                    <label>Titile</label>
                    <input class="input" type="text" placeholder="Donations Are Now Open" value="<?php echo  @$details->title ?>" name="title" />
                        
                </div>
                <div class="row2">
                    <label>Description</label>
                    <textarea name="description" cols="" rows="" class="textarea" placeholder="Edit Description"><?php echo  @$details->description ?></textarea>
                     
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
                                <div class="main-col <?php if(@$details->action_type=='Email') { 
                                   echo 'active'; }?>">
                                <div class="col check">
                                <input type="radio" name="calltoaction" value="Email" <?php if(@$details->action_type=='Email') { 
                                   echo 'checked'; }?> >
                                <label>Email</label><div class="bullet"></div>
                                </div>
                                 <div class="input-sec">
                                 <input type="text" name="callemail" class="input2" placeholder="Enter Email" <?php if(@$details->action_type=='Email') { 
                                    ?> 
                                    value="<?php echo @$details->call_to_action;?>"
                                    <?php  }?>></div>
                                </div>
                            </li>
                            <li>
                                <div class="main-col"><div class="col placeholder"><input type="radio" name="calltoaction" value="Phone" <?php if(@$details->action_type=='Phone') { 
                                   echo 'checked'; }?>><label>Phone</label><div class="bullet"></div></div>
                                <div class="input-sec"><input type="text" name="callphone" class="input2"   placeholder="Enter Phone" <?php if(@$details->action_type=='Phone') { 
                                    ?> 
                                    value="<?php echo @$details->call_to_action;?>"
                                    <?php  }?></div>
                                </div>
                            </li>
                            <li>
                                <div class="main-col">
                                <div class="col placeholder">
                                <input type="radio" name="calltoaction" value="Web" <?php if(@$details->action_type=='Web') { 
                                   echo 'checked'; }?>>
                                <label>Web</label> <div class="bullet"></div></div>
                                <div class="input-sec">
                                <input type="text" class="input2" name="callweb"  placeholder="Enter Web" <?php if(@$details->action_type=='Web') { 
                                    ?> 
                                    value="<?php echo @$details->call_to_action;?>"
                                    <?php  }?>></div>
                                </div>
                            </li>
                            <li>
                                <div class="main-col"><div class="col placeholder"><input type="radio" name="calltoaction" value="Payment" <?php if(@$details->action_type=='Payment') { 
                                   echo 'checked'; }?>><label>Payment</label> <div class="bullet"></div></div>
                                <div class="input-sec"><input type="text" <?php if(@$details->action_type=='Payment') { 
                                    ?> 
                                    value="<?php echo @$details->call_to_action;?>"
                                    <?php  }?> class="input2" name="callpay"  placeholder="Enter Payment"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
            
                <!-- <input type="Submit" name="savepreview" value="Preview" class="btn-addnew"> -->
                <!-- <input type="Submit" name="saveform" value="Submit" class="btn-addnew"> -->
                 <a href="#" class="btn-addnew" onclick="updateannoucment('<?php echo $this->input->post('annoucmentid')?>')">Update</a>
            </div>
           
        
