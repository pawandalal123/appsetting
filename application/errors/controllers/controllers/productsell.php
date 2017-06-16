<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class ProductSell extends MY_AppController {	
	function __construct() {
    	parent::__construct();
	}	
	/*public function index($type = false,$type1 = false){
	    $this->data['CategoryType'] = $type;
		  $this->data['CategoryId'] = $type1;
		$this->data['view_file'] = 'user/categorydata';
		$this->load->view('layouts/second_default', $this->data); 
	}*/	
	
	public function allsubcategory($type = false, $type1=false){
	     $this->data['CategoryType'] = $type;
		 $this->data['CategoryID'] = $type1;
		$this->data['view_file'] = 'user/sellsubcategory';
		$this->load->view('layouts/sell_default', $this->data); 
	}
	
	public function allproduct($options=false){
		$this->data['options'] = $options;
		$this->data['view_file'] = 'user/product';
		$this->load->view('layouts/sell_default', $this->data); 
	}
	
	public function allproductGrid($options=false){
		$this->data['options'] = $options;
		$this->data['view_file'] = 'user/productgrid';
		$this->load->view('layouts/sell_default', $this->data); 
	}
	
	public function productlist($type = false, $type1=false,$options=false){
		 $this->data['CategoryName'] = $type;
		 $this->data['CategoryID'] = $type1;
		 $this->data['options'] = $options;
		 $this->data['view_file'] = 'user/sellproductcategory';
		 $this->load->view('layouts/sellproduct_default', $this->data); 
	}
	
	public function productlGrid($type = false, $type1=false,$options=false){
		 $this->data['CategoryName'] = $type;
		 $this->data['CategoryID'] = $type1;
		 $this->data['options'] = $options;
		 $this->data['view_file'] = 'user/sellproductcategorygrid';
		 $this->load->view('layouts/sellproduct_default', $this->data); 
	}
		public function subcategoryList($type = false, $type1=false,$type2=false,$type3=false,$type4=false){
		 $this->data['CategoryName'] = $type;
		 $this->data['SubCategoryName'] = $type1;
		 $this->data['CategoryID'] = $type2;
		 $this->data['subCategoryID'] = $type3;
		 $this->data['options'] = $type4;
		 $this->data['view_file'] = 'user/sellproductsubcategory';
		 $this->load->view('layouts/sellproduct_default', $this->data); 
	}
	
	public function subcategoryGrid($type = false, $type1=false,$type2=false,$type3=false,$type4=false){
		 $this->data['CategoryName'] = $type;
		 $this->data['SubCategoryName'] = $type1;
		 $this->data['CategoryID'] = $type2;
		 $this->data['subCategoryID'] = $type3;
		 $this->data['options'] = $type4;
		
		$this->data['view_file'] = 'user/sellprodusubctsubcategorygrid';
		$this->load->view('layouts/sellproduct_default', $this->data); 
	}
	 /*public function productdetail($type = false, $type1=false,$type2=false,$type3=false){
		  $this->data['CategoryName'] = $type;
		  $this->data['SubCategoryName'] = $type1;
		  $this->data['CategoryID'] = $type2;
		  $this->data['subCategoryID'] = $type3;
		
		  $this->data['view_file'] = 'user/productsell';
		  $this->load->view('layouts/sellproduct_default', $this->data); 
	}*/
	
	 public function productdetail($type = false,$type1=false){
		  $this->data['ProducrtName'] = $type;
		  $this->data['ProducrtID'] = $type1;
		  $this->data['view_file'] = 'user/sellproductdetails';
		  $this->load->view('layouts/sellproduct_default', $this->data); 
	}
	
	/*public function subcategory($type = false){
	    $type;
		$this->data['CategoryType'] = $type;
		$this->data['view_file'] = 'user/subcategoryListing';
		$this->load->view('layouts/second_default', $this->data); 
	}	*/
	
}
