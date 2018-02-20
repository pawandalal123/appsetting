<div class="container">
    <div class="box">
        <div class="announcement">
            <h3>Edit Announcment</h3>
            <?php
            if(count($allannoucment)>0) 
            {
                ?>
                  <ul>
                  <?php 
                  foreach($allannoucment as $allannoucment)
                  {
                    ?>
                     <li>
                    <div class="main-col"><div class="col"><input type="checkbox" name="1"><label><?php echo $allannoucment->title?></label><div class="bullet"></div></div></div>
                    <a href="<?php echo SITE_URL?>user/editannouncement/<?php echo $app_id.'/'.$allannoucment->id;?>" class="btn">Edit</a>
                    </li>
              
                    <?php
                  }
                  ?>
               
            </ul>
                <?php

            }
            ?>
          
            <div class="row">
                <a href="<?php echo SITE_URL?>user/addannouncement/<?php echo $app_id;?>" class="btn-addnew">Add New</a>
            </div>
        </div>
    </div>
</div>