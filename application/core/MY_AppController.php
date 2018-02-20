<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_AppController extends CI_Controller {
     function __construct() 
    {
    	parent::__construct();

	}
	public function uploadimage($path,$feild_name,$img_name)
	  {
			$status=array();
			$config['upload_path'] =$path.'/';
			if(!is_dir($config['upload_path']))
			{
				mkdir($config['upload_path']);
			}
			$config['allowed_types'] = 'gif|jpg|png|JPG';
			$config['max_size']    = '2000';
			$config['file_name'] = time().'_'.$img_name;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if( ! $this->upload->do_upload($feild_name))
		    {
				$upload_errors = $this->upload->display_errors('', '');
				$err = 'Error: '.$upload_errors;
				$status['error'] = true;
				$status['error_type'] =  $err;
				return $status; 
		   }
		   else
		   {
				$status['error'] = false;
				$status['file_name'] = $this->upload->file_name;
				return $status;
		   }

   }
	 public function upload_image($path,$feild_name,$img_name)
	{
		$config['upload_path'] = 'upload/'.$path.'/';
		if(!is_dir($config['upload_path']))
			{
				mkdir($config['upload_path']);
			}
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']    = '2000';
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
}