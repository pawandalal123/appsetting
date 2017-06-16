<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_AppController {	
	function __construct() {
    	parent::__construct();
    	
	}	
	public function index(){
		
		$this->data['view_file']  = 'admin/login';
		$this->load->view('layouts/admin_blank', $this->data); 
	}	
	public function profile(){
		$this->data['view_file']  = 'admin/profile';
		$this->load->view('layouts/admin_default', $this->data); 
	}
	public function responsive(){
		$this->data['view_file']  = 'admin/responsive';
		$this->load->view('layouts/admin_default', $this->data); 
	}
	public function datatables(){
		$this->data['view_file']  = 'admin/datatables';
		$this->load->view('layouts/admin_default', $this->data); 
	}
}
