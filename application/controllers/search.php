<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_AppController {	
	function __construct() {
    	parent::__construct();
	}	
	public function ProductSearch($type = false){
	   
		$this->data['searchOn']=$type;
        $this->data['serchfeaild']=str_replace('-',' ',$type);
		$serchfeaild=str_replace('-',' ',$type);
        $this->data['searchList']=$this->common->SearchProductDetails($serchfeaild,10);
		//echo $this->db->last_query();
		$this->data['view_file'] = 'search/productsearch';
		$this->load->view('layouts/second_default', $this->data); 
	}
	
	public function LeadsSearch($type = false){
	    $this->data['searchOn'] = $type;
        $serchfeaild=str_replace('-',' ',$type);
        $this->data['SearchLeadProductDetails']=$this->common->SearchLeadProductDetails($serchfeaild,1);
		$this->data['stateData']= $this->common->CityList(false);
		$this->data['CategoryListData']= $this->common->CategoryList();
		$this->data['view_file'] = 'search/byleads';
		$this->load->view('layouts/buysecond_default', $this->data); 
	}
	
	public function searchProduct($type=false , $options = false ){
		 $this->data['type'] = $type;
		 $this->data['options'] = $options;
		 $this->data['view_file'] = 'search/sellproductsearch';
		 $this->load->view('layouts/sell_default', $this->data); 
	}
	
	
	public function searchProductGrid($type=false ,$options = false){
		 $this->data['type'] = $type;
		 $this->data['options'] = $options;
		 $this->data['view_file'] = 'search/searchProductGrid';
		 $this->load->view('layouts/sell_default', $this->data); 
	}	
	
	public function allSearch($type = false){
	    $this->data['Searchfeild'] = $type;
		$this->data['view_file'] = 'search/allproductsearch';
		$this->load->view('layouts/second_default', $this->data); 
	}
	
}
