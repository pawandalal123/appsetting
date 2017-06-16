<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Category extends MY_AppController {	

	function __construct() {

    	parent::__construct();

	}	

	public function index($cat= false,$type1=false,$type2=false){
		$this->data['CategoryType'] = $cat;
		//$this->data['SubCategoryType'] = $subcat;
		$this->data['CategoryId'] = $type1;
		//$this->data['SubCategoryId'] = $type2;
		$this->data['view_file'] = 'user/categorydata';
		$this->load->view('layouts/second_default', $this->data); 

	}

	

	public function allindex($type = false, $type1=false){
	     $this->data['CategoryType'] = $type;
		  $this->data['CategoryID'] = $type1;
		 if($type == false && $type1 == false)
		 {
			 $this->data['view_file'] = 'user/allcategorylisting';
		 }
		 else
		 {
			 $this->data['view_file'] = 'user/allsubcategory';
		 }
		$this->load->view('layouts/user_default', $this->data); 
	}
	public function categotyListing(){
		$this->data['view_file'] = 'user/allcategorylisting';
		$this->load->view('layouts/user_default', $this->data); 

	}

	public function register()
        {

		if($this->input->post('login'))
		{
			$this->AddListing();
		}
		$this->data['view_file'] = 'user/userregister';
		$this->load->view('layouts/user_default', $this->data); 

	}

	public function Login()
	{

		$this->data['view_file'] = 'user/login';
		$this->load->view('layouts/logindefault', $this->data); 

	}

	public function forgetPass(){

		$this->data['view_file'] = 'user/forgetpass';

		$this->load->view('layouts/logindefault', $this->data); 

	}	

	public function subcategory($cat= false,$type = false,$type1=false,$type2=false){
	    $this->data['CategoryType'] = $cat;
		$this->data['SubCategoryType'] = $type;
		$this->data['CategoryId'] = $type1;
		$this->data['SubCategoryId'] = $type2;
		$this->data['view_file'] = 'user/subcategoryListing';
		$this->load->view('layouts/second_default', $this->data);
	}

	public function viewdetails($type = false,$type1 = false){

	    $type;

		$this->data['ProductName'] = $type;
		$this->data['ProductId'] = $type1;
		$this->data['view_file'] = 'user/viewdetails';
		$this->load->view('layouts/second_default', $this->data);

	}

	

	 public function AddListing()
		 {
              $userData = $this->input->post();
			  @extract($userData);
			  if($this->session->userdata('logged_in')== true)
			  {
			  $image=$_FILES['logo']['name'];
			 // $this->form_validation->set_rules('description', 'Description', 'required');
			  $this->form_validation->set_rules('companyname', 'Company Name', 'required');
			  $this->form_validation->set_rules('description', 'Description', 'required');
			 // $this->form_validation->set_rules('description', 'Description', 'required');
              $this->form_validation->set_error_delimiters('<p class="req">', '</p>');
              if ($this->form_validation->run())
			  {
				   $this->load->model('User');
		  		   $companyData = array('user_id' => $this->session->userdata('UserId'),
				   'company_name' => $companyname,
				   'contect_person'=>$contact_person,
				   'state'=>$state,
				   'distric'=>$districList,
				   'city'=>$CityList,
				   'address'=>$address);
			 	   $Insert1 = $this->User->AdduserData('company_details',$companyData);
				//   echo $this->db->last_query();

		           $productData = array('company_id' => $Insert1,
				   'bussiness_nature'=> $nature_of_business,
				   'wesite'=>$website,
				   'category'=>$categorylist,
				   'sub_category'=>$subcategory,
				   'discription'=>$description,
				   "join_date"=>date('Y-m-d h:i:s'));
				   $Insert = $this->User->AdduserData('product_details',$productData);
				   $productId = $this->db->insert_id();
					 if($Insert)
					 {
					  $image_name='';
						 if($image!="")
						 {
							$name=$image;
							$up_path= 'Document';
							$input_name='logo';
							$image_name=$this->uploadimage($up_path,$input_name,$name);
							if($image_name['error']==true)
							{
								$this->data['error_message']= $image_name['error_type'];
								//$this->session->set_flashdata('error_message', $image_name['error_type']);
							}
							else
							{
								$this->where(array('product_id'=>$productId));
								$this->db->update('product_details',array('product_image' => $image_name['file_name']));
							}
						 }
					 }
				   $to=$userData['email'];
				   $from='paandalal@quailtec.com';
				   $subject='Thanks For Registration';
				   $body='welcome you we are happy with you';
		  		   $sendemail=$this->common->sendemail($to,$from,$subject,$body);
				   $this->data['succ_message']= 'Your product will display after 3-4 hrs. Thank you.';
		           //die;
			  }
			 }
			  else
			  {
		      $image=$_FILES['logo']['name'];
		 	  $this->form_validation->set_rules('email', 'Email', 'required');
			  $this->form_validation->set_rules('companyname', 'companyname', 'required');
			  $this->form_validation->set_rules('description', 'Designation', 'required');
		      $this->form_validation->set_rules('phone_no', 'Mobile No', 'required'); 
              $this->form_validation->set_error_delimiters('<p class="req">', '</p>');
                 if ($this->form_validation->run()){
					 $this->db->trans_begin();
					 $password=md5(rand(10000,99999999));	  
					 $Data = array('profile_name'=>$name,
					               'email_id' => $email,
								   'mobile_no' => $phone_no,
								   'permanent_address'=>$permanenet_address,
								   "password"=> $password,
								   "enroll_date"=>date('Y-m-d h:i:s'));
									 $this->load->model('User');
									 $Insert = $this->User->AdduserData('user_signup',$Data);
									 $companyData = array('user_id' => $Insert,
									 'company_name' => $companyname,
									 'contect_person' => $contact_person,
									 'state' => $state,
									 'distric' => $districList,
									 'city' => $CityList,
									 'address' => $address);
									 $Insert1 = $this->User->AdduserData('company_details',$companyData);
									 $productData = array('company_id' => $Insert1,
									 'bussiness_nature'=> $nature_of_business,
									 'wesite' => $website,
									 'category' => $categorylist,
									 'sub_category' => $subcategory,
									 'discription' => $description,
									 "join_date"=>date('Y-m-d h:i:s'));
				     $Insert2 = $this->User->AdduserData('product_details',$productData);
					 $productId = $this->db->insert_id();
					 if($Insert2)
					 {
					  $image_name='';
						 if($image!="")
						 {
							$name=$image;
							$up_path= 'Document';
							$input_name='logo';
							$image_name=$this->uploadimage($up_path,$input_name,$name);

							if($image_name['error']==true)
							{
								$this->data['error_message']= $image_name['error_type'];
							}
							else
							{

								$this->db->where(array('product_id'=>$productId));
								$this->db->update('product_details',array('product_image' => $image_name['file_name']));

							}
						 }
					 }
					 $this->db->trans_complete();

				     $this->load->model('common');
				     $to=$email;
				     $from='info@indiabiztrade.com';
				     $subject='Thanks For Registration';
				     $body='welcome you we are happy with you';
				     $sendemail=$this->common->sendemail($to,$from,$subject,$body);

   					if ($this->db->trans_status() === FALSE)
					{
						$this->data['error_message']= 'Data not saved please try again.';
					} 
					else
					{
						$this->data['succ_message']= 'Your product will display after 3-4 hrs. Thank you.';
					}
				 }
			 }
		}	
	}

