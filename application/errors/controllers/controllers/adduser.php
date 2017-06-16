<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddUser extends MY_AppController {	
	function __construct() {
    	parent::__construct();
	}	
	     public function AddListing()
		 {
              $userData = $this->input->post();
			  if($this->session->userdata('logged_in')== true)
			  {
			  $image=$_FILES['logo']['name'];
			  $this->form_validation->set_rules('description', 'Description', 'required');
			  $this->form_validation->set_rules('companyname', 'Company Name', 'required');
			  $this->form_validation->set_rules('description', 'Description', 'required');
			  $this->form_validation->set_rules('description', 'Description', 'required');
			 // $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback__isUniqueEmail['.$id.']');
              $this->form_validation->set_error_delimiters('<p class="req">', '</p>');
			  
             if ($this->form_validation->run())
			 {
				  
			  if($image!=""){
		        $name=$image;
				$up_path= 'Document';
				$input_name='logo';
				$image_name=$this->upload_image($up_path,$input_name,$name);
			   }
			   else
			   {
			    $image_name='';
			   }
			   $this->load->model('User');
		   $companyData = array('user_id' => $this->session->userdata('UserId'),'company_name' => $userData['companyname'],'contect_person'=>$userData['contact_person'],'state'=>$userData['state'],'distric'=>$userData['districList'],'city'=>$userData['CityList'],'address'=>$userData['address']);
			 $Insert1 = $this->User->AdduserData('company_details',$Data);
		   $productData = array('company_id' => $Insert1,'bussiness_nature'=> $userData['nature_of_business'],'wesite'=>$userData['website'],'category'=>$userData['categorylist'],'sub_category'=>$userData['subcategory'],'discription'=>$userData['description'],'product_image'=>$image_name);
		  $Insert = $this->User->AdduserData('product_details',$productData);
		  //redirect(SITE_URL.'category/register' , 'refresh');
                          $this->data['view_file']  = 'user/userregister';
		                  $this->load->view('layouts/user_default', $this->data);
			  }
			  else
			   {
				           $this->data['view_file']  = 'user/userregister';
		                   $this->load->view('layouts/user_default', $this->data);
			   }
			  }
			  else
			  {
		      $image=$_FILES['logo']['name'];
		 	  $this->form_validation->set_rules('email', 'Email', 'required');
			  $this->form_validation->set_rules('companyname', 'companyname', 'required'); 
			  $this->form_validation->set_rules('description', 'Designation', 'required');
			 // $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback__isUniqueEmail['.$id.']');
              $this->form_validation->set_rules('phone_no', 'Mobile No', 'required'); 
              $this->form_validation->set_error_delimiters('<p class="req">', '</p>');
                 if ($this->form_validation->run()== FALSE){
					  $this->session->set_flashdata('message_error', "Please fill in required fields");
					  $this->data['view_file']  = 'user/userregister';
		              $this->load->view('layouts/user_default', $this->data);
                  }
				  else
				  {
		    $this->db->trans_begin();
		    $password=md5(rand(10000,99999999));	  
	        $Data = array('profile_name'=>$userData['name'],'email_id' => $userData['email'],'mobile_no' => $userData['phone_no'],'permanent_address'=>$userData['permanenet_address'],"password"=> $password,"enroll_date"=>date('Y-m-d h:i:s'));
		    $this->load->model('User');
		    $Insert = $this->User->AdduserData('user_signup',$Data);
		
		    if($image!=""){ 
				$name=$image;
				$up_path= 'Document';
				$input_name='logo';
				$image_name=$this->upload_image($up_path,$input_name,$name);
			 }
			 else
			{
			 $image_name='';
			}
			
			 $companyData = array('user_id' => $Insert,'company_name' => $userData['companyname'],'contect_person'=>$userData['contact_person'],'state'=>$userData['state'],'distric'=>$userData['districList'],'city'=>$userData['CityList'],'address'=>$userData['address']);
			 $Insert1 = $this->User->AdduserData('company_details',$companyData);
		   $productData = array('company_id' => $Insert1,'bussiness_nature'=> $userData['nature_of_business'],'wesite'=>$userData['website'],'category'=>$userData['categorylist'],'sub_category'=>$userData['subcategory'],'discription'=>$userData['description'],'product_image'=>$image_name);
		  $Insert2 = $this->User->AdduserData('product_details',$productData);
		  //redirect(SITE_URL.'category/register' , 'refresh');
                           $this->data['view_file']  = 'user/userregister';
		                   $this->load->view('layouts/user_default', $this->data);
						   if ($this->db->trans_status() === FALSE)
{
    $this->db->trans_rollback();
}
else
{
    $this->db->trans_commit();
}
				  }
			  }
		}	
		

     public function upload_image($path,$feild_name,$img_name)
	{
		$config['upload_path'] = 'upload/'.$path.'/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']    = '1000000';
		$config['file_name'] = time().'_'.$img_name;
		$this->load->library('upload', $config);
  		$this->upload->initialize($config);
     	if ( ! $this->upload->do_upload($feild_name))
	   {
		$error = array('error' => $this->upload->display_errors());
		echo  $msg=$error['error'];
	   }
	   else
	   {
	   $upload_data = $this->upload->data();
	   $filename=$upload_data['file_name'];
	   return $filename;
 
        }
          }
		
		public function AddbuyLead()
		 {
		  $msg='';
		  $userData = $this->input->post();
		   if($this->session->userdata('logged_in')== true)
			  {
		  $this->form_validation->set_rules('productname','Service Type','required');
	      $this->form_validation->set_rules('requirment','Description','required');
		  $condition=array("company_id"=>$this->session->userdata('userId'));
		  $companyId=$this->common->getcompanyId($condition);
		  $productData = array('company_id' => $companyId->company_id,'product_name' => $userData['productname'],'requirment'=> $userData['requirment'],'quantity'=>$userData['Quantity'].'-'.$userData['quantity'],'category'=>$userData['categorylist'],'subcategory'=>$userData['subcategory'],'date'=>date('Y-m-d h:i:s'));
		  $Insert2 = $this->User->AdduserData('tbl_buy_leads',$productData);
		  $this->data['view_file'] = 'user/post_requirment';
	      $this->load->view('layouts/second_default', $this->data); 
			  }
			  else
			  {
		  $this->form_validation->set_rules('productname','Service Type','required');
		  $this->form_validation->set_rules('email','Email alresdy Exit','required|callback_unique_email[email]');
		//  $this->form_validation->set_rules('email','Email alresdy Exit','required|callback_unique_email[email]');
	      $this->form_validation->set_rules('requirment','Description','required');
		  $this->form_validation->set_rules('mobile','Number','required');
	      $this->form_validation->set_rules('contect_person','Person Name','required');
		  $this->form_validation->set_rules('city','City','required');
	      $this->form_validation->set_rules('state','State','required');
			   
			   if($this->form_validation->run()){
				    $this->db->trans_begin();
		  $password=md5(rand(10000,99999999));	  
	      $Data = array('profile_name'=>$userData['contact_person'],'permanent_address'=>$userData['state'].','.$userData['districList'],'email_id' => $userData['email'],'mobile_no' => $userData['mobile'],"password"=> $password,"enroll_date"=>date('Y-m-d h:i:s'));
		  $this->load->model('User');
		  $Insert = $this->User->AdduserData('user_signup',$Data);
		  
		  
		  $companyData = array('user_id' => $Insert,'company_name' => $userData['companyname'],'contect_person'=>$userData['contact_person'],'state'=>$userData['state'],'city'=>$userData['districList'],'address'=>$userData['state'].','.$userData['districList']);
			 $Insert1 = $this->User->AdduserData('company_details',$companyData);
			 
			 
		  $productData = array('company_id' => $Insert1,'product_name' => $userData['productname'],'requirment'=> $userData['requirment'],'quantity'=>$userData['Quantity'].'-'.$userData['quantity'],'category'=>$userData['categorylist'],'subcategory'=>$userData['subcategory'],'date'=>date('Y-m-d h:i:s'));
		  $Insert2 = $this->User->AdduserData('tbl_buy_leads',$productData);
		  
		  
								 $this->data['view_file'] = 'user/post_requirment';
	                             $this->load->view('layouts/second_default', $this->data);
								 if ($this->db->trans_status() === FALSE)
								 
                                 {
                                   $this->db->trans_rollback();
								   
                                 }
								 
                                 else
								 
                                 {
									 
                                     $this->db->trans_commit();
									 
                                  }              
			   }
			   else
			   {
				    $this->data['view_file'] = 'user/post_requirment';
	                $this->load->view('layouts/second_default', $this->data); 
			   }
			  }
		 
		}	
		
		
		
		public function AddbyRequirment()
		 {
		  $userData = $this->input->post();
		//  pr($userData);
		  $this->form_validation->set_rules('productname','Service Type','required');
		  $this->form_validation->set_rules('email','Email alresdy Exit','required');
	      $this->form_validation->set_rules('requirment','Description','required');
	      $this->form_validation->set_rules('mobile','Number','required');
	      $this->form_validation->set_rules('contect_person','Person Name','required');
		 
			    if($this->form_validation->run()){
				    $this->db->trans_begin();
		  $password=md5(rand(10000,99999999));	  
	      $Data = array('profile_name'=>$userData['contect_person'],'permanent_address'=>$userData['state'].','.$userData['districList'],'email_id' => $userData['email'],'mobile_no' => $userData['mobile'],"password"=> $password,"enroll_date"=>date('Y-m-d h:i:s'));
		  $this->load->model('User');
		  $Insert = $this->User->AdduserData('user_signup',$Data);
		  $companyData = array('user_id' => $Insert,'company_name' => $userData['companyname'],'contect_person'=>$userData['contact_person'],'state'=>$userData['state'],'city'=>$userData['districList'],'address'=>$userData['state'].','.$userData['districList']);
			 $Insert1 = $this->User->AdduserData('company_details',$companyData);
		  $productData = array('company_id' => $Insert1,'product_name' => $userData['productname'],'requirment'=> $userData['requirment'],'quantity'=>$userData['Quantity'].'-'.$userData['quantity'],'category'=>$userData['categorylist'],'subcategory'=>$userData['subcategory'],'date'=>date('Y-m-d h:i:s'));
		  $Insert2 = $this->User->AdduserData('tbl_buy_leads',$productData);
								 $this->data['view_file'] = 'user/post_requirment';
	                             $this->load->view('layouts/second_default', $this->data);
								 if ($this->db->trans_status() === FALSE)
								 
                                 {
                                   $this->db->trans_rollback();
								   
                                 }
								 
                                 else
								 
                                 {
									 
                                     $this->db->trans_commit();
									 
                                  }              
			   }
			   else
			   {
				    $this->data['view_file'] = 'user/post_requirment';
	                $this->load->view('layouts/second_default', $this->data); 
			   }
		 
		}	
		
		
		public function SellProduct()
		 {
		  $msg='';
		  $userData = $this->input->post();
		  $image=$_FILES['fileField']['name'];
		  $password=md5(rand(10000,99999999));	  
	      $Data = array('email_id' => $userData['email'],'mobile_no' => $userData['mobile'],"password"=> $password,"enroll_date"=>date('Y-m-d h:i:s'));
		    $this->load->model('User');
		    $Insert = $this->User->AdduserData('user_signup',$Data);
		    if($image!=""){
			$name=$image;
			$up_path= 'Document';
			$input_name='fileField';
			$image_name=$this->upload_image($up_path,$input_name,$name);
			 }
			else
			{
			$image_name='';
			}
		  $productData = array('user_id' => $Insert,'title' => $userData['title'],'contect_person'=> $userData['name'],'price'=>$userData['price'],'condition'=>$userData['condition'],'product_description'=>$userData['product_description'],'state'=>$userData['state'],'district'=>$userData['districList'],'city'=>$userData['CityList'],'sellertype'=>$userData['radio'],'address'=>$userData['Address'],'category'=>$userData['categorylistsell'],'subcategory'=>$userData['subcategorysell'],'image_name'=>$image_name);
		  $Insert = $this->User->AdduserData('sell_product',$productData);
		  
		                        $msg.='Invalid Login Details';
								$this->db['message']=$msg;
								redirect(SITE_URL.'sellproduct/SellProduct');
		 
		}
		
		public function Enquriy()
		 {
		  $msg='';
		  $userData = $this->input->post();
$this->load->model('User');
		  $productData = array('contact_person' => $userData['contect_person'],'email' => $userData['email'],'company_name'=> $userData['companyname'],'website'=>$userData['website'],'state'=>$userData['state'],'city'=>$userData['districList'],'desc_req'=>$userData['requirment'],'enq_date_time'=>date('Y-m-d h:i:s'));
		  $Insert = $this->User->AdduserData('enquiry',$productData);
		  
		                        $msg.='Sussefully Submitted';
								$this->data['message']=$msg;
								//redirect(SITE_URL.'user/enquiry');
					            $this->data['view_file']  = 'user/enqirey';
		                        $this->load->view('layouts/second_default', $this->data); 
		 
		}
		
		  public function AddproductEnquiry()
		 {
               $userData = $this->input->post();
               $this->form_validation->set_rules('name','Name','required');
			   $this->form_validation->set_rules('email','Email','required|email');
			   
			   if($this->form_validation->run()){
						  $Data = array('name' => $userData['name'],'email' => $userData['email'],"mobile"=> $userData['email'],"message"=>$userData['product_description'],"product_id"=>$userData['product_id'],"date"=>date('Y-m-d h:i:s'));
									   $this->load->model('User');
		                   $Insert = $this->User->AdduserData('products_enqiry',$Data);
		                   $this->session->set_flashdata('thanks', "Successfully Send");
                           $this->data['view_file'] = 'user/viewdetails';
		                   $this->load->view('layouts/second_default', $this->data); 
			   }else{
				    		$this->data['view_file'] = 'user/viewdetails';
		                   $this->load->view('layouts/second_default', $this->data); 
				  }
		}
		
		   public function AddLeadEnquiry()
		 {
               $userData = $this->input->post();
               $this->form_validation->set_rules('name','Name','required');
			   $this->form_validation->set_rules('email','Email','required|email');
			   
			   if($this->form_validation->run()){
						  $Data = array('name' => $userData['name'],'email' => $userData['email'],"mobile"=> $userData['email'],"message"=>$userData['product_description'],"enquiry_for"=>'leads',"date"=>date('Y-m-d h:i:s'));
									   $this->load->model('User');
		                   $Insert = $this->User->AdduserData('products_enqiry',$Data);
		                   $this->session->set_flashdata('thanks', "Successfully Send");
                          
			   }else{
				    		$this->data['view_file'] = 'user/productsearch';
		                    $this->load->view('layouts/second_default', $this->data); 
				  }
		}
		
		public function unique_email($email)
		{
			if($email){
			$this->db->where('email_id', $email);
		 }
		
		$categoryListingdata =$this->db->get('user_signup');
	//	echo $this->db->last_query();
		if($categoryListingdata->num_rows() > 0)
		{
			$this->form_validation->set_message('email', 'The %s field can not be the word "test"');
			return FALSE;
		}
		else
		{
			return true;
		}
			
			
		}
		
		public function AddsellProductEnquiry()
		 {
               $userData = $this->input->post();
               $this->form_validation->set_rules('name','Name','required');
			   $this->form_validation->set_rules('email','Email','required|email');
			   $this->form_validation->set_rules('mobile','Mobile','required|number');
			   
			   if($this->form_validation->run()){
						  $Data = array('name' => $userData['name'],'email' => $userData['email'],"mobile"=> $userData['mobile'],"message"=>$userData['product_description'],"product_id"=>$userData['product_id'],"enquiry_for"=>'sellproduct',"date"=>date('Y-m-d h:i:s'));
						   $this->load->model('User');
		                   $Insert = $this->User->AdduserData('products_enqiry',$Data);
						  // echo $this->db->last_query();
		                   $this->session->set_flashdata('thanks', "Successfully Send");
						   $this->data['view_file'] = 'user/sellproductdetails';
		                   $this->load->view('layouts/sellproduct_default', $this->data);
                          
			   }else{
				    		$this->data['view_file'] = 'user/sellproductdetails';
		                    $this->load->view('layouts/sellproduct_default', $this->data); 
				  }
		}
		
		public function updateDetails($where,$table,$data)
		  {
			 $this->db->where($where);
             $this->db->update($table, $data); 
		  }
		
	}
