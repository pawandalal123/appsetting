<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserLogin extends MY_AppController {	
	function __construct() {
    	parent::__construct();
	}	
	
			public function login()
			{
				if($this->session->userdata('logged_in'))
				{
					redirect(SITE_URL);
				}
				if($this->input->post('userlogin'))
				{
					$this->CheckUserLogin();
				}
			
				$this->data['view_file'] = 'web/login';
				$this->load->view('layouts/testDefault', $this->data); 
			}
			public function register()
			{
				if($this->session->userdata('logged_in'))
				{
					redirect(SITE_URL);
				}
				
				if($this->input->post('registerwithus'))
				{
					$this->registerwithus();
				}
				$this->data['view_file'] = 'web/register';
				$this->load->view('layouts/testDefault', $this->data); 
			}
			 public function CheckUserLogin()
		     {
			               							
		                    $userLoginDetails = $this->input->post();
							$where="email = '".$userLoginDetails['useremail']."' and password='".md5($userLoginDetails['password'])."'";
							$this->form_validation->set_rules('useremail', 'email', 'required');
			                $this->form_validation->set_rules('password', 'password', 'required');
		                    $CheckLoginQuery = $this->db->where($where)
					 		                     ->get('users');	
							//echo $this->db->last_query();
							
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
								   redirect(SITE_URL.'user/profile');
			                    
								}
							 else
							 {
								$this->data['err_msg'] = 'Login Details Do Not Match.';  
							  }
							 }
		     }
		
			public function registerwithus()
			{
				$userData = $this->input->post();
				@extract($userData );
				$this->form_validation->set_rules('username', 'Name', 'required');
				$this->form_validation->set_rules('useremail', 'Email ', 'required|is_unique[users.email]');
				$this->form_validation->set_rules('usermobile', 'Mobile', 'required|numeric');
				$this->form_validation->set_rules('password', 'Password', 'required');
				//echo $this->db->last_query();
				$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
				if ($this->form_validation->run())
				{
					$newPass = md5($password);
					$userData = array('email'=>$useremail,
					'name'=>$username,
					'mobile'=>$usermobile,
					'password'=>$newPass ,
					'created_at'=>date('Y-m-d H:i:s'));
					$insert = $this->db->insert('users',$userData );
					$userLoginId = $this->db->insert_id();
					$newdata = array(
					//  'username'  => 'johndoe',
					'UserId'     => $userLoginId,
					'email'     => $useremail,
					'mobile'    => $usermobile,
					'emailstatus'     => 'Pending',
					'mobilestatus'    => $usermobile,
					'DisplayName'    => $username,
					'logged_in' => TRUE
					);
					$this->session->set_userdata($newdata);
					if($this->session->userdata('templete_id'))
					{
						$this->load->model("templetes");
						$condition = array('id'=>$this->session->userdata('templete_id'));
						$gettempData = $this->templetes->getBy($condition);
						if($gettempData)
						{
							$insertData = array('temlete_name'=>$gettempData->temlete_name,
							                    'background_image'=>$gettempData->background_image,
							                'color_code'=>$gettempData->color_code,
							                'tag_line'=>$gettempData->tag_line,
							                'user_id'=>$userLoginId,
							                'is_default'=>1,
							                'cat_id'=>$gettempData->cat_id,
							                'sub_cat_id'=>$gettempData->sub_cat_id,
							                'created_at'=>date('Y-m-d H:i:s'));
							$tempid = $this->templetes->AdduserData($insertData);
							if($tempid)
							{
							 redirect(SITE_URL.'user/setcolor/'.$tempid);

							}

						}
						

					}
					else
					{
						redirect(SITE_URL.'user/profile');

					}
				}
			}


			
			public function logout()
			 {
							   $newdata = array(
								 //  'username'  => 'johndoe',
								   'UserId'     => $this->session->userdata('UserId'),
								   'email'     =>$this->session->userdata('email_id'),
								   'mobile'    => $this->session->userdata('mobile_no'),
								   'emailstatus'     =>$this->session->userdata('email_status'),
								   'mobilestatus'    => $this->session->userdata('mobile_status'),
								   'DisplayName'    => $this->session->userdata('profile_name'),
								   'DisplayAddress'    =>$this->session->userdata('permanent_address'),
								   'logged_in' => TRUE
										 );
							  $this->session->unset_userdata($newdata);
							  redirect(SITE_URL);
							  
										 
			}	
	}
?>