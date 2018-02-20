<?php  $this->load->view('/template/head');?>
<script src="<?php echo WEBROOT_PATH_JS_CHURCH; ?>owl-crousel.js"></script>
   <input type="hidden" name="appid" value="<?php echo $app_id;?>">
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
                	<li><a href="<?php echo SITE_URL; ?>user/eventlist/<?php echo $app_id;?>">List View</a></li>
                    <li class="active"><a href="<?php echo SITE_URL; ?>user/calenederlist/<?php echo $app_id;?>">Calendar View</a></li>
                </ul>
            </div>
            
            
            <div class="list-tabcontent">
            	<div class="calender-v">
                <div class="col1 eventlistbox">
                  <?php
                  $this->load->view('elements/eventcrousel');
                  ?>
                    </div>
                    
                    <div class="col2">
                  
          	<div class="calender">
                <h2></h2>
                <table id="calendar-demo" class="calendar" border="0" cellspacing="0" cellpadding="0" ></table>
        	</div>
           
        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
    </div>
</div>


<style type="text/css">
  #dt {
        margin: 30px auto;
        height: 28px;
        width: 200px;
        padding: 0 6px;
        border: 1px solid #ccc;
        outline: none;
    }
    .calendar {
    width: 280px;
    height: 330px;
}
.calendar-modal {
    display: none;
    position: absolute;
    background: #fdfdfd;
    border: 1px solid #e8e8e8;
    box-shadow: 1px 2px 3px #ddd
}
.calendar-inner {
    position: relative;
    z-index: 1;
    -webkit-perspective: 1000;
    -moz-perspective: 1000;
    -ms-perspective: 1000;
    perspective: 1000;
    -ms-transform: perspective(1000px);
    -moz-transform: perspective(1000px);
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
}
.calendar-views {
    transform-style: preserve-3d;
}
.calendar .view {
    backface-visibility: hidden;
    position: absolute;
    top: 0;
    left: 0;
    *overflow: hidden;
    -webkit-transition: .6s;
    transition: .6s;
}
.calendar-d .view-month,
.calendar-m .view-date {
    transform: rotateY(180deg);
    visibility: hidden;
    z-index: 1;
}
.calendar-d .view-date,
.calendar-m .view-month {
    transform: rotateY(0deg);
    visibility: visible;
    z-index: 2;
}
.calendar-ct,
.calendar-hd,
.calendar-views .week,
.calendar-views .days {
    overflow: hidden;
}
.calendar-views {
    width: 100%;
}
.calendar .view,
.calendar-display,
.calendar-arrow .prev,
.calendar .date-items li {
    float: left;
}
.calendar-arrow,
.calendar-arrow .next {
    float: right;
}
.calendar-hd {
    padding: 10px 0;
    height: 30px;
    line-height: 30px;
}
.calendar-display {
    font-size: 28px;
    text-indent: 10px;
}
.view-month .calendar-hd {
    padding: 10px;
}
.calendar-arrow,
.calendar-display {
    color: #ddd;
}
.calendar li[disabled] {
    color: #bbb;
}
.calendar li.old[disabled],
.calendar li.new[disabled] {
    color: #eee;
}
.calendar-display .m,
.calendar-views .week,
.calendar-views .days .old,
.calendar-views .days .new,
.calendar-display:hover,
.calendar-arrow span:hover {
    color: #888;
}

.calendar-arrow span,
.calendar-views .days li[data-calendar-day],
.calendar-views .view-month li[data-calendar-month] {
    cursor: pointer;
} 
.calendar li[disabled] {
    cursor: not-allowed;
}

.calendar-arrow {
    width: 50px;
    margin-right: 10px;
}
.calendar-arrow span {
    font: 500 26px sans-serif;
}

.calendar ol li {
    position: relative;
    float: left;
    text-align: center;
    border-radius: 50%;
}
.calendar .week li,
.calendar .days li {
    width: 40px;
    height: 40px;
    line-height: 40px;
}
.calendar .month-items li {
    width: 70px;
    height: 70px;
    line-height: 70px;
}
.calendar .days li[data-calendar-day]:hover,
.calendar .view-month li[data-calendar-month]:hover {
    background: #eee; 
}
.calendar .calendar-views .now {
    color: #fff;
    background: #66be8c!important;  
}
.calendar .calendar-views .selected {
    color: #66be8c;
    background: #CDE9D9!important; 
}
.calendar .calendar-views .dot {
    position: absolute;
    left: 50%;
    bottom: 4px;
    margin-left: -2px; 
    width: 4px;
    height: 4px;
    background: #66be8c;
    border-radius: 50%;
}
.calendar-views .now .dot {
    background: #fff;
}

.calendar .date-items {
    width: 300%;
    margin-left: -100%;
}

.calendar-label {
    display: none;
    position: absolute;
    top: 50%;
    left: 50%;
    z-index: 2;
    padding: 5px 10px;
    line-height: 22px;
    color: #fff;
    background: #000;
    border-radius: 3px;
    opacity: .7;
    filter: alpha(opacity=70);
}
.calendar-label i {
    display: none;
    position: absolute;
    left: 50%;
    bottom: -12px;
    width: 0;
    height: 0;
    margin-left: -3px;
    border: 6px solid transparent;
    border-top-color: #000;
}
</style>


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

<script src="http://www.jqueryscript.net/demo/Pretty-Event-Calendar-&-Datepicker-Plugin-For-jQuery-Calendar-js/calendar.js"></script>

<script>
//$('#demo').dcalendarpicker();
//$('#calendar-demo').dcalendar(); //creates the calendar
$('#calendar-demo').calendar({
       format: 'yyyy-mm-dd',

        // view: 'month',
        width: 320,
        height: 320,
        // startWeek: 0,
        // selectedRang: [new Date(), null],
        data: [
    {
      date: '2017/12/24',
      value: 'Christmas Eve'
    },
    {
      date: '2017/12/25',
      value: 'Merry Christmas'
    },
    {
      date: '2016/01/01',
      value: 'Happy New Year'
    }
  ],
        onSelected: function (view, date, data)
         {
            var id=$('input[name=appid]').val();
            $.post(WEBROOT_PATH+'user/getevents',{'id':id,'selected':date},function(data,status)
            {


            $('.eventlistbox').html(data);
            }).fail(function(response)
           {
              alert('please try later');
          });
        }
    });

</script>