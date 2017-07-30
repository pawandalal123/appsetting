<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_AppController {	
	function __construct() {
    	parent::__construct();

	}	


	public function index()
	{
		$this->load->model("templetes");
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
        	
        	$condition = "cat_id in (".$getcatKey.") and is_default=0 and status=1";
        	$getproducts = $this->templetes->select_data('*',$condition);
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

	public function services()
	{
		
		$this->data['titlehome']='Landing Page Home';
		$this->data['view_file'] = 'web/services';
		
		$this->load->view('layouts/testDefault', $this->data);
	}
	public function moreinfo()
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
		$this->form_validation->set_rules('lastname', 'last name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean|max_length[300]');
		$this->form_validation->set_rules('email', 'Message', 'trim|email|required|xss_clean');
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
				$msg='Thanks for your mesage,we will contact you shortaly.';
				$this->session->set_userdata( array('msg'=>$msg,'class' => 'sucess-msg'));

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
		$this->load->model("templetes");
		$subcatid = $this->input->post('subcatid');
		$condition = array('id'=>$this->input->post('subcatid'));
		$getsubcat = $this->subcategory->getBy($condition,array('name'));

		///////// get templets based on category////
		$condition = "sub_cat_id = '".$subcatid."' and status=1 and is_default=0";
        $getproducts = $this->templetes->select_data('*',$condition);
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
    </script>
      <h3>You Have Previewing <span> <?php echo $getsubcat->name;?></span></h3>
        <div class="popup-nav">
          <ul>
              <li><a href="#" class="active">iOS Mobile App</a></li>
                <!-- <li><a href="#"> Website</a></li> -->
            </ul>
        </div>
        <input type="hidden" name="selectedtemplate" value="">
        
        <div id="demo2">
            <?php 
            if(count($getproducts)>0)
            {
            ?>
            <div id="owl-demo2" class="owl-carousel">
            <?php 
            foreach($getproducts as $getproducts)
            {
             ?>
             <div class="item templateselect"  id="<?php echo $getproducts->id?>">
                <img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES.$getproducts->background_image;?>" alt="">
                    <div class="overlay-chuch">
                    	<!-- //<h3><?php echo $getproducts->temlete_name;?></h3> -->
                        <!-- <p><?php echo $getproducts->tag_line;?></p> -->
                        
                        <!-- <div class="btn-bott">
                            <a href="#" class="sign-in" style="background: <?php echo $getproducts->color_code; ?>!important; color: <?php echo $getproducts->text_color; ?>!important;">Sign In</a>
                            <a href="#" class="sign-up" style="background: <?php echo $getproducts->color_code; ?>!important; color: <?php echo $getproducts->text_color; ?>!important;">Sign In</a>
                        </div> -->
                    </div>
                </div>
                
                
              
              <?php
              }
              ?>
            </div>
            <div class="customNavigation">
                <a class="prev">Previous</a>
                <a class="next">Next</a>
            </div>
            <?php 
            }
            ?>
        </div>
        <h4>ABOUT</h4>
        <p>Forget Ebay and other forms of advertising for your property that costs you hard earned money. Why not do it all for free? Investment Assets Properties have ready several locations around the world to take your free listings for any luxury property.</p>
        <div class="row"><a href="<?php echo SITE_URL?>moreinfo" class="active mor-detil">More Details</a>
        <a href="javascript::void(0);" class="active" onclick="settemplete()">Start</a></div>
        <div class="social-popup social-popup2">
          <h5>LIKE WHAT YOU SEE ? SHARE IT</h5>
            <ul>
              <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-facebook2.png" alt=""></a></li>
                <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-twitter2.png" alt=""></a></li>
                <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-googlep.png" alt=""></a></li>
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
		$this->session->set_userdata( array(
		            'templete_id'=>$templeteid
		        ));
		if($this->session->userdata('logged_in') && $this->session->userdata('logged_in')!='')
		{
			$this->load->model("templetes");
			$condition = array('id'=>$templeteid);
			$gettempData = $this->templetes->getBy($condition);
			if($gettempData)
			{
				$insertData = array('temlete_name'=>$gettempData->temlete_name,
					                'background_image'=>$gettempData->background_image,
					                'color_code'=>$gettempData->color_code,
					                'text_color'=>$gettempData->text_color,
					                'color_code_hover'=>$gettempData->color_code_hover,
					                'tag_line'=>$gettempData->tag_line,
					                'user_id'=>$this->session->userdata('UserId'),
					                'is_default'=>1,
					                'cat_id'=>$gettempData->cat_id,
					                'sub_cat_id'=>$gettempData->sub_cat_id,
					                'created_at'=>date('Y-m-d H:i:s'));
				$tempid = $this->templetes->AdduserData($insertData);
				$status['temoleteid']=$tempid;
			}
				
			    $status['islogin']='yes';
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
					$this->form_validation->set_rules('tempname', 'Name', 'trim|required|xss_clean');
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
							redirect('userlogin/logout/');
						}
						else
						{
							$msg="some technical issue";
							$this->session->set_userdata( array('msg'=>$msg,'class' => 'error'));
						}
				}
				

				///////////// make gallery images////
				$gelimageArray = $this->templetes->select_data(array('background_image'),array('status'=>1));
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
		$condition = 'training_videos.status = 1 and training_videos.type=1';
		if($this->input->is_ajax_request())
		{
			if($this->input->post('searchval'))
			{
				$condition="name like '%".$searhval."%'";

			}
			$getvideos = $this->training_videos->getsearchvideo($condition);
			echo $this->db->last->query();

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
					$status['imagelink']=WEBROOT_PATH_UPLOAD_IMAGES.$imagename;
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

      public function upload_thumbnail()
      {
      	if (!$this->input->is_ajax_request()) 
		{
		   exit('No direct script access allowed');
		}
      	$targ_w = 271;
		$targ_h = 391;
		$jpeg_quality = 90;
		$src=$this->input->post('img');
		$new_name =rand(0,99999)."updated".$src; // Thumbnail image name
		//echo $new_name;
		//echo $src;
		$path = "./upload/";
        $this->load->model("templetes");
		// $src = 'demo_files/pool.jpg';
		//echo $src;

	

		$w=$this->input->post('thumb_width');
		$h=$this->input->post('thumb_height');
		$x1=$this->input->post('x1');
		$y1=$this->input->post('y1');
		$img_r = imagecreatefromjpeg($path.$src);
		$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
		imagecopyresampled($dst_r,$img_r,0,0,$x1,$y1,
		$targ_w,$targ_h,$w,$h);

		// header('Content-type: image/jpeg');
		imagejpeg($dst_r,$path.$new_name,$jpeg_quality);
		$templeteid=$this->input->post('templeteid');
		$result= array('background_image' =>$new_name);
		$condition = $this->db->where('id', $templeteid);
		$insertstatus=$this->templetes->updateDetails($condition,$result);
		echo  $new_name;
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
			$this->db->where($condition);
		    $getuserdata = $this->db->get('users')->row();
		    $templateArray = array();
		    $subcatArray=array();
			
			if($getuserdata)
			{
				$this->load->model("templetes");
				$gettempletdata = $this->templetes->select_data('*',array('user_id'=>$getuserdata->id,'is_default'=>1));
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
            if($this->input->post('changepassword'))
			{
				$this->form_validation->set_rules('npassword', 'New Password', 'trim|required|xss_clean');
		        $this->form_validation->set_rules('repassword', 'Confirm Password', 'trim|required|xss_clean');
		        $this->form_validation->set_error_delimiters('<span class="error-msg"">', '</span>');
		        if($this->form_validation->run())
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

			$this->data['getuserdata'] = $getuserdata;
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
					$upadte = $this->user_modal->updateDetails($condition,$updateArray);
					//echo $this->db->last_query();
					if($upadte)
					{
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
					$updateArray = array('email'=>$feildname);
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

	




	
}

