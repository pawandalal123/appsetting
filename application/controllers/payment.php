<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class payment extends MY_AppController {	
	function __construct() {
    	parent::__construct();
	}	
		
	public function makepayment($profilrpart=false)
	{
		if($profilrpart=='leads')
		{
		$this->data['view_file']  = 'user/paymentforlead';
		}
		$this->load->view('layouts/second_default', $this->data);
	}
}
