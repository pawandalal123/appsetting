<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SellProduct extends MY_AppController {	
	function __construct() {
    	parent::__construct();
	}	
	        public function SellProduct($type = false,$type1 = false)
			{
	   		$this->data['view_file'] = 'user/productsell';
		    $this->load->view('layouts/sellproduct_default', $this->data); 
	        }
			
			 public function Listall($type = false,$type1 = false)
			{
	   		$this->data['view_file'] = 'user/productlistall';
		    $this->load->view('layouts/sellproduct_default', $this->data); 
	        }	
	
}
