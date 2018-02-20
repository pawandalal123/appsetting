<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_AppController {	
	function __construct() {
    	parent::__construct();

	}	


	public function index()
	{
		$this->load->model("templetes");
		$this->load->model("template__default");
		$this->load->model("category");
		$catArray = array();
		$productArray = array();
		//////////// get all active category
        $getactivecat = $this->category->select_data(array('id','name'),array('status'=>1));
        if(count($getactivecat)>0)
        {
        	foreach($getactivecat as $getactivecat)
        	{
        		$catArray[$getactivecat->id] = $getactivecat->name;

        	}
        	$getcatKey = array_keys($catArray);
        	$getcatKey = implode(',', $getcatKey);
        	
        	$condition = "cat_id in (".$getcatKey.") and status=1";
        	$getproducts = $this->template__default->select_data('*',$condition);
        	// echo $this->db->last_query();
        	if(count($getproducts)>0)
        	{
        		foreach($getproducts as $getproducts)
        		{
        			$catname = $catArray[$getproducts->cat_id];
        			$productArray[$catname][$getproducts->sub_cat_id] =array('temlete_name'=>$getproducts->temlete_name,
        				                                                     'background_image'=>$getproducts->background_image,
        				                                                     'tag_line'=>$getproducts->tag_line);
        		}

        	}
        	////////// get templets for category///
        }
        // echo '<pre>';
        // print_r($productArray);
        // echo '</pre>';
        // die;

		$this->data['titlehome']='Landing Page Home';
		$this->data['view_file'] = 'web/index';
		$this->data['productArray']=$productArray;
		$this->load->view('layouts/testDefault', $this->data); 
	}

	public function templates()
	{
		$this->load->model("template__default");
		$this->load->model("category");
		$catArray = array();
		$productArray = array();
		//////////// get all active category
        $getactivecat = $this->category->select_data(array('id','name'),array('status'=>1));
        if(count($getactivecat)>0)
        {
        	foreach($getactivecat as $getactivecat)
        	{
        		$catArray[$getactivecat->id] = $getactivecat->name;

        	}
        	$getcatKey = array_keys($catArray);
        	$getcatKey = implode(',', $getcatKey);
        	
        	$condition = "cat_id in (".$getcatKey.") and status=1";
        	$getproducts = $this->template__default->select_data('*',$condition);
        	// echo $this->db->last_query();
        	if(count($getproducts)>0)
        	{
        		foreach($getproducts as $getproducts)
        		{
        			$catname = $catArray[$getproducts->cat_id];
        			$productArray[$catname][$getproducts->sub_cat_id] =array('temlete_name'=>$getproducts->temlete_name,
        				                                                     'background_image'=>$getproducts->background_image,
        				                                                     'tag_line'=>$getproducts->tag_line);
        		}

        	}
        	////////// get templets for category///
        }
        // echo '<pre>';
        // print_r($productArray);
        // echo '</pre>';
        // die;

		$this->data['titlehome']='Landing Page Home';
		$this->data['view_file'] = 'web/templates';
		$this->data['productArray']=$productArray;
		$this->load->view('layouts/testDefault', $this->data); 
	}

	public function services($subcatid=false)
	{
		$idtomatch='';
		$planlist=[];
	    $this->load->model("subcategory");
	    $subcatdata=$this->subcategory->getlist(array('status'=>1));
	    $this->data['subcatdata']  = $subcatdata;
	    if($subcatid)
	    {

	    	$idtomatch=$subcatid;
	    	$condition = array('id'=>$subcatid);
	        $planlist = $this->subcategory->getBy($condition);
	    }
	    else
	    {
	    	$this->db->order_by('id','asc');
	        $getplan = $this->subcategory->getBy(array('status'=>1));
	        if($getplan)
	        {
	        	$idtomatch=$getplan->sub_cat_id;
	        	// $condition = array('sub_cat_id'=>$getplan->sub_cat_id);
	            $planlist = $getplan;

	        }
	    }
        $this->data['idtomatch']=$idtomatch;
	    $this->data['subcatdata']=$subcatdata;
        $this->data['planlist']=$planlist;
		$this->data['titlehome']='Landing Page Home';
		$this->data['view_file'] = 'web/services';
		
		$this->load->view('layouts/testDefault', $this->data);
	}
	public function moreinfo($subcatid)
	{
		if($this->input->post('savecontact'))
		{
			$this->savecontact();

		}
		$this->load->model('subcategory');
		$this->load->model("templetes_images");
		
		$condition = array('id'=>$subcatid);
		$getsubcat = $this->subcategory->getBy($condition,array('name'));

		///////// get templets based on category////
		$condition = "sub_cat_id = '".$subcatid."' and status=1 and type!=3";
        $getproductsimages = $this->templetes_images->select_data('*',$condition);
		
		$this->data['getproductsimages']=$getproductsimages;
		$this->data['getsubcat']=$getsubcat;	
		$this->data['titlehome']='Landing Page Home';
		$this->data['view_file'] = 'web/moreinfo';
		
		$this->load->view('layouts/testDefault', $this->data);
	}
	
	
	
	public function aboutus()
	{
		if($this->input->post('savecontact'))
		{
			$this->savecontact();

		}
		
		$this->data['titlehome']='Landing Page Home';
		$this->data['view_file'] = 'web/aboutus';
		
		$this->load->view('layouts/testDefault', $this->data);
	}
	
	
	
	public function contact()
	{
		if($this->input->post('savecontact'))
		{
			$this->savecontact();

		}
		
		$this->data['titlehome']='Landing Page Home';
		$this->data['view_file'] = 'web/contactus';
		
		$this->load->view('layouts/testDefault', $this->data);
	}

	public function savecontact()
	{
		$this->form_validation->set_rules('firstname', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('lastname', 'Last name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean|max_length[300]');
		$this->form_validation->set_rules('email', 'Email', 'trim|email|required|xss_clean');
		$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
		if($this->form_validation->run())
		{
			$userdata = $this->input->post();
			@extract($userdata);
			$insertArray = array('first_name'=>$firstname,
				                'last_name'=>$lastname,
				                'email_id'=>$email,
				                'message'=>$message,
				                'created_at'=>date('Y-m-d H:i:s'),
				                'ip_address'=>$_SERVER['REMOTE_ADDR']);
			$this->load->model('contactus');
			$insert = $this->contactus->AdduserData($insertArray);
			if($insert)
			{
				$this->load->model('common');
				$to=$email;
				$from='pwan.dalal123@gmail.com';
				$subject='Message from contact us form';
				$body='<p>Name:'.$firstname.'</p>';
				$body.='<p>Last name:'.$lastname.'</p>';
				$body.='<p>Email:'.$email.'</p>';
				$body.='<p>Message:'.$message.'</p>';


				$sendmail = $this->common->sendemail($to,$from,$subject,$body);
				//print_r($sendmail);
				//die;
				$msg='Thanks for your mesage,we will contact you shortaly.';
				$this->session->set_userdata( array('msg'=>$msg,'class' => 'sucess-msg'));
				 $href="WEBROOT_PATH+'userlogin/contectus"; 

			}
			else
			{
				$msg="some technical issue";
				$this->session->set_userdata( array('msg'=>$msg,'class' => 'error-msg'));

			}
		}
	}

	public function gettempletes()
	{
		if (!$this->input->is_ajax_request()) 
		{

		   exit('No direct script access allowed');

		}
		$this->load->model('subcategory');
		$this->load->model("templetes_images");
		$subcatid = $this->input->post('subcatid');
		$condition = array('id'=>$this->input->post('subcatid'));
		$getsubcat = $this->subcategory->getBy($condition,array('name'));

		///////// get templets based on category////
		//$condition = "sub_cat_id = '".$subcatid."' and status=1";
		$condition = "sub_cat_id = '".$subcatid."' and status=1 and type!=3";
        $getproducts = $this->templetes_images->select_data('*',$condition);
		?>
		 <script>
	    $(document).ready(function() 
	    {
		   var owl = $("#owl-demo2");
	      owl.owlCarousel({

	      items : 5, //10 items above 1000px browser width
	      itemsDesktop : [1000,5], //5 items between 1000px and 901px
	      itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
	      itemsTablet: [600,2], //2 items between 600 and 0;
	      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
	      
	      });

	      // Custom Navigation Events
	      $(".next").click(function(){
	        owl.trigger('owl.next');
	      })
	      $(".prev").click(function(){
	        owl.trigger('owl.prev');
	      })

	    });
		$(document).ready(function() 
	    {
		   var owl = $("#owl-demo3");
	      owl.owlCarousel({

	      items : 1, //10 items above 1000px browser width
	      itemsDesktop : [1000,1], //5 items between 1000px and 901px
	      itemsDesktopSmall : [900,1], // 3 items betweem 900px and 601px
	      itemsTablet: [600,1], //2 items between 600 and 0;
	      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
	      
	      });

	      // Custom Navigation Events
	      $(".next").click(function(){
	        owl.trigger('owl.next');
	      })
	      $(".prev").click(function(){
	        owl.trigger('owl.prev');
	      })

	    });
	    </script>
 <script type="text/javascript">
	$(document).ready(function(){
		$('.tab-content-w').hide().fadeIn();
		$('.popup-nav li a').bind('click', function(e){
			$('.popup-nav li a.active').removeClass('active');
			$('.tab-content-w:visible').hide();
			$(this.hash).show();
			$(this).addClass('active');
			e.preventDefault();
		}).filter(':first').click();
		$('.popup-nav li a').bind('click', function(e){
			$(this.hash).hide().fadeIn().addClass('active');
		})
	});
</script>
<script>
$(document).ready(function(){
    $(".close-web").click(function(){
        $("#demo3").hide();
		$("#demo2").show();
		$(".popup-nav li.first a").addClass("active");
		$(".popup-nav li.second a").removeClass("active");
		return false;
    });
});
</script>
      <h3>You Have Previewing <span> <?php echo $getsubcat->name;?></span></h3>
        <div class="popup-nav">
          <ul>
              <li class="first"><a href="#demo2" class="active">iOS Mobile App</a></li>
                <li class="second"><a href="#demo3"> Website</a></li>
            </ul>
        </div>
       
        <?php 
            if(count($getproducts)>0)
            {
            ?>
        <div id="demo2" class="tab-content-w">
            
            <div id="owl-demo2" class="owl-carousel">
            <?php 
            $template_id='';
            foreach($getproducts as $getproductslist)
            {
            	$template_id = $getproductslist->template_id;
            	if($getproductslist->type==1)
            	{


             ?>
             <div class="item templateselect"  id="<?php echo $getproductslist->template_id?>">
                <img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES.'galleryimage/'.$getproductslist->image_name;?>" alt="">
                    
                </div>
                
              <?php
                  }
              }
              ?>
            </div>
            <div class="customNavigation">
                <a class="prev">Previous</a>
                <a class="next">Next</a>
            </div>
           
        </div>
        
        <input type="hidden" name="selectedtemplate" value="<?php echo $template_id;?>">
        
        <div id="demo3" class="tab-content-w">
        <span class="close-web">Close</span>
              <div id="owl-demo3" class="owl-carousel">
              <?php 
                
            foreach($getproducts as $getproducts)
            {
            	$template_id = $getproducts->template_id;
            	if($getproducts->type==2)
            	{


             ?>
             <div class="item templateselect"  id="<?php echo $getproducts->template_id?>">
                <img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES.'galleryimage/'.$getproducts->image_name;?>" alt="">
                   
                </div>
                
              <?php
                  }
              }
              ?>
              </div>
              <div class="customNavigation">
                <a class="btn prev">Previous</a>
                <a class="btn next">Next</a>
              </div>
            

    </div>
     <?php 
            }
            ?>
        	
        </div>
        
        
        
         
        <h4>ABOUT</h4>
        <p>Forget Ebay and other forms of advertising for your property that costs you hard earned money. Why not do it all for free? Investment Assets Properties have ready several locations around the world to take your free listings for any luxury property.</p>
        <div class="row"><a href="<?php echo SITE_URL?>user/moreinfo/<?php echo $subcatid;?>" class="active mor-detil">More Details</a>
        <a href="javascript::void(0);" class="active" onclick="settemplete()">Start</a></div>
        <div class="social-popup social-popup2">
          <h5>LIKE WHAT YOU SEE ? SHARE IT</h5>
            <ul>
              <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-facebook2.png" alt=""></a></li>
                <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-twitter2.png" alt=""></a></li>
                <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>instagram.png" alt=""></a></li>
                <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-message.png" alt=""></a></li>
            </ul>
        </div>
    
		<?php
	}

	public function settemplete()
	{
		if (!$this->input->is_ajax_request()) 
		{
		   exit('No direct script access allowed');
		}
		$status['status']='success';
		$status['islogin']='no';
		$templeteid  =$this->input->post('templeteid');
		$this->session->set_userdata(array(
		            'templete_id'=>$templeteid
		        ));
		if($this->session->userdata('logged_in') && $this->session->userdata('logged_in')!='')
		{
			$this->load->model("templetes");
			//////// first check maxinstalltion //////////
			$this->load->model("user_modal");
			$getuserdata = $this->user_modal->getBy($condition);

			$gettempletdata = $this->templetes->select_data('*',array('user_id'=>$this->session->userdata('UserId')));
			if(count($gettempletdata)<$getuserdata->max_products)
			{
				$this->load->model("customers_built_templates");
				$this->load->model("template__default");
				$condition = array('id'=>$templeteid);
				$gettempData = $this->template__default->getBy($condition);
				if($gettempData)
				{
					$insertData = array('temlete_name'=>$gettempData->temlete_name,
						                'background_image'=>$gettempData->background_image,
						                'color_code'=>$gettempData->color_code,
						                'text_color'=>$gettempData->text_color,
						                'color_code_hover'=>$gettempData->color_code_hover,
						                'tag_line'=>$gettempData->tag_line,
						                'user_id'=>$this->session->userdata('UserId'),
						                'cat_id'=>$gettempData->cat_id,
						                'sub_cat_id'=>$gettempData->sub_cat_id,
						                'created_at'=>date('Y-m-d H:i:s'));
					$tempid = $this->templetes->AdduserData($insertData);
					if($tempid)
					{
						$insertData['id']=$tempid;
						$buildtempid = $this->customers_built_templates->AdduserData($insertData);

					}
					$status['temoleteid']=$tempid;
				}
				$status['message']='success';
			}
			else
			{
				$status['message']='Your maximum product custamization limit reached.';

			}
			
				
			    $status['islogin']='yes';
		}
		// echo 'pawan';
		// die;
		echo json_encode($status);
             flush();	
	}

	public function settempletesubcat()
	{
		if (!$this->input->is_ajax_request()) 
		{
		   exit('No direct script access allowed');
		}
		$status['status']='success';
		$status['islogin']='no';
		$subcatid  =$this->input->post('subcatid');
		$this->load->model("templetes");
		$this->load->model("template__default");
		$condition = array('sub_cat_id'=>$subcatid);
		$gettempData = $this->template__default->getBy($condition);
		if($gettempData)
		{
			$this->session->set_userdata(array(
		            'templete_id'=>$gettempData->id
		        ));
				if($this->session->userdata('logged_in') && $this->session->userdata('logged_in')!='')
				{
						$insertData = array('temlete_name'=>$gettempData->temlete_name,
							                'background_image'=>$gettempData->background_image,
							                'color_code'=>$gettempData->color_code,
							                'text_color'=>$gettempData->text_color,
							                'color_code_hover'=>$gettempData->color_code_hover,
							                'tag_line'=>$gettempData->tag_line,
							                'user_id'=>$this->session->userdata('UserId'),
							                'cat_id'=>$gettempData->cat_id,
							                'sub_cat_id'=>$gettempData->sub_cat_id,
							                'created_at'=>date('Y-m-d H:i:s'));
						$tempid = $this->templetes->AdduserData($insertData);
						if($tempid)
						{
							$this->load->model("customers_built_templates");
							$insertData['id']=$tempid;
							$buildtempid = $this->customers_built_templates->AdduserData($insertData);

						}
						$status['temoleteid']=$tempid;
					    $status['islogin']='yes';
				}

		}
		else
		{
			$status['status']='error';
		}
		
		// echo 'pawan';
		// die;
		echo json_encode($status);
             flush();	
	}

	public function setcolor($value)
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect(SITE_URL);
		}
		if($value)
		{
			
			$this->load->model("templetes");
			$condition = array('id'=>$value);
			$gettempData = $this->templetes->getBy($condition);
			if($gettempData)
			{
				////////upadte color code/////
				if($this->input->post('savecolor'))
				{
					$upadteData = array('color_code'=>$this->input->post('colorforback'),
						                'text_color'=>$this->input->post('colorfortext'),
						                'last_updated_page'=>'',
						                'color_code_hover'=>$this->input->post('colorhover'));
					$upadte = $this->templetes->updateDetails($condition,$upadteData);
					if($upadte)
					{
						$this->load->model("customers_built_templates");
						$upadtebulit = $this->customers_built_templates->updateDetails($condition,$upadteData);
						redirect('user/settags/'.$value);

					}
					else
					{
						$msg="some technical issue";
					    $this->session->set_userdata( array('msg'=>$msg,'class' => 'error'));
						
					}

				}
				
				$this->data['gettempData'] = $gettempData;

				$this->data['view_file'] = 'web/setcolor';
				$this->data['templete_id'] = $value;
				$this->load->view('layouts/testDefault', $this->data); 
			}
			else
			{

		   }
	    }
		else
		{

		}
	}

	////////////update color////
	public function updatecolor()
	{
		$this->load->model("templetes");
		$condition = array('id'=>$this->input->post('templateid'));
		$chechhometemp = $this->templetes->getBy($condition);
		if($chechhometemp)
		{
		   $update = $this->templetes->updateDetails($condition,array('color_code'=>$this->input->post('button_color')));
		   $this->load->model("customers_built_templates");
			$upadtebulit = $this->customers_built_templates->updateDetails($condition,array('color_code'=>$this->input->post('button_color')));

	    }
	}

	public function settags($value)
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect(SITE_URL);
		}
		if($value)
		{
			$this->load->model("templetes");
			$condition = array('id'=>$value);
			$gettempData = $this->templetes->getBy($condition);
			if($gettempData)
			{
				if($this->input->post('savedetails') || $this->input->post('savenext'))
				{
					$userData = $this->input->post();
				    @extract($userData );
				    // print_r($userData);
				 //    if($this->input->post('tempname') != $gettempData->temlete_name)
				 //    {
					//    $is_unique =  '|is_unique[templetes.temlete_name]';
					// } else 
					// {
						
					   
					// }
					$is_unique =  '';
					$this->form_validation->set_rules('tempname', 'Template name', 'trim|required|xss_clean'.$is_unique);
					$this->form_validation->set_rules('tagline', 'Tag line', 'trim|required|xss_clean|max_length[50]');
					$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
					if($this->form_validation->run())
					{
						$upadteData = array('temlete_name'=>$tempname,
							                'tag_line'=>$tagline,
							                // 'last_updated'=>date('Y-m-d H:i:s'),
							                'last_updated_page'=>'');
						if($this->input->post('savenext'))
						{
							$upadteData['last_updated'] = date('Y-m-d H:i:s');
							$upadteData['last_updated_page'] ='settag';
						}
						$upadte = $this->templetes->updateDetails($condition,$upadteData);
						if($upadte)
						{
							 $this->load->model("customers_built_templates");
							 $upadtebulit = $this->customers_built_templates->updateDetails($condition,$upadteData);
							if($this->input->post('savenext'))
							{
								redirect('userlogin/logout/');

							}
							redirect('user/setimage/'.$value);

						}
						else
						{
							$msg="some technical issue";
							$this->session->set_userdata( array('msg'=>$msg,'class' => 'error'));
						}

					}
				}
				
				$this->data['gettempData'] = $gettempData;
				$this->data['templete_id'] = $value;
			    $this->data['view_file'] = 'web/settags';
			    $this->load->view('layouts/testDefault', $this->data); 

			}
			else
			{

			}
		}
		else
		{

		}
	}

	////////////set address/////
	public function setaddress($value)
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect(SITE_URL);
		}
		if($value)
		{
			$this->load->model("templetes");
			// $this->load->model("Googlehelper");
			$this->load->model("country");
			$this->load->model("contactmodal");
			$condition = array('id'=>$value);
			$conditionC=array('ChurchId'=>$value);
			$gettempData = $this->templetes->getBy($condition);
			if($gettempData)
			{
				if($this->input->post('savedetails') || $this->input->post('savenext'))
				{
					$userData = $this->input->post();
				    @extract($userData );
					$this->form_validation->set_rules('church_name', 'Church name', 'trim|required|xss_clean');
					$this->form_validation->set_rules('pin', 'Tag line', 'trim|required|xss_clean|max_length[50]');
					$this->form_validation->set_rules('address1', 'Address', 'trim|required');
					$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
					if($this->form_validation->run())
					{
						
						
							$address = $city.', '.$state.', '.$country;
							$url = "https://maps.google.com/maps/api/geocode/json?address=".urlencode($address)."&sensor=false&key=AIzaSyD6dA5hFIkxCiybqRNgoMhJGjFJDCQ9NLI";
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL, $url);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
							curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
							$response = curl_exec($ch);
							curl_close($ch);
							$response_a = json_decode($response);
							// print_r($response_a);
							// die;
							$dataArray = array('lat'=>$response_a->results[0]->geometry->location->lat,
								               'long'=>$response_a->results[0]->geometry->location->lng);
							// $getcordinates= $this->Googlehelper->getcordinates($address);
							$latitude=$response_a->results[0]->geometry->location->lat;
							$langitude =$response_a->results[0]->geometry->location->lng;
							
							
							$checkcontact = $this->contactmodal->getBy($conditionC);
							if($checkcontact)
							{
								$upadteData = array('church_name'=>$church_name,
									                'pin'=>$pin,
							                        'address'=>$address1,
									                'address2'=>$address2,
									                'city'=>$city,
									                'state'=>$state,
									                'latitude'=>$latitude,
									                'longitude'=>$langitude,
									                'country'=>$country);
								$upadte = $this->contactmodal->updateDetails($conditionC,$upadteData);
							}
							else
							{
								$insredata = array('pin'=>$pin,
									               'admin_id'=>$gettempData->user_id,
									               'church_name'=>$church_name,
									               'ChurchId'=>$value,
									               'address'=>$address1,
									               'address2'=>$address2,
									               'latitude'=>$latitude,
									               'longitude'=>$langitude,
									               'city'=>$city,
									               'state'=>$state,
								                   'country'=>$country);
								$upadte = $this->contactmodal->AdduserData($insredata);
							}
							if($this->input->post('savenext'))
							{

							$upadteData['last_updated'] = date('Y-m-d H:i:s');
						    $upadteData['last_updated_page'] ='setaddress';
						    $upadte = $this->templetes->updateDetails($condition,$upadteData);
						    $this->load->model("customers_built_templates");
							 $upadtebulit = $this->customers_built_templates->updateDetails($condition,$upadteData);


								redirect('userlogin/logout/');
							}
							redirect('user/preview/'.$value);
						// }
						// else
						// {
						// 	$msg="some technical issue";
						// 	$this->session->set_userdata( array('msg'=>$msg,'class' => 'error'));
						// }
					}
				}
				$getstatelist=array();
				$contectdata = $this->contactmodal->getBy($conditionC);
                if($contectdata->country!='')
                {
                	$this->load->model("state");
					//$posdata = $this->input->post();
					$condition = "name ='".$contectdata->country."'";
					$countryid = $this->country->getBy($condition);
					$condition = array('country_id'=>$countryid->id);
					$getstatelist = $this->state->select_data($condition);
					//echo $this->db->last_query();
                }
				$this->data['gettempData'] = $gettempData;
				$this->data['getcontactdata'] = $contectdata;
				$this->data['countrylist'] = $this->country->select_data(array());
				$this->data['getstatelist'] = $getstatelist;
				$this->data['templete_id'] = $value;
			    $this->data['view_file'] = 'web/setaddress';
			    $this->load->view('layouts/testDefault', $this->data); 
			}
			else
			{

			}
		}
		else
		{

		}
	}

	public function setimage($value)
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect(SITE_URL);
		}
		if($value)
		{
			$this->load->model("templetes");
			$condition = array('id'=>$value);
			$gettempData = $this->templetes->getBy($condition);
			if($gettempData)
			{
				if($this->input->post('savedetails'))
				{
					$userData = $this->input->post();
				    @extract($userData );
				    // print_r($userData);
				       $upadteData = array('last_updated_page'=>'setimage','last_updated' => date('Y-m-d H:i:s'));
					   $upadte = $this->templetes->updateDetails($condition,$upadteData);
						if($upadte)
						{
							$this->load->model("customers_built_templates");
							 $upadtebulit = $this->customers_built_templates->updateDetails($condition,$upadteData);
							redirect('userlogin/logout/');
						}
						else
						{
							$msg="some technical issue";
							$this->session->set_userdata( array('msg'=>$msg,'class' => 'error'));
						}
				}
				

				///////////// make gallery images////
				//$gelimageArray = $this->templetes->select_data(array('background_image'),array('status'=>1));
				$this->load->model("templetes_images");
				$condition = "sub_cat_id = '".$gettempData->sub_cat_id."' and status=1 and type=3";
                $gelimageArray = $this->templetes_images->select_data('*',$condition);
				$this->data['gelimageArray'] = $gelimageArray;
				$this->data['gettempData'] = $gettempData;
				$this->data['templete_id'] = $value;
			    $this->data['view_file'] = 'web/setimage';
			    $this->load->view('layouts/testDefault', $this->data); 

			}
			else
			{

			}
		}
		else
		{

		}
	}

	///////////////// training///////////

	public function training()
	{
		$this->load->model("training_videos");
		$this->db->order_by('total_views','desc');
		$condition = 'product_template__training_videos.status = 1 and product_template__training_videos.type=1';
		if($this->input->is_ajax_request())
		{
			if($this->input->post('searchval'))
			{
				$condition="name like '%".$searhval."%'";

			}
			$getvideos = $this->training_videos->getsearchvideo($condition);
			//echo $this->db->last->query();

		}
		else
		{
			if($this->input->get('training') && $this->input->get('training')!='all')
			{
				$condition.= " and sub_cat_id='".$this->input->get('training')."'";

			}
			if($this->input->get('keyword'))
			{
				$condition.= " and ( name like '%".$this->input->get('keyword')."%' or video_title like '%".$this->input->get('keyword')."%')";

			}
			$getvideos = $this->training_videos->getsearchvideo($condition);
			//echo $this->db->last_query();
			$getvideosubcat = $this->training_videos->select_data('*',array('status'=>1,'type'=>1));
			$subcategory = array();
			if(count($getvideosubcat)>0)
			{
				$subcatidList = [];
				foreach($getvideosubcat as $getvsubcat)
				{
					$subcatidList[] = $getvsubcat->sub_cat_id;
				}
				$subcatidList = implode(',', array_unique($subcatidList));
				$condition = "id in ".'('.$subcatidList.')'."";
				$this->load->model("subcategory");
				$subcategoryList = $this->subcategory->getlist($condition);
			}
			$this->data['subcategoryList'] = $subcategoryList;
			$this->data['getvideos'] = $getvideos;
			$this->data['view_file'] = 'web/training';
		    $this->load->view('layouts/testDefault', $this->data); 

		}
		

	}


	public function upatdeimgeapp()
	{
		if (!$this->input->is_ajax_request()) 
		{
		   exit('No direct script access allowed');
		}
		$userData = $this->input->post();
	    @extract($userData);
		$this->load->model("templetes");
		$condition = array('id'=>$updateid);
		if(isset($upadtefor) && $upadtefor=='image')
		{
			$name = @$fileField;
			$up_path = 'upload';
			$input_name ='fileField';
			$image_name = $this->uploadimage($up_path,$input_name,$name);
			if($image_name['error']==true)
			{
				$status['error_message']= $image_name['error_type'];
				$status['status']='error';
			}
			else
			{
				$imagename = $image_name['file_name'];
				$updateArray = array('background_image'=>$imagename,'last_updated_page'=>'');
				$upadte = $this->templetes->updateDetails($condition,$updateArray);
				if($upadte)
				{
					$this->load->model("customers_built_templates");
				    $upadtebulit = $this->customers_built_templates->updateDetails($condition,$updateArray);
					$status['imagename']=$imagename;
					$status['imagelink']=WEBROOT_PATH_UPLOAD_IMAGES.$imagename;
					$status['status']='success';

				}
				else
				{
					$status['status']='error';

				}
			}


		}
		else
		{
		    $gettempData = $this->templetes->getBy($condition);
			if($gettempData)
			{
				$updateArray = array('background_image'=>$imagename);
				$upadte = $this->templetes->updateDetails($condition,$updateArray);
				if($upadte)
				{
					$this->load->model("customers_built_templates");
				    $upadtebulit = $this->customers_built_templates->updateDetails($condition,$updateArray);
						//echo 'pawan dalal';
					    $maindir='upload';
						if (!file_exists($maindir.'/'.$imagename)) 
						{
							$source = 'upload/galleryimage/'.$imagename;
							copy($source,$maindir.'/'.$imagename);
							
						}
					
					$status['imagelink']=WEBROOT_PATH_UPLOAD_IMAGES.'galleryimage/'.$imagename;
					$status['status']='success';

				}
				else
				{
					$status['status']='error';

				}
			}
			else
			{
				$status['status']='error';
			}
	    }
	  	echo json_encode($status);

	}

	// public function upload_thumbnail()
 //    {
 //    	$this->load->model("templetes");
	// 	$this->load->helper('string');
	// 	$rand = random_string('alnum',4);
	// 	$w=$this->input->post('thumb_width');
	// 	$h=$this->input->post('thumb_height');
	// 	$x1=$this->input->post('x_axis');
	// 	$y1=$this->input->post('y_axis');
	// 	$img=$this->input->post('img');
	// 	$new_name =time()."updated".$img; // Thumbnail image name
	// 	$path = "./upload/";
	// 	list($joe, $alto) = getimagesize($path.$img);
	// 	$ratio = $joe / 500;
	// 	$x1 = ceil($x1 * $ratio);
	// 	$y1 = ceil($y1 * $ratio);
	// 	$wd = ceil($w * $ratio);
	// 	$ht = ceil($h * $ratio);
	// 	$nw = 400;// Maximum thumbnail width
	// 	$nh = 300;//Maximum thumbnail height
	// 	$nimg = imagecreatetruecolor($nw,$nh);
	// 	$im_src = imagecreatefromjpeg($path.$img);
	// 	imagecopyresampled($nimg,$im_src,0,0,$x1,$y1,$nw,$nh,$wd,$ht);
	// 	imagejpeg($nimg,$path.$new_name,90);
	// 	$templeteid=$this->input->post('templeteid');
	// 	$result= array('background_image' =>$new_name);
	// 	$condition = $this->db->where('id', $templeteid);
	// 	$insertstatus=$this->templetes->updateDetails($condition,$result);
	// 	echo  $new_name;
 //      }

	//////////// for croping image/////////////

  //     public function upload_thumbnail()
  //     {
  //     	if (!$this->input->is_ajax_request()) 
		// {
		//    exit('No direct script access allowed');
		// }
  //     	$targ_w = 271;
		// $targ_h = 391;
		// $jpeg_quality = 90;
		// $src=$this->input->post('img');
		// $new_name =rand(0,99999)."updated".$src; // Thumbnail image name
		// //echo $new_name;
		// //echo $src;
		// $path = "./upload/";
  //       $this->load->model("templetes");
		// // $src = 'demo_files/pool.jpg';
		// //echo $src;

		// $w=$this->input->post('thumb_width');
		// $h=$this->input->post('thumb_height');
		// $x1=$this->input->post('x1');
		// $y1=$this->input->post('y1');
		// $img_r = imagecreatefromjpeg($path.$src);
		// $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
		// imagecopyresampled($dst_r,$img_r,0,0,$x1,$y1,
		// $targ_w,$targ_h,$w,$h);
		// // header('Content-type: image/jpeg');
		// imagejpeg($dst_r,$path.$new_name,$jpeg_quality);
		// $templeteid=$this->input->post('templeteid');
		// $result= array('background_image' =>$new_name);
		// $condition = $this->db->where('id', $templeteid);
		// $insertstatus=$this->templetes->updateDetails($condition,$result);
		// echo  $new_name;
  //     }

      public function upload_thumbnail()
      {
      	$w=$this->input->post('thumb_width');
		$h=$this->input->post('thumb_height');
		$x1=$this->input->post('x1');
		$y1=$this->input->post('y1');
      	$targ_w = $w;
        $targ_h = $h;
	    $jpeg_quality = 90;

		//$src = 'demo_files/19396905_1222336754556022_4338928564129208785_n.jpg';
		$src=$this->input->post('img');
		$path = "./upload/";
		$new_name =rand(0,99999)."updated".$src; // Thumbnail image name
        $this->load->model("templetes");
		
		$img_r = imagecreatefromjpeg($path.$src);
		$dst_r = ImageCreateTrueColor($targ_w, $targ_h );

		imagecopyresampled($dst_r,$img_r,0,0,$x1,$y1,
		$targ_w,$targ_h,$w,$h);
		imagejpeg($dst_r,$path.$new_name,$jpeg_quality);
		$templeteid=$this->input->post('templeteid');
		$result= array('background_image' =>$new_name);
		$condition = $this->db->where('id', $templeteid);
		$insertstatus=$this->templetes->updateDetails($condition,$result);
		$this->load->model("customers_built_templates");
		$upadtebulit = $this->customers_built_templates->updateDetails($condition,$result);
		echo WEBROOT_PATH_UPLOAD_IMAGES.$new_name;
      }

      /////////preview./////
    public function preview($value)
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect(SITE_URL);
		}
		if($value)
		{
			$this->load->model("templetes");
			$condition = array('id'=>$value);
			$gettempData = $this->templetes->getBy($condition);
			if($gettempData)
			{
				//////////////set template id in user table//////
				$this->load->model("user_modal");
				$userloginid= $this->session->userdata('UserId');
				$conditioncheck = array('id'=>$userloginid);
				$checkuser = $this->user_modal->getBy($conditioncheck);
				$this->load->model('product_templates');
				$checktemlateinproduct = $this->product_templates->getby(array('customer_built_template_id'=>$gettempData->id));
				if(!$checktemlateinproduct)
				{
				 	$inseradata = array('temlete_name'=>$gettempData->temlete_name,
		        	                    'template_sub_category'=>$gettempData->sub_cat_id,
		        	                    'customer_built_template_id'=>$gettempData->id);
			        $inserttepmlate = $this->product_templates->AdduserData($inseradata);
				}
				 /////////////// in prduct user table////////
				$this->load->model('productusers');
				$checkproductusers = $this->productusers->getBy(array('template_id'=>$value,
					                                                  'admin_id'=>$userloginid));
				if(!$checkproductusers)
				{
					$userData = array('email'=>$checkuser->email,
						              'product_id'=>$this->session->userdata('templete_id'),
								      'name'=>$checkuser->name,
								      'token'=>md5(time().''.$checkuser->email),
								      'admin_id'=>$userloginid,
								      'password'=>$checkuser->password,
								      'template_id'=>$gettempData->id,
								      'sign_up_date'=>date('Y-m-d'));
					$insertproduct = $this->productusers->AdduserData($userData);

			    }
				
				$this->data['gettempData'] = $gettempData;
				$this->data['view_file'] = 'web/checkpreview';
				$this->data['templete_id'] = $value;
				$this->load->view('layouts/testDefault', $this->data); 
			}
			else
			{

		   }
	    }
		else
		{

		}
	}

	public function setpreview()
	{
		if (!$this->input->is_ajax_request()) 
		{
		   exit('No direct script access allowed');

		}
		if(!$this->session->userdata('logged_in'))
		{
			exit('No direct script access allowed');
		}
		    $templateid = $this->input->post('templateid');

			$this->load->model("templetes");
			$condition = array('id'=>$templateid);
			$gettempData = $this->templetes->getBy($condition);
			if($gettempData)
			{
				?>
				   <h3>You Have Previewing <span> <?php echo $gettempData->temlete_name;?></span></h3>
			       
        <div class="webcontent">
                	
                    <div class="crousal1">         
                    <div class="divine">
                    <div class="imgbox">
                    <img class="templeteimgclass" src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES.$gettempData->background_image;?>" alt="">
                    <div class="overlay-chuch">
                      <h3 class="templetename"><?php echo $gettempData->temlete_name;?></h3>
                        <p class="templetetag"><?php echo $gettempData->tag_line;?></p>
                        <div class="btn-bott">
                        <a href="#" class="sign-in" style="background: <?php echo $gettempData->color_code; ?>!important;">Sign In</a>
                        <a href="#" class="sign-in-second" style="color: <?php echo $gettempData->text_color; ?>!important;">Sign Up</a>
                         </div>
                        <input type="hidden" class="hovercolor" name="colorhover" value="<?php echo $gettempData->color_code_hover; ?>">
                    </div>
                        
                    </div>
                    </div>
             

                    </div>
            </div>
				<?php 
				
			}
			else
			{
				//echo 'pawan';

		    }
		}
	
	/* changes made by prabu*/
	//////////// user home page////////////
	public function subscription()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect(SITE_URL);
		}
            
            //echo $userloginid;
			
			$this->load->model("user_modal");
			$userloginid= $this->session->userdata('UserId');
            //echo $userloginid;
			
			$condition = array('id'=>$userloginid);
            $getuserdata=$this->user_modal->getBy($condition);
			
			if($getuserdata)
			{
				///////////// make gallery images////
				$this->data['getuserdata'] = $getuserdata;
			    $this->data['view_file'] = 'user/subscription';
			    $this->load->view('layouts/testDefault', $this->data); 
			}
			else
			{

			}
	}
	
	public function freeze_account()
	{
		
		//update status to zero
		if(isset($_POST))
		{
			$status = $this->input->post("status");
			$this->load->model("user_modal");
			$userloginid = $this->session->userdata('UserId');
			$condition = array('id'=>$userloginid);
            $upadteData = array('status' => $status);
			$upadte = $this->user_modal->updateDetails($condition,$upadteData);
			$this->session->set_userdata('status',$status);
		}
		echo json_encode(array('response' => true));
		
	}
	
	//////////// user home page////////////
	public function profile()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect(SITE_URL);
		}
            
            //echo $userloginid;
			
			$this->load->model("user_modal");
			$userloginid= $this->session->userdata('UserId');
            //echo $userloginid;
			
			$condition = array('id'=>$userloginid);
            $getuserdata=$this->user_modal->getBy($condition);
			
			if($getuserdata)
			{
				///////////// make gallery images////
				$this->data['getuserdata'] = $getuserdata;
			    $this->data['view_file'] = 'user/profile';
			    $this->load->view('layouts/testDefault', $this->data); 
			}
			else
			{

			}
	}

		//////////// user all product list////////////
	public function productlist()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect(SITE_URL);
		}
            $userloginid= $this->session->userdata('UserId');
            //echo $userloginid;
			
			$condition = array('id'=>$userloginid);
			// $getuserdata = $this->user->getBy($condition,'*');
			// $this->db->where($condition);
		 //    $getuserdata = $this->db->get('core_site__users')->row();
		    $this->load->model("user_modal");
			$getuserdata = $this->user_modal->getBy($condition);
		    $templateArray = array();
		    $subcatArray=array();
			
			if($getuserdata)
			{
				$this->load->model("templetes");
				$gettempletdata = $this->templetes->select_data('*',array('user_id'=>$getuserdata->id));
				if(count($gettempletdata)>0)
				{
					$this->load->model("subcategory");
					$subcategoryList = $this->subcategory->getlist();
					if(count($subcategoryList)>0)
					{
						foreach($subcategoryList as $subcatarray)
						{
							$subcatArray[$subcatarray->id] = $subcatarray->name;

						}
						

					}
					foreach($gettempletdata as $gettemplate)
					{
						$subcatname='';
						if(array_key_exists($gettemplate->sub_cat_id, $subcatArray))
						{
							$subcatname=$subcatArray[$gettemplate->sub_cat_id];

						}
						$templateArray[$gettemplate->id] = array('tempname'=>$gettemplate->temlete_name,
							                                     'subscription'=>'basic',
							                                     'last_updated_page'=>$gettemplate->last_updated_page,
							                                      'tempfor'=>$subcatname,
							                                     'remaining_days'=>250);

					}

				}
				///////////// make gallery images////
				$this->data['getuserdata'] = $getuserdata;
				$this->data['templateArray'] = $templateArray;
			    $this->data['view_file'] = 'user/productlist';
			    $this->load->view('layouts/testDefault', $this->data); 
			}
			else
			{

			}
	}
     //////// reset the password////////
	public function resetpassword()
	{
		
			if(!$this->session->userdata('logged_in'))
			{
				redirect(SITE_URL);
			}
			$this->load->model("user_modal");
            $userloginid= $this->session->userdata('UserId');
            $condition = array('id'=>$userloginid);
            $getuserdata = $this->user_modal->getBy($condition);
            if($this->input->post('changepassword'))
			{
				$this->form_validation->set_rules('oldpassword', 'Old Password', 'trim|required|xss_clean');
				$this->form_validation->set_rules('npassword', 'New Password', 'trim|required|xss_clean');
		        $this->form_validation->set_rules('repassword', 'Confirm Password', 'trim|required|xss_clean');
		        $this->form_validation->set_error_delimiters('<span class="error-msg"">', '</span>');
		        if($this->form_validation->run())
				{
					if($getuserdata->password==md5($this->input->post('oldpassword')))
					{
						$upadteData = array('password'=>md5($this->input->post('npassword')));
						$upadte = $this->user_modal->updateDetails($condition,$upadteData);
						//echo $this->db->last_query();
						if($upadte)
						{
							$msg='Update';
							$this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));

						}
						else
						{
							$msg="some technical issue";
							$this->session->set_userdata( array('msg'=>$msg,'class' => 'error'));
						}

					}
					else
					{
						$msg="Old password don't match";
						$this->session->set_userdata( array('msg'=>$msg,'class' => 'error'));
					}
					
					//redirect(SITE_URL.'user/profile');
				}
            

            }
            $getuserdata=$this->user_modal->getBy($condition);
			$this->data['getuserdata'] = $getuserdata;
			$this->data['view_file'] = 'user/resetpassword';
			$this->load->view('layouts/testDefault', $this->data); 

		
	}
   /////////// edit template////////
	public function edittemplate($templateid)
	{
		if($templateid)
		{
			if(!$this->session->userdata('logged_in'))
			{
				redirect(SITE_URL);
			}
			$this->load->model("user_modal");
			$userloginid= $this->session->userdata('UserId');
            //echo $userloginid;
			
			$condition = array('id'=>$userloginid);
            $getuserdata=$this->user_modal->getBy($condition);
            $this->load->model("templetes");
            $templatedata = $this->templetes->getBy(array('id'=>$templateid));
            //////// get user registration///////
            $totalcount=0;
            $condition =array('admin_type'=>'A');
            $select="count(id) as totalcount";
            $getcount=$this->user_modal->getBy($condition,$select);
            if($getcount)
            {
            	$totalcount=$getcount->totalcount;

            }

			$this->data['getuserdata'] = $getuserdata;
			$this->data['totalcount'] = $totalcount;
			$this->data['templatedata'] = $templatedata;
			$this->data['view_file'] = 'user/edittemplate';
			$this->load->view('layouts/testDefault', $this->data); 

		}
		else
		{

		}

	}

	/////////// edit template////////
	public function modification($templateid)
	{
		if($templateid)
		{
			if(!$this->session->userdata('logged_in'))
			{
				redirect(SITE_URL);
			}
			$this->load->model("user_modal");
			$userloginid= $this->session->userdata('UserId');
            //echo $userloginid;
			if($this->input->post('savemessage'))
			{
				$this->savereport();

			}
			$condition = array('id'=>$userloginid);
            $getuserdata=$this->user_modal->getBy($condition);
            $this->load->model("templetes");
            $templatedata = $this->templetes->getBy(array('id'=>$templateid));

			$this->data['getuserdata'] = $getuserdata;
			$this->data['templatedata'] = $templatedata;
			$this->data['view_file'] = 'user/modification';
			$this->load->view('layouts/testDefault', $this->data); 

		}
		else
		{

		}

	}

	public function reportbug($templateid)
	{
		if($templateid)
		{
			if(!$this->session->userdata('logged_in'))
			{
				redirect(SITE_URL);
			}
			$this->load->model("user_modal");
			$userloginid= $this->session->userdata('UserId');
            //echo $userloginid;
            if($this->input->post('savemessage'))
			{
				$this->savereport();

			}
			
			$condition = array('id'=>$userloginid);
            $getuserdata=$this->user_modal->getBy($condition);
            $this->load->model("templetes");
            $templatedata = $this->templetes->getBy(array('id'=>$templateid));

			$this->data['getuserdata'] = $getuserdata;
			$this->data['templatedata'] = $templatedata;
			$this->data['view_file'] = 'user/reportbug';
			$this->load->view('layouts/testDefault', $this->data); 

		}
		else
		{

		}

	}

	public function savereport()
	{
		$userdata = $this->input->post();
		@extract($userdata);
		//print_r($_FILES['attachment']);
		
		
		// $this->form_validation->set_rules('modifi_for', 'Seelct option', 'trim|required');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean|max_length[50]');
		$this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean|max_length[50]');
	
		$this->form_validation->set_error_delimiters('<p class="req">', '</p>');

		if($this->form_validation->run())
		{

			$userloginid= $this->session->userdata('UserId');
			$this->load->model("user_messages");
			$imagename='';
			if($_FILES['attachment']['name'])
			{
				//echo 'sdasDasd';
				$up_path='upload/reportdocs';
				$input_name='attachment';
				$name =$_FILES['attachment']['name'];

				$image_name = $this->uploadimage($up_path,$input_name,$name);
				if($image_name['error']==true)
				{
					$msg=$image_name['error_type'];
				    $this->session->set_userdata( array('msg'=>$msg,'class' => 'error'));
				    exit();
				}
				else
				{
					$imagename = $image_name['file_name'];
				}
			}
			$inserdata = array('subject'=>$subject,
				                'user_id'=>$userloginid,
				                'report_for'=>implode(',', $modifi_for),
				                'report_message'=>$message,
				                'app_id'=>$templateid,
				                'attachment'=>$imagename,
				                'attachment'=>$imagename,
				                'type'=>$reporttype,
				                'created_at'=>date('Y-m-d H:i;s'));
			$insert = $this->user_messages->AdduserData($inserdata);
			//echo $this->db->last_query();
			if($insert)
			{
				$msg='Save successfully';
				$this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));

			}
			else
			{
				$msg="some technical issue";
				$this->session->set_userdata( array('msg'=>$msg,'class' => 'error'));
			}

		}
		
	}

	public function modificationlist($templateid)
	{
		if($templateid)
		{
			if(!$this->session->userdata('logged_in'))
			{
				redirect(SITE_URL);
			}
			$this->load->model("user_modal");
			$userloginid= $this->session->userdata('UserId');
            //echo $userloginid;
            $this->load->model("user_messages");
            //////////// get all bugs list/////
            $condition = array('app_id'=>$templateid,'type'=>1,'user_id'=>$userloginid);
            $this->data['getbuglist']=$this->user_messages->select_data($condition);
			
			$condition = array('id'=>$userloginid);
            $getuserdata=$this->user_modal->getBy($condition);
            $this->load->model("templetes");
            $templatedata = $this->templetes->getBy(array('id'=>$templateid));
			$this->data['getuserdata'] = $getuserdata;
			$this->data['templatedata'] = $templatedata;
			$this->data['view_file'] = 'user/modificationlist';
			$this->load->view('layouts/testDefault', $this->data); 

		}
		else
		{

		}

	}

	public function reportbuglist($templateid)
	{
		if($templateid)
		{
			if(!$this->session->userdata('logged_in'))
			{
				redirect(SITE_URL);
			}
			$this->load->model("user_modal");
			$userloginid= $this->session->userdata('UserId');
            //echo $userloginid;
            $this->load->model("user_messages");
            //////////// get all bugs list/////
            $condition = array('app_id'=>$templateid,'type'=>2,'user_id'=>$userloginid);
            $this->data['getbuglist']=$this->user_messages->select_data($condition);
			
			$condition = array('id'=>$userloginid);
            $getuserdata=$this->user_modal->getBy($condition);
            $this->load->model("templetes");
            $templatedata = $this->templetes->getBy(array('id'=>$templateid));

			$this->data['getuserdata'] = $getuserdata;
			$this->data['templatedata'] = $templatedata;
			$this->data['view_file'] = 'user/reportbuglist';
			$this->load->view('layouts/testDefault', $this->data); 

		}
		else
		{

		}

	}

	public function file_check()
	{
        $allowed_mime_type_arr = array('application/pdf','image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['attachment']['name']);
        if(isset($_FILES['attachment']['name']) && $_FILES['attachment']['name']!="")
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_check', 'Please select only pdf/gif/jpg/png file.');
                return false;
            }
        }
        else
        {
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
    }



     //////////// update user profile//////////
	public function updateprofile()
	{
	   if (!$this->input->is_ajax_request()) 
		{
		   exit('No direct script access allowed');

		}
		$status['status']='error';
		$userdata =$this->input->post();
		extract($userdata);
		$this->load->model("user_modal");
		if($feildfor=='profileimage')
		{
			$condition = array('id'=>$id);
			$getuserdata=$this->user_modal->getBy($condition);
			if($getuserdata)
			{
				$name = @$fileField;
				$up_path = 'upload/profileimages';
				$input_name ='fileField';
				$image_name = $this->uploadimage($up_path,$input_name,$name);
				if($image_name['error']==true)
				{
					$status['error_message']= $image_name['error_type'];
					$status['status']='error';
				}
				else
				{
					$imagename = $image_name['file_name'];
					$updateArray = array('profile_image'=>$imagename);
					$condition = array('email'=>$getuserdata->email);
					$upadte = $this->user_modal->updateDetails($condition,$updateArray);
					//echo $this->db->last_query();
					if($upadte)
					{
						$this->load->model('productusers');
						$condition = array('admin_id'=>$id);
						$updateimage = $this->productusers->updateDetails($condition,$updateArray);
						$status['imagename']=$imagename;
						$status['imagelink']=WEBROOT_PATH_UPLOAD_IMAGES.'profileimages/'.$imagename;
						$status['status']='success';

					}
					else
					{
						//echo 'dasdsad';
						$status['status']='error';

					}

				}

			}
			

		}
		else
		{
			
			$condition = array('id'=>$id);
			$getuserdata=$this->user_modal->getBy($condition);
			if($getuserdata)
			{
				$updateArray = array('name'=>$feildname);
				if($feildfor=='useremail')
				{
					if($getuserdata->email==$feildname)
					{
						$updateArray = array('email'=>$feildname);

					}
					else
					{
						$checkcond ="email ='".$feildname."'";
					    $checkdata=$this->user_modal->getBy($checkcond);
					    if($checkdata)
					    {
					    	$status['status']='emailexit';
					    	echo json_encode($status);
					    	exit();

					    }
					    else
					    {
					    	$updateArray = array('email'=>$feildname);
					    }
					}
					
				}
				if($feildfor=='usermobile')
				{
					$updateArray = array('mobile'=>$feildname);
				}
				$upadte = $this->user_modal->updateDetails($condition,$updateArray);
				$status['status']='success';

			}
			else
			{
				$status['status']='error';

			}


		}
          echo json_encode($status);
	}

	public function getstate()
	{
		$data['status']='success';
		$this->load->model("state");
		//$posdata = $this->input->post();
		$condition = array('country_id'=>$this->input->get('country'));
		$getstatelist = $this->state->select_data($condition);
		//echo $this->db->last_query();
		if(count($getstatelist)>0)
		{
			foreach($getstatelist as $getstatelist)
			{
				$result[$getstatelist->id]=$getstatelist->name;

			}
			$data['result']=$result;
			$data['msg']='record found';

		}
		else
		{
			$data['status']='error';
			$data['msg']='No record found';

		}
		echo json_encode($data);

	}

	////////////////////////////
	////////// specific to app product//////
	public function appdetails($id,$pagetype=false)
	{
		if(!$this->session->userdata('app_logged_in'))
		{
			redirect(SITE_URL);
		}
		if($id)
		{   ////////// get all events of this church id/////
			$userloginid= $this->session->userdata('app_loginuserid');
			$condition = array('id'=>$userloginid);
			// $getuserdata = $this->user->getBy($condition,'*');
			$this->load->model("User_modal");
		    $getuserdata = $this->User_modal->getBy($condition);


			$condition=array('ChurchId'=>$id);
			$conditionevent=array('ChurchId'=>$id);
			$this->load->model("events");
			if($pagetype=='pastevent')
			{
				$this->db->where("enddate < '".date('Y-m-d')."'",null);

			}
			else
			{
				$this->db->where("date(enddate) >='".date('Y-m-d')."'");

			}
			
			$geteventalllist = $this->events->select_data('*',$conditionevent);
			$this->data['geteventalllist'] = $geteventalllist;
			////////////// get all annoucments/////

			$this->load->model("announcements");
			$announcementslist = $this->announcements->select_data('*',$condition);
			$this->data['announcementslist'] = $announcementslist;

			/////////// get all donation details/////
			$paymentarary=array();
			$this->load->model("Payment_summary");
			$config = array();
			$limit_per_page = 2;
            $page = ($this->uri->segment(4)) ? ($this->uri->segment(4) - 1) : 0;
            if($pagetype)
            {
            	$page = ($this->uri->segment(5)) ? ($this->uri->segment(5) - 1) : 0;

            }
			$config["base_url"] = SITE_URL.'user/appdetails/'.$id;
			$total_row = $this->Payment_summary->record_count($condition);
			$config["total_rows"] = $total_row;
			//$config["full_tag_open"] = "<li>";
			//$config["full_tag_close"] = "</li>";
			$config["per_page"] = 2;
			$config['use_page_numbers'] = false;
			$config['num_links'] = $total_row;
			// Open tag for CURRENT link.
			$config['cur_tag_open'] = '&nbsp;<li><a class="current">';

			// Close tag for CURRENT link.
			$config['cur_tag_close'] = '</a></li>';

			// By clicking on performing NEXT pagination.
			$config['next_link'] = 'Next';

			// By clicking on performing PREVIOUS pagination.
			$config['prev_link'] = 'Previous';

			$this->pagination->initialize($config);
                 
            // build paging links
            $this->data["links"] = $this->pagination->create_links();
            // $str_links = $this->pagination->create_links();
            // $this->data["links"] = explode('&nbsp;',$str_links );
			$paymentslist = $this->Payment_summary->fetch_data($condition,$limit_per_page,$page*$limit_per_page);
			//echo $this->db->last_query();

			if(count($paymentslist)>0)
			{
				foreach($paymentslist as $payments)
				{
					$where = array('token'=>$payments->token) ;
					$this->load->model("User_modal");
					$userdetails  = $this->User_modal->getBy($where);
		 		    $name='';
		 		    if($userdetails)
		 		    {
		 		    	$name=$userdetails->name;

		 		    }
		 		    $paymentarary[]=array('name'=>$name,
		 		    	                  'amount'=>$payments->payment,
		 		    	                  'paydate'=>$payments->date);

				}

			}
			//print_r($paymentarary);
			// $this->data['paymentslist'] = $paymentslist;
            $this->data['getuserdata'] = $getuserdata;
            $this->data['paymentarary']=$paymentarary;
            $this->data['pagetype']=$pagetype;
            $this->load->model("templetes");
            $domanname=$id;
            $gettempData= $this->templetes->getBy(array('id'=>$id));
            if($gettempData->domain_name!='')
            {
            	$domanname=$gettempData->domain_name;

            }
			$this->data['domanname'] = $domanname;
			$this->load->model("Webindex");
			$condition = array('product_id'=>$id);
		    $chechhometemp = $this->Webindex->getBy($condition);
		    $this->data['homedata'] = $chechhometemp;

			$this->data['app_id'] = $id;
			$this->data['inopenmode']=1;
			$this->data['templete_id'] = $id;
			$this->data['viewform'] = $id;
            $this->data['view_file'] = 'user/appalldetails';
	        $this->load->view('layouts/seconddefault', $this->data);

		}
		else
		{
			return redirect(SITE_URL);
		}
        
	}
	public function eventlist($id)
	{
		// if(!$this->session->userdata('app_logged_in'))
		// {
		// 	redirect(SITE_URL);
		// }
		if($id)
		{   ////////// get all events of this church id/////
			//$userloginid= $this->session->userdata('app_loginuserid');
			//$condition = array('id'=>$userloginid);
			// $getuserdata = $this->user->getBy($condition,'*');
			// $this->load->model("User_modal");
		 //    $getuserdata = $this->User_modal->getBy($condition);


			$condition=array('ChurchId'=>$id);
			$this->load->model("events");
			$geteventalllist = $this->events->select_data('*',$condition);
			$this->data['geteventalllist'] = $geteventalllist;
			////////////// get all annoucments/////

			
            $this->load->model("templetes");
            $domanname=$id;
            $gettempData= $this->templetes->getBy(array('id'=>$id));
            if($gettempData->domain_name!='')
            {
            	$domanname=$gettempData->domain_name;

            }
			$this->data['domanname'] = $domanname;
			$this->data['app_id'] = $id;
			$this->data['inopenmode']=1;
			$this->load->model("Webindex");
			$condition = array('product_id'=>$id);
		    $chechhometemp = $this->Webindex->getBy($condition);
		    $this->data['homedata'] = $chechhometemp;
		    $this->data['templete_id'] = $id;
			$this->data['viewform'] = $id;
            $this->data['view_file'] = 'user/eventlist';
	        $this->load->view('layouts/seconddefault', $this->data);

		}
		else
		{
			return redirect(SITE_URL);
		}
        
	}
	public function calenederlist($id)
	{
		// if(!$this->session->userdata('app_logged_in'))
		// {
		// 	redirect(SITE_URL);
		// }
		if($id)
		{   ////////// get all events of this church id/////
			//$userloginid= $this->session->userdata('app_loginuserid');
			//$condition = array('id'=>$userloginid);
			// $getuserdata = $this->user->getBy($condition,'*');
			// $this->load->model("User_modal");
		 //    $getuserdata = $this->User_modal->getBy($condition);


			$condition=array('ChurchId'=>$id);
			$this->load->model("events");
			$this->db->where("date(startdate)='".date('Y-m-d')."'");
			$geteventalllist = $this->events->select_data('*',$condition);
			// echo $this->db->last_query();
			// die;
			$this->data['geteventalllist'] = $geteventalllist;
			// print_r($geteventalllist);
			// die;
			////////////// get all annoucments/////

			
            $this->load->model("templetes");
            $domanname=$id;
            $gettempData= $this->templetes->getBy(array('id'=>$id));
            if($gettempData->domain_name!='')
            {
            	$domanname=$gettempData->domain_name;

            }
			$this->data['domanname'] = $domanname;
			$this->data['app_id'] = $id;
			$this->data['inopenmode']=1;
			$this->load->model("Webindex");
			$condition = array('product_id'=>$id);
		    $chechhometemp = $this->Webindex->getBy($condition);
		    $this->data['homedata'] = $chechhometemp;
		    $this->data['templete_id'] = $id;
			$this->data['viewform'] = $id;
            $this->data['view_file'] = 'user/calenderevent';
	        $this->load->view('layouts/seconddefault', $this->data);

		}
		else
		{
			return redirect(SITE_URL);
		}
        
	}

	////////// specific to event//////
	public function addevent()
	{
		$this->load->model("events");
		$userloginid= $this->session->userdata('app_loginuserid');
		$postdata = @extract($this->input->post());
		$insertdata = array('title'=> $title,
			                'admin_id'=> $userloginid,
			                'ChurchId'=> $appid,
			                'sub_title'=>@$subtitle,
		                    'description'=> $description,
							'location'=> @$location,
							'startdate'=>$startdate,
							'enddate'=>$enddate
                             );
		
		
		if(!empty($_FILES['eventimage']['name']))
		{
			$up_path='upload/profileimages/';
	        $name =$_FILES['eventimage']['name'];
			$input_name ='eventimage';
			$image_name = $this->uploadimage($up_path,$input_name,$name);
			if($image_name['error']==true)
			{
				$msg['status']=$image_name['error_type'];
			}
			else
			{
				$insertdata['attachements']=$image_name['file_name'];
			}
		}
	
		$makeannoucment = $this->events->AdduserData($insertdata);
		if($makeannoucment)
		{
			$msg['status']='success';
		}
		else
		{
			$msg['status']='Some technical issue';
			
		}
		echo json_encode($msg);
	            
                
        
	}

	////////// specific to edit all announcement//////
	public function updateevent()
	{
	   $userloginid= $this->session->userdata('app_loginuserid');
	   $postdata = @extract($this->input->post());
	   $this->load->model("events");
		
	   $updatedata = array('title'=> $title,
			                
			                'sub_title'=>@$subtitle,
		                    'description'=> $description,
							'location'=> @$location,
							'startdate'=>$startdate,
							'enddate'=>$enddate
                             );
	   // echo $_FILES['eventimage']['name'];
	   // die;
		
		if(!empty($_FILES['eventimage']['name']))
		{
			$up_path='upload/profileimages/';
	        $name =$_FILES['eventimage']['name'];
			$input_name ='eventimage';
			$image_name = $this->uploadimage($up_path,$input_name,$name);
			if($image_name['error']==true)
			{
				$msg['status']=$image_name['error_type'];
			}
			else
			{
				$updatedata['attachements']=$image_name['file_name'];
			}
		}
		// print_r($updatedata);
		// die;
	    $condition  =array('id'=>$eventid);
		$makeannoucment = $this->events->updateDetails($condition,$updatedata);
		if($makeannoucment)
		{
			$msg['status']='success';
	        
		}
		else
		{
			$msg['status']='Some technical issue';
			
		}
		echo json_encode($msg);
        
	}

	////////// specific to addannouncement//////
	public function addannouncement()
	{
		$postdata = @extract($this->input->post());
		// print_r($postdata);
		// die;
		$this->load->model("announcements");
		$userloginid= $this->session->userdata('app_loginuserid');
		$calltoactionval='';
		if(@$calltoaction=='Email')
		{
			$calltoactionval=$callemail;
		}
		if(@$calltoaction=='Phone')
		{
			$calltoactionval=$callphone;
		}
		if(@$calltoaction=='Web')
		{
			$calltoactionval=$callweb;
		}
		if(@$calltoaction=='Payment')
		{
			$calltoactionval=$callpay;
		}
		$insertdata = array('title'=> $title,
				                'admin_id'=> $userloginid,
				                 'ChurchId'=> $appid,
			                    'description'=> $description,
								'action_type'=> @$calltoaction,
								'call_to_action'=>$calltoactionval,
								'date'=>date('Y-m-d')
	                             );
			
			
			if(!empty($_FILES['announcementfile']['name']))
			{
				$up_path='upload/profileimages/';
		        $name =$_FILES['announcementfile']['name'];
				$input_name ='announcementfile';
				$image_name = $this->uploadimage($up_path,$input_name,$name);
				if($image_name['error']==true)
				{
					$msg['status']=$image_name['error_type'];
				}
				else
				{
					$insertdata['file']=$image_name['file_name'];
				}
			}
		// print_r($insertdata);
		// die;
			$makeannoucment = $this->announcements->AdduserData($insertdata);
			if($makeannoucment)
			{
				$msg['status']='success';
		        
			}
			else
			{
				$msg['status']='Some technical issue';
				
			}

			echo json_encode($msg);
		
        
	}
	////////// specific to edit all announcement//////
	public function editannouncement($id,$annocmentid=false)
	{
		if(!$this->session->userdata('app_logged_in'))
		{
			redirect(SITE_URL);
		}
		if($id)
		{   $userloginid= $this->session->userdata('app_loginuserid');
			$this->load->model("announcements");
			if($this->input->post('saveform'))
	     	{
				$postdata = @extract($this->input->post());
				$this->form_validation->set_rules('title', 'title', 'trim|required');
				$this->form_validation->set_rules('description', 'description', 'trim|required');
				// $this->form_validation->set_rules('ngo_focus_geo', 'Focus Geographies', 'trim|required');
				$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
				if($this->form_validation->run())
				{
					$calltoactionval='';
					if(@$calltoaction=='Email')
					{
						$calltoactionval=$callemail;
					}
					if(@$calltoaction=='Phone')
					{
						$calltoactionval=$callphone;
					}
					if(@$calltoaction=='Web')
					{
						$calltoactionval=$callweb;
					}
					if(@$calltoaction=='Payment')
					{
						$calltoactionval=$callpay;
					}
					$updatedata = array('title'=> $title,
						                'admin_id'=> $userloginid,
						                 'ChurchId'=> $id,
					                    'description'=> $description,
										'action_type'=> @$calltoaction,
										'call_to_action'=>$calltoactionval,
										'date'=>date('Y-m-d')
		                                 );
					
					
					if(!empty($_FILES['announcementfile']['name']))
					{
						$up_path='upload/profileimages/';
				        $name =$_FILES['announcementfile']['name'];
						$input_name ='announcementfile';
						$image_name = $this->uploadimage($up_path,$input_name,$name);
						if($image_name['error']==true)
						{
							$msg=$image_name['error_type'];
						    $this->session->set_userdata( array('msg'=>$msg,'class' => 'req'));
						    redirect(SITE_URL.'user/addannouncement/'.$id);
						}
						else
						{
							$insertdata['file']=$image_name['file_name'];
						}
					}
				    $condition  =array('ChurchId'=> $id,'id'=>$annocmentid);
					$makeannoucment = $this->announcements->updateDetails($condition,$updatedata);
					if($makeannoucment)
					{
						$msg='Details Update';
				        $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
						redirect(SITE_URL.'user/editannouncement/'.$id);
					}
					else
					{
						$msg='Some technical issue';
						$this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
						redirect(SITE_URL.'user/editannouncement/'.$id);
					}
               }
		    }
		    ////////// get all events of this church id/////
			$this->data['login_type'] = $this->session->userdata('login_type');
			$this->data['app_id'] = $id;
			if($annocmentid)/////// if annocmentid is present
			{
				///////// check annocmentid///////
				$condition = array('admin_id'=> $userloginid,'ChurchId'=> $id);
				$checkannocmentid= $this->announcements->getBy($condition);
				if($checkannocmentid)
				{
					$this->data['details']=$checkannocmentid;
					$this->data['view_file'] = 'user/editannoucment';
				}
				else
				{
				    $msg='Some technical issue';
				    $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
					redirect(SITE_URL.'user/editannouncement/'.$id);
				}
			}
			else
			{
				$condition = array('admin_id'=> $userloginid,'ChurchId'=> $id,);
				$this->data['allannoucment'] = $this->announcements->select_data('*',$condition);
				$this->data['view_file'] = 'user/allannouncement';
			}
	        $this->load->view('layouts/admin/admin_default', $this->data);

		}
		else
		{
			return redirect(SITE_URL);
		}
        
	}

	////////// specific to edit all announcement//////
	public function updateannouncement($id,$annocmentid=false)
	{
	   $userloginid= $this->session->userdata('app_loginuserid');
	   $postdata = @extract($this->input->post());
	   $this->load->model("announcements");
		$calltoactionval='';
		if(@$calltoaction=='Email')
		{
			$calltoactionval=$callemail;
		}
		if(@$calltoaction=='Phone')
		{
			$calltoactionval=$callphone;
		}
		if(@$calltoaction=='Web')
		{
			$calltoactionval=$callweb;
		}
		if(@$calltoaction=='Payment')
		{
			$calltoactionval=$callpay;
		}
		$updatedata = array('title'=> $title,
		                    'description'=> $description,
							'action_type'=> @$calltoaction,
							'call_to_action'=>$calltoactionval
	                         );
		
		
		if(!empty($_FILES['announcementfile']['name']))
		{
			$up_path='upload/profileimages/';
	        $name =$_FILES['announcementfile']['name'];
			$input_name ='announcementfile';
			$image_name = $this->uploadimage($up_path,$input_name,$name);
			if($image_name['error']==true)
			{
				$msg=$image_name['error_type'];
			    
			}
			else
			{
				$updatedata['file']=$image_name['file_name'];
			}
		}
	    $condition  =array('id'=>$annoucmentid);
		$makeannoucment = $this->announcements->updateDetails($condition,$updatedata);
		if($makeannoucment)
		{
			$msg['status']='success';
	        
		}
		else
		{
			$msg['status']='Some technical issue';
			
		}
		echo json_encode($msg);
        
	}

	public function popuupbox()
    {
    	if (!$this->input->is_ajax_request()) 
		{

		   exit('No direct script access allowed');
		}
		if($this->input->post('popupfor')=='addanoucment')
		{
			$this->load->view('user/addannouncement');

		}
		if($this->input->post('popupfor')=='editanoucment')
		{
			$this->load->model("announcements");
			$this->data['annoucmentid']=$this->input->post('annoucmentid');
			$condition = array('id'=> $this->input->post('annoucmentid'));
			$checkannocmentid= $this->announcements->getBy($condition);
		    $this->data['details']=$checkannocmentid;
			$this->load->view('user/editanoucmentbox',$this->data);

		}

		////////// add and update event/////
		if($this->input->post('popupfor')=='addevent')
		{
			$this->load->view('user/addevent');

		}

		if($this->input->post('popupfor')=='editevent')
		{
			$this->load->model("events");
			$this->data['id']=$this->input->post('eventid');
			$condition = array('id'=> $this->input->post('eventid'));
			$checkevent= $this->events->getBy($condition);
		    $this->data['details']=$checkevent;
			$this->load->view('user/editevent',$this->data);

		}

    }

    public function getevents()
    {

    	if (!$this->input->is_ajax_request()) 
		{

		   exit('No direct script access allowed');

		}
		$postdata = $this->input->post();
		extract($postdata);
		$time = strtotime($selected);
		$newformat = date('Y-m-d',$time);
		$newformat= date('Y-m-d', strtotime($newformat. ' + 1 days'));
		
	    $condition=array('ChurchId'=>$id);
		$this->load->model("events");
		$this->db->where("date(startdate)='".$newformat."'");
		$geteventalllist = $this->events->select_data('*',$condition);
		$this->data['geteventalllist']=$geteventalllist;
		return $this->load->view('elements/eventcrousel',$this->data);
    }

	
}

