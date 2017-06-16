<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends MY_AppController {	
	function __construct() {
    	parent::__construct();
	}	
	
	public function contentview($profilrpart=false)
	{
		$this->data['type']=$profilrpart;
		echo $profilrpart;
		if($profilrpart==false)
		{
		$this->data['view_file']  = 'content/all';
		$this->load->view('layouts/user_default', $this->data);
		}
		else{
		if($profilrpart=='about')
		{
		$this->data['view_file']  = 'content/about';
		$this->load->view('layouts/user_default', $this->data);
		}
		if($profilrpart=='faq')
		{
		$this->data['view_file']  = 'content/faq';
		$this->load->view('layouts/user_default', $this->data);
		}
		if($profilrpart=='term')
		{
		$this->data['view_file']  = 'content/term';
		$this->load->view('layouts/user_default', $this->data);
		}
		if($profilrpart=='security')
		{
		$this->data['view_file']  = 'content/security';
		$this->load->view('layouts/user_default', $this->data);
		}
		if($profilrpart=='ourteam')
		{
		$this->data['view_file']  = 'content/ourteam';
		$this->load->view('layouts/teamDefault', $this->data);
		}
		if($profilrpart=='feedback')
		{
		$this->data['view_file']  = 'content/feedback';
		$this->load->view('layouts/teamDefault', $this->data);
		}
		}
		
	}


	public function CityList(){
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
            $stateID= $this->input->post('state');
			$cityList = $this->db->select('district')
							->where('state',$stateID)
                             ->group_by('district')
					 		 ->get('location')								
							 ->result();
			$html = '';
			foreach($cityList as $city){
				$html.='<option value='.$city->district.'>'.$city->district.'</option>';
			}	 
			echo $html;			
	     
	}
	
	
	
}