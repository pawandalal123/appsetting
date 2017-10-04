<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productusers extends CI_Model {
	// public $table;
	public function __construct()
	 {
		$this->table='tbl_church_product_users';
		parent::__construct();	
		$CI = &get_instance();
		$this->db1 = $CI->load->database('Churchapp', TRUE);
	}

	public function isExsits($table = null, $conditions = array()){
		if($table != null){
			$total = $this->db1->where($conditions)
							  ->count_all_results($table);
			if($total == 1) {
				return true;
			}								
		}
		return false;
	}

function select_data($cols='*',$where=false,$groupBy=false) {
     if($where)
     {
  		 $this->db1->where($where);
  	 }
  	 if($groupBy)
	 {
		$this->db1->group_by($groupBy);

	 }
	   $this->db1->order_by('id','asc');
	   $this->db1->select($cols);
	   #$this->db1->from();
	   $query=$this->db1->get($this->table);
	  //echo $this->db1->last_query();die;
	   return $query->result();
}

///////// function for single result////

	public function getBy($condition,$cols='*')
	{
		if($condition)
		{
			$this->db1->where($condition);
		}
		$this->db1->select($cols);
		$pageData = $this->db1->get($this->table)->row();

		return $pageData;

	}


	
	   public function AdduserData($data)
	      {
		   $this->db1->insert($this->table, $data);
		//  echo $this->db1->last_query();
		  return  $this->db1->insert_id();
		  }
		  
		  public function updateDetails($where,$data)
		  {
			 $this->db1->where($where);
             $this->db1->update($this->table, $data); 
             return true;
		  }
		  public function deletedata($where)
		  {
			 $this->db1->where($where);
             $this->db1->delete($this->table); 
		  }
		
		
}

