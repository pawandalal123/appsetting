<?php  $this->load->view('/template/head');?>

<div class="showcase2">
	<img src="<?php echo WEBROOT_PATH_IMAGES_CHURCH?>img-individual.png" />
    <div class="show-text">
    	<h2>We are Better, than others</h2>
        <p>Pri ut idque novum nostrud. Ei nullam vivendo ius. Ei vix esse solum <span>ancillae. Ad case iudico neglegentur mea. Id per error argumentum,</span> debet reprimique signiferumque vis ex</p>
    </div>
</div>

<div class="container">
	<div class="box">
    <div class="get-involve">
    	<h2>Get Involved with Us</h2>
        <div class="list-tab">
        	<div class="list-tabnav">
            	<ul>
                	<li class="active"><a href="<?php echo SITE_URL; ?>user/eventlist/<?php echo $app_id;?>">List View</a></li>
                    <li><a href="<?php echo SITE_URL; ?>user/calenederlist/<?php echo $app_id;?>">Calendar View</a></li>
                </ul>
            </div>
            <div class="list-tabcontent">
            	<div class="list-view">
                	<ul>
                    	
                        <?php
       
                    if(count($geteventalllist)>0)
                    {
                        foreach($geteventalllist as $geteventalllist)
                        {

                   
                    ?>
                    <li>
                            <?php 
                            if($geteventalllist->attachements)
                            {
                                ?>
                                 <img src="<?php echo WEBROOT_PATH_UPLODE_IMAGES.$geteventalllist->attachements;?>">
                                <?php

                            }
                            else
                            {
                                ?>
                                <img src="<?php echo WEBROOT_PATH_IMAGES_CHURCH;?>img-events.png">
                                <?php

                            }
                            ?>
                            <div class="textbox"><h4><?php echo $geteventalllist->title?></h4>
                            <p><?php echo substr($geteventalllist->description,0,30)?></p>
                            <span><?php echo date('Y-M-d',strtotime($geteventalllist->startdate))?></span></div>
                        </li>
                   
                        <?php 
                       }
                    }
                    else
                    {
                        ?>
                        <div class="bottom-column">
                         <div class="common">
                         <h5>No event list now</h5>
                         <a href="<?php echo SITE_URL?>user/appdetails/<?php echo $app_id;?>" target="_blank">Add Event</a>
                        </div>
                    
                   </div>
                        <?php 

                       
                    }
                     ?>
                    </ul>
                </div>
            </div>
            
            
        </div>
    </div>
       
    </div>
</div>








