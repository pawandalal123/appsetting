<!--------------- showcase ---------------->

<!--------------- showcase ---------------->
<!--------------- container ---------------->
<div class="container">

    
    <div class="get-started">
    	<div class="box">
        	<div class="textbox">
            	<h3>Let's <span>Get</span> Started</h3>
                <p>Looking cautiously round, to ascertain that they were not overheard, the two hags cowered nearer to the fire, and chuckled heartily.</p>
                <a href="#">View Templates</a>
            </div>
            
            <form method="post">
            <h2>&nbsp;
            <?php  if( $this->session->userdata('msg') ) {?>
            <span class="<?php echo $this->session->userdata('class');?>"> <?php echo $this->session->userdata('msg');?></span>
             <?php $this->session->unset_userdata('msg');}?></h2>
            <div class="get-form">
            	<div class="row">
                	<div class="col">
                    	<label>FIRST NAME</label>
                        <input type="text" class="input"  name="firstname">
                        <?php echo form_error('firstname');?>
                    </div>
                    <div class="col col2">
                    	<label>Last NAME</label>
                        <input type="text" class="input" name="lastname">
                        <?php echo form_error('lastname');?>
                    </div>
                </div>
                <div class="row">
                	<label>E-MAIL</label>
                    <input type="text" class="input" name="email">
                    <?php echo form_error('email');?>
                </div>
                <div class="row">
                	<label>MESSAGE</label>
                    <textarea name="message" cols="" rows="" class="textarea"></textarea>
                    <?php echo form_error('email');?>
                </div>
                <div class="row row2">
                	<input type="submit" class="btn-submit" value="Send" name="savecontact">
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!--------------- container ---------------->
