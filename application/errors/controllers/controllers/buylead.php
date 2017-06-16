<?php

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class BuyLead extends MY_AppController {	
	   function __construct() {
    	parent::__construct();
		$this->load->library('session');
	}	
	
	public function buyleadlist(){
	    		$this->data['view_file'] = 'user/leaddisplay';
		$this->load->view('layouts/buysecond_default', $this->data); 
	}
	public function index($type = false,$type1 = false){
	    $this->data['CategoryType'] = $type;
		$this->data['CategoryId'] = $type1;
		$this->data['view_file'] = 'user/buycategorydata';
		$this->load->view('layouts/buysecond_default', $this->data); 
	}
	
		
	
	public function Requirment(){
	   $this->data['view_file'] = 'user/post_requirment';
	   $this->load->view('layouts/second_default', $this->data); 
	}	
	
	public function buyListing(){
		$this->data['view_file'] = 'user/allleadcategory';
		$this->load->view('layouts/lead_default', $this->data); 
	}
	
	public function allindex($type = false, $type1=false){
	    $this->data['CategoryType'] = $type;
		$this->data['CategoryID'] = $type1;
		$this->data['view_file'] = 'user/buysubcategory';
		$this->load->view('layouts/lead_default', $this->data); 
	 }
	 
	 public function subcategory($type = false,$type1=false,$type2=false){
	   
		$this->data['SubCategoryType'] = $type;
		$this->data['CategoryId'] = $type1;
		$this->data['SubCategoryId'] = $type2;
		$this->data['view_file'] = 'user/buysubcategorylisting.php';
		$this->load->view('layouts/buysecond_default', $this->data); 
	}	
	 
	 public function viewdetails($type = false,$type1 = false){
	    $type;
		$this->data['ProductName'] = $type;
		$this->data['ProductId'] = $type1;
		$this->data['view_file'] = 'user/byleadsdetails';
		$this->load->view('layouts/buysecond_default.php', $this->data); 
	}
	
	
	
}
