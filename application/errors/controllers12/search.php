<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_AppController {	
	function __construct() {
    	parent::__construct();
	}	
	public function ProductSearch($type = false){
	    $this->data['Searchfeild'] = $type;
		$this->data['view_file'] = 'user/productsearch';
		$this->load->view('layouts/second_default', $this->data); 
	}
	
	public function LeadsSearch($type = false){
	    $this->data['Searchfeild'] = $type;
		$this->data['view_file'] = 'user/byleads';
		$this->load->view('layouts/buysecond_default', $this->data); 
	}
	
	public function searchProduct($type=false , $options = false ){
		 $this->data['type'] = $type;
		 $this->data['options'] = $options;
		 $this->data['view_file'] = 'user/sellproductsearch';
		 $this->load->view('layouts/sell_default', $this->data); 
	}
	
	
	public function searchProductGrid($type=false ,$options = false){
		 $this->data['type'] = $type;
		 $this->data['options'] = $options;
		 $this->data['view_file'] = 'user/searchProductGrid';
		 $this->load->view('layouts/sell_default', $this->data); 
	}	
	
	public function allSearch($type = false){
	    $this->data['Searchfeild'] = $type;
		$this->data['view_file'] = 'user/allproductsearch';
		$this->load->view('layouts/second_default', $this->data); 
	}
	
}
