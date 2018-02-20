<div id="list-view" class="owl-carousel owl-theme">
<?php 
                if(count($geteventalllist)>0)
                {

                
                ?>
             
                  
                  
                  <?php
                  foreach($geteventalllist as $geteventalllist)
                  {

                  
                  ?>
                      <div class="item">
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
                                <img src="<?php echo WEBROOT_PATH_IMAGES_CHURCH;?>img-individual.png">
                                <?php

                            }
                            ?>
                      <div class="textbox"><h4><?php echo ucwords($geteventalllist->title);?></h4>
                      <p><?php echo substr($geteventalllist->description,0,40);?></p></div>
                      </div>
             
                 <?php
                  }
                    ?>       
                   
                    <?php
                  }
                  else
                  {
                    echo '<div>No event found.</div>';
                  }
                    ?>
                     </div>

                    <script>
   $(document).ready(function() {
  $("#list-view").owlCarousel({
 
      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
 });
    </script>