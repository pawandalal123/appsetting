$(document).ready(function()
{
/* my account page begins*/
if($("#financial-overview").length){
	 
	 $('#financial-overview').DataTable( {
        "dom": '<"top">rt<"bottom clearfix"pil><"clear">',
		"pagingType" : "simple",
		"language": {
		"info": "_START_ to _END_ of _TOTAL_",	
		"lengthMenu":  "Rows per page:  _MENU_",
		'paginate': {
		  'previous': '<span class="fa fa-chevron-left"></span>',
		  'next': '<span class="fa fa-chevron-right"></span>'
		}
	  }
     });
	
}
if($("#enhancement-detail").length){
	 
	 $('#enhancement-detail').DataTable( {
        "dom": '<"top">rt<"bottom clearfix"pil><"clear">',
		"pagingType" : "simple",
		"language": {
		"info": "_START_ to _END_ of _TOTAL_",	
		"lengthMenu":  "Rows per page:  _MENU_",
		'paginate': {
		  'previous': '<span class="fa fa-chevron-left"></span>',
		  'next': '<span class="fa fa-chevron-right"></span>'
		}
	  }
     });
	$(".paynow a").click(function() {
	$.magnificPopup.open({items: { src: '#payment-popup'},type: 'inline'});	
	 });
}
if($("#miscellaneous-fees").length){
	 
	 $('#miscellaneous-fees').DataTable( {
        "dom": '<"top miscfilter"<"filtercontainer">f>rt<"bottom clearfix"pil><"clear">',
		"pagingType" : "simple",
		"language": {
		"info": "_START_ to _END_ of _TOTAL_",	
		"lengthMenu":  "Rows per page:  _MENU_",
		'paginate': {
		  'previous': '<span class="fa fa-chevron-left"></span>',
		  'next': '<span class="fa fa-chevron-right"></span>'
		}
	  }
	   
	
     });

var str = '<div class="filterinput"><form class="form-inline"><label> Date of Fee From </label><div class="form-group"><div class="input-group date" id="datetimepicker1"><input type="text" class="form-control" /><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div></div><label> To </label><div class="form-group"><div class="input-group date" id="datetimepicker1"><input type="text" class="form-control" /><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div></div></form></div>';
	$(".filtercontainer").html(str);	
	
}

if($("#payment-transactions").length){
	 
	 $('#payment-transactions').DataTable( {
        "dom": '<"top">rt<"bottom clearfix"pil><"clear">',
		"pagingType" : "simple",
		"language": {
		"info": "_START_ to _END_ of _TOTAL_",	
		"lengthMenu":  "Rows per page:  _MENU_",
		'paginate': {
		  'previous': '<span class="fa fa-chevron-left"></span>',
		  'next': '<span class="fa fa-chevron-right"></span>'
		}
	  }
     });
	
}

if($("#user-management").length){
	 
	 $('#user-management').DataTable( {
        "dom": '<"top">rt<"bottom clearfix"pil><"clear">',
		"pagingType" : "simple",
		"language": {
		"info": "_START_ to _END_ of _TOTAL_",	
		"lengthMenu":  "Rows per page:  _MENU_",
		'paginate': {
		  'previous': '<span class="fa fa-chevron-left"></span>',
		  'next': '<span class="fa fa-chevron-right"></span>'
		}
	  }
     });
	
}

$("[data-toggle=tooltip]").tooltip();


      $(document).on('change','.categorychange',function()
      {
       // alert();
         var category = $(this).val();
         $.post(WEBROOT_PATH+'commonfunc/categorylist',{'category':category},function(data,status)
          {
            $('.subcat').html(data);
          }).fail(function(response)
           {
              alert('please try later');
          });

      });
    $('.makesearch').keyup(function()
    {
      var searhval = $(this).val();
      if(searhval.length>=3)
      {
         $.post(WEBROOT_PATH+'commonfunc/searchlist',{'searhval':searhval},function(data,status)
          {
            
          }).fail(function(response)
           {
              alert('please try later');
          });

      }

    });

    $('.makesearchvideo').keyup(function()
    {
      var searhval = $(this).val();
      if(searhval.length>=3)
      {
         $.post(WEBROOT_PATH+'user/training',{'searhval':searhval},function(data,status)
          {
            
          }).fail(function(response)
           {
              alert('please try later');
          });

      }

    });
      var _URL = window.URL || window.webkitURL;
      $(document).on('click','.profileeditable',function()
        {
            var toedit =$(this).attr('rel');
             var t = $(this).prevAll(toedit).first().text();
             var type = $(this).prevAll(toedit).first().attr('id');
              $(this).prevAll(toedit).first().text('').append($('<input />',{'value' : t,'class' : 'editableprofile'}));

       
             //$(this).('input').focus();
        });
        $('.profileclass').on('blur','.editableprofile',function()
          {
            //alert($(this).val());
            var feildfor = $(this).parent().attr('id')
            var id = $('input[name=update_for]').val(); //$(this).parent().attr('rel');
            var feildname = $(this).val();
            var oldvalue = '';
           //return false;
            var err=0;
           //return false;
            if(feildname=='')
            {
               err++;
              alert('Please enter value');
              return false;
            }
            if(feildfor=='useremail')
            {
              oldvalue = $('.oldemail').val();
              var emailRegex = new RegExp(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/);
              var valid = emailRegex.test(feildname);
              if(!valid)
              {
                err++;
                alert('Please Enter valid email address');
                return false;
              }
            }
            if(feildfor=='usermobile')
            {
             var phonemsg=new RegExp(/([0-9\s\-]{7,})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/);
              var mobvalid=phonemsg.test(feildname)
              if(!mobvalid)
              {
                err++;
                alert('Please Enter valid mobile number');
                return false;
              }
            }
            if(err==0)
            {
              $(this).parent().text(feildname);
              
              $.post(WEBROOT_PATH+'user/updateprofile',{'feildfor':feildfor,'id':id,'feildname':feildname},function(data,status)
              {
                  if(data.status=='success')
                  {
                    if(feildfor=='useremail')
                    {
                      $('.oldemail').val(feildname);
                    }
                    
                    //swal({ title: "Done", text: "Successfully Created", type: "success" });
                  }
                  else if(data.status=='emailexit')
                  {
                    $('#useremail').text(oldvalue);
                    alert('Email alredy exit');
                    return false;

                  }
                  else
                  {
                    alert('Please try later');
                    return false;

                  }
               
              },'json').fail(function(response) {
                    alert('Some technical issue');
                    
                    });;
        }
    });
        $(document).on('click','.maketextable',function()
        {
            var toedit =$(this).attr('rel');
             var t = $(this).prevAll(toedit).first().text();
             var type = $(this).prevAll(toedit).first().attr('id');
             if(type=='index_banner_text' || type=='testmo_text' || type=='point_first_text' || type=='point_second_text' || type=='point_third_text' || type=='banner_text' 
              || type=='point_first_text' || type=='point_second_text' || type=='point_third_text' || type=='home_keypoint_first' 
              || type=='home_keypoint_second' || type=='home_keypoint_third'  || type=='bootom_first_text' || type=='bootom_second_text'  || type=='contact_right_text' 
              || type=='donate_banner_text' || type=='donate_center_text' || type=='donate_right_text' || type=='footertext')
             {
                var editableText = $('<textarea />',{'class' : 'editable'});
                editableText.val(t);
               $(this).prevAll(toedit).first().text('').append(editableText);

             }
             else
             {
              $(this).prevAll(toedit).first().text('').append($('<input />',{'value' : t,'class' : 'editable'}));

             }
             
             //$(this).('input').focus();
        });
        $(document).on('click','.maketextableli',function()
        {
             //alert();
             var t = $(this).prevAll("a").first().text();
            
             $(this).prevAll("a").first().text('').append($('<input />',{'value' : t,'class' : 'form-control'}));
             $('input').focus();
        });
        $('.mainclass').on('blur','.editable',function()
          {
            //alert($(this).val());
            var feildfor = $(this).parent().attr('id')
            var id = $('input[name=template_id]').val(); //$(this).parent().attr('rel');
            var feildname = $(this).val();
           //return false;
            if(feildname=='')
            {
              alert('Please enter value');
              return false;
            }
            else
            {
              $(this).parent().text(feildname);
              $.post(WEBROOT_PATH+'website/updatedetails',{'feildfor':feildfor,'id':id,'feildname':feildname},function(data,status)
              {
              
                  if(data.status=='success')
                  {
                    //swal({ title: "Done", text: "Successfully Created", type: "success" });
                  }
                  else
                  {
                    alert('Please try later');
                    return false;

                  }
               
              },'json');
        }
    });
    $('input[name=background_image]').change(function()
    {

      var file, img;
      var fileField  = this.files[0];
       var id = $('input[name=template_id]').val();
      var upadtefor = $(this).attr('rel');
      var name = fileField.name;
      var size = fileField.size;
      img = new Image();
      var imgwidth = 0;
      var imgheight = 0;
      var maxwidth = 232;
      var maxheight = 391;
      if ((file = this.files[0])) 
      {
        $('#page_hide').show()
          img = new Image();
          img.onload = function() 
          {
            imgwidth=this.width ;
            imgheight=this.height;
           
            var formerr = 0;
            var fileExt =  name.split('.').pop().toLowerCase();
            if($.inArray(fileExt, ['gif','png','jpg','jpeg','svg','PNG','GIF']) == -1)
            {
              $('#page_hide').hide()
                alert('invalid file !');
                formerr++;
                return false;
            }
            else
            {
              var form_data = new FormData();
              form_data.append('fileField',fileField);
              form_data.append('id',id);
              form_data.append('upadtefor',upadtefor);
              $.ajax({
                    type: "POST",
                    url: WEBROOT_PATH+'website/upatdeimge',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                      success: function (response) {
                         $('#page_hide').hide()
                          //alert(response.detailsubmit);
                          if(response.status=='success')
                          {
                            if(upadtefor=='abountimage')
                            {
                              $('.bannerimageabout').attr('src',response.imagelink);

                            }
                            else if(upadtefor=='homebannerimage')
                            {
                              $('.homebanner').attr('src',response.imagelink);

                            }
                             else if(upadtefor=='homesideimage')
                            {
                              $('.homeside').attr('src',response.imagelink);

                            }
                             else if(upadtefor=='logoupdate')
                            {
                              $('.logoupdate').attr('src',response.imagelink);

                            }
                            else if(upadtefor=='donatebannerimage')
                            {
                              $('.donatebanner').attr('src',response.imagelink);

                            }
                            else if(upadtefor=='bootom_right_image')
                            {
                              $('.bootom_right_image').attr('src',response.imagelink);

                            }
                            else if(upadtefor=='center_right_image')
                            {
                              $('.center_right_image').attr('src',response.imagelink);

                            }
                            else if(upadtefor=='center_left_image')
                            {
                              $('.center_left_image').attr('src',response.imagelink);

                            }
                            else if(upadtefor=='homebottomimage')
                            {
                              $('.homebottomimage').attr('src',response.imagelink);

                            }
                            else if(upadtefor=='keypoint_second_image')
                            {
                              $('.keypoint_second_image').attr('src',response.imagelink);

                            }
                            else if(upadtefor=='keypoint_first_image')
                            {
                              $('.keypoint_first_image').attr('src',response.imagelink);

                            }
                            else if(upadtefor=='keypoint_third_image')
                            {
                              $('.keypoint_third_image').attr('src',response.imagelink);

                            }
                            
                            // if(imgwidth > maxwidth && imgheight > maxheight)
                            // {
                            //     modelbox('');
                            //    $('.content').html('<h3>You Have Previewing <span> Crop Image</span></h3><div class="imgbox" style="height:300px;"><div class="item crop-images"><img src="'+response.imagelink+'" alt="" id="photo"><input type="hidden" name="image_name" id="image_name" value="'+response.imagename+'"  /></div></div>');
                            //    $('img#photo').imgAreaSelect(
                            //         { maxWidth: 300, maxHeight: 600, handles: true,
                            //         onSelectEnd: getSizes
                            //     });
                            // }

                          }
                          else
                          {
                            alert('some thing wrong with your input');

                          }
                      },
                      error: function (response) {
                         alert('some technical issue.');
                          
                      }
                      });
            }
          };
          img.onerror = function() 
          {
              alert( "not a valid file: ");
          };
          img.src = _URL.createObjectURL(file);
      }
     


    });

  $('input[name=background_image_user]').change(function()
    {

      var file, img;
      var fileField  = this.files[0];
       var id = $('input[name=update_for]').val();
      var feildfor = $(this).attr('rel');
      var name = fileField.name;
      var size = fileField.size;
      if ((file = this.files[0])) 
      {
        $('#page_hide').show()
     
            imgwidth=this.width ;
            imgheight=this.height;
            var formerr = 0;
            var fileExt =  name.split('.').pop().toLowerCase();
            if($.inArray(fileExt, ['gif','png','jpg','jpeg','svg','PNG','GIF']) == -1)
            {
              $('#page_hide').hide()
                alert('invalid file !');
                formerr++;
                return false;
            }
            else
            {
              var form_data = new FormData();
              form_data.append('fileField',fileField);
              form_data.append('id',id);
              form_data.append('feildfor',feildfor);
              $.ajax({
                    type: "POST",
                    url: WEBROOT_PATH+'user/updateprofile',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                      success: function (response) {
                         $('#page_hide').hide()
                          //alert(response.detailsubmit);
                          if(response.status=='success')
                          {
                            $('.userprofileimage').attr('src',response.imagelink);
                            
                          }
                          else
                          {
                            alert('some thing wrong with your input');

                          }
                      },
                      error: function (response) {
                         alert('some technical issue.');
                          
                      }
                      });
            }
        }
      
     

    });

        

    });
    function maketextable(type)
    {
         var t = $(this).prevAll("h3").first().text();
         $(this).prevAll("h3").first().text('').append($('<input />',{'value' : t}));
         $('input').focus();

    }

    function settemplete(templeteid)
{
    //alert('');
    var templeteid = $('input[name=selectedtemplate]').val();
    //alert(templeteid);
    if(templeteid!='')
    {
       $.post(WEBROOT_PATH+'user/settemplete',{'templeteid':templeteid},function(data,status)
        {
          
           if(data.status=='success')
           {
              if(data.islogin=='yes')
              {
                  //alert();
                  window.location.href=WEBROOT_PATH+'user/setcolor/'+data.temoleteid;

              }
              else
              {
                  //alert('pawan');
                  window.location.href=WEBROOT_PATH+'userlogin/login';
              }

           }
        
        },'json').fail(function(response)
        {
                          
                          });

    }
    else
    {
      alert('Please select template');
    }


}