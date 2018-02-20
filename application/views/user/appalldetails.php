<?php  $this->load->view('/template/head');?>
<div class="showcase">
	<div class="textbox">
    	<div class="textbox-in">
            <h2>Hello! <?php echo ucwords($getuserdata->name);?> <span>Welcome to admin</span> portal.</h2>
            <p>Id alia soleat mel. Eros dolor vel no. <span>Ad cum justo quaeque, ea habeo</span> error honestatis quo	</p>
        </div>
    </div>
    <div class="imgbox">
    
    <?php
    $link=WEBROOT_PATH_IMAGES_CHURCH.'img-showcase.png';
    if($getuserdata->profile_image)
    {
        $link=WEBROOT_PATH_UPLOAD_IMAGES.'profileimages/'.$getuserdata->profile_image;

    }  
    ?>
    <img src="<?php echo $link?>" >
    </div>
</div>
<div class="container">
	<div class="box">
    	<div class="events-bar">
        	<div class="search">
            	<input type="text" class="input" placeholder="Search Event">
                <input type="button" class="search-btn">
            </div>
        	<div class="events-menu">
            	<ul>
                	<li><a href="#" class="active">List View</a></li>
                    <li><a href="#">Calendar View</a></li>
                </ul>
            </div>
            <div class="your-events">
            	<h3>Your Events</h3>
                <p>The following are the events your marked as going.</p>
                <a href="<?php echo SITE_URL;?>user/appdetails/<?php echo $app_id ?>" class="<?php if($pagetype=='') { echo 'active';} ?>">Publish Event</a>
                <a href="<?php echo SITE_URL;?>user/appdetails/<?php echo $app_id ?>/pastevent"  class="<?php if($pagetype=='pastevent') { echo 'active';} ?>">Past  Events</a>
                <a href="#" class="addevent" id="<?php echo $app_id;?>">Add Event</a>
            </div>
        </div>
        <div class="evets-gallery">
        <?php
        if(count($geteventalllist)>0)
        {
            foreach($geteventalllist as $geteventalllist)
            {

       
        ?>
        	<div class="col">
                <div class="img-box">
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
                    
                    <div class="overlay">
                        <h4  class="editevent" id="<?php echo $geteventalllist->id;?>">Modify Events</h4>
                    </div>
                 </div>
                 <div class="text-title">
                    <h5><?php echo $geteventalllist->title?></h5>
                    <span><?php echo date('Y-M-d',strtotime($geteventalllist->startdate))?> <span class="pink"><?php echo date('h:i A',strtotime($geteventalllist->startdate))?></span></span>
                 </div>
            </div>
            <?php 
           }
        }
        else
        {
            ?>
            <div class="bottom-column">
             <div class="common">
             <h5>No event list now</h5>
             <a href="<?php echo SITE_URL?>user/addevent/<?php echo $app_id;?>" target="_blank">Add Event</a>
            </div>
        
    </div>
            <?php 

           
        }
         ?>
        </div>
    </div>
    <div class="donations">
    	<div class="box">
        	<div class="textbox">
            	<h3>Donations</h3>
                <p>Eu pro sale fugit corrumpit, duo vidit constituto definiebas at. Omnium veritus in mea, eum offendit efficiendi ut. Ancillae facilisis sit at, ad vix aliquid explicari quaerendum, ius eu omnium habemus.</p>
                <a href="#">Update PayPal</a>
            </div>
            <div class="table">
            <?php 
            if(count($paymentarary)>0)
            {

            
            ?>
            	<div class="table-menu">
                	<ul>
                    	<li><a href="#">Overview</a></li>
                        <li><a href="#" class="active">Detailed</a></li>
                    </ul>
                </div>
                <div class="row first">
                    <div class="col">User</div>
                    <div class="col">Total Recived</div>
                    <div class="col">Date</div>
                </div>
                 <?php 
                    foreach($paymentarary as $paymentarary)
                    {

                    ?>
                    <div class="row">
                    <div class="col"><?php echo $paymentarary['name']?></div>
                    <div class="col"><?php echo $paymentarary['amount']?> $</div>
                    <div class="col"><?php echo $paymentarary['paydate']?></div>
                </div>
            	
                <?php 
            }
                 }
                 else
                 {
                    echo 'No paymnet record found.';
                 }
            ?>
                
                <div class="pagination">
                <?php 
                	if (isset($links)) {  
                        ?>
                        <ul>
                        <?php 
                        
                      
                       echo  $links;
                        
                        
           
             ?>
                    </ul>
                    <?php
             } 
             ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="manage-admin">
    	<div class="box">
        	<div class="textbox">
            	<h3>Manage Admins</h3>
                <p>Eu pro sale fugit corrumpit, duo vidit constituto definiebas at. Omnium veritus in mea, eum offendit efficiendi ut. Ancillae facilisis sit at, ad vix aliquid explicari quaerendum, ius eu omnium habemus.</p>
                <a href="#">Create New Admin</a>
            </div>
            <div class="table">
            	<div class="row first">
                	<div class="col">Admin</div>
                    <div class="co2">Permissions</div>
                </div>
                <div class="row">
                	<div class="col">Januka Wijesinghe</div>
                    <div class="co2"><a href="#" class="btn">Edit</a></div>
                </div>
                <div class="row">
                	<div class="col">Ray Williams</div>
                    <div class="co2"><a href="#" class="btn">Edit</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="publication">
    	<div class="box">
        	<div class="textbox">
            	<h3>Publications</h3>
                <p>Eu pro sale fugit corrumpit, duo vidit constituto definiebas at. Omnium veritus in mea, eum offendit efficiendi ut. Ancillae facilisis sit at, ad vix aliquid explicari quaerendum, ius eu omnium habemus.</p>
                <!-- <a href="#" class="pink">Publish Daily</a> -->
                <a href="#" class="sky addpublication" id="<?php echo $app_id;?>">Publish Announement</a>
            </div>
            <div class="table">
            <?php 
            if(count($announcementslist)>0)
            {

            
            ?>
            	<div class="table-menu">
                	<ul>
                    	<li><a href="#">Overview</a></li>
                        <li><a href="#" class="active">Detailed</a></li>
                    </ul>
                </div>
            	<div class="row first">
                	<div class="col">Title</div>
                    <div class="co2">Modify</div>
                </div>
                <?php 
                    foreach($announcementslist as $announcements)
                    {

                    ?>
                <div class="row">
                	<div class="col"><?php echo $announcements->title;?></div>
                    <div class="co2"><a href="#" class="btn editpublication" id="<?php echo $announcements->id?>">Edit</a></div>
                </div>
                <?php
            }
            
                }
                else
                {
                    echo 'No record found.';
                } 
                ?>
               
            </div>
        </div>
    </div>
    <?php 
    //if($login_type=='A')
   // {
        ?>
        <div class="bottom-column">
        <div class="common">
            <h5>Modify Pages</h5>
            <p>Ius corpora inimicus no, ne nobis cetero sententiae </p>
             <a href="<?php echo SITE_URL?>website/editwebsite/<?php echo $app_id;?>" target="_blank">Go to Edit Mode</a>
        </div>
        <div class="common">
            <h5>3App Admin</h5>
            <p>Ius corpora inimicus no, ne nobis cetero sententiae </p>
             <a href="http://webtakeoff.com/projects/Development/apptest/userlogin/mainlogin" target="_blank">Go to Admin Portal</a>
        </div>
    </div>
        <?php 
    //}
    ?>
    
</div>

<script type="text/javascript">
    $(document).ready(function()
    {
        $('.addpublication').click(function()
        {
            var appid=$(this).attr('id');
            modelbox('<div id="modelcontent"></div>','Add announcements');
            $.post(WEBROOT_PATH+'user/popuupbox',{'popupfor':'addanoucment','productid':appid},function(data,status)
            {
                $('#modelcontent').html(data);

            });

        });

        $('.editpublication').click(function()
        {
            var annoucmentid=$(this).attr('id');
            modelbox('<div id="modelcontent"></div>','Edit announcements');
            $.post(WEBROOT_PATH+'user/popuupbox',{'popupfor':'editanoucment','annoucmentid':annoucmentid},function(data,status)
            {
                $('#modelcontent').html(data);

            });

        });
        /////////// add and update event/////
        $('.addevent').click(function()
        {
            var appid=$(this).attr('id');
            modelbox('<div id="modelcontent"></div>','Add event');
            $.post(WEBROOT_PATH+'user/popuupbox',{'popupfor':'addevent','productid':appid},function(data,status)
            {
                $('#modelcontent').html(data);

            });

        });

        $('.editevent').click(function()
        {
            var eventid=$(this).attr('id');
            modelbox('<div id="modelcontent"></div>','Edit event');
            $.post(WEBROOT_PATH+'user/popuupbox',{'popupfor':'editevent','eventid':eventid},function(data,status)
            {
                $('#modelcontent').html(data);

            });

        });

    });

    /////////// add event fumction//////////
    function saveevent(appid)
    {
        var form_data = new FormData();
        var formerr = 0;
        var file = $('input[name=eventimage]')[0].files[0];
        if(file)
        {
          var fileName = file.name;
          var fileExt =  fileName.split('.').pop().toLowerCase();
          if($.inArray(fileExt, ['gif','png','jpg','jpeg','xlx','pdf','csv']) == -1)
          {
              alert('invalid file !');
              formerr++;
              return false;
          }
          else
          {
              form_data.append('eventimage', $('input[name=eventimage]')[0].files[0]); 
          }
        }

        if($('input[name=title]').val()=='')
        {
            alert('Please enter title');
              formerr++;
              return false;

        }
        if($('#myTextArea').val()=='')
        {
            alert('Please enter description');
              formerr++;
              return false;

        }
        if($('input[name=startdate]').val()=='')
        {
            alert('Please enter start date');
              formerr++;
              return false;

        }
        if($('input[name=enddate]').val()=='')
        {
            alert('Please enter end date');
              formerr++;
              return false;

        }

       if(formerr==0)
       {
            var inputData = $(':input').serializeArray();
            for (var i = 0, l = inputData.length; i < l; i++) {
            form_data.append(inputData[i].name,inputData[i].value);
             }
       }
        //alert(formerr);
        form_data.append('appid',appid);
        $.ajax({
                    type: "POST",
                    url: WEBROOT_PATH+'user/addevent',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                      success: function (response) 
                      {
                        if(response.status=='success')
                        {
                            $('.messagedisplay').html('<span class="sucess-msg">Save successfully</span>');
                            setTimeout(function()
                                { location.reload();
                                }, 2000);

                        }
                        else
                        {
                             $('.messagedisplay').html('<span class="error-msg">'+response.status+'</span>');

                        }
                      },
                      error: function (response) {
                         //alert('some technical issue.');
                         $('.messagedisplay').html('some technical issue');
                          
                      }
        });
                        
    }

     function saveeditevent(eventid)
    {
        var form_data = new FormData();
        var formerr = 0;
        var file = $('input[name=eventimage]')[0].files[0];
        //alert(file);
        if(file)
        {
          var fileName = file.name;
          //alert(fileName);
          var fileExt =  fileName.split('.').pop().toLowerCase();
           //alert(fileExt);
          if($.inArray(fileExt, ['gif','png','jpg','jpeg','xlx','pdf','csv']) == -1)
          {
              alert('invalid file !');
              formerr++;
              return false;
          }
          else
          {
              form_data.append('eventimage', $('input[name=eventimage]')[0].files[0]); 
          }
        }

        if($('input[name=title]').val()=='')
        {
            alert('Please enter title');
              formerr++;
              return false;

        }
        if($('#myTextArea').val()=='')
        {
            alert('Please enter description');
              formerr++;
              return false;

        }
        if($('input[name=startdate]').val()=='')
        {
            alert('Please enter start date');
              formerr++;
              return false;

        }
        if($('input[name=enddate]').val()=='')
        {
            alert('Please enter end date');
              formerr++;
              return false;

        }

       if(formerr==0)
       {
            var inputData = $(':input').serializeArray();
            for (var i = 0, l = inputData.length; i < l; i++) {
            form_data.append(inputData[i].name,inputData[i].value);
             }
       }
        //alert(formerr);
        form_data.append('eventid',eventid);
        $.ajax({
                    type: "POST",
                    url: WEBROOT_PATH+'user/updateevent',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                      success: function (response) 
                      {
                        if(response.status=='success')
                        {
                            $('.messagedisplay').html('<span class="sucess-msg">Save successfully</span>');
                            setTimeout(function()
                                { location.reload();
                                }, 2000);

                        }
                        else
                        {
                             $('.messagedisplay').html('<span class="error-msg">'+response.status+'</span>');

                        }
                      },
                      error: function (response) {
                         //alert('some technical issue.');
                         $('.messagedisplay').html('some technical issue');
                          
                      }
        });
                        
    }

    function saveannoucment(appid)
    {
        var form_data = new FormData();
        var formerr = 0;
        var file = $('input[name=announcementfile]')[0].files[0];
        if(file)
        {
          var fileName = file.name;
          var fileExt =  fileName.split('.').pop().toLowerCase();
          if($.inArray(fileExt, ['gif','png','jpg','jpeg','xlx','pdf','csv']) == -1)
          {
              alert('invalid file !');
              formerr++;
              return false;
          }
          else
          {
              form_data.append('announcementfile', $('input[name=announcementfile]')[0].files[0]); 
          }
        }

        if($('input[name=title]').val()=='')
        {
            alert('Please enter title');
              formerr++;
              return false;

        }
        if($('#myTextArea').val()=='')
        {
            alert('Please enter description');
              formerr++;
              return false;

        }

       if(formerr==0)
       {
            var inputData = $(':input').serializeArray();
            for (var i = 0, l = inputData.length; i < l; i++) {
            form_data.append(inputData[i].name,inputData[i].value);
             }
       }
        //alert(formerr);
        form_data.append('appid',appid);
        $.ajax({
                    type: "POST",
                    url: WEBROOT_PATH+'user/addannouncement',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                      success: function (response) 
                      {
                        if(response.status=='success')
                        {
                            $('.messagedisplay').html('<span class="sucess-msg">Save successfully</span>');
                            setTimeout(function()
                                { location.reload();
                                }, 2000);

                        }
                        else
                        {
                             $('.messagedisplay').html('<span class="error-msg">'+response.status+'</span>');

                        }
                      },
                      error: function (response) {
                         //alert('some technical issue.');
                         $('.messagedisplay').html('some technical issue');
                          
                      }
        });
                        
    }

    function updateannoucment(annoucmentid)
    {
        var form_data = new FormData();
        var formerr = 0;
        var file = $('input[name=announcementfile]')[0].files[0];
        if(file)
        {
          var fileName = file.name;
          var fileExt =  fileName.split('.').pop().toLowerCase();
          if($.inArray(fileExt, ['gif','png','jpg','jpeg','xlx','pdf','csv']) == -1)
          {
              alert('invalid file !');
              formerr++;
              return false;
          }
          else
          {
              form_data.append('announcementfile', $('input[name=announcementfile]')[0].files[0]); 
          }
        }

        if($('input[name=title]').val()=='')
        {
            alert('Please enter title');
              formerr++;
              return false;

        }
        if($('#myTextArea').val()=='')
        {
            alert('Please enter description');
              formerr++;
              return false;

        }

       if(formerr==0)
       {
            var inputData = $(':input').serializeArray();
            for (var i = 0, l = inputData.length; i < l; i++) {
            form_data.append(inputData[i].name,inputData[i].value);
             }
       }
        //alert(formerr);
        form_data.append('annoucmentid',annoucmentid);
        $.ajax({
                    type: "POST",
                    url: WEBROOT_PATH+'user/updateannouncement',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                      success: function (response) 
                      {
                        if(response.status=='success')
                        {
                            $('.messagedisplay').html('<span class="sucess-msg">Save successfully</span>');
                            setTimeout(function()
                                { location.reload();
                                }, 2000);

                        }
                        else
                        {
                             $('.messagedisplay').html('<span class="error-msg">'+response.status+'</span>');

                        }
                      },
                      error: function (response) {
                         //alert('some technical issue.');
                         $('.messagedisplay').html('some technical issue');
                          
                      }
        });
                        
    }
</script>


<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_PATH_CSS_CHURCH;?>jquery.datetimepicker.css" media="screen">

<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS_CHURCH;?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT_PATH_JS_CHURCH;?>jquery.datetimepicker.js"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $(document).on("mouseover",".ddcalendar", function(e){
                $('.ddcalendar').datetimepicker({
                    yearOffset:0,
                    lang:'en',
                    timepicker:true,
                    format:'Y-m-d H:i',
                    formatDate:'Y-m-d H:i',
                    minDate:0,
                    step:15

                    //minDate:'-1970/01/2',
                   // maxDate:'+1970/01/2'
                    //minDate:'-1970-01-02', // yesterday is minimum date
                    //maxDate:'+2025-01-02' // and tommorow is maximum date calendar
                });
            });

        $(document).on("mouseover",".ddcalendar1", function(e){
                $('.ddcalendar1').datetimepicker({
                    yearOffset:0,
                    lang:'en',
                    timepicker:true,
                    format:'Y-m-d H:i',
                    formatDate:'Y-m-d H:i',
                    minDate:0,
                    step:15

                    //minDate:'-1970/01/2',
                   // maxDate:'+1970/01/2'
                    //minDate:'-1970-01-02', // yesterday is minimum date
                    //maxDate:'+2025-01-02' // and tommorow is maximum date calendar
                });
            });
    });
</script>
