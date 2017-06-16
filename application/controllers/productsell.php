<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class ProductSell extends MY_AppController {	
	function __construct() {
    	parent::__construct();
	}	
	
	
	public function allsubcategory($type = false, $type1=false){
	     $this->data['CategoryType'] = $type;
		 $this->data['CategoryID'] = $type1;
		$this->data['view_file'] = 'usedproduct/sellsubcategory';
		$this->load->view('layouts/sell_default', $this->data); 
	}
	
	public function allproduct($options=false,$page = false){
		$this->data['options'] = $options;
		$this->data['page'] = $page;
		$addTourl= '';
$config['uri_segment'] = 2;
		if(!is_numeric($options))
		{
			$addTourl= '/'.$options;
$config['uri_segment'] = 3;
		}
		$this->load->library('pagination');
                //$this->load->library('table');
                $result_per_page = 18;  // the number of result per page
                $config['base_url'] = base_url() . 'all-results'.$addTourl;
		$tableName = 'sell_product';
                $config['total_rows'] = $this->common->count_items($tableName);
                $config['per_page'] = $result_per_page;
                
                //$config['display_pages'] = FALSE; 
                $config['use_page_numbers'] = TRUE;
                $this->pagination->initialize($config);
   		$this->data['view_file'] = 'usedproduct/product';
		$this->load->view('layouts/sell_default', $this->data); 
	}
	
	public function allproductGrid($options=false,$page = false){
		$this->data['options'] = $options;
		$this->data['page'] = $page;
		$addTourl= '';
		$config['uri_segment'] = 2;
		if(!is_numeric($options))
		{
			$addTourl= '/'.$options;
                        $config['uri_segment'] = 3;
		}
		$this->load->library('pagination');
                //$this->load->library('table');
                $result_per_page = 18;  // the number of result per page
                $config['base_url'] = base_url() . 'all-results-grid'.$addTourl;
		$tableName = 'sell_product';
                $config['total_rows'] = $this->common->count_items($tableName,false);
                $config['per_page'] = $result_per_page;
                $config['use_page_numbers'] = TRUE;
                $this->pagination->initialize($config);
		$this->data['view_file'] = 'usedproduct/productgrid';
		$this->load->view('layouts/sell_default', $this->data); 
	}
	
	public function productlist($type = false, $type1=false,$options=false, $page = false){
		 $this->data['CategoryName'] = $type;
		 $this->data['CategoryID'] = $type1;
		 $this->data['options'] = $options;
		 $this->data['page'] = $page;
		 $addTourl= '';
		 $config['uri_segment'] = 4;
		if(!is_numeric($options))
		{
			$addTourl= '/'.$options;
                        $config['uri_segment'] = 5;
		}
		 $this->load->library('pagination');

                 $result_per_page = 18;  // the number of result per page
                 $config['base_url'] = base_url() . 'add/'.$type.'/'.$type1.$addTourl;
		 $tableName = 'sell_product';
		 $CategoryIDLIST=array("category"=>$type1);
                 $config['total_rows'] = $this->common->count_items($tableName , $CategoryIDLIST);
		// echo $this->db->last_query();
                 $config['per_page'] = $result_per_page;
                 $this->pagination->initialize($config);
		 $this->data['view_file'] = 'usedproduct/sellproductcategory';
		 $this->load->view('layouts/sellproduct_default', $this->data); 
	}
	
	public function productlGrid($type = false, $type1=false,$options=false , $page=false){
		 $this->data['CategoryName'] = $type;
		 $this->data['CategoryID'] = $type1;
		 $this->data['options'] = $options;
		 $this->data['page'] = $page;
		 $addTourl= '';
		 $config['uri_segment'] = 4;
		if(!is_numeric($options))
		{
			$addTourl= '/'.$options;
                        $config['uri_segment'] = 5;
		}
		 $this->load->library('pagination');

                 $result_per_page = 18;  // the number of result per page
                 $config['base_url'] = base_url() . 'add/'.$type.'/'.$type1.$addTourl;
		 $tableName = 'sell_product';
		 $CategoryIDLIST=array("category"=>$type1);
                 $config['total_rows'] = $this->common->count_items($tableName , $CategoryIDLIST);
		// echo $this->db->last_query();
                 $config['per_page'] = $result_per_page;
                 $this->pagination->initialize($config);
		 $this->data['view_file'] = 'usedproduct/sellproductcategorygrid';
		 $this->load->view('layouts/sellproduct_default', $this->data); 
	}
		public function subcategoryList($type = false, $type1=false,$type2=false,$type3=false,$type4=false){
		 $this->data['CategoryName'] = $type;
		 $this->data['SubCategoryName'] = $type1;
		 $this->data['CategoryID'] = $type2;
		 $this->data['subCategoryID'] = $type3;
		 $this->data['options'] = $type4;
		 $this->data['view_file'] = 'usedproduct/sellproductsubcategory';
		 $this->load->view('layouts/sellproduct_default', $this->data); 
	}
	
	public function subcategoryGrid($type = false, $type1=false,$type2=false,$type3=false,$type4=false){
		 $this->data['CategoryName'] = $type;
		 $this->data['SubCategoryName'] = $type1;
		 $this->data['CategoryID'] = $type2;
		 $this->data['subCategoryID'] = $type3;
		 $this->data['options'] = $type4;
		
		$this->data['view_file'] = 'usedproduct/sellprodusubctsubcategorygrid';
		$this->load->view('layouts/sellproduct_default', $this->data); 
	}
	
	
	 public function productdetail($type = false,$type1=false){
		  $this->data['ProducrtName'] = $type;
		  $this->data['ProducrtID'] = $type1;
		  if($this->input->post('submit')){
		   $this->AddsellProductEnquiry();
				}
		  $this->data['view_file'] = 'usedproduct/sellproductdetails';
		  $this->load->view('layouts/sellproduct_default', $this->data); 
	}
	
	public function AddsellProductEnquiry()
		 {
               $userData = $this->input->post();
               $this->form_validation->set_rules('name','Name','required');
			   $this->form_validation->set_rules('email','Email','required|email');
			   $this->form_validation->set_rules('mobile','Mobile','required|number');
			   if($this->form_validation->run()){
				          $ipaddress=$_SERVER['REMOTE_ADDR'];
						  if ($this->agent->is_browser())
                          {
							  
                               $agent = $this->agent->browser().' '.$this->agent->version();
							   $networkType='Web';
                          }
						  elseif ($this->agent->is_robot())
                          {
							  
                               $agent = $this->agent->robot();
							   $networkType='Web';
                          }
						  elseif($this->agent->is_mobile())
						  {
							  $agent = $this->agent->mobile();
							  $networkType='Mobile';
						  } 
						  else
						  {
							  $agent='Undefine';
							  $networkType='Undefine';
						  }
						  $Data = array('name' => $userData['name'],
						                'email' => $userData['email'],
										"mobile"=> $userData['mobile'],
										"message"=>$userData['product_description'],
										"product_id"=>$userData['product_id'],
										"enquiry_for"=>'sellproduct',
										"ip_address"=>$ipaddress,
										"request_from"=>$agent,
										"network"=>$networkType,
										"date"=>date('Y-m-d h:i:s'));
						    $this->load->model('User');
		                    $Insert = $this->User->AdduserData('products_enqiry',$Data);
							$userDetails=$this->common->ViewProductsellDetails(false,$userData['product_id']);
							$username=$userDetails->profile_name;
							if($userDetails->profile_name=='')
							{
								$username=$userDetails->contect_person;
							}
						    $to=$userDetails->email_id;
							$from='info@indiabiztrade.com';
							$subject='Product Enquiry';
							$body='<div style="width:600px; margin:0 auto; height:510px; border:solid 1px #A9A9A9; padding:1%;">
	<span style="float:left;"><img src="'.WEBROOT_PATH_IMAGES.'logo.png" alt="" title="" width="118" height="111" /></span> 
	<div style="float:right; width:50%;">
	<span style="float:right; text-align:right; font-family:"Aller",Arial, Helvetica, sans-serif; font-size:16px; padding:10% 0% 0.8% 0.2%; width:80%; color:#000;">Questions?</span>
	<span style="float:right; text-align:right; font-family:"Aller",Arial, Helvetica, sans-serif; font-size:20px; padding:0% 0% 0.8% 0.2%; width:100%; color:#78B205;">+91 124 4113661</span>
	<span style="float:right; text-align:right; font-family:"Aller",Arial, Helvetica, sans-serif; font-size:13px; padding:1% 0% 0.8% 0.2%; width:100%; color:#000;">Mon-Sat: 8am - 10pm <a href="mailto:info@indiabiztrade.com" style="color:#71AC05;">info@indiabiztrade.com</a> </span>
	</div>
	<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#000; text-align:left; padding:7% 0.5% 0.8% 0%;">Dear '.$username.',</span>
	<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:left; padding:1% 0.5% 0.8% 0%; line-height:19px;">Welcome to Indiabiz Trade (India Largest Market Place). We get a enquiry for your product listing on indiabiztrade. Find the details..</span>
	<span style="float:left; width:100%;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:dashed 1px #A9A9A9; padding:1%; margin-top:1%;">
	 
	  <tr>
		<td><span style="float:left; padding:1% 0.5% 1% 2%; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000;">Name: <a href="#" style="color:#71AC05;">'.$userData['name'].'</a></span></td>
	  </tr>
	  <tr>
		<td><span style="float:left; padding:1% 0.5% 1% 2%; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000;">E-mail: <a href="#" style="color:#71AC05;">'.$userData['email'].'</a></span></td>
	  </tr>
	   <tr>
		<td><span style="float:left; padding:1% 0.5% 1% 2%; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000;">Mobile: <a href="#" style="color:#71AC05;">'.$userData['mobile'].'</a></span></td>
	  </tr>
	  <tr>
		<td><span style="float:left; padding:1% 0.5% 1% 2%; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000;">Message: <a href="#" style="color:#71AC05;">'.$userData['product_description'].'</a></span></td>
	  </tr>
	</table>
	</span>
	<span style="float:left; padding:2% 0.5% 0% 0%; font-weight:bold; font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#000; text-align:left; width:100%;">When you log in to your account, you will be able to do the following: </span>
	<span style="float:left; width:100%; margin-left:-4%; text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; line-height:19px;">
	
	</span>
	<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:left; padding:1% 0.5% 0.8% 0%; line-height:19px;">If you have any questions about your account or any other matter, please feel free to contact us at <a href="#" style="color:#71AC05;">info@indiabiztrade.com</a> or by phone at <em style="color:#71AC05;">+91 124 4113661</em>.</span>
	<span style="clear:both"></span>
	
	<span style="clear:both;"></span><br />
	</div>
	<div style="background:#DFDFDF;  width:614px; margin:0 auto;  height:75px;  padding:0% 0.5% 0.5% 0.5%; border-bottom:solid 1px #A9A9A9; border-left:solid 1px #A9A9A9; border-right:solid 1px #A9A9A9">
	<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#8D8D8D; text-align:center; padding:1% 0.5% 0.8% 0%; line-height:19px;">Copyright © 2015. Indiabiz Trade . Any other trademarks or trade names are properties of their respective owners. </span>
	<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#8D8D8D; text-align:center; padding:1% 0.5% 0.8% 0%; line-height:19px;">Indiabiz Trade  | M-23 Sector 14, Gurgaon, India</span>
	</div>';
						   $mail=$this->common->sendemail($to,$from,$subject,$body);
		                   $this->data['succ_msg'] = 'Successfully Send.';
					   
			   }
			   else
			   {
				    		$this->data['view_file'] = 'usedproduct/sellproductdetails';
		                    $this->load->view('layouts/sellproduct_default', $this->data); 
			   }
		}
	

}
