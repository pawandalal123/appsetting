<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');







class Common extends CI_Model {



	public function __construct() {

		parent::__construct();	

	}



	public function isExsits($table = null, $conditions = array()){

		if($table != null){

			$total = $this->db->where($conditions)

							  ->count_all_results($table);

			if($total == 1) {

				return true;



			}								

		}



		return false;

	}

public function cleanURL($string) {

   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.



   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.

}


		  public function sendemail($to,$from,$subject,$body)
		  {
		   $this->email->from($from, 'App test');
           $this->email->to($to);
           $this->email->subject($subject);
           $this->email->message($body);
		   $this->email->set_mailtype("html");
           $this->email->send();
           //echo $this->email->print_debugger();


		  }


			   }

