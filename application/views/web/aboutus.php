<!--------------- showcase ---------------->
<div class="showcase about-show">
	<img src="<?php echo WEBROOT_PATH_IMAGES;?>showcase3.jpg" alt="">
    <div class="outer-box">
        <div class="showcase-text">
            <div class="box">
                 <h2>Best Quotes <span>From All Over</span> The World</h2>
                 <p>This sounded a very good reason, and Alice was quite pleased to know it. 'I never thought of that before!' she said.</p>
            </div>
        </div>
    </div>
</div>
<!--------------- showcase ---------------->
<!--------------- container ---------------->
<div class="container">
	<div class="we-do">
    	<div class="imgbox"><img src="<?php echo WEBROOT_PATH_IMAGES;?>img-we-do.png" alt=""></div>
        <div class="textbox">
        	<h3>How We Do It</h3>
            <p>Just then her head struck against the roof of the hall: in fact she was now more than nine feet high, and she at once took up the little golden key and hurried off to the garden door.</p>
            <ul>
            	<li>
                	<img src="<?php echo WEBROOT_PATH_IMAGES;?>ico-music.jpg" alt="">
                    <h4>FIRST</h4>
                    <p>This sounded a very good reason, and Alice was quite pleased to know it.</p>
                </li>
                <li>
                	<img src="<?php echo WEBROOT_PATH_IMAGES;?>ico-mike.jpg" alt="">
                    <h4>SECOND</h4>
                    <p>There have not been any since we have lived here, said my mother.</p>
                </li>
                <li>
                	<img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-third.jpg" alt="">
                    <h4>THIRD</h4>
                    <p>It was some time before he obtained any answer, and the reply, when made, was unpropitious.</p>
                </li>
                <li>
                	<img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-fourth.jpg" alt="">
                    <h4>FOURTH</h4>
                    <p>For good, too; though, in conse-quence of my previous emotions, I was still occasionally seized with a stormy sob.</p>
                </li>
            </ul>
        </div>
    </div>
    <div class="core-services">
   		<div class="box">
        	<h3>Core Services</h3>
            <div class="col">
            	<img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-one.png" alt="">
            	<h4>Web Development</h4>
                <p>Looking cautiously round, to ascertain that they were not overheard, the two hags cowered nearer to the fire, and chuckled heartily</p>
            </div>
            <div class="col">
            	<img src="<?php echo WEBROOT_PATH_IMAGES;?>ico-two.png" alt="">
            	<h4>Web Development</h4>
                <p>Looking cautiously round, to ascertain that they were not overheard, the two hags cowered nearer to the fire, and chuckled heartily</p>
            </div>
            <div class="col">
            	<img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-three.png" alt="">
            	<h4>Web Development</h4>
                <p>Looking cautiously round, to ascertain that they were not overheard, the two hags cowered nearer to the fire, and chuckled heartily</p>
            </div>
        </div>
    </div>
    <div class="based-in">
    	<div class="box">
        	<div class="author-name"><h2>Based in <span>Alpharetta, GA</span></h2></div>
            <div class="textbox"><p>There are many things that are important to catalog design. Your images must be sharp and appealing. Your text and even the font you use for the text is important.</p></div>
        </div>
    </div>
    <div class="aut-testimonal">
    	<div class="box">
        	<div id="owl-demo" class="owl-carousel owl-theme">
                  <div class="item">"Your affordability calculator saved me some serious time to focus on what I can actually buy."</div>
                  <div class="item">"Your affordability calculator saved me some serious time to focus on what I can actually buy."</div>
                  <div class="item">"Your affordability calculator saved me some serious time to focus on what I can actually buy."</div>
                </div>
        </div>
    </div>
    
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
