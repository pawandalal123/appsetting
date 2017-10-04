<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_AppController {	
	function __construct(){
    	parent::__construct();
		//load the model
		$this->load->model("admin_model");
}	
//index() action is the default action of this controller, it is executed at first
public function index()
{
	 if($this->session->userdata('isLoggedIn') ) {
	 //if session is set redirect to dashboard
       redirect('/admin/dashboard');
    } 
    else 
    {
       $this->show_login(false);
    }
}
//	validateAdmin() action redirect to login page if session is not set
public function validateAdmin()
	{
	 if(!$this->session->userdata('isLoggedIn') )
	  {
      redirect('/admin');
     }
}

//login  process start from here

public function login()
{
     //if session is set then it redirect to dashboard
	 if($this->session->userdata('isLoggedIn') ) 
	 {     
        redirect('/admin/dashboard');
     }	
		$this->form_validation->set_rules('login_id', 'Login Id', 'trim|required|xss_clean');
		$this->form_validation->set_rules('login_password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
	 // if any feild is got empty then redirect to login page and show message
	if($this->form_validation->run() == FALSE)
	 {          
		$this->show_login(false);
	}else{
		// Login Id and password from the form POST
		$login_id = $this->input->post('login_id');
		$pass  = md5($this->input->post('login_password'));
     // If the user is valid, redirect to the dashboard
		
	if( $login_id && $pass && $this->admin_model->validate_user($login_id,$pass))
	 {
		 redirect('/admin/dashboard');	   
	}
	else
	{
		  // Otherwise show the login screen with an error message.
			$this->show_login(true);
		}
	}
}	
// show_login function load the error on the login view	
function show_login( $show_error = false ) 
{
    $this->data['error'] = $show_error;
    $this->data['view_file']  = 'admin/login';
	$this->load->view('layouts/admin/admin_blank', $this->data); 
}
// logout function unset the user session and redirect to login
function logout() {
         //remove all session data
         $this->session->unset_userdata('isLoggedIn');
         $this->session->sess_destroy();
         redirect('/admin');
 }
// load the dashboard view on default layout 
public function dashboard(){
	  
		$this->data['view_file']  = 'admin/dashboard';
		$this->load->view('layouts/admin/admin_default', $this->data); 
}

//login  process end here server_process





	
// admin all action/process start from here

// view_admin function load the respective view on default layout
public function view_admin()
{
	 $this->validateAdmin();
		
	 $where=array('user_type'=>1);
	 $this->load->model("admin_model");
     $adminData=$this->admin_model->select_data('*',$where);
	 $this->data['rows']  = $adminData;

	 $this->data['view_file']  = 'admin/view_admin';
	 $this->load->view('layouts/admin/admin_default', $this->data); 
}
	 

// deleteAdmin delete the row of given parameter 
//parameter is Id of the record to be deleted

// activeDeactiveAdmin active or deactive the row of given parameter depending on status_mode
//parameter is Id of the record to be active or deactive
public function activeDeactiveAdmin($adminId = false,$status_mode=false)
{
	$this->load->model("admin_model");
	  $where=array("id"=>$adminId);
	if($status_mode=='deActive')
	{
	    $cols=array("status"=>1);
		$msgStatus='Activated';
	 } 
	 else if($status_mode=='Active')
	 {
		 $cols=array("status"=>0);
		 $msgStatus='Deactivated';
	 }
	 ///////check user//////
	 $checkuser= $this->admin_model->getBy($where,array('user_type'));
	 if($checkuser)
	 {
	 	 $affected_row=$this->admin_model->updateDetails($where,$cols);
		 if($affected_row)
		 {
				  $msg="$msgStatus Successfully";
				  $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
				  
		 }
		 else
		 {
	              $msg=" Status Not Changed !";
				  $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
				  // redirect('/admin/view_admin','refresh');
		 }
		
		  	redirect('/admin/view_admin','refresh');
		  

	 }
	 else
	 {
	 	$msg=" Status Not Changed !";
	   $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
	   redirect('/admin/view_admin','refresh');
		 
	 }
	
}

public function activeDeactiveuser($adminId = false,$status_mode=false)
{
	$this->load->model("user_modal");
	  $where=array("id"=>$adminId);
	if($status_mode=='deActive')
	{
	    $cols=array("status"=>1);
		$msgStatus='Activated';
	 } 
	 else if($status_mode=='Active')
	 {
		 $cols=array("status"=>0);
		 $msgStatus='Deactivated';
	 }
	 ///////check user//////
	 $checkuser= $this->user_modal->getBy($where,array('user_type'));
	 if($checkuser)
	 {
	 	 $affected_row=$this->user_modal->updateDetails($where,$cols);
		 if($affected_row)
		 {
				  $msg="$msgStatus Successfully";
				  $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
				  
		 }
		 else
		 {
	              $msg=" Status Not Changed !";
				  $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
				  // redirect('/admin/view_admin','refresh');
		 }
		 
		  	redirect('/admin/users','refresh');
		  

	 }
	 else
	 {
	 	$msg=" Status Not Changed !";
	   $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
	   redirect('/admin/users','refresh');
		 
	 }
	
}


// changePassword  function change the password of admin

public function changePassword(){
		
		
		$this->form_validation->set_rules('npassword', 'New Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('repassword', 'Confirm Password', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
 	  if($this->form_validation->run() == FALSE) {
		
			$this->data['view_file']  = 'admin/dashboard';
			$this->load->view('layouts/admin/admin_default', $this->data);
      } else {
			
			$password = sha1($this->input->post('npassword'));
			 $id=$this->session->userdata('id');
		  if($id){
				$updData=array('password' => $password);
				$where=array('user_id'=>$id);		 
			  
			 $last_id=$this->admin_model->change_password('admin',$updData,$where);
			  if($last_id){
			   $msg=" Password Changed successfully";
			   $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
			   redirect('/admin/dashboard','refresh');
					  
			  }else{
			  
			  $msg="Password Not Changed!";
			  $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
			  redirect('/admin/dashboard','refresh');
			  }
		 }  
	  }
}


	
	




	 
// category all actions start
// category() function load the respective view on default layout
public function category($catid=false)
{
	    $this->validateAdmin();
	    $userData = $this->input->post();
	    if($this->input->post('addcategory'))
	    {
	    	$this->add_category($catid);
	    	redirect('/admin/category');
	    }
	    $this->load->model("category");
	    $catData=$this->category->select_data();
		$this->data['rows']  = $catData;
		 //////// catid is coming /////
		$catdetails='';
		if($catid)
		{
			$catdetails = $this->category->getBy(array('id'=>$catid));
		}
		$this->data['catdetails']=$catdetails;
		$this->data['view_file']  = 'admin/view_category';
		$this->load->view('layouts/admin/admin_default', $this->data); 
}
//add_category() function add the category details	
public function add_category($catid=false)
{
	$this->load->model("category");
	$this->form_validation->set_rules('cat', 'Category Name', 'trim|required|xss_clean');
	$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
	if($this->form_validation->run())
    {
		$status=1;
		$cat = $this->input->post('cat');
		$insertData=array('name' => $cat,
		        'status'=>$status,
		        'created_at'=>date('Y-m-d H:i:s')
		         );
		if($catid)
		{
			$lastId=$this->category->updateDetails(array('id'=>$catid),$insertData);
			$mesage='Updated';

		}
		else
		{
			$lastId=$this->category->AdduserData($insertData);
			$mesage='Created';
		}
		if(isset($mesage))
		{
			$msg=$mesage." successfully";
			$this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
		    //redirect('/admin/category','refresh');
		}
		else
		{
			$msg="Some Technical Issue";
			$this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));

		}
	}
}


//activeDeactiveCategory() action active or deactive the specified category on the basis of $status_mode	
public function activeDeactiveCategory($catId = false,$status_mode=false)
	{
	  $where=array("cat_id"=>$catId);
	 if($status_mode=='deActive'){
			$cols=array("status"=>1);
			$msgStatus='Activated';
	   } else if($status_mode=='Active'){
			 $cols=array("status"=>0);
			 $msgStatus='Deactivated';
		}
	      // $affected_row=$this->admin_model->active_deactive_db('category',$cols,$where);
		   $affected_row= $this->category->updateDetails($where,$cols);
	     if($affected_row){
				  $msg="$msgStatus Successfully";
				  $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
				  redirect('/admin/category','refresh');
			}else{
			  
				  $msg=" Status Not Changed !";
				  $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
				  redirect('/admin/category','refresh');
			  }
 }



 //////////// subcategory/////
 // category all actions start
// category() function load the respective view on default layout
public function subcategory($catid=false)
{
	    $this->validateAdmin();
	    $userData = $this->input->post();
	    if($this->input->post('addsubcategory'))
	    {
	    	$this->add_subcategory($catid);
	    	redirect('/admin/subcategory');
	    }
	    $this->load->model("category");
	    $this->data['catrow']=$this->category->select_data(array('id','name'),array('status'=>1));
	    $catData = $this->db->select('price,max_users,product_template__subcategories.id,product_template__subcategories.status,product_template__subcategories.name,product_template__subcategories.created_at,product_template__categories.name as catname')
									 ->join('product_template__categories' , 'product_template__categories.id=product_template__subcategories.category_id','left')
									 ->get('product_template__subcategories')
									 ->result();
									 
	    // $catData=$this->category->select_data();
		$this->data['rows']  = $catData;

		 //////// catid is coming /////
		$catdetails='';
		if($catid)
		{
			$this->load->model("subcategory");
			$catdetails = $this->subcategory->getBy(array('id'=>$catid));
		}
		$this->data['catdetails']=$catdetails;
		$this->data['view_file']  = 'admin/view_subcat';
		$this->load->view('layouts/admin/admin_default', $this->data); 
}


public function add_subcategory($subcatid=false)
{
	$this->load->model("subcategory");
	$this->form_validation->set_rules('cat', 'Category', 'trim|required|xss_clean');
	$this->form_validation->set_rules('subcatename', 'Subcategory Name', 'trim|required|xss_clean');
	$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
	if($this->form_validation->run())
    {
		$status=1;
		// $cat = $this->input->post('cat');
		$userData = $this->input->post();
	   @extract($userData );
		$insertData=array('name' => $subcatename,
			              'price' => $amount,
			              'max_users' => $maxinstall,
					     'category_id'=>$cat,
				         'status'=>$status,
				         'created_by'=>$this->session->userdata('id'),
				          'created_at'=>date('Y-m-d H:i:s')
				         );
		if($subcatid)
		{
			$lastId=$this->subcategory->updateDetails(array('id'=>$subcatid),$insertData);
			$mesage='Updated';

		}
		else
		{
			$lastId=$this->subcategory->AdduserData($insertData);
			$mesage='Created';
		}
		if(isset($mesage))
		{
			$msg=$mesage." successfully";
			$this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
		    //redirect('/admin/category','refresh');
		}
		else
		{
			$msg="Some Technical Issue";
			$this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));

		}
	}
}


//activeDeactiveCategory() action active or deactive the specified category on the basis of $status_mode	
public function activeDeactivesubCategory($catId = false,$status_mode=false)
	{
	  $where=array("cat_id"=>$catId);
	 if($status_mode=='deActive'){
			$cols=array("status"=>1);
			$msgStatus='Activated';
	   } else if($status_mode=='Active'){
			 $cols=array("status"=>0);
			 $msgStatus='Deactivated';
		}
		$this->load->model("subcategory");
	      $affected_row=$this->subcategory->updateDetails($where,$cols);
	     if($affected_row){
				  $msg="$msgStatus Successfully";
				  $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
				  redirect('/admin/category','refresh');
			}else{
			  
				  $msg=" Status Not Changed !";
				  $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
				  redirect('/admin/category','refresh');
			  }
 }


	public function users()
	{
		 $this->validateAdmin();
		 $where=array('user_type'=>0);
	     $this->load->model("user_modal");
         $adminData=$this->user_modal->select_data('*',$where);
	     $this->data['rows']  = $adminData;
		 $this->data['view_file']  = 'admin/view_user';
		 $this->load->view('layouts/admin/admin_default', $this->data); 
	 }
	 
	 	 
//deleteUser() action delete the specified user details
public function deleteUser($userId = false)
{
	
	 $userArray=array("id" => $userId);
	 $deletionStatus=$this->admin_model->delete_db('user_signup',$userArray);
		  if($deletionStatus){
			  $msg="Record Deleted successfully";
			  $this->session->set_userdata( array('msg'=>$msg , 'class' => 'suc'));
			  redirect('/admin/users','refresh');
		  }else{			  
			  $msg="Record not deleted!";
			  $this->session->set_userdata( array('msg'=>$msg , 'class' => 'err'));
			  redirect('/admin/users','refresh');
		  }
}
//activeDeactiveUser() action active or deactive the specified user details on the basis of $status_mode
// public function activeDeactiveUser($user_id = false,$status_mode=false)
// {
// 	 $where=array("id"=>$user_id);
// 	 if($status_mode=='deActive'){
// 			 $cols=array("profile_status"=>'Active');
// 			 $msgStatus='Unblocked';
// 	   } else if($status_mode=='Active'){
// 			 $cols=array("profile_status"=>'Blocked');
// 			 $msgStatus='Blocked';
// 		}
		
// 	  $affected_row=$this->admin_model->active_deactive_db('user_signup',$cols,$where);
// 	  if($affected_row){
// 			  $msg="User $msgStatus Successfully";
// 			  $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
// 			  redirect('/admin/users','refresh');
// 	  }else{
			  
//              $msg="User Status Not Changed !";
// 			  $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
// 			  redirect('/admin/users','refresh');
// 			}
// }



// pageContent() action load the respective view on default layout
public function pageContent()
{
	    $this->validateAdmin();
	    $this->load->model("static_pages");
	    $pageData=$this->static_pages->select_data();
	    $this->data['rows']  = $pageData;
		$this->data['view_file']  = 'admin/view_page_content';
		$this->load->view('layouts/admin/admin_default', $this->data); 
}
// addPage() action load the respective view on default layout
public function addPage()
{
	    $this->validateAdmin();
	    $this->data['view_file']  = 'admin/add_page';
		$this->load->view('layouts/admin/admin_default', $this->data); 
}
//addPageContent() action add the page content details  	
public function addPageContent()
{
		$this->load->model("static_pages");
		$this->form_validation->set_rules('title', 'Page Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('content', 'Page Content', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
		if($this->form_validation->run() == FALSE) 
		{
			$this->data['view_file']  = 'admin/add_page';
			$this->load->view('layouts/admin/admin_default', $this->data);
	    } 
	    else 
	    {
			$status=1;
			$title = $this->input->post('title');
			$page_url = str_replace('&','and',str_replace(' ','-', strtolower($this->input->post('title'))));
			$content = $this->input->post('content');
			$insertData=array('page_name' => $title,
			'page_url' => $page_url,
			'page_content' => $content,
			'status'=>$status,
			'created_by'=>$this->session->userdata('id'),
			'created_at'=>date('Y-m-d H:i:s'),
			   );
		      $lastId=$this->static_pages->AdduserData($insertData);
			   if($lastId)
			   {
					  $msg="Inserted successfully";
					  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
					  redirect('/admin/pageContent','refresh');
				}
				else
				{
				  $msg="Insertion Error";
				  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
				  redirect('/admin/pageContent','refresh');
				} 
			
		}
}



//activeDeactivePage() Active/Deactive  the specified content details
//on the basis of $status_mode  	
public function activeDeactivePage($pageId = false,$status_mode=false)
{
	 $this->load->model("static_pages");
	 $where=array("id"=>$pageId);
	 if($status_mode=='deActive')
	 {
			$cols=array("status"=>1);
			$msgStatus='Activated';
	 }
	 else if($status_mode=='Active')
	 {
			 $cols=array("status"=>0);
			 $msgStatus='Deactivated';
	 }
		$affected_row=$this->static_pages->updateDetails($where,$cols);
		if($affected_row)
		{
			$msg="$msgStatus Successfully";
			$this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
			redirect('/admin/pageContent','refresh');
		}
		else
		{
			$msg=" Status Not Changed !";
			$this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
			redirect('/admin/pageContent','refresh');
		}
}
// editPage() action load the respective view on default layout with specific record to be edited
public function editPage($page_id=false)
{
	    $this->load->model("static_pages");
	    $this->validateAdmin();
		$where=array('id'=>$page_id);
		$pageData=$this->static_pages->select_data('*',$where);
		if(!empty($pageData))
		{
			if($this->input->post('save'))
			{
				$this->updatePage();
			}
			$this->data['rows']  = $pageData[0];
		    $this->data['view_file']  = 'admin/edit_page';
			$this->load->view('layouts/admin/admin_default', $this->data); 
		}
		else
		{

		}
	    
}
//updatePage() action Update the specified page content details  
public function updatePage()
{
    $this->form_validation->set_rules('title', 'Page Title', 'trim|required|xss_clean');
	
	$this->form_validation->set_rules('content', 'Page Content', 'trim|required|xss_clean');
	$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
	if($this->form_validation->run())
    {
	     $this->load->model("static_pages");
		 $status=1;
		 $title = $this->input->post('title');
		 // $menu_label = $this->input->post('menu_label');
		 $page_url = str_replace('&','and',str_replace(' ','-', strtolower($this->input->post('title'))));
		 // $position = $this->input->post('position');
		 $content = $this->input->post('content');
		 $page_id = $this->input->post('page_id'); 
		 $upadteData=array('page_name' => $title,
		'page_url' => $page_url,
		'page_content' => $content,
		'status'=>$status,
		'created_at'=>date('Y-m-d H:i:s'));
		  $where=array("id"=>$page_id);
		  // print_r($insData);
		 $update_status=$this->static_pages->updateDetails($where,$upadteData);
		if($update_status)
		{
				  $msg=" Updated successfully";
				  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
				  redirect('/admin/pageContent','refresh');
		}
		else
		{	
				  $msg="Updation error";
				  $this->session->set_userdata( array('msg'=>$msg,'class'=>'err'));
				  redirect('/admin/pageContent','refresh');	  
		 }
				 
	}
}

// Page Content all actions end here//


////////// trainig section///////
public function training($videoid=false)
{
	$this->validateAdmin();
	$userData = $this->input->post();
    if($this->input->post('savevideo'))
    {
    	$this->addvideo($videoid);
    	redirect('/admin/training');
    }
	$this->load->model("training_videos");
	// $this->db->order_by('total_views','desc');
	$getvideos = $this->training_videos->select_data('*',array('type'=>1));
		//echo $this->db->last_query();
	$this->data['getvideos'] = $getvideos;
	$this->load->model("category");
	$this->data['catrow']=$this->category->select_data(array('id','name'),array('status'=>1));

	/////////// if edit////////
	$editdata='';
	if($videoid)
	{
		$editdata = $this->training_videos->getBy(array('id'=>$videoid));
		if(empty($editdata))
		{
			$msg="Some Technical Issue";
			$this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
			redirect('/admin/training','refresh');

		}

	}
	$this->data['editdata']=$editdata;
	$this->data['view_file']  = 'admin/traingvideos';
	$this->load->view('layouts/admin/admin_default', $this->data); 
}
public function addvideo($videoid=false)
{
	$this->load->model("training_videos");
	$this->form_validation->set_rules('cat', 'Category', 'trim|required|xss_clean');
	$this->form_validation->set_rules('subcat', 'Subcategory Name', 'trim|required|xss_clean');
	$this->form_validation->set_rules('videourl', 'Video Url', 'trim|required|xss_clean');
	$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
	if($this->form_validation->run())
    {
		$status=1;
		// $cat = $this->input->post('cat');
		$userData = $this->input->post();
	   @extract($userData );
		$insertData=array('video_title' => $videotitle,
					      'video_link'=>$videourl,
					      'cat_id'=>$cat,
					      'sub_cat_id'=>$subcat,
					      'type'=>1,
				          'status'=>$status,
				          'created_by'=>$this->session->userdata('id'),
				          'created_at'=>date('Y-m-d H:i:s')
				         );
		if($videoid)
		{
			unset($insertData['created_at']);
			$lastId=$this->training_videos->updateDetails(array('id'=>$videoid),$insertData);
			$mesage='Updated';

		}
		else
		{
			$lastId=$this->training_videos->AdduserData($insertData);
			$mesage='Created';
		}
		if(isset($mesage))
		{
			$msg=$mesage." successfully";
			$this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
		    //redirect('/admin/category','refresh');
		}
		else
		{
			$msg="Some Technical Issue";
			$this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));

		}
	}
}

public function activeDeactivevideo($videoid = false,$status_mode=false)
	{
	 $this->load->model("training_videos");
	  $where=array("id"=>$videoid);
	 if($status_mode=='deActive')
	 {
			$cols=array("status"=>1);
			$msgStatus='Activated';
	   } 
	   else if($status_mode=='Active')
	   {
			 $cols=array("status"=>0);
			 $msgStatus='Deactivated';
		}
	      $affected_row=$this->training_videos->updateDetails($where,$cols);
	     if($affected_row)
	     {
				  $msg="$msgStatus Successfully";
				  $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
				  redirect('/admin/training','refresh');
			}else{
			  
				  $msg=" Status Not Changed !";
				  $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
				  redirect('/admin/training','refresh');
			  }
 }

 ////////// trainig section///////
public function galleryimages($imageid=false)
{
	$this->validateAdmin();
	$userData = $this->input->post();
    if($this->input->post('saveimage'))
    {
    	$this->addimage($imageid);
    	redirect('/admin/galleryimages');
    }
	$this->load->model("templetes_images");
	// $this->db->order_by('total_views','desc');
	$getvideos = $this->templetes_images->select_data('*',array('type'=>3));
		//echo $this->db->last_query();
	$this->data['getvideos'] = $getvideos;
	$this->load->model("category");
	$this->data['catrow']=$this->category->select_data(array('id','name'),array('status'=>1));

	/////////// if edit////////
	$editdata='';
	if($imageid)
	{
		$editdata = $this->templetes_images->getBy(array('id'=>$imageid,'type'=>3));
		if(empty($editdata))
		{
			$msg="Some Technical Issue";
			$this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
			redirect('/admin/galleryimages','refresh');
		}
	}
	$this->data['editdata']=$editdata;
	$this->data['view_file']  = 'admin/addgalleryimages';
	$this->load->view('layouts/admin/admin_default', $this->data); 
}

public function addimage($imageid=false)
{
	$this->load->model("templetes_images");
	// $this->form_validation->set_rules('cat', 'Category', 'trim|required|xss_clean');
	$this->form_validation->set_rules('subcat', 'Subcategory Name', 'trim|required');
	// $this->form_validation->set_rules('attachment', 'Gallery Image', 'trim|required');
	$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
	if($this->form_validation->run())
    {
    	
		$status=1;
		$imagename='';
		if($_FILES['attachment']['name'])
		{
			//echo 'sdasDasd';
			$up_path='upload/galleryimage';
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
				$userData = $this->input->post();
	            @extract($userData );
		        $insertData=array('image_name'=>$imagename,
							      'sub_cat_id'=>$subcat,
						          'type'=>3,
						          'status'=>$status,
						          'created_by'=>$this->session->userdata('id'),
						          'created_at'=>date('Y-m-d H:i:s')
						         );
		        if($imageid)
				{
					unset($insertData['created_at']);
					$lastId=$this->templetes_images->updateDetails(array('id'=>$videoid),$insertData);
					$mesage='Updated';

				}
				else
				{
					$lastId=$this->templetes_images->AdduserData($insertData);
					$mesage='Created';
				}
				if(isset($mesage))
				{
					$msg=$mesage." successfully";
					$this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
				    //redirect('/admin/category','refresh');
				}
				else
				{
					$msg="Some Technical Issue";
					$this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));

				}
			}
		}
		else
		{
			$msg="Some Technical Issue";
			$this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
		}
	}
	// else
	// {
	// 	 // echo validation_errors(); 
	// 	 // die;
	// }
}

public function activeDeactiimages($imageid = false,$status_mode=false)
	{
	 $this->load->model("templetes_images");
	  $where=array("id"=>$imageid);
	 if($status_mode=='deActive')
	 {
			$cols=array("status"=>1);
			$msgStatus='Activated';
	   } 
	   else if($status_mode=='Active')
	   {
			 $cols=array("status"=>0);
			 $msgStatus='Deactivated';
		}
	      $affected_row=$this->templetes_images->updateDetails($where,$cols);
	     if($affected_row)
	     {
				  $msg="$msgStatus Successfully";
				  $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
				  redirect('/admin/galleryimages','refresh');
			}else{
			  
				  $msg=" Status Not Changed !";
				  $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
				  redirect('/admin/galleryimages','refresh');
			  }
 }
	
		
// pageContent() action load the respective view on default layout
public function subscriptionlist()
{
	    $this->validateAdmin();
	    $this->load->model("subscription_plan");
	    $pageData=$this->subscription_plan->select_data();
	    $this->data['rows']  = $pageData;
		$this->data['view_file']  = 'admin/view_subscription_plan';
		$this->load->view('layouts/admin/admin_default', $this->data); 
}
// addPage() action load the respective view on default layout
public function addPlan()
{
	    $this->load->model("subcategory");
	    $subcatdata=$this->subcategory->getlist(array('status'=>1));
	    $this->data['subcatdata']  = $subcatdata;

	    $this->validateAdmin();
	    $this->data['view_file']  = 'admin/addsubscription_plan';
		$this->load->view('layouts/admin/admin_default', $this->data); 
}
//addPageContent() action add the page content details  	
public function saveplan()
{
		$this->load->model("subscription_plan");
		$this->form_validation->set_rules('subcategory', 'Subcategory Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('planame', 'Plan Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric');
		$this->form_validation->set_rules('maxinstall', 'Max installtion', 'trim|required|numeric');
		$this->form_validation->set_rules('content', 'Description', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
		if($this->form_validation->run() == FALSE) 
		{
			$this->data['view_file']  = 'admin/addsubscription_plan';
			$this->load->view('layouts/admin/admin_default', $this->data);
	    } 
	    else 
	    {
			$status=1;
			$planame = $this->input->post('planame');
			$content = $this->input->post('content');
			$insertData=array('plan_name' => $planame,
				              'sub_cat_id' => $this->input->post('subcategory'),
							  'description' => $content,
							  'price' => $this->input->post('amount'),
							  'max_installtion' => $this->input->post('maxinstall'),
							  'status'=>$status,
							  'created_by'=>$this->session->userdata('id'),
							  'created_at'=>date('Y-m-d H:i:s'));
		      $lastId=$this->subscription_plan->AdduserData($insertData);
			   if($lastId)
			   {
					  $msg="Inserted successfully";
					  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
					  redirect('/admin/subscriptionlist','refresh');
				}
				else
				{
				  $msg="Insertion Error";
				  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
				  redirect('/admin/subscriptionlist','refresh');
				} 
			
		}
}



//activeDeactivePage() Active/Deactive  the specified content details
//on the basis of $status_mode  	
public function activeDeactivePlan($planid = false,$status_mode=false)
{
	 $this->load->model("subscription_plan");
	 $where=array("id"=>$planid);
	 if($status_mode=='deActive')
	 {
			$cols=array("status"=>1);
			$msgStatus='Activated';
	  }
	  else if($status_mode=='Active')
	  {
			 $cols=array("status"=>0);
			 $msgStatus='Deactivated';
	}
	$affected_row=$this->subscription_plan->updateDetails($where,$cols);
	if($affected_row)
	{
		$msg="$msgStatus Successfully";
		$this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
		redirect('/admin/subscriptionlist','refresh');
	}
	else
	{
		$msg=" Status Not Changed !";
		$this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
		redirect('/admin/subscriptionlist','refresh');
	}
}
// editPage() action load the respective view on default layout with specific record to be edited
public function editPlan($page_id=false)
{
	    $this->load->model("subscription_plan");
	    $this->validateAdmin();
		$where=array('id'=>$page_id);
		$pageData=$this->subscription_plan->getBy($where);
		// echo $this->db->last_query();
		if(!empty($pageData))
		{
			if($this->input->post('save'))
			{
				$this->updatePage();
			}
			$this->data['rows']  = $pageData;
		    $this->data['view_file']  = 'admin/edit_subscription_plan';
			$this->load->view('layouts/admin/admin_default', $this->data); 
		}
		else
		{

		}
	    
}
//updatePage() action Update the specified page content details  
public function updateplan()
{
    $this->form_validation->set_rules('planame', 'Plan Name', 'trim|required|xss_clean');
	$this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric');
	$this->form_validation->set_rules('maxinstall', 'Max installtion', 'trim|required|numeric');
	$this->form_validation->set_rules('content', 'Description', 'trim|required|xss_clean');
	$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
	if($this->form_validation->run())
    {
	     $this->load->model("subscription_plan");
		 $status=1;
		 // $userData = $this->input->post();
		 // @extract($userData );
		 
		 // $menu_label = $this->input->post('menu_label');
		 
		 $planame = $this->input->post('planame');
		 $content = $this->input->post('content');
		 $planid = $this->input->post('page_id'); 
		 $upadteData=array('plan_name' => $planame,
						  'description' => $content,
						  'price' => $this->input->post('amount'),
						  'max_installtion' => $this->input->post('maxinstall'),
						  'status'=>$status);
		  $where=array("id"=>$planid);
		  // print_r($insData);
		 $update_status=$this->subscription_plan->updateDetails($where,$upadteData);
		if($update_status)
		{
				  $msg=" Updated successfully";
				  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
				  redirect('/admin/subscriptionlist','refresh');
		}
		else
		{	
				  $msg="Updation error";
				  $this->session->set_userdata( array('msg'=>$msg,'class'=>'err'));
				  redirect('/admin/subscriptionlist','refresh');	  
		 }
				 
	}
}

// Page Content all actions end here//


/////// Templete management start here/////

// category all actions start
// category() function load the respective view on default layout


public function addtemplate($templateid=false)
{
	$this->validateAdmin();
	$this->load->model("template__default");
	if($this->input->post('savetemplate'))
	{
		$this->savetemplate();

	}
	$this->load->model("category");
	$this->data['catrow']=$this->category->select_data(array('id','name'),array('status'=>1));
	$this->data['view_file']  = 'admin/addtemplate';
	$this->load->view('layouts/admin/admin_default', $this->data); 

}
public function savetemplate($templateid=false)
{
	$this->load->model("template__default");
	$this->form_validation->set_rules('cat', 'Category', 'trim|required|xss_clean');
	$this->form_validation->set_rules('subcat', 'Subcategory Name', 'trim|required|xss_clean');
	$this->form_validation->set_rules('templatetitle', 'Template name', 'trim|required|xss_clean');
	$this->form_validation->set_rules('tagline', 'Tag line', 'trim|required|xss_clean');
	$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
	if($this->form_validation->run())
    {
		$status=1;
		$imagename='';
		if($_FILES['attachment']['name'])
		{
			//echo 'sdasDasd';
			$up_path='upload/';
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
				$userData = $this->input->post();
	            @extract($userData );
		        $insertData=array('tag_line' => $templatetitle,
					              'temlete_name'=>$tagline,
					              'color_code'=>'#66B032',
					              'color_code_hover'=>'#ffffff',
					              'text_color'=>'#FD5308',
							      'cat_id'=>$cat,
							      'background_image'=>$imagename,
							      'sub_cat_id'=>$subcat,
						          'status'=>$status,
						          'user_id'=>$this->session->userdata('id'),
						          // 'created_by'=>$this->session->userdata('id'),
						          'created_at'=>date('Y-m-d H:i:s')
						         );
		        if($templateid)
				{
					unset($insertData['created_at']);
					$lastId=$this->template__default->updateDetails(array('id'=>$templateid),$insertData);
					$image=array_filter($_FILES['iosfiles']['name']);
					$uplodeimages = $this->updatedealImages($image,'iosfiles',$templateid,$subcat);

					/////// for website/////
					$imagewebsite=array_filter($_FILES['fileField']['name']);
					$uplodeimagesweb = $this->updatedealImages($imagewebsite,'fileField',$templateid,$subcat);
					$mesage='Updated';

				}
				else
				{
					$lastId=$this->template__default->AdduserData($insertData);
					$mesage='Created';
					$image=array_filter($_FILES['iosfiles']['name']);
				    $uplodeimages = $this->updatedealImages($image,'iosfiles',$lastId,$subcat);

				    /////// for website/////
					$imagewebsite=array_filter($_FILES['fileField']['name']);
					$uplodeimagesweb = $this->updatedealImages($imagewebsite,'fileField',$lastId,$subcat);
				}
				///////// uplode image for ios/////

				if(isset($mesage))
				{
					$msg=$mesage." successfully";
					$this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
				    //redirect('/admin/category','refresh');
				}
				else
				{
					$msg="Some Technical Issue";
					$this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));

				}
			}
		}
		else
		{
			$msg="Some Technical Issue";
			$this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
		}
	}

}
public function templetelist($type=false)
{
	    $this->validateAdmin();
	    $this->load->model("template__default");
	    $this->load->model("templetes");
	    $condition=array();
	    if($type=='users')
	    {
	    	 $catData=$this->template__default->select_data('*',array());

	    }
	    else
	    {
	    	$catData=$this->templetes->select_data('*',$condition);
	    }
	    $catData=$this->template__default->select_data('*',$condition);
		$this->data['rows']  = $catData;
		$this->data['view_file']  = 'admin/templetelist';
		$this->load->view('layouts/admin/admin_default', $this->data); 
}
public function activeDeactivetemp($templateid = false,$status_mode=false)
{
		
	 $where=array("id"=>$templateid);
	 if($status_mode=='deActive')
	 {
			$cols=array("status"=>1);
			$msgStatus='Activated';
	  }
	  else if($status_mode=='Active')
	  {
			 $cols=array("status"=>0);
			 $msgStatus='Deactivated';
	  }
	  $this->load->model("templetes");
	  $affected_row=$this->templetes->updateDetails($where,$cols);
	 if($affected_row)
	 {
	 	if($status_mode=='deActive')
	 	{
	 		
		    $templatedata=$this->templetes->getBy(array('id'=>$templateid));
		    /////////get userdetails/////
		    $where = array('id'=>$templatedata->user_id);
		    $userdetails = $this->db->where($where)
		 		          ->get('users')->row();
	 		$this->load->model("productusers");
	 		$condition = array('email'=>$userdetails->email);
	 		$checkuser = $this->productusers->getBy($condition);
	 		if(!$checkuser || empty($checkuser))
	 		{
	 			$datainsert = array('church_user_ID'=>$userdetails->id,
	 				                'name'=>$userdetails->name,
	 				                'email'=>$userdetails->email,
	 				                'password'=>$userdetails->password,
	 				                'token'=>$userdetails->token,
	 				                'sign_up_date'=>date('Y-m-d',strtotime($userdetails->created_at)),
	 				                'status'=>1);
	 			$updateuser = $this->productusers->AdduserData($datainsert);

	 		}
	 	}
		$msg="$msgStatus Successfully";
		$this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
		redirect($_SERVER['HTTP_REFERER']);
	 }
	 else
	 {
		$msg=" Status Not Changed !";
		$this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
	    redirect($_SERVER['HTTP_REFERER']);
	 }
}

public function modificationlist()
{
	$this->validateAdmin();
	$this->load->model("user_messages");
	$reportdata=$this->user_messages->select_data(array('type'=>1));
	if(count($reportdata)>0)
	{
		foreach($reportdata as $reportlsit)
		{

		}
		array_walk($reportdata, function(&$value,$key)
		{
			$value->username='pawan';

		});

	}
	
	$this->data['reportdata'] = $reportdata;
	$this->data['view_file']  = 'admin/view_modification';
	$this->load->view('layouts/admin/admin_default', $this->data);

}
public function buglist()
{
	$this->validateAdmin();
	$this->load->model("user_messages");
	$reportdata=$this->user_messages->select_data(array('type'=>2));
	if(count($reportdata)>0)
	{
		foreach($reportdata as $reportlsit)
		{

		}
		array_walk($reportdata, function(&$value,$key)
		{
			$value->username='pawan';

		});

	}
	
	$this->data['reportdata'] = $reportdata;
	$this->data['view_file']  = 'admin/view_modification';
	$this->load->view('layouts/admin/admin_default', $this->data);

}

/////// //////////// get replysection ///////
public function makereply()
{
	if (!$this->input->is_ajax_request()) 
	{
	   exit('No direct script access allowed');
	}
	//echo 'pawan';
	$replyfor=1;
	if($this->input->post('replyfor'))
	{
		$replyfor=2;
	}
	?>
    <input type="hidden" name="messageid" value="<?php echo $this->input->post('messageid')?>">
    <input type="hidden" name="replyfor" value="<?php echo $replyfor?>">
	<fieldset>
	<div class="form-group">
	<label class="col-md-4 control-label" for="user-settings-password">Message<span class="err">*</span></label>
	<div class="col-md-8">
	<textarea id="replymessage" name="replymessage" class="form-control validate[required]" value="" placeholder="Please choose a complex one.." /></textarea>
	</div>
	</div>
	
	</fieldset>
	<div class="form-group form-actions">
	<div class="col-xs-12 text-right">
	<input type="submit" class="btn btn-sm btn-primary makereply" value="Make Reply"/>
	</div>
	</div>
	

	<?php

}

	//////////////// contact list////////
	public function messagelist()
	{
		$this->validateAdmin();
		$this->load->model("contactus");
	    $reportdata=$this->contactus->select_data();
		$this->data['reportdata'] = $reportdata;
		$this->data['view_file']  = 'admin/view_contact';
		$this->load->view('layouts/admin/admin_default', $this->data);

	}

	public function savereply()
	{
		if (!$this->input->is_ajax_request()) 
		{
		   exit('No direct script access allowed');
		}
		$this->load->model('message_reply');
		$postdata = $this->input->post();
		@extract($postdata);
		$checkreply = $this->message_reply->getBy(array('messageid'=>$messageid,'type'=>$replyfor));
		$dataArray = array('messageid'=>$messageid,
			               'type'=>$replyfor,
			               'message'=>$message,
			               'reply_by'=>$this->session->userdata('id'));
		if($checkreply)
		{
			$dataArray['updated_at']=date('Y-m-d H:i:s');
			$dataArray['updated_by']=$this->session->userdata('id');

			$this->message_reply->updateDetails(array('messageid'=>$messageid,'type'=>$replyfor),$dataArray);

		}
		else
		{
			$dataArray['created_at']=date('Y-m-d H:i:s');
			$this->message_reply->AdduserData($dataArray);

		}
		echo 'success';

	}

	public function updatedealImages($data = array() , $fieldName = 'fileField' , $productId,$subcatid){

		if(count($data) > 0)
		{		 
			$this->load->model("templetes_images");
			foreach($data as $key => $insertimage){					
				$_FILES['fileField'.$key]['name']= $_FILES[$fieldName]['name'][$key];
				$_FILES['fileField'.$key]['type']= $_FILES[$fieldName]['type'][$key];
				$_FILES['fileField'.$key]['tmp_name']= $_FILES[$fieldName]['tmp_name'][$key];
				$_FILES['fileField'.$key]['error']= $_FILES[$fieldName]['error'][$key];
				$_FILES['fileField'.$key]['size']= $_FILES[$fieldName]['size'][$key];
				$name = $insertimage;
				$up_path='upload/galleryimage';
				$input_name ='fileField'.$key;
				$image_name = $this->uploadimage($up_path,$input_name,$insertimage);
				if($image_name['error']==true)
				{

				}
				else
				{
					if($fieldName=='iosfiles')
					{
						$insertData=array('image_name'=>$image_name['file_name'],
									      'sub_cat_id'=>$subcatid,
									      'template_id'=>$productId,
								          'type'=>1,
								          'status'=>1,
								          'created_by'=>$this->session->userdata('id'),
								          'created_at'=>date('Y-m-d H:i:s')
						         );
					}
					else
					{
						$insertData=array('image_name'=>$image_name['file_name'],
									      'sub_cat_id'=>$subcatid,
									      'template_id'=>$productId,
								          'type'=>2,
								          'status'=>1,
								          'created_by'=>$this->session->userdata('id'),
								          'created_at'=>date('Y-m-d H:i:s')
						         );

					}
					$Insertimages = $this->templetes_images->AdduserData($insertData);

				}
			}
		}

	}


} // controller end here 