<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Searchcity extends MY_AppController {	
	function __construct() {
    	parent::__construct();
	}	
	public function cityList($stateNmae=false){
		$this->data['view_file'] = 'user/searchcity';
		$this->load->view('layouts/user_default', $this->data); 
	}
	public function cityproductlist($stateName=false , $stateId=false){
	    $this->data['stateName'] = $stateName;
	    $this->data['stateId'] = $stateId;
		$this->data['view_file'] = 'user/cityproductListing';
		$this->load->view('layouts/second_default', $this->data);
	}
	public function districList($stateName=false , $cityName=false , $stateId=false , $cityId){
	    $this->data['stateName'] = $stateName;
	    $this->data['stateId'] = $stateId;
		$this->data['cityName'] = $cityName;
	    $this->data['cityId'] = $cityId;
		$this->data['view_file'] = 'user/districtyListData';
		$this->load->view('layouts/second_default', $this->data);
	}
}