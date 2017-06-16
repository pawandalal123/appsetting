<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_AppController {	
	function __construct() {
    	parent::__construct();
	}	
	public function index($type = false){
	    $type;
		$this->data['CategoryType'] = $type;
		$this->data['view_file'] = 'user/allsubcategory';
		$this->load->view('layouts/user_default', $this->data); 
	}	
	
}
