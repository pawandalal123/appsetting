<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_AppController {	
	function __construct() {
    	parent::__construct();
	}	
	public function index($type = false,$type1 = false){
	    $this->data['CategoryType'] = $type;
		  $this->data['CategoryId'] = $type1;
		$this->data['view_file'] = 'user/categorydata';
		$this->load->view('layouts/second_default', $this->data); 
	}	
	
	public function allindex($type = false, $type1=false){
	     $this->data['CategoryType'] = $type;
		 $this->data['CategoryID'] = $type1;
		$this->data['view_file'] = 'user/allsubcategory';
		$this->load->view('layouts/user_default', $this->data); 
	}
	public function categotyListing(){
		$this->data['view_file'] = 'user/allcategorylisting';
		$this->load->view('layouts/user_default', $this->data); 
	}
	public function register(){
		$this->data['view_file'] = 'user/userregister';
		$this->load->view('layouts/user_default', $this->data); 
	}
	public function Login(){
		$this->data['view_file'] = 'user/login';
		$this->load->view('layouts/logindefault', $this->data); 
	}	
	public function subcategory($type = false,$type1=false,$type2=false){
	   
		$this->data['SubCategoryType'] = $type;
		$this->data['CategoryId'] = $type1;
		$this->data['SubCategoryId'] = $type2;
		$this->data['view_file'] = 'user/subcategoryListing';
		$this->load->view('layouts/second_default', $this->data); 
	}	
	
	public function viewdetails($type = false,$type1 = false){
	    $type;
		$this->data['ProductName'] = $type;
		$this->data['ProductId'] = $type1;
		$this->data['view_file'] = 'user/viewdetails';
		$this->load->view('layouts/second_default', $this->data); 
	}
	
}
