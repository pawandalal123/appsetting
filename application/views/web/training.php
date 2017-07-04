<script>
$(document).ready(function(){
  $("select.select").each(function() {
        var e = $(this).attr("title");
        if ($("option:selected", this).val() != "") e = $("option:selected", this).text();
        $(this).css({
            "z-index": 10,
            opacity: 0,
            "-khtml-appearance": "none"
        }).after('<span class="select">' + e + "</span>").change(function() {
            val = $("option:selected", this).text();
            $(this).next().text(val)
        })
    })
});
</script>
<div class="container">
	<div class="box">
    	<div class="welcome-row">
        	<!-- <div class="welcome-msg">
            	<h4>Welcome <samp>Januka!</samp> <span>CustomerID 345</span></h4>
            </div> -->
            <div class="editing">
            	<label>Choose Product</label>
                <div class="select-box">
                <select class="select">
                    <option>All</option>
                    <option>All</option>
                    <option>All</option>
                </select>
                </div>
            </div>
        </div>
        
        <div class="taining-bar">
        	<h3>Training Guides</h3>
            <div class="search-box">
            	<input type="text" class="input" placeholder="Search">
                <input type="submit" value="search" class="search-btn">
            </div>
        </div>
        
        <div class="products-list">
        <?php 
        if(count($getvideos)>0)
        {
         ?>
        	<ul>
            <?php 
            foreach($getvideos as $getvideoslist)
            {
                $link= $getvideoslist->video_link;
                if(strpos($getvideoslist->video_link, 'http')===false)
                {
                    $link= 'https://'.$getvideoslist->video_link;

                }
            ?>
            	<li>
                    <iframe src="<?php echo $link;?>" frameborder="0" allowfullscreen></iframe>
                    <h3><?php echo $getvideoslist->video_title;?></h3>
                    <!-- <h4>V7 Digital Photo Printing</h4> -->
                </li>
                <?php
            }
                ?>

                
            </ul>
            <?php
        }
        ?>
        </div>
        
        <div class="bottom-text">
        	<span>Anonymous Proxy</span>
            <p>Get The Boot A Birds Eye Look Into Mcse Boot Camps</p>
        </div>
        
    </div>
</div>





