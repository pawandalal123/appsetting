<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddUser extends MY_AppController {	
	function __construct() {
    	parent::__construct();
	}	
		
		  public function AddproductEnquiry()
		 {
               $userData = $this->input->post();
               $this->form_validation->set_rules('name','Name','required');
			   $this->form_validation->set_rules('email','Email','required|email');
			   
			   if($this->form_validation->run()){
				          $ipaddress=$_SERVER['REMOTE_ADDR'];
						  if ($this->agent->is_browser())
                          {
							  
                               $agent = $this->agent->browser().' '.$this->agent->version();
							   $networkType='Web';
                          }
						  elseif ($this->agent->is_robot())
                          {
							  
                               $agent = $this->agent->robot();
							   $networkType='Web';
                          }
						  elseif($this->agent->is_mobile())
						  {
							  $agent = $this->agent->mobile();
							  $networkType='Mobile';
						  } 
						  else
						  {
							  $agent='Undefine';
							  $networkType='Undefine';
						  }
						  $Data = array('name' => $userData['name'],'email' => $userData['email'],"mobile"=> $userData['email'],"message"=>$userData['product_description'],"product_id"=>$userData['product_id'],"ip_address"=>$ipaddress,"request_from"=>$agent,"network"=>$networkType,"date"=>date('Y-m-d h:i:s'));
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
				   $ipaddress=$_SERVER['REMOTE_ADDR'];
						  if ($this->agent->is_browser())
                          {
							  
                               $agent = $this->agent->browser().' '.$this->agent->version();
							   $networkType='Web';
                          }
						  elseif ($this->agent->is_robot())
                          {
							  
                               $agent = $this->agent->robot();
							   $networkType='Web';
                          }
						  elseif($this->agent->is_mobile())
						  {
							  $agent = $this->agent->mobile();
							  $networkType='Mobile';
						  } 
						  else
						  {
							  $agent='Undefine';
							  $networkType='Undefine';
						  }
						  $Data = array('name' => $userData['name'],'email' => $userData['email'],"mobile"=> $userData['email'],"message"=>$userData['product_description'],"enquiry_for"=>'leads',"ip_address"=>$ipaddress,"request_from"=>$agent,"network"=>$networkType,"date"=>date('Y-m-d h:i:s'));
									   $this->load->model('User');
		                   $Insert = $this->User->AdduserData('products_enqiry',$Data);
		                  $this->data['view_file'] = 'user/leaddisplay';
		                    $this->load->view('layouts/second_default', $this->data); 
                          
			   }else{
				    		$this->data['view_file'] = 'user/leaddisplay';
		                    $this->load->view('layouts/second_default', $this->data); 
				  }
		}
		
		public function unique_email($email)
		{
			if($email){
			$this->db->where('email_id', $email);
		 }
		
		$categoryListingdata =$this->db->get('users');
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
		public function updateDetails($where,$table,$data)
		  {
			 $this->db->where($where);
             $this->db->update($table, $data); 
		  }
		  
		  
		  
		  
	
		
	}
