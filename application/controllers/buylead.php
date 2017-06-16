<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class BuyLead extends MY_AppController {	
	   function __construct() {
    	parent::__construct();
		$this->load->library('session');
	}	
    public function buyleadlist(){
		if($this->input->post('submitlead')){
		   $this->AddbyRequirment();
				}
	    $this->data['view_file'] = 'lead/leaddisplay';
		$this->load->view('layouts/buysecond_default', $this->data); 

	}
	public function index($type = false,$type1 = false){
	    $this->data['CategoryType'] = $type;
		$this->data['CategoryId'] = $type1;
		$this->data['view_file'] = 'lead/buycategorydata';
		$this->load->view('layouts/buysecond_default', $this->data); 

	}
	public function Requirment(){
		if($this->input->post('submit')){
		   $this->AddbuyLead();
				}
	   $this->data['view_file'] = 'lead/post_requirment';
	   $this->load->view('layouts/second_default', $this->data); 

	}	

	public function buyListing(){
		$this->data['view_file'] = 'lead/allleadcategory';
		$this->load->view('layouts/lead_default', $this->data);
	}

	public function allindex($type = false, $type1=false){
	    $this->data['CategoryType'] = $type;
		$this->data['CategoryID'] = $type1;
		$this->data['view_file'] = 'lead/buysubcategory';
		$this->load->view('layouts/lead_default', $this->data); 
	 }

	 

	 public function subcategory($type = false,$type1=false,$type2=false){
		$this->data['SubCategoryType'] = $type;
		$this->data['CategoryId'] = $type1;
		$this->data['SubCategoryId'] = $type2;
		$this->data['view_file'] = 'lead/buysubcategorylisting.php';
		$this->load->view('layouts/buysecond_default', $this->data); 

	}	

	 public function viewdetails($type = false,$type1 = false){
	    $type;
		$this->data['ProductName'] = $type;
		$this->data['ProductId'] = $type1;
		$postData = $this->input->post();
		if(isset($postData['submitenquiry']))
		{
			
			$this->AddbyRequirment();
		}
		$DetailsDta= $this->common->ViewLeadProductDetails($type,$type1);
		$this->data['DetailsDta']= $this->common->ViewLeadProductDetails($type,      $type1);
	    $condition=array('cat_id'=>$DetailsDta->category);
	    $condition1=array('sub_cat_id'=>$DetailsDta->subcategory);
	    $this->data['CategoryName']= $this->common->CategoryName($condition);
	    $this->data['SubCategoryNameDisplay']=$this->common->SubCategoryNameDisplay($condition1);
// $stateData= $this->common->LocationList('state');
	    $this->data['stateData']= $this->common->selectAllState('state');
	    $this->data['CategoryListData']= $this->common->CategoryList();
	    $this->data['stateNameData']=$this->common->stateDisplayName($DetailsDta->state);
	    $this->data['districtNameData']=$this->common->districtDisplayName($DetailsDta->distric);
	    $this->data['cityNameData']=$this->common->cityDisplayName($DetailsDta->city);
		$this->data['view_file'] = 'lead/byleadsdetails';
		$this->load->view('layouts/buysecond_default.php', $this->data); 
	}
	public function AddbuyLead()
		 {
		  $userData = $this->input->post();
		 // @extract($userData);
		  if($this->session->userdata('logged_in')== true)
			  {
		  $this->load->model('User');
		  $this->load->model('common');
		  $this->form_validation->set_rules('productname','Service Type','required');
	      $this->form_validation->set_rules('requirment','Description','required');
		  $condition=array("company_id"=>$this->session->userdata('userId'));
		  $companyId=$this->common->getcompanyId($condition);
		  $productData = array('company_id' => $companyId->company_id,
							   'product_name' => $userData['productname'],
							   'requirment'=> $userData['requirment'],
							   'quantity'=>$userData['Quantity'].'-'.$userData['quantity'],
							   'category'=>$userData['categorylist'],
							   'subcategory'=>$userData['subcategory'],
							   'date'=>date('Y-m-d h:i:s'));
		  $Insert2 = $this->User->AdduserData('tbl_buy_leads',$productData);
		  $to=$userData['email'];
		  $from='paandalal@quailtec.com';
		  $subject='Thanks For Registration';
		  $body='welcome you we are happy with you';
		  $sendemail=$this->common->sendemail($to,$from,$subject,$body);
		  }
			  else
			  {
		  $this->form_validation->set_rules('productname','Service Type','required');
		  $this->form_validation->set_rules('email','Email Id','required|trim|is_unique[user_signup.email_id]');
	      $this->form_validation->set_rules('requirment','Description','required');
		  $this->form_validation->set_rules('mobile','Number','required|min_length[10]|max_length[10]|integer');
	      $this->form_validation->set_rules('contect_person','Person Name','required');
		  $this->form_validation->set_rules('districList','City','required');
	      $this->form_validation->set_rules('state','State','required');
		   if($this->form_validation->run())
		   {
			  $this->db->trans_begin();
			  $password=md5(rand(10000,99999999));	  
			  $Data = array('profile_name'=>$userData['contect_person'],                            'permanent_address'=>$userData['state'].','.$userData['districList'],
			                'email_id' => $userData['email'],
							'mobile_no' => $userData['mobile'],
							"password"=> $password,
							"enroll_date"=>date('Y-m-d h:i:s'));

			  $this->load->model('User');
			  $this->load->model('common');
			  $Insert = $this->User->AdduserData('user_signup',$Data);
			  $companyData = array('user_id' => $Insert,
			                       'company_name' =>$userData['company_name'],
			                       'contect_person'=>$userData['contect_person'],
								   'state'=>$userData['state'],
								   'city'=>$userData['districList'],
								   'address'=>$userData['state'].',
								   '.$userData['districList']);
			  $Insert1 = $this->User->AdduserData('company_details',$companyData);
			  $productData = array('company_id' => $Insert1,
								  'product_name' => $userData['productname'],
								  'requirment'=> $userData['requirment'],
								  'quantity'=>$userData['Quantity'].'-'.$userData['quantity'],
								  'category'=>$userData['categorylist'],
								  'subcategory'=>$userData['subcategory'],
								  'date'=>date('Y-m-d h:i:s'));

			  $Insert2 = $this->User->AdduserData('tbl_buy_leads',$productData);
			  $to=$userData['email'];
			  $from='paandalal@quailtec.com';
			  $subject='Thanks For Registration';
			  $body='welcome you we are happy with you';
			  $sendemail=$this->common->sendemail($to,$from,$subject,$body);
				if ($this->db->trans_status() === FALSE)
				{
					$this->db->trans_rollback();
				}
				else
				{
					$this->db->trans_commit();
					$this->data['succ_msg'] = 'Your product will display after 3-4 hrs. Thank you.';
				}
	  }
			   else
			   {	
			        $this->data['view_file'] = 'lead/post_requirment';
	                $this->load->view('layouts/second_default', $this->data); 
			   }
		}
	}

	public function AddbyRequirment()
		 {
		  $userData = $this->input->post();
		  @extract($userData);
		//  pr($userData);

		  $this->form_validation->set_rules('productname','Service Type','required');
		  $this->form_validation->set_rules('email','Email','required|trim|is_unique[user_signup.email_id]');
	      $this->form_validation->set_rules('requirment','Description','required');
	      $this->form_validation->set_rules('mobile','Number','required');
	      $this->form_validation->set_rules('contect_person','Person Name','required');
			    if($this->form_validation->run()){
				    $this->db->trans_begin();
		  $password=md5(rand(10000,99999999));	  
	      $Data = array('profile_name'=>$contect_person,
		  'permanent_address'=>$state.','.$districList,
		  'email_id' => $email,
		  'mobile_no' => $mobile,
		  "password"=> $password,
		  "enroll_date"=>date('Y-m-d h:i:s'));
		  $this->load->model('User');
		  $this->load->model('common');
		  $Insert = $this->User->AdduserData('user_signup',$Data);
		  $companyData = array('user_id' => $Insert,
		  'company_name' => $company_name,
		  'contect_person'=>$contect_person,
		  'state'=>$state,
		  'city'=>$districList,
		  'address'=>$state.','.$districList);
			 $Insert1 = $this->User->AdduserData('company_details',$companyData);
		     $productData = array('company_id' => $Insert1,
		  'product_name' => $productname,
		  'requirment'=> $requirment,
		  'quantity'=>$Quantity.'-'.$quantity,
		  'category'=>$categorylist,
		  'subcategory'=>$subcategory,
		  'date'=>date('Y-m-d h:i:s'));
		  $Insert2 = $this->User->AdduserData('tbl_buy_leads',$productData);
		  $to=$email;
		  $from='no-reply@indiabiztrade.com';
		  $subject='Thanks For Registration';
		  $body='welcome you we are happy with you';
		  $sendemail=$this->common->sendemail($to,$from,$subject,$body);
								 if ($this->db->trans_status() === FALSE)
                                 {
                                   $this->db->trans_rollback();
                                 }
                                 else
                                 {
									 $this->data['succ_msg'] = 'Your product will display after 3-4 hrs. Thank you.';
                                     $this->db->trans_commit();
                                  }              
			   }
			   
		}	

	}