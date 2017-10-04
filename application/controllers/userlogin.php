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
			public function mainlogin()
			{
				if($this->session->userdata('logged_in'))
				{
					redirect(SITE_URL);
				}
				if($this->input->post('userlogin'))
				{
					$this->CheckUserLogin();
				}
			
				$this->data['view_file'] = 'web/mainlogin';
				$this->load->view('layouts/testDefault', $this->data); 
			}
				public function signup()
			{
				if($this->session->userdata('logged_in'))
				{
					redirect(SITE_URL);
				}
				if($this->input->post('userlogin'))
				{
					$this->registerwithus();
				}
			
				$this->data['view_file'] = 'web/signup';
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
				$where="email = '".$userLoginDetails['useremail']."' and password='".md5($userLoginDetails['password'])."' and first_login=1";
				$this->form_validation->set_rules('useremail', 'email', 'required');
                $this->form_validation->set_rules('password', 'password', 'required');
                
				//echo $this->db->last_query();
				$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
                if ($this->form_validation->run())
                 {
                 	$this->load->model("user_modal");
                 	$CheckLoginQuery = $this->user_modal->getBy($where);	
					 if($CheckLoginQuery)
					 {
							$CheckLoginData = $CheckLoginQuery;
					       $newdata = array(
                         //  'username'  => 'johndoe',
									   'UserId'     => $CheckLoginData->id,
			                           'email'     => $CheckLoginData->email,
									  
			                           'logged_in' => TRUE
                                 );
                            $this->session->set_userdata($newdata);
                            if($this->session->userdata('templete_id'))
							{
								$this->load->model("templetes");
								$this->load->model("template__default");
								$condition = array('id'=>$this->session->userdata('templete_id'));
								$gettempData = $this->template__default->getBy($condition);
								if($gettempData)
								{
									$insertData = array('temlete_name'=>$gettempData->temlete_name,
									                    'background_image'=>$gettempData->background_image,
										                'color_code'=>$gettempData->color_code,
										                'tag_line'=>$gettempData->tag_line,
										                'user_id'=>$CheckLoginData->id,
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
						   //redirect(SITE_URL.'user/profile');
	                    
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
				$this->form_validation->set_rules('useremail', 'Email ', 'required|is_unique[3app_customers__main_info.email]');
				$this->form_validation->set_rules('usermobile', 'Mobile', 'required|callback_numeric_dash');
				$this->form_validation->set_rules('password', 'Password', 'required');
				//echo $this->db->last_query();
				$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
				if ($this->form_validation->run())
				{
					$newPass = md5($password);
					$userData = array('email'=>$useremail,
					'name'=>$username,
					'token'=>md5(time().''.$useremail),
					'mobile'=>$usermobile,
					'password'=>$newPass ,
					'first_login'=>1,
					'created_at'=>date('Y-m-d H:i:s'));
					$this->load->model("user_modal");
					 $insert = $this->user_modal->AdduserData($userData );

					//////////// set mail to user///
					$this->load->model('common');
					
					unset($userData['first_login']);
					unset($userData['created_at']);
					unset($userData['mobile']);
					$userData['sign_up_date']=date('Y-m-d');
					
					$to=$useremail;
					$from=FROM_EMAIL;
					$subject='Register successfully';
					$body='<tr>
    <td align="center" valign="top">
    	<table width="700px" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" valign="top" style="padding-top:60px;padding-bottom:60px;padding-left:0px;padding-right:0px; font-size:40px; color:#fff;">3AppCloud</td>
          </tr>
          <tr>
            <td align="center" valign="top" style="background-color:#fff;padding-top:0px;padding-left:0px;padding-right:0px;padding-bottom:60px;">
            	<h3 style="font-size:25px; color:#2e4255;padding-top:20px;padding-bottom:20px;padding-left:0px;padding-right:0px;">Congrats your account is created for:</h3>
                <h4 style="font-size:35px; color:#2f80cd;font-weight:bold;padding-bottom:20px;padding-top:0px;padding-left:0px;padding-right:0px;">Chuch Pacakage</h4>
                <a href="#" style="background-color:#72b339;display:inline-block; font-size:20px;color:#fff;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px;text-decoration:none;">Go to my Account</a>
            </td>
          </tr>
          <tr>
          	<td align="center" valign="top"><img src="'.WEBROOT_PATH_IMAGES.'img-phone.jpg" alt="" style="display:block;" /></td>
          </tr>
          <tr>
          	<td align="center" valign="top" style="padding-top:60px;padding-bottom:60px;padding-left:70px;padding-right:70px; font-size:20px;line-height:34px;background-color:#fff; color:#7c888d;">3appcloud is proud to have you as a customer.  Meeting your needs in Web, mobile and hosting services.</td>
          </tr>
           <tr>
          	<td align="center" valign="top" style="font-size:15px; color:#a7afb3;padding-top:40px;padding-bottom:40px;padding-left:0;padding-right:0;">Copyright © 2017 3appcloud.com, All rights reserved. </td>
          </tr>
        </table>
    </td>
  </tr>
</table>';
					$sendmail = $this->common->sendemail($to,$from,$subject,$body);
					$userLoginId = $insert;
					// $userData['church_user_ID']=$userLoginId;
					
					$newdata = array(
					//  'username'  => 'johndoe',
					'UserId'     => $userLoginId,
					'email'     => $useremail,
					'logged_in' => TRUE
					);
					$this->session->set_userdata($newdata);
					if($this->session->userdata('templete_id'))
					{

						$this->load->model("templetes");
						$this->load->model("template__default");
						$condition = array('id'=>$this->session->userdata('templete_id'));
						$gettempData = $this->template__default->getBy($condition);
						if($gettempData)
						{
							$insertData = array('temlete_name'=>$gettempData->temlete_name,
							                    'background_image'=>$gettempData->background_image,
							                    'color_code'=>$gettempData->color_code,
							                    'tag_line'=>$gettempData->tag_line,
							                    'user_id'=>$userLoginId,
							                    'cat_id'=>$gettempData->cat_id,
							                    'sub_cat_id'=>$gettempData->sub_cat_id,
							                    'created_at'=>date('Y-m-d H:i:s'));
							$tempid = $this->templetes->AdduserData($insertData);
							if($tempid)
							{
								$userData['admin_id']=$userLoginId;
								$userData['template_id']=$tempid;
								$this->load->model('productusers');
								$userData['product_id']=$this->session->userdata('templete_id');
						        $insert = $this->productusers->AdduserData($userData);

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

		// 	function numeric_dash ($num) {
  //   return ( ! preg_match("/^([0-9-\s])+$/D", $num)) ? FALSE : TRUE;
  // }
public function numeric_dash($string) 
    {
        if ( !preg_match('/^[0-9 .,\-]+$/i',$string) )
        {
            return false;
        }
    }


			
			public function logout()
			 {
							   $newdata = array(
								 //  'username'  => 'johndoe',
								   'UserId'     => $this->session->userdata('UserId'),
								   'email'     =>$this->session->userdata('email'),
								   'logged_in' => TRUE
										 );
							  
				  if($this->session->userdata('templete_id'))
				  {
				  	$newdata['templete_id'] = $this->session->userdata('templete_id');

				  }
							  $this->session->unset_userdata($newdata);
							  redirect(SITE_URL);
							  
										 
			}	
	}
?>