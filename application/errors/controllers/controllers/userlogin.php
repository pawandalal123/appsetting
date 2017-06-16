<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserLogin extends MY_AppController {	
	function __construct() {
    	parent::__construct();
	}	
	     public function CheckUserLogin()
		 {
			                $msg='';
							
		                    $userLoginDetails = $this->input->post();
							$where="email_id = '".$userLoginDetails['email']."' and password='".md5($userLoginDetails['password'])."'";
							$this->form_validation->set_rules('email', 'email', 'required');
			                $this->form_validation->set_rules('password', 'password', 'required');
		                    $CheckLoginQuery = $this->db->where($where)
					 		                     ->get('user_signup');								
							
							$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
			  
                            if ($this->form_validation->run())
			                 {
							 if($CheckLoginQuery->num_rows() > 0)
							{
								$CheckLoginData = $CheckLoginQuery->row();
						      $newdata = array(
                             //  'username'  => 'johndoe',
							   'UserId'     => $CheckLoginData->id,
                               'email'     => $CheckLoginData->email_id,
							   'mobile'    => $CheckLoginData->mobile_no,
							   'emailstatus'     => $CheckLoginData->email_status,
							   'mobilestatus'    => $CheckLoginData->mobile_status,
							   'DisplayName'    => $CheckLoginData->profile_name,
							   'DisplayAddress'    => $CheckLoginData->permanent_address,
                               'logged_in' => TRUE
                                     );

                              $this->session->set_userdata($newdata);
		                      $this->data['view_file'] = 'user/profile';
		                      $this->load->view('layouts/profile_default', $this->data);  
							}
							 else
							 {
								 $this->data['view_file'] = 'user/login';
		                         $this->load->view('layouts/logindefault', $this->data);  
							}
							 }
							 else
							 {
								 $this->data['view_file'] = 'user/login';
		                         $this->load->view('layouts/logindefault', $this->data); 
							 }
		 
		}	
	}
?>