<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Website extends MY_AppController {	
	function __construct() {
    	parent::__construct();

	}	


	public function index($id)
	{
		$this->data['pagename']='home';
		if(!$this->session->userdata('logged_in'))
		{
			redirect(SITE_URL);
		}
		if($this->input->post('savehome'))
		{
			$this->saveindex($id);
		}

		if($this->input->post('nextpage'))
		{
			$this->saveindex($id);
			redirect(SITE_URL.'website/about/'.$id);
		}
		$this->load->model("Webindex");
		$this->load->model("Website__product_home");
		$condition = array('product_id'=>$id);
		$chechhometemp = $this->Webindex->getBy($condition);
		$this->load->model("templetes");
        $conditiontemp = array('id'=>$id);
		$gettempData= $this->templetes->getBy($conditiontemp);
		$colorcode=$gettempData->color_code;
		if($chechhometemp)
		{
			if($chechhometemp->button_color!='')
			{
				$colorcode=$chechhometemp->button_color;

			}
			else
			{
				$update = $this->Webindex->updateDetails($condition,array('button_color'=>$gettempData->color_code));
			}
			
			$this->data['homedata'] = $chechhometemp;

		}
		else
		{
			//////// insert values for app id//////
			$datecreated=date('Y-m-d H:i:s');
			$condition = array('is_default'=>0);
			$getdefaulttemp = $this->Webindex->getBy($condition);
			$insertArray  = array('product_id'=>$id,
				                  'user_id'=>$this->session->userdata('UserId'),
				                  'banner_image'=>$getdefaulttemp->banner_image,
				                  'button_color'=>$gettempData->color_code,
				                  'side_image'=>$getdefaulttemp->side_image,
				                  'logo'=>$getdefaulttemp->logo,
				                  'logo_type'=>$getdefaulttemp->logo_type,
				                  'logo_text'=>$gettempData->temlete_name,
				                  'keypoint_first_text'=>$getdefaulttemp->keypoint_first_text,
				                  'keypoint_second_text'=>$getdefaulttemp->keypoint_second_text,
				                  'keypoint_third_text'=>$getdefaulttemp->keypoint_third_text,
				                  'keypoint_first_heading'=>$getdefaulttemp->keypoint_first_heading,
				                  'keypoint_second_heading'=>$getdefaulttemp->keypoint_second_heading,
				                  'keypoint_third_heading'=>$getdefaulttemp->keypoint_third_heading,
				                  'keypoint_first_image'=>$getdefaulttemp->keypoint_first_image,
				                  'keypoint_second_image'=>$getdefaulttemp->keypoint_second_image,
				                  'keypoint_third_image'=>$getdefaulttemp->keypoint_third_image,
				                  'side_heading_text'=>$getdefaulttemp->side_heading_text,
				                  'center_heading_text'=>$getdefaulttemp->center_heading_text,
				                  'banner_heading'=>$getdefaulttemp->banner_heading,
				                  'banner_text'=>$getdefaulttemp->banner_text,
				                  'bottom_text'=>$getdefaulttemp->bottom_text,
				                  'testomonial_text'=>$getdefaulttemp->testomonial_text,
				                  'testomonial_by'=>$getdefaulttemp->testomonial_by,
				                  'contact_main_heading'=>$getdefaulttemp->contact_main_heading,
				                  'contact_right_heading'=>$getdefaulttemp->contact_right_heading,
				                  'contact_right_text'=>$getdefaulttemp->contact_right_text,
				                  'contact_email'=>$getdefaulttemp->contact_email,
				                  'donate_banner'=>$getdefaulttemp->donate_banner,
				                  'donate_banner_heading'=>$getdefaulttemp->donate_banner_heading,
				                  'donate_banner_text'=>$getdefaulttemp->donate_banner_text,
				                  'donate_center_heading'=>$getdefaulttemp->donate_center_heading,
				                  'donate_center_text'=>$getdefaulttemp->donate_center_text,
				                  'donate_right_heading'=>$getdefaulttemp->donate_right_heading,
				                  'donate_right_text'=>$getdefaulttemp->donate_right_text,
				                  'home_bootom_image'=>$getdefaulttemp->home_bootom_image,
				                  'created_at'=>$datecreated);
			$insert =  $this->Webindex->AdduserData($insertArray);
			$insertArray['id'] =$insert;
			$insertwebhome =  $this->Website__product_home->AdduserData($insertArray);
			$getdefaulttemp->button_color=$gettempData->color_code;
			$getdefaulttemp->logo_text=$gettempData->temlete_name;

			/////////// insert about///////
			$this->load->model("wesite_about");
			$this->load->model("website__product_about");
			$condition = array('is_default'=>0);
			$getdefaulttempabout = $this->wesite_about->getBy($condition);
			$insertArrayabout = array('product_id'=>$id,
				                  'user_id'=>$this->session->userdata('UserId'),
				                  'banner_image'=>$getdefaulttempabout->banner_image,
				                  'bootom_right_image'=>$getdefaulttempabout->bootom_right_image,
				                  'point_first_heading'=>$getdefaulttempabout->point_first_heading,
				                  'point_second_heading'=>$getdefaulttempabout->point_second_heading,
				                  'point_third_heading'=>$getdefaulttempabout->point_third_heading,
				                  'point_first_text'=>$getdefaulttempabout->point_first_text,
				                  'point_second_text'=>$getdefaulttempabout->point_second_text,
				                  'point_third_text'=>$getdefaulttempabout->point_third_text,
				                  'top_heading_text'=>$getdefaulttempabout->top_heading_text,
				                  'center_right_image'=>$getdefaulttempabout->center_right_image,
				                  'center_left_image'=>$getdefaulttempabout->center_left_image,
				                  'banner_heading'=>$getdefaulttempabout->banner_heading,
				                  'banner_text'=>$getdefaulttempabout->banner_text,
				                  'bootom_first_heading'=>$getdefaulttempabout->bootom_first_heading,
				                  'bootom_second_heading'=>$getdefaulttempabout->bootom_second_heading,
				                  'bootom_first_text'=>$getdefaulttempabout->bootom_first_text,
				                  'bootom_second_text'=>$getdefaulttempabout->bootom_second_text,
				                  'created_at'=>$datecreated);
			$insertabout =  $this->wesite_about->AdduserData($insertArrayabout);
			$insertArrayabout['id'] =$insertabout;
			$insertwebabout =  $this->website__product_about->AdduserData($insertArrayabout);
			$this->data['homedata'] = $getdefaulttemp;
		}
	
        // print_r($productArray);
        $this->data['colorcode'] =$colorcode;
		$this->data['titlehome']='Landing Page Home';
		$this->data['templete_id'] = $id;
		$this->data['view_file'] = 'website/index';
		$this->load->view('layouts/seconddefault', $this->data); 
	}

	public function saveindex($id)
	{
		//ob_start();
		if($this->session->userdata('app_logged_in'))
		{
			$maindir='user_website/'.$this->session->userdata('app_loginuserid').$id;

		}
		else
		{
			$maindir='user_website/'.$this->session->userdata('UserId').$id;
		}
		
		$this->load->model("Webindex");
		$this->load->model("Website__product_home");
		$condition = array('product_id'=>$id);
		$chechhometemp = $this->Webindex->getBy($condition);
		if($chechhometemp)
		{
			$this->data['homedata'] = $chechhometemp;

			if(!is_dir($maindir))
			{
				mkdir($maindir, 0777, true);

			}
			if (!file_exists($maindir.'/css')) 
			{
			    mkdir($maindir.'/css', 0777, true);
			}
			if (!file_exists($maindir.'/js')) 
			{
			    mkdir($maindir.'/js', 0777, true);
			}
			if(!file_exists($maindir.'/images')) 
			{
			    mkdir($maindir.'/images', 0777, true);
			}
			$this->full_copy('assets/website/js',$maindir.'/js');
			$this->full_copy('assets/website/css',$maindir.'/css');
			$this->full_copy('assets/website/images',$maindir.'/images');
			////////// copy images//////////
			if($chechhometemp->logo)
			{
				//echo 'pawan dalal';
				if (!file_exists($maindir.'/images/'.$chechhometemp->logo)) 
				{
					$source = 'assets/website/uplode/'.$chechhometemp->logo;
					copy($source,$maindir.'/images/'.$chechhometemp->logo);
					
				}

			}

			if($chechhometemp->banner_image)
			{
				//echo 'pawan dalal';
				if (!file_exists($maindir.'/images/'.$chechhometemp->banner_image)) 
				{
					$source = 'assets/website/uplode/'.$chechhometemp->banner_image;
					copy($source,$maindir.'/images/'.$chechhometemp->banner_image);
				}

			}
			if($chechhometemp->side_image)
			{
				//echo 'pawan dalal';
				if (!file_exists($maindir.'/images/'.$chechhometemp->side_image)) 
				{
					$source = 'assets/website/uplode/'.$chechhometemp->side_image;
					copy($source,$maindir.'/images/'.$chechhometemp->side_image);
				}

			}

			if($chechhometemp->home_bootom_image)
			{
				//echo 'pawan dalal';
				if (!file_exists($maindir.'/images/'.$chechhometemp->home_bootom_image)) 
				{
					$source = 'assets/website/uplode/'.$chechhometemp->home_bootom_image;
					copy($source,$maindir.'/images/'.$chechhometemp->home_bootom_image);
				}

			}
			if($chechhometemp->keypoint_first_image)
			{
				//echo 'pawan dalal';
				if (!file_exists($maindir.'/images/'.$chechhometemp->keypoint_first_image)) 
				{
					$source = 'assets/website/uplode/'.$chechhometemp->keypoint_first_image;
					copy($source,$maindir.'/images/'.$chechhometemp->keypoint_first_image);
				}

			}
			if($chechhometemp->keypoint_second_image)
			{
				//echo 'pawan dalal';
				if (!file_exists($maindir.'/images/'.$chechhometemp->keypoint_second_image)) 
				{
					$source = 'assets/website/uplode/'.$chechhometemp->keypoint_second_image;
					copy($source,$maindir.'/images/'.$chechhometemp->keypoint_second_image);
				}

			}
			if($chechhometemp->keypoint_third_image)
			{
				//echo 'pawan dalal';
				if (!file_exists($maindir.'/images/'.$chechhometemp->keypoint_third_image)) 
				{
					$source = 'assets/website/uplode/'.$chechhometemp->keypoint_third_image;
					copy($source,$maindir.'/images/'.$chechhometemp->keypoint_third_image);
				}

			}


			$postdata = http_build_query(
			    array(
			        'index' => 'index'
			    )
			);
			$opts = array('http' =>
			    array(
			        'method'  => 'POST',
			        'header'  => 'Content-type: application/x-www-form-urlencoded',
			        'content' => $postdata
			    )
			);
			$context  = stream_context_create($opts);
			$content = file_get_contents(SITE_URL.'assets/website/index.html', false, $context);
			// include('pay.php');
			// $content = ob_get_contents();
			$banner_text=$chechhometemp->banner_text;
			$banner_heading=$chechhometemp->banner_heading;
			$image_tag=$chechhometemp->logo;
			$footer_text=$chechhometemp->bottom_text;

			$keypoint_first_image=$chechhometemp->keypoint_first_image;
			$keypoint_second_image=$chechhometemp->keypoint_second_image;
			$keypoint_third_image=$chechhometemp->keypoint_third_image;
			$testomonial_text=$chechhometemp->testomonial_text;
			$testomonial_by=$chechhometemp->testomonial_by;
			$side_image=$chechhometemp->side_image;
			$banner_image=$chechhometemp->banner_image;
			$home_bootom_image=$chechhometemp->home_bootom_image;




			$content = str_replace("[banner_text]", $banner_text, $content);
			$content = str_replace("[banner_heading]", $banner_heading, $content);
			$content = str_replace("[footer_text]", $footer_text, $content);
			$content = str_replace("[image_tag]", $image_tag, $content);

			$content = str_replace("[keypoint_first_image]", $keypoint_first_image, $content);
			$content = str_replace("[keypoint_second_image]", $keypoint_second_image, $content);
			$content = str_replace("[keypoint_third_image]", $keypoint_third_image, $content);

			$content = str_replace("[keypoint_first_heading]", $chechhometemp->keypoint_first_heading, $content);
			$content = str_replace("[keypoint_first_text]", $chechhometemp->keypoint_first_text, $content);

			$content = str_replace("[keypoint_second_heading]", $chechhometemp->keypoint_second_heading, $content);
			$content = str_replace("[keypoint_second_text]", $chechhometemp->keypoint_second_text, $content);

			$content = str_replace("[keypoint_third_heading]", $chechhometemp->keypoint_third_heading, $content);
			$content = str_replace("[keypoint_third_image]", $chechhometemp->keypoint_third_image, $content);

			$content = str_replace("[testomonial_text]", $testomonial_text, $content);
			$content = str_replace("[testomonial_by]", $testomonial_by, $content);

			$content = str_replace("[side_image]", $side_image, $content);
			$content = str_replace("[banner_image]", $banner_image, $content);
			$content = str_replace("[home_bootom_image]", $home_bootom_image, $content);

			$content = str_replace("[color_code]", $chechhometemp->button_color, $content);
			// $content = str_replace("##category##", $product, $content);
			//echo $content;
			// Get the content that is in the buffer and put it in your file //
			file_put_contents($maindir.'/index.html', $content);
			ob_end_clean();
	    }
		else
		{

		}

	}

	///////////// about page/////
	public function about($id)
	{
		$this->data['pagename']='home';
		if(!$this->session->userdata('logged_in'))
		{
			redirect(SITE_URL);
		}
		if($this->input->post('savehome'))
		{
			$this->saveabout($id);
		}
		if($this->input->post('nextpage'))
		{
			$this->saveabout($id);
			redirect(SITE_URL.'website/contact/'.$id);
		}
		$this->load->model("Webindex");
		$this->load->model("wesite_about");
		$condition = array('product_id'=>$id);
		$chechhometemp = $this->Webindex->getBy($condition);
		$colorcode='';
		if($chechhometemp)
		{
			if($chechhometemp->button_color!='')
			{
				$colorcode=$chechhometemp->button_color;
			}
			
			$this->data['homedata'] = $chechhometemp;
			$checkabout = $this->wesite_about->getBy($condition);
			if($checkabout)
			{
				$this->data['aboutdata'] = $checkabout;

			}
			else
			{
				$condition = array('is_default'=>0);
				$getdefaulttemp = $this->wesite_about->getBy($condition);
				$insertArray  = array('product_id'=>$id,
					                  'user_id'=>$this->session->userdata('UserId'),
					                  'banner_image'=>$getdefaulttemp->banner_image,
					                  'bootom_right_image'=>$getdefaulttemp->bootom_right_image,
					                  'point_first_heading'=>$getdefaulttemp->point_first_heading,
					                  'point_second_heading'=>$getdefaulttemp->point_second_heading,
					                  'point_third_heading'=>$getdefaulttemp->point_third_heading,
					                  'point_first_text'=>$getdefaulttemp->point_first_text,
					                  'point_second_text'=>$getdefaulttemp->point_second_text,
					                  'point_third_text'=>$getdefaulttemp->point_third_text,
					                  'top_heading_text'=>$getdefaulttemp->top_heading_text,
					                  'center_right_image'=>$getdefaulttemp->center_right_image,
					                  'center_left_image'=>$getdefaulttemp->center_left_image,
					                  'banner_heading'=>$getdefaulttemp->banner_heading,
					                  'banner_text'=>$getdefaulttemp->banner_text,
					                  'bootom_first_heading'=>$getdefaulttemp->bootom_first_heading,
					                  'bootom_second_heading'=>$getdefaulttemp->bootom_second_heading,
					                  'bootom_first_text'=>$getdefaulttemp->bootom_first_text,
					                  'bootom_second_text'=>$getdefaulttemp->bootom_second_text,
					                  'created_at'=>date('Y-m-d H:i:s'));
				$insert =  $this->wesite_about->AdduserData($insertArray);
				$this->load->model("website__product_about");
				$insert['id'] =$insertabout;
			    $insertwebabout =  $this->website__product_about->AdduserData($insert);
				$this->data['aboutdata'] = $getdefaulttemp;
			}

		}
		else
		{
			//////// insert values for app id//////
			return redirect('website/index');
			exit();
			
		}
	
        // print_r($productArray);
        $this->data['colorcode']=$colorcode;
		$this->data['titlehome']='Landing Page Home';
		$this->data['templete_id'] = $id;
		$this->data['view_file'] = 'website/about';
		$this->load->view('layouts/seconddefault', $this->data); 
	}
	public function saveabout($id)
	{
		//ob_start();
		//$maindir='user_website/'.$this->session->userdata('UserId').$id;
		if($this->session->userdata('app_logged_in'))
		{
			$maindir='user_website/'.$this->session->userdata('app_loginuserid').$id;

		}
		else
		{
			$maindir='user_website/'.$this->session->userdata('UserId').$id;
		}
		$this->load->model("wesite_about");
		$this->load->model("Webindex");
		$condition = array('product_id'=>$id);
		$chechhometemp = $this->wesite_about->getBy($condition);
		if($chechhometemp)
		{
			//$this->data['homedata'] = $chechhometemp;
			if(!is_dir($maindir))
			{
				mkdir($maindir, 0777, true);
			}

			if (!file_exists($maindir.'/css')) 
			{
			    mkdir($maindir.'/css', 0777, true);
			}
			if (!file_exists($maindir.'/js')) 
			{
			    mkdir($maindir.'/js', 0777, true);
			}
			if(!file_exists($maindir.'/images')) 
			{
			    mkdir($maindir.'/images', 0777, true);
			}
			$this->full_copy('assets/website/js',$maindir.'/js');
			$this->full_copy('assets/website/css',$maindir.'/css');
			$this->full_copy('assets/website/images',$maindir.'/images');
			
			////////// copy images//////////
			if($chechhometemp->banner_image)
			{
				//echo 'pawan dalal';
				if (!file_exists($maindir.'/images/'.$chechhometemp->banner_image)) 
				{
					$source = 'assets/website/uplode/'.$chechhometemp->banner_image;
					copy($source,$maindir.'/images/'.$chechhometemp->banner_image);
				}

			}
			if($chechhometemp->center_left_image)
			{
				//echo 'pawan dalal';
				if (!file_exists($maindir.'/images/'.$chechhometemp->center_left_image)) 
				{
					$source = 'assets/website/uplode/'.$chechhometemp->center_left_image;
					copy($source,$maindir.'/images/'.$chechhometemp->center_left_image);
				}

			}
			if($chechhometemp->center_right_image)
			{
				//echo 'pawan dalal';
				if (!file_exists($maindir.'/images/'.$chechhometemp->center_right_image)) 
				{
					$source = 'assets/website/uplode/'.$chechhometemp->center_right_image;
					copy($source,$maindir.'/images/'.$chechhometemp->center_right_image);
				}

			}
            $gethomedata = $this->Webindex->getBy($condition);
			if($gethomedata->logo)
			{
				//echo 'pawan dalal';
				if (!file_exists($maindir.'/images/'.$gethomedata->logo)) 
				{
					$source = 'assets/website/uplode/'.$gethomedata->logo;
					copy($source,$maindir.'/images/'.$gethomedata->logo);
					
				}

			}

			$postdata = http_build_query(
			    array(
			        'contact' => 'contact'
			    )
			);
			$opts = array('http' =>
			    array(
			        'method'  => 'POST',
			        'header'  => 'Content-type: application/x-www-form-urlencoded',
			        'content' => $postdata
			    )
			);
			$context  = stream_context_create($opts);
			$content = file_get_contents(SITE_URL.'assets/website/about-us.html', false, $context);
			$this->load->model("Webindex");
			// $this->load->model("wesite_about");
			// $condition = array('product_id'=>$id);
			
			// include('pay.php');
			// $content = ob_get_contents();
			$banner_heading=$chechhometemp->banner_heading;
			$banner_text=$chechhometemp->banner_text;
			$bootom_right_image=$chechhometemp->bootom_right_image;

			$top_heading_text=$chechhometemp->top_heading_text;
			$point_first_heading=$chechhometemp->point_first_heading;
			$point_second_heading=$chechhometemp->point_second_heading;
			$point_third_heading=$chechhometemp->point_third_heading;

			$point_first_text=$chechhometemp->point_first_text;
			$point_second_text=$chechhometemp->point_second_text;
			$point_third_text=$chechhometemp->point_third_text;


			$center_left_image=$chechhometemp->center_left_image;
			$center_right_image=$chechhometemp->center_right_image;

			$bootom_first_heading=$chechhometemp->bootom_first_heading;
			$bootom_second_heading=$chechhometemp->bootom_second_heading;
			$bootom_first_text=$chechhometemp->bootom_first_text;
			$bootom_second_text=$chechhometemp->bootom_second_text;

			$image_tag=$gethomedata->logo;
			$footer_text=$gethomedata->bottom_text;
			$content = str_replace("[banner_heading]", $banner_heading, $content);
			$content = str_replace("[banner_text]", $banner_text, $content);
			$content = str_replace("[bootom_right_image]", $bootom_right_image, $content);
			$content = str_replace("[footer_text]", $righttext, $content);
			$content = str_replace("[image_tag]", $image_tag, $content);


			$content = str_replace("[top_heading_text]", $top_heading_text, $content);
			$content = str_replace("[point_first_heading]", $point_first_heading, $content);
			$content = str_replace("[point_second_heading]", $point_second_heading, $content);
			$content = str_replace("[point_third_heading]", $point_third_heading, $content);


			$content = str_replace("[point_first_text]", $point_first_text, $content);
			$content = str_replace("[point_second_text]", $point_second_text, $content);
			$content = str_replace("[point_third_text]", $point_third_text, $content);


			$content = str_replace("[center_left_image]", $center_left_image, $content);
			$content = str_replace("[center_right_image]", $center_right_image, $content);

			$content = str_replace("[bootom_first_heading]", $bootom_first_heading, $content);
			$content = str_replace("[bootom_second_heading]", $bootom_second_heading, $content);


			$content = str_replace("[bootom_second_text]", $bootom_second_text, $content);
			$content = str_replace("[bootom_first_text]", $bootom_first_text, $content);


			$content = str_replace("[center_left_heading]", $chechhometemp->center_left_heading);
			$content = str_replace("[center_left_heading_text]", $chechhometemp->center_left_heading_text);

			$content = str_replace("[center_right_heading]", $chechhometemp->center_right_heading);
			$content = str_replace("[center_right_heading_text]", $chechhometemp->center_right_heading_text);
			// $content = str_replace("##category##", $product, $content);
			//echo $content;
			// Get the content that is in the buffer and put it in your file //
			file_put_contents($maindir.'/about-us.html', $content);
			//ob_end_clean();
	    }
		else
		{

		}

	}

	public function contact($id)
	{
		$this->data['pagename']='contact';
		if(!$this->session->userdata('logged_in'))
		{
			redirect(SITE_URL);
		}
		if($this->input->post('savehome'))
		{
			$this->savecontact($id);
		}
		if($this->input->post('nextpage'))
		{
			$this->savecontact($id);
			redirect(SITE_URL.'website/donate/'.$id);
		}
		$this->load->model("Webindex");
		$condition = array('product_id'=>$id);
		$chechhometemp = $this->Webindex->getBy($condition);
		$colorcode='';
		if($chechhometemp)
		{
			$colorcode=$chechhometemp->button_color;
			$this->data['homedata'] = $chechhometemp;

		}
		else
		{
			//////// insert values for app id//////
			return redirect('website/index');
			exit();
		
		}
	    $this->data['colorcode'] = $colorcode;
		$this->data['titlehome']='Landing Page Home';
		$this->data['view_file'] = 'website/contact';
		$this->data['templete_id'] = $id;
		$this->load->view('layouts/seconddefault', $this->data); 
	}

	public function donate($id)
	{
		$this->data['pagename']='donate';
		if(!$this->session->userdata('logged_in'))
		{
			redirect(SITE_URL);
		}
		if($this->input->post('savehome'))
		{
			$this->savedonate($id);
		}
		if($this->input->post('saveandpay'))
		{
			$this->savedonate($id);
			redirect('website/choosedomain/'.$id);
		}
		$this->load->model("Webindex");
		$condition = array('product_id'=>$id);
		$chechhometemp = $this->Webindex->getBy($condition);
		$colorcode='';
		if($chechhometemp)
		{
			$colorcode=$chechhometemp->button_color;
			$this->data['homedata'] = $chechhometemp;

		}
		else
		{
			//////// insert values for app id//////
			return redirect('website/index');
			exit();
		
		}
	
        // print_r($productArray);
        $this->data['colorcode'] = $colorcode;
		$this->data['titlehome']='Landing Page Home';
		$this->data['view_file'] = 'website/donate';
		$this->data['templete_id'] = $id;
		$this->load->view('layouts/seconddefault', $this->data); 
	}
	public function savecontact($id)
	{
		//ob_start();
		//$maindir=$this->session->userdata('UserId').$id;
		//$maindir='user_website/'.$this->session->userdata('UserId').$id;
		if($this->session->userdata('app_logged_in'))
		{
			$maindir='user_website/'.$this->session->userdata('app_loginuserid').$id;

		}
		else
		{
			$maindir='user_website/'.$this->session->userdata('UserId').$id;
		}
		$this->load->model("Webindex");
		$condition = array('product_id'=>$id);
		$chechhometemp = $this->Webindex->getBy($condition);
		if($chechhometemp)
		{
			$this->data['homedata'] = $chechhometemp;
			if(!is_dir($maindir))
			{
				mkdir($maindir, 0777, true);

			}
			
			////////// copy images//////////
			if($chechhometemp->logo)
			{
				//echo 'pawan dalal';
				if (!file_exists($maindir.'/images/'.$chechhometemp->logo)) 
				{
					$source = 'assets/website/uplode/'.$chechhometemp->logo;
					copy($source,$maindir.'/images/'.$chechhometemp->logo);
					
				}

			}

			$postdata = http_build_query(
			    array(
			        'contact' => 'contact'
			    )
			);
			$opts = array('http' =>
			    array(
			        'method'  => 'POST',
			        'header'  => 'Content-type: application/x-www-form-urlencoded',
			        'content' => $postdata
			    )
			);
			$context  = stream_context_create($opts);
			$content = file_get_contents(SITE_URL.'assets/website/contact.html', false, $context);
			// include('pay.php');
			// $content = ob_get_contents();
			$mainheading=$chechhometemp->contact_main_heading;
			$rightheading=$chechhometemp->contact_right_heading;
			$righttext=$chechhometemp->contact_right_text;
			$image_tag=$chechhometemp->logo;
			$footer_text=$chechhometemp->bottom_text;
			$content = str_replace("[tag_main_heading]", $mainheading, $content);
			$content = str_replace("[tag_right_heading]", $rightheading, $content);
			$content = str_replace("[tag_right_text]", $righttext, $content);
			$content = str_replace("[footer_text]", $righttext, $content);
			$content = str_replace("[image_tag]", $image_tag, $content);
			$content = str_replace("[contact_email]", $chechhometemp->contact_email, $content);
			$content = str_replace("[color_code]", $chechhometemp->button_color, $content);
			// $content = str_replace("##category##", $product, $content);
			//echo $content;
			// Get the content that is in the buffer and put it in your file //
			file_put_contents($maindir.'/contact.html', $content);
			ob_end_clean();
	    }
		else
		{

		}

	}
	public function savedonate($id)
	{
		//ob_start();
		//$maindir=$this->session->userdata('UserId').$id;
		//$maindir='user_website/'.$this->session->userdata('UserId').$id;
		if($this->session->userdata('app_logged_in'))
		{
			$maindir='user_website/'.$this->session->userdata('app_loginuserid').$id;

		}
		else
		{
			$maindir='user_website/'.$this->session->userdata('UserId').$id;
		}
		$this->load->model("Webindex");
		$condition = array('product_id'=>$id);
		$chechhometemp = $this->Webindex->getBy($condition);
		if($chechhometemp)
		{
			$this->data['homedata'] = $chechhometemp;
			if(!is_dir($maindir))
			{
				mkdir($maindir, 0777, true);

			}
			
			////////// copy images//////////
			if($chechhometemp->logo)
			{
				//echo 'pawan dalal';
				if (!file_exists($maindir.'/images/'.$chechhometemp->logo)) 
				{
					$source = 'assets/website/uplode/'.$chechhometemp->logo;
					copy($source,$maindir.'/images/'.$chechhometemp->logo);
					
				}

			}
			if($chechhometemp->donate_banner)
			{
				//echo 'pawan dalal';
				if (!file_exists($maindir.'/images/'.$chechhometemp->donate_banner)) 
				{
					$source = 'assets/website/uplode/'.$chechhometemp->donate_banner;
					copy($source,$maindir.'/images/'.$chechhometemp->donate_banner);
					
				}

			}

			$postdata = http_build_query(
			    array(
			        'contact' => 'contact'
			    )
			);
			$opts = array('http' =>
			    array(
			        'method'  => 'POST',
			        'header'  => 'Content-type: application/x-www-form-urlencoded',
			        'content' => $postdata
			    )
			);
			$context  = stream_context_create($opts);
			$content = file_get_contents(SITE_URL.'assets/website/donate.html', false, $context);
			// include('pay.php');
			// $content = ob_get_contents();
			$banner_image=$chechhometemp->donate_banner;
			$donate_banner_heading=$chechhometemp->donate_banner_heading;
			$donate_banner_text=$chechhometemp->donate_banner_text;

			$donate_center_heading=$chechhometemp->donate_center_heading;
			$donate_center_text=$chechhometemp->donate_center_text;

			$donate_right_heading=$chechhometemp->donate_right_heading;
			$donate_right_text=$chechhometemp->donate_right_text;


			$image_tag=$chechhometemp->logo;
			$footer_text=$chechhometemp->bottom_text;
			$content = str_replace("[banner_image]", $banner_image, $content);
			$content = str_replace("[donate_banner_heading]", $donate_banner_heading, $content);
			$content = str_replace("[donate_banner_text]", $donate_banner_text, $content);
			$content = str_replace("[donate_center_heading]", $donate_center_heading, $content);
			$content = str_replace("[donate_center_text]", $donate_center_text, $content);

			$content = str_replace("[donate_right_heading]", $donate_right_heading, $content);
			$content = str_replace("[donate_right_text]", $donate_right_text, $content);

			$content = str_replace("[footer_text]", $footer_text, $content);
			$content = str_replace("[image_tag]", $image_tag, $content);
			$content = str_replace("[color_code]", $chechhometemp->button_color, $content);
			// $content = str_replace("##category##", $product, $content);
			//echo $content;
			// Get the content that is in the buffer and put it in your file //
			file_put_contents($maindir.'/donate.html', $content);
			ob_end_clean();
	    }
		else
		{

		}

	}

	////////// view website demo///////
	public function demopage($id)
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect(SITE_URL);
		}
		if($id)
		{
			
			$loginuser=$this->session->userdata('UserId');
		    $this->load->model("templetes");
		    $condition = array('id'=>$id,'user_id'=>$loginuser);
			$gettempData = $this->templetes->getBy($condition);
			$this->load->model("subcategory");
			$subscriptionData=$this->subcategory->getBy(array('id'=>$gettempData->sub_cat_id));
			if($gettempData)
			{
				if($this->input->post('saveandpay'))
				{
					$this->load->model("payments");
		            $checkpayment  =  $this->payments->getBy(array('app_id'=>$id));
		            if($checkpayment)
		            {
		            	$updatearray = array(
						                 'plan_id'=>$subscriptionData->id,
						                 'user_id'=>$loginuser,
						                 'amount'=>$subscriptionData->price,
						                 'payment_date'=>date('Y-m-d H:i:s')
						                 );
		            	$updatedata = $this->payments->updateDetails(array('app_id'=>$id),$updatearray);
		            	$makeplan=$checkpayment->id;

		            }
		            else
		            {
		            	 $insertArray = array('product_id'=>$id,
						                 'plan_id'=>$subscriptionData->id,
						                 'user_id'=>$loginuser,
						                 'amount'=>$subscriptionData->price,
						                 'created_at'=>date('Y-m-d H:i:s'),
						                 'payment_date'=>date('Y-m-d H:i:s')
						                 );
		                   $makeplan = $this->payments->AdduserData($insertArray);

		            }
				           
							redirect('website/checkout/'.$makeplan);
				}
				$this->data['subscriptionData'] = $subscriptionData;
				$this->data['gettempData'] = $gettempData;
				$this->data['view_file'] = 'web/selectdemo';
				$this->load->view('layouts/testDefault', $this->data); 

			}
			else
			{

			}
			
		}
		else
		{

		}
	
        // print_r($productArray);
        
	}

	public function viewdemo($id,$pagename=false)
	{
		$this->data['pagename']='home';
		if(!$this->session->userdata('logged_in'))
		{
			redirect(SITE_URL);
		}
	
		$this->load->model("Webindex");
		$condition = array('product_id'=>$id);
		$chechhometemp = $this->Webindex->getBy($condition);
		$this->load->model("templetes");
        $conditiontemp = array('id'=>$id);
		$gettempData= $this->templetes->getBy($conditiontemp);
		$colorcode=$gettempData->color_code;
		if($chechhometemp->button_color!='')
		{
			$colorcode=$chechhometemp->button_color;
		}
		if($chechhometemp)
		{
			if($chechhometemp->button_color!='')
			{
				$colorcode=$chechhometemp->button_color;

			}
			switch ($pagename) 
			{
				case 'about':
				$this->load->model("wesite_about");
		        $condition = array('product_id'=>$id);
				$checkabout = $this->wesite_about->getBy($condition);
				$this->data['aboutdata'] = $checkabout;
					$view_file='website/about';
					break;
					case 'contact':
					$view_file='website/contact';
					break;
					case 'contact':
					$view_file='website/donate';
					break;

				
				default:
					$view_file='website/index';
					break;
			}
			
			$this->data['homedata'] = $chechhometemp;
			$this->data['pagename'] = $pagename;
			$this->data['colorcode'] =$colorcode;
			$this->data['titlehome']='Landing Page Home';
			$this->data['inviewmode']=1;
			$this->data['templete_id'] = $id;
			$this->data['view_file'] = $view_file;
			$this->load->view('layouts/seconddefault', $this->data); 

		}
		else
		{
			
		}
	
        // print_r($productArray);
        
	}

	//       opend user website/////
	// $id folder name///////
	public function viewwithoutlogin($id,$pagename=false)
	{
		$this->data['pagename']=$pagename;
		// if(!$this->session->userdata('logged_in'))
		// {
		// 	redirect(SITE_URL);
		// }
		$this->load->model("Webindex");
		
		$this->load->model("templetes");
		if(is_numeric($id))
		{
			$conditiontemp = array('id'=>$id);

		}
		else
		{
			$conditiontemp = array('domain_name'=>$id);
		}
		$gettempData= $this->templetes->getBy($conditiontemp);
		if($gettempData)
		{
			$colorcode=$gettempData->color_code;
		    $condition = array('product_id'=>$gettempData->id);
		    $chechhometemp = $this->Webindex->getBy($condition);
		    if($chechhometemp)
		    {
				if($chechhometemp->button_color!='')
				{
					$colorcode=$chechhometemp->button_color;
				}
				if($chechhometemp->button_color!='')
				{
					$colorcode=$chechhometemp->button_color;

				}
				switch ($pagename) 
				{
					case 'about':
					$this->load->model("wesite_about");
			        $condition = array('product_id'=>$id);
					$checkabout = $this->wesite_about->getBy($condition);
					$this->data['aboutdata'] = $checkabout;
						$view_file='website/about';
						break;
						case 'contact':
						$view_file='website/contact';
						break;
						case 'contact':
						$view_file='website/donate';
						break;

					
					default:
						$view_file='website/index';
						break;
				}
				
				$this->data['homedata'] = $chechhometemp;
				$this->data['pagename'] = $pagename;
				$this->data['colorcode'] =$colorcode;
				$this->data['titlehome']='Landing Page Home';
				$this->data['inopenmode']=1;
				$this->data['templete_id'] = $gettempData->id;
				$this->data['viewform'] = $id;
				$this->data['view_file'] = $view_file;
				$this->load->view('layouts/seconddefault', $this->data); 
			}
			else
			{
				echo 'not found';
				
			}

		}
		else
		{
			echo 'not found';
			
		}
	
        // print_r($productArray);
        
	}

	//////////// payment function ////
	public function choosedomain($id)
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect(SITE_URL);
		}
		if($id)
		{
			$loginuser=$this->session->userdata('UserId');
		    $this->load->model("templetes");
		    $condition = array('id'=>$id,'user_id'=>$loginuser);
			$gettempData = $this->templetes->getBy($condition);
			$this->load->model("subcategory");
			$subscriptionData=$this->subcategory->getBy(array('id'=>$gettempData->sub_cat_id));
			if($gettempData)
			{
				if($this->input->post('saveandpay'))
				{

					$this->form_validation->set_rules('choosedomain', 'Domain type', 'trim|required|xss_clean'.$is_unique);
					if($this->input->post('choosedomain')==1)
					{
						if($this->input->post('subdomainname') != $gettempData->domain_name)
					    {
						   $is_unique =  '|is_unique[templetes.domain_name]';
						} else {
							
						   $is_unique =  '';
						}
						$this->form_validation->set_rules('subdomainname', 'Subdomain', 'trim|required|xss_clean|max_length[50]');
					}
					$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
					if($this->form_validation->run())
					{
						$upadteData = array('domain_type'=>$this->input->post('choosedomain'));
						if($this->input->post('choosedomain')==1)
						{
							$upadteData['domain_name'] = $this->input->post('subdomainname');
						}
						$upadte = $this->templetes->updateDetails($condition,$upadteData);
						if($upadte)
						{
							$this->load->model("payments");
				            $checkpayment  =  $this->payments->getBy(array('product_id'=>$id));
				            if($checkpayment)
				            {
				            	$updatearray = array(
								                 'plan_id'=>$subscriptionData->id,
								                 'user_id'=>$loginuser,
								                 'amount'=>$subscriptionData->price,
								                 'payment_date'=>date('Y-m-d H:i:s')
								                 );
				            	$updatedata = $this->payments->updateDetails(array('product_id'=>$id),$updatearray);
				            	$makeplan=$checkpayment->id;

				            }
				            else
				            {
				            	 $insertArray = array('product_id'=>$id,
								                 'plan_id'=>$subscriptionData->id,
								                 'user_id'=>$loginuser,
								                 'amount'=>$subscriptionData->price,
								                 'created_at'=>date('Y-m-d H:i:s'),
								                 'payment_date'=>date('Y-m-d H:i:s')
								                 );
				                   $makeplan = $this->payments->AdduserData($insertArray);

				            }
				           
							redirect('website/checkout/'.$makeplan);

						}
						else
						{
							$msg="some technical issue";
							$this->session->set_userdata( array('msg'=>$msg,'class' => 'error'));
						}

					}

				}
				
				$this->data['subscriptionData'] = $subscriptionData;
				
				$this->data['gettempData'] = $gettempData;
				$this->data['view_file'] = 'web/choosedomain';
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

//////////// payment function ////
	public function subscription($id)
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect(SITE_URL);
		}
		if($id)
		{
			
			$loginuser=$this->session->userdata('UserId');
		    $this->load->model("templetes");
		    $condition = array('id'=>$id,'user_id'=>$loginuser);
			$gettempData = $this->templetes->getBy($condition);
			if($gettempData)
			{
				$this->load->model("subscription_plan");
				$subscriptionData=$this->subscription_plan->select_data('*',array('status'=>1));
				$this->data['gettempData'] = $gettempData;
				$this->data['subscriptionData'] = $subscriptionData;
				$this->data['rows']  = $pageData;
				$this->data['view_file'] = 'web/subscription';
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

	public function checkout($id)
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect(SITE_URL);
		}
		if($id)
		{
			//echo 'jfh';
			$loginuser=$this->session->userdata('UserId');
			$this->load->model("payments");
			$payments = $this->payments->getBy(array('id'=>$id));
			if($payments)
			{

			    $this->load->model("templetes");
			    $condition = array('id'=>$payments->product_id,'user_id'=>$loginuser);
				$gettempData = $this->templetes->getBy($condition);
				//echo $this->db->last_query();
				if($gettempData)
				{
					//echo 'dalal';
					$this->load->model("subcategory");
					// $this->load->model("subscription_plan");
					$this->data['payments'] = $payments;
					$this->data['plan_data'] = $this->subcategory->getBy(array('id'=>$gettempData->sub_cat_id));
					$this->data['view_file'] = 'web/checkout';
				    $this->load->view('layouts/testDefault', $this->data); 
				}
				else
				{
					echo '';

				}
		  }
		  else{
		  	echo '';

		  }
			
		}
		else
		{

		}

	}

	////////////// payment final page/////
	public function makepayment($id)
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect(SITE_URL);
		}
		if($id)
		{
			//echo 'jfh';
			$loginuser=$this->session->userdata('UserId');
			$this->load->model("payments");
			$payments = $this->payments->getBy(array('id'=>$id));
			if($payments)
			{

			    $this->load->model("templetes");
			    $condition = array('id'=>$payments->product_id,'user_id'=>$loginuser);
				$gettempData = $this->templetes->getBy($condition);
				//echo $this->db->last_query();
				if($gettempData)
				{
					//echo 'dalal';
					// $this->load->model("subscription_plan");
					$this->load->model("subcategory");
					$this->data['payments'] = $payments;
					$this->data['plan_data'] = $this->subcategory->getBy(array('id'=>$gettempData->sub_cat_id));
					$this->data['view_file'] = 'web/makepayment';
				    $this->load->view('layouts/testDefault', $this->data); 
				}
				else
				{
					echo '';

				}
		  }
		  else{
		  	echo '';

		  }
			
		}
		else
		{

		}

	}

	public function makesubscription()
	{
		if (!$this->input->is_ajax_request()) 
		{

		   exit('No direct script access allowed');
		}
		$templateid = $this->input->post('product_id');
		$plan_id = $this->input->post('plan_id');
		$loginuser=$this->session->userdata('UserId');
		$this->load->model("templetes");
	    $condition = array('id'=>$templateid,'user_id'=>$loginuser);
		$gettempData = $this->templetes->getBy($condition);
		if($gettempData)
		{
			$this->load->model("subscription_plan");
			$subscriptionData=$this->subscription_plan->getBy(array('id'=>$plan_id));
			if($subscriptionData)
			{
				$this->load->model("payments");
				$result['response']['bookingstatus']='success';
				$insertArray = array('product_id'=>$templateid,
					                 'plan_id'=>$plan_id,
					                 'user_id'=>$loginuser,
					                 'amount'=>$subscriptionData->price,
					                 'created_at'=>date('Y-m-d H:i:s'),
					                 'payment_date'=>date('Y-m-d H:i:s')
					                 );
				$makeplan = $this->payments->AdduserData($insertArray);
				$result['response']['payment_id']=$makeplan;

			}
			else
			{
				$result['response']['bookingstatus']='error';
			}

		}
		else
		{
			$result['response']['bookingstatus']='error';
		}

		echo json_encode($result);



	}


	public function full_copy( $source, $target ) 
	{
	    if (is_dir( $source ) ) 
	    {
	        //@mkdir( $target );
	        $d = dir( $source );
	        while ( FALSE !== ( $entry = $d->read() ) ) 
	        {
	            if ( $entry == '.' || $entry == '..' ) {
	                continue;
	            }
	            $Entry = $source . '/' . $entry; 
	            if ( is_dir( $Entry ) ) {
	                full_copy( $Entry, $target . '/' . $entry );
	                continue;
	            }
	            copy( $Entry, $target . '/' . $entry );
	        }
	        $d->close();
	    }
	    else
	    {
	        copy( $source, $target );
	    }
	}

	public function updatedetails()
	{
		if (!$this->input->is_ajax_request()) 
		{

		   exit('No direct script access allowed');

		}
		$this->load->model("Webindex");
		$this->load->model("wesite_about");
		$userdata = $this->input->post();
		@extract($userdata);
		$status['status']='error';
		$condition = array('product_id'=>$id);
		$feildsArray = array('banner_heading','contact_main_heading','index_banner_head','footertext','index_banner_text','testmo_text','testmo_by','donate_right_heading','donate_right_text','donate_banner_heading','donate_center_text','donate_banner_text','donate_center_heading','contact_right_heading','contact_right_text','home_keypoint_first','home_keypoint_second','home_keypoint_third','contactemail','keypoint_first_heading','keypoint_second_heading','keypoint_third_heading','logotext');
		if(in_array($feildfor,$feildsArray))
		{
			//echo 'pawan';
			$checkhomtemp  = $this->Webindex->getBy($condition);
			//echo $this->db->last_query();
			if($checkhomtemp)
			{
				$updatedata=array('banner_heading'=>$feildname);
				if($feildfor=='logotext')
				{
					$updatedata=array('logo_text'=>$feildname,'logo_type'=>1);
				}
				if($feildfor=='home_keypoint_first')
				{
					$updatedata=array('keypoint_first_text'=>$feildname);
				}
				if($feildfor=='keypoint_first_heading')
				{
					$updatedata=array('keypoint_first_heading'=>$feildname);
				}
				if($feildfor=='contactemail')
				{
					$updatedata=array('contact_email'=>$feildname);
				}
				if($feildfor=='home_keypoint_second')
				{
					$updatedata=array('keypoint_second_text'=>$feildname);
				}
				if($feildfor=='keypoint_second_heading')
				{
					$updatedata=array('keypoint_second_heading'=>$feildname);
				}
				if($feildfor=='home_keypoint_third')
				{
					$updatedata=array('keypoint_third_text'=>$feildname);
				}
				if($feildfor=='keypoint_third_heading')
				{
					$updatedata=array('keypoint_third_heading'=>$feildname);
				}
				if($feildfor=='footertext')
				{
					$updatedata=array('bottom_text'=>$feildname);
				}
				if($feildfor=='index_banner_text')
				{
					$updatedata=array('banner_text'=>$feildname);
				}
				if($feildfor=='testmo_text')
				{
					$updatedata=array('testomonial_text'=>$feildname);
				}
				if($feildfor=='testmo_by')
				{
					$updatedata=array('testomonial_by'=>$feildname);
				}
				if($feildfor=='donate_right_heading')
				{
					$updatedata=array('donate_right_heading'=>$feildname);
				}
				if($feildfor=='donate_right_text')
				{
					$updatedata=array('donate_right_text'=>$feildname);
				}
				if($feildfor=='donate_center_heading')
				{
					$updatedata=array('donate_center_heading'=>$feildname);
				}
				if($feildfor=='donate_center_text')
				{
					$updatedata=array('donate_center_text'=>$feildname);
				}
				if($feildfor=='donate_banner_heading')
				{
					$updatedata=array('donate_banner_heading'=>$feildname);
				}
				if($feildfor=='donate_banner_text')
				{
					$updatedata=array('donate_banner_text'=>$feildname);
				}
				if($feildfor=='contact_right_heading')
				{
					$updatedata=array('contact_right_heading'=>$feildname);
				}
				if($feildfor=='contact_right_text')
				{
					$updatedata=array('contact_right_text'=>$feildname);
				}
				if($feildfor=='contact_main_heading')
				{
					$updatedata=array('contact_main_heading'=>$feildname);
				}
				
				$update = $this->Webindex->updateDetails($condition,$updatedata);
				$this->load->model("Website__product_home");
				$updatehome = $this->Website__product_home->updateDetails($condition,$updatedata);
				$status['status']='success';
			}
		}
		else
		{
			   $updatedata=array('banner_heading'=>$feildname);
			   if($feildfor=='aboutmainheading')
				{
					$updatedata=array('top_heading_text'=>$feildname);
				}
				if($feildfor=='point_first_text')
				{
					$updatedata=array('point_first_text'=>$feildname);
				}
				if($feildfor=='point_second_text')
				{
					$updatedata=array('point_second_text'=>$feildname);
				}
				if($feildfor=='point_third_text')
				{
					$updatedata=array('point_third_text'=>$feildname);
				}
				if($feildfor=='point_first_heading')
				{
					$updatedata=array('point_first_heading'=>$feildname);
				}
				if($feildfor=='point_second_heading')
				{
					$updatedata=array('point_second_heading'=>$feildname);
				}
				if($feildfor=='point_third_heading')
				{
					$updatedata=array('point_third_heading'=>$feildname);
				}

				if($feildfor=='bootom_first_heading')
				{
					$updatedata=array('bootom_first_heading'=>$feildname);
				}
				if($feildfor=='bootom_second_heading')
				{
					$updatedata=array('bootom_second_heading'=>$feildname);
				}
				if($feildfor=='bootom_first_text')
				{
					$updatedata=array('bootom_first_text'=>$feildname);
				}
				if($feildfor=='bootom_second_text')
				{
					$updatedata=array('bootom_second_text'=>$feildname);
				}
				if($feildfor=='center_left_heading')
				{
					$updatedata=array('center_left_heading'=>$feildname);
				}
				if($feildfor=='center_left_heading_text')
				{
					$updatedata=array('center_left_heading_text'=>$feildname);
				}
				if($feildfor=='center_right_heading')
				{
					$updatedata=array('center_right_heading'=>$feildname);
				}
				if($feildfor=='center_right_heading_text')
				{
					$updatedata=array('center_right_heading_text'=>$feildname);
				}
				
				$update = $this->wesite_about->updateDetails($condition,$updatedata);
				$this->load->model("website__product_about");
				$upadte = $this->website__product_about->updateDetails($condition,$updatedata);
				$status['status']='success';

		}
		echo json_encode($status);
		
	}
	public function upatdeimge()
	{
		if (!$this->input->is_ajax_request()) 
		{
		   exit('No direct script access allowed');
		}
		$userData = $this->input->post();
	    @extract($userData );
	    // print_r($userData);
	    // die;
		$this->load->model("wesite_about");
		$this->load->model("Webindex");
		$condition = array('product_id'=>$id);
		if($upadtefor=='abountimage' || $upadtefor=='bootom_right_image' || $upadtefor=='center_left_image' || $upadtefor=='center_right_image')
		{
			$name = @$fileField;
			$up_path = 'assets/website/uplode';
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
				$updateArray = array('banner_image'=>$imagename);
				if($upadtefor=='bootom_right_image')
				{
					$updateArray = array('bootom_right_image'=>$imagename);

				}
				if($upadtefor=='center_left_image')
				{
					$updateArray = array('center_left_image'=>$imagename);

				}
				if($upadtefor=='center_right_image')
				{
					$updateArray = array('center_right_image'=>$imagename);

				}
				$upadte = $this->wesite_about->updateDetails($condition,$updateArray);
				//echo $this->db->last_query();
				if($upadte)
				{
					$this->load->model("website__product_about");
					$upadte = $this->website__product_about->updateDetails($condition,$updateArray);
					$status['imagename']=$imagename;
					$status['imagelink']=WEBROOT_PATH_SITE_UPLODE.$imagename;
					$status['status']='success';

				}
				else
				{
					//echo 'dasdsad';
					$status['status']='error';

				}
			}


		}
		else
		{
			$name = @$fileField;
			$up_path = 'assets/website/uplode';
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
				$updateArray = array('banner_image'=>$imagename);
				if($upadtefor=='homesideimage')
				{
					$updateArray = array('side_image'=>$imagename);
				}
				if($upadtefor=='logoupdate')
				{
					$updateArray = array('logo'=>$imagename,'logo_type'=>2);

				}
				if($upadtefor=='donatebannerimage')
				{
					$updateArray = array('donate_banner'=>$imagename);

				}
				if($upadtefor=='homebottomimage')
				{
					$updateArray = array('home_bootom_image'=>$imagename);

				}
				if($upadtefor=='keypoint_first_image')
				{
					$updateArray = array('keypoint_first_image'=>$imagename);

				}
				if($upadtefor=='keypoint_second_image')
				{
					$updateArray = array('keypoint_second_image'=>$imagename);

				}
				if($upadtefor=='keypoint_third_image')
				{
					$updateArray = array('keypoint_third_image'=>$imagename);

				}
				$upadte = $this->Webindex->updateDetails($condition,$updateArray);
				$this->load->model("Website__product_home");
				$updatehome = $this->Website__product_home->updateDetails($condition,$updateArray);
				//echo $this->db->last_query();
				if($upadte)
				{
					$status['imagename']=$imagename;
					$status['imagelink']=WEBROOT_PATH_SITE_UPLODE.$imagename;
					$status['status']='success';
				}
				else
				{
					//echo 'dasdsad';
					$status['status']='error';

				}
			}
	     }
		echo json_encode($status);

	}

	public function upload_thumbnail()
      {
      	if (!$this->input->is_ajax_request()) 
		{
		   exit('No direct script access allowed');
		}
		$this->load->model("wesite_about");
		$this->load->model("Webindex");
      	$targ_w = $this->input->post('thumb_width');
      	$targ_h = $this->input->post('thumb_height');
		$jpeg_quality = 90;
		$src=$this->input->post('img');
		$new_name =rand(0,99999)."updated".$src; // Thumbnail image name
	
		$path = 'assets/website/uplode/';
  

		$w=$this->input->post('thumb_width');
		$h=$this->input->post('thumb_height');
		$x1=$this->input->post('x1');
		$y1=$this->input->post('y1');
		$img_r = imagecreatefromjpeg($path.$src);
		$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
		imagecopyresampled($dst_r,$img_r,0,0,$x1,$y1,
		$targ_w,$targ_h,$w,$h);


		// header('Content-type: image/jpeg');
		$templeteid = $this->input->post('templeteid');
		$upadtefor = $this->input->post('upadtefor');
		imagejpeg($dst_r,$path.$new_name,$jpeg_quality);
		$condition = array('product_id'=>$templeteid);
		$updateArray = array('banner_image'=>$new_name);
		if($upadtefor=='homesideimage')
		{
			$updateArray = array('side_image'=>$new_name);
		}
		if($upadtefor=='logoupdate')
		{
			$updateArray = array('logo'=>$new_name,'logo_type'=>2);

		}
		if($upadtefor=='donatebannerimage')
		{
			$updateArray = array('donate_banner'=>$new_name);

		}
		if($upadtefor=='homebottomimage')
		{
			$updateArray = array('home_bootom_image'=>$new_name);

		}
		if($upadtefor=='keypoint_first_image')
		{
			$updateArray = array('keypoint_first_image'=>$new_name);

		}
		if($upadtefor=='keypoint_second_image')
		{
			$updateArray = array('keypoint_second_image'=>$new_name);

		}
		if($upadtefor=='keypoint_third_image')
		{
			$updateArray = array('keypoint_third_image'=>$new_name);

		}
		$upadte = $this->Webindex->updateDetails($condition,$updateArray);
		$this->load->model("Website__product_home");
		$updatehome = $this->Website__product_home->updateDetails($condition,$updateArray);
		//echo $this->db->last_query();
		if($upadte)
		{
			$status['imagename']=$new_name;
			$status['imagelink']=WEBROOT_PATH_SITE_UPLODE.$new_name;
			$status['status']='success';
		}
		else
		{
			//echo 'dasdsad';
			$status['status']='error';

		}
		echo json_encode($status);
      }

	public function getcoloroption()
	{
		?>
	   <link href="<?php echo WEBROOT_PATH_CSS;?>bootstrap-colorpicker.min.css" rel="stylesheet">
	    <link href="<?php echo WEBROOT_PATH_CSS;?>bootstrap-colorpicker-plus.css" rel="stylesheet">
	    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	    <script src="<?php echo WEBROOT_PATH_JS;?>bootstrap-colorpicker.min.js"></script>
	    <script src="<?php echo WEBROOT_PATH_JS;?>bootstrap-colorpicker-plus.js"></script>
	    <script type="text/javascript">
          $(document).ready(function()
          {
          	var demo3 = $('.colorpickerplus-embed .colorpickerplus-container');
          	$('.input-group-btn').hide();
	        demo3.colorpickerembed();
	        demo3.on('changeColor', function(e,color)
	        {
	        	var templateid = $('input[name=templateid]').val();
	           
	            if(color)
	            {
	                 $.post(WEBROOT_PATH+'website/updatecolor',{'templateid':templateid,'button_color':color},function(data,status)
	                {
	                    $('.colorclass').css('background',color);
	                    $('.maketextable').css('background',color);
	                    window.location.reload();
	                });

	            }
	            else
	            {
	               alert('Please enter valid color code.');
	            }
	                   
	        });
          });

    </script>
		<h3>Change color option</span></h3>
			       
        <div class="webcontent">
        <div class="column">
            	<div class="hightight">
                	
                           <div class="imgbox" >
                           <div class="color-plate">
                                    <div class="well">
                                     <!-- <input type="hidden" class="hovercolor" name="colorhover" value="<?php echo $gettempData->color_code_hover; ?>"> -->
                         <!--  <input type="hidden" value="" id="demo3"/> -->
                          <div class="colorpickerplus-embed">
                            <div class="colorpickerplus-container"></div>
                          </div>

                       </div>
                    </div>
                    </div>
                    <div class="color-plate">
                    	   <div class="customize-detail">

                    <input type="text" class="text-box" placeholder="eg.#ffffff" name="userdefinecode" value="">
                    <a href="#" class="updatesitecolor">Apply</a>
                    	
                    </div>
                    </div>
            </div>
            </div>
            </div>
		<?php
	}

	public function updatecolor()
	{
		$this->load->model("Webindex");
		$condition = array('product_id'=>$this->input->post('templateid'));
		$chechhometemp = $this->Webindex->getBy($condition);
		if($chechhometemp)
		{
		   $update = $this->Webindex->updateDetails($condition,array('button_color'=>$this->input->post('button_color')));
		   $this->load->model("Website__product_home");
		   $updatehome = $this->Website__product_home->updateDetails($condition,array('button_color'=>$this->input->post('button_color')));

	    }
	}


	public function editwebsite($id,$pagename=false)
	{
		$this->data['pagename']='home';
		if(!$this->session->userdata('app_logged_in'))
		{
			redirect(SITE_URL);
		}
	
		$this->load->model("Webindex");
		$condition = array('product_id'=>$id);
		$chechhometemp = $this->Webindex->getBy($condition);
		$colorcode=$chechhometemp->button_color;

		if($chechhometemp)
		{
			
				if($this->input->post('savehome'))
				{
					if($pagename=='' || $pagename=='index')
			        {
					  $this->saveindex($id);
			    	}
			    	if($pagename=='contact')
			        {
					  $this->savecontact($id);
			    	}
			    	if($pagename=='donate')
			        {
					  $this->savedonate($id);
			    	}
			    	if($pagename=='about')
			        {
					  $this->saveabout($id);
			    	}
				}

				if($this->input->post('nextpage'))
				{
					
					if($pagename=='' || $pagename=='index')
			        {
					  $this->saveindex($id);
					  redirect(SITE_URL.'website/editwebsite/'.$id.'/about');
			    	}
			    	if($pagename=='contact')
			        {
					  $this->savecontact($id);
					  redirect(SITE_URL.'website/editwebsite/'.$id.'/donate');
			    	}
			    	if($pagename=='donate')
			        {
					  $this->savedonate($id);
					  redirect(SITE_URL.'website/editwebsite/'.$id);
			    	}
			    	if($pagename=='about')
			        {
					  $this->saveabout($id);
					  redirect(SITE_URL.'website/editwebsite/'.$id.'/contact');
			    	}
				}
			
			if($chechhometemp->button_color!='')
			{
				$colorcode=$chechhometemp->button_color;

			}
			switch ($pagename) 
			{
				case 'about':
				$this->load->model("wesite_about");
		        $condition = array('product_id'=>$id);
				$checkabout = $this->wesite_about->getBy($condition);
				$this->data['aboutdata'] = $checkabout;
					$view_file='website/edit/about';
					break;
					case 'contact':
					$view_file='website/edit/contact';
					break;
					case 'donate':
					$view_file='website/edit/donate';
					break;

				default:
				//$this->saveindex($id);
				
					$view_file='website/edit/index';
					break;
			}
			
			$this->data['homedata'] = $chechhometemp;
			$this->data['pagename'] = $pagename;
			$this->data['colorcode'] =$colorcode;
			$this->data['titlehome']='Landing Page Home';
			//$this->data['inviewmode']=0;
			$this->data['templete_id'] = $chechhometemp->product_id;
			$this->data['product_id'] = $chechhometemp->product_id;
			$this->data['view_file'] = $view_file;
			$this->load->view('layouts/editdefault', $this->data); 

		}
		else
		{
			
		}
	
        // print_r($productArray);
        
	}
			

}

