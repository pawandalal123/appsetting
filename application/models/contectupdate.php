<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ContectUpdate extends CI_Model {
	
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
	
	      public function updateDetails($where,$table,$data)
		  {
			 $this->db->where($where);
             $this->db->update($table, $data); 
			// echo $this->db->last_query();
		  }
		   public function insertData($table,$data)
		  {
             $this->db->insert($table, $data); 
		  }
		  
		  public function deletedata($where,$table)
		  {
			 $this->db->where($where);
             $this->db->delete($table); 
			/// echo $this->db->last_query();
		  }
		  
		  
		
		
}

