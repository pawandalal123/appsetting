<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_AppController {	
	function __construct() {
    	parent::__construct();
	}	
	public function index($type = false){
	    $type;
		$this->data['CategoryType'] = $type;
		$this->data['view_file'] = 'user/categorydata';
		$this->load->view('layouts/second_default', $this->data); 
	}	
	
}
