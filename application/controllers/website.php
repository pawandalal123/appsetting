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
		$condition = array('app_id'=>$id);
		$chechhometemp = $this->Webindex->getBy($condition);
		if($chechhometemp)
		{
			$this->data['homedata'] = $chechhometemp;

		}
		else
		{
			//////// insert values for app id//////
			$condition = array('is_default'=>0);
			$getdefaulttemp = $this->Webindex->getBy($condition);
			$insertArray  = array('app_id'=>$id,
				                  'user_id'=>$this->session->userdata('UserId'),
				                  'banner_image'=>$getdefaulttemp->banner_image,
				                  'side_image'=>$getdefaulttemp->side_image,
				                  'logo'=>$getdefaulttemp->logo,
				                  'keypoint_first_text'=>$getdefaulttemp->keypoint_first_text,
				                  'keypoint_second_text'=>$getdefaulttemp->keypoint_second_text,
				                  'keypoint_third_text'=>$getdefaulttemp->keypoint_third_text,
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
				                  'donate_banner'=>$getdefaulttemp->donate_banner,
				                  'donate_banner_heading'=>$getdefaulttemp->donate_banner_heading,
				                  'donate_banner_text'=>$getdefaulttemp->donate_banner_text,
				                  'donate_center_heading'=>$getdefaulttemp->donate_center_heading,
				                  'donate_center_text'=>$getdefaulttemp->donate_center_text,
				                  'donate_right_heading'=>$getdefaulttemp->donate_right_heading,
				                  'donate_right_text'=>$getdefaulttemp->donate_right_text,
				                  'home_bootom_image'=>$getdefaulttemp->home_bootom_image,
				                  'created_at'=>date('Y-m-d H:i:s'));
			$insert =  $this->Webindex->AdduserData($insertArray);
			$this->data['homedata'] = $getdefaulttemp;
		}
	
        // print_r($productArray);
		$this->data['titlehome']='Landing Page Home';
		$this->data['templete_id'] = $id;
		$this->data['view_file'] = 'website/index';
		$this->load->view('layouts/seconddefault', $this->data); 
	}

	public function saveindex($id)
	{
		//ob_start();
		$maindir=$this->session->userdata('UserId').$id;
		$this->load->model("Webindex");
		$condition = array('app_id'=>$id);
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
			$content = str_replace("[testomonial_text]", $testomonial_text, $content);
			$content = str_replace("[testomonial_by]", $testomonial_by, $content);
			$content = str_replace("[side_image]", $side_image, $content);
			$content = str_replace("[banner_image]", $banner_image, $content);
			$content = str_replace("[home_bootom_image]", $home_bootom_image, $content);
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
		$condition = array('app_id'=>$id);
		$chechhometemp = $this->Webindex->getBy($condition);
		if($chechhometemp)
		{
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
				$insertArray  = array('app_id'=>$id,
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
		$this->data['titlehome']='Landing Page Home';
		$this->data['templete_id'] = $id;
		$this->data['view_file'] = 'website/about';
		$this->load->view('layouts/seconddefault', $this->data); 
	}
	public function saveabout($id)
	{
		//ob_start();
		$maindir=$this->session->userdata('UserId').$id;
		$this->load->model("wesite_about");
		$this->load->model("Webindex");
		$condition = array('app_id'=>$id);
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
			// $condition = array('app_id'=>$id);
			
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
		$condition = array('app_id'=>$id);
		$chechhometemp = $this->Webindex->getBy($condition);
		if($chechhometemp)
		{
			$this->data['homedata'] = $chechhometemp;

		}
		else
		{
			//////// insert values for app id//////
			return redirect('website/index');
			exit();
		
		}
	
        // print_r($productArray);
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
			$this->input->post('savehome');
			redirect('website/subscription/'.$id);

		}
		$this->load->model("Webindex");
		$condition = array('app_id'=>$id);
		$chechhometemp = $this->Webindex->getBy($condition);
		if($chechhometemp)
		{
			$this->data['homedata'] = $chechhometemp;

		}
		else
		{
			//////// insert values for app id//////
			return redirect('website/index');
			exit();
		
		}
	
        // print_r($productArray);
		$this->data['titlehome']='Landing Page Home';
		$this->data['view_file'] = 'website/donate';
		$this->data['templete_id'] = $id;
		$this->load->view('layouts/seconddefault', $this->data); 
	}
	public function savecontact($id)
	{
		//ob_start();
		$maindir=$this->session->userdata('UserId').$id;
		$this->load->model("Webindex");
		$condition = array('app_id'=>$id);
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
				echo 'pawan dalal';
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
		$maindir=$this->session->userdata('UserId').$id;
		$this->load->model("Webindex");
		$condition = array('app_id'=>$id);
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
			    $condition = array('id'=>$payments->app_id,'user_id'=>$loginuser);
				$gettempData = $this->templetes->getBy($condition);
				//echo $this->db->last_query();
				if($gettempData)
				{
					//echo 'dalal';
					$this->load->model("subscription_plan");
					$this->data['payments'] = $payments;
					$this->data['plan_data'] = $this->subscription_plan->getBy(array('id'=>$payments->plan_id));
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

	public function makesubscription()
	{
		if (!$this->input->is_ajax_request()) 
		{

		   exit('No direct script access allowed');
		}
		$templateid = $this->input->post('app_id');
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
				$insertArray = array('app_id'=>$templateid,
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
		$condition = array('app_id'=>$id);
		$feildsArray = array('contact_main_heading','index_banner_head','footertext','index_banner_text','testmo_text','testmo_by','donate_right_heading','donate_right_text','donate_banner_heading','donate_center_text','donate_banner_text','donate_center_heading','contact_right_heading','contact_right_text','home_keypoint_first','home_keypoint_second','home_keypoint_third');
		if(in_array($feildfor,$feildsArray))
		{
			//echo 'pawan';
			$checkhomtemp  = $this->Webindex->getBy($condition);
			//echo $this->db->last_query();
			if($checkhomtemp)
			{
				$updatedata=array('banner_heading'=>$feildname);
				if($feildfor=='home_keypoint_first')
				{
					$updatedata=array('keypoint_first_text'=>$feildname);
				}
				if($feildfor=='home_keypoint_second')
				{
					$updatedata=array('keypoint_second_text'=>$feildname);
				}
				if($feildfor=='home_keypoint_third')
				{
					$updatedata=array('keypoint_third_text'=>$feildname);
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
				$status['status']='success';
			}
		}
		else
		{
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
				
				$update = $this->wesite_about->updateDetails($condition,$updatedata);
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
		$condition = array('app_id'=>$id);
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
					$updateArray = array('logo'=>$imagename);

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
			

}

