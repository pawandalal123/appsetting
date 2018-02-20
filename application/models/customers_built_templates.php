<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers_built_templates extends CI_Model {
	// public $table;
	public function __construct()
	 {
		$this->table='ios_church_customers_built_templates';
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

function select_data($cols='*',$where=false,$groupBy=false) {
     if($where)
     {
  		 $this->db->where($where);
  	 }
  	 if($groupBy)
	 {
		$this->db->group_by($groupBy);

	 }
	   $this->db->order_by('id','asc');
	   $this->db->select($cols);
	   #$this->db->from();
	   $query=$this->db->get($this->table);
	  //echo $this->db->last_query();die;
	   return $query->result();
}

///////// function for single result////

	public function getBy($condition,$cols='*')
	{
		if($condition)
		{
			$this->db->where($condition);
		}
		$this->db->select($cols);
		$pageData = $this->db->get($this->table)->row();

		return $pageData;

	}


	
	   public function AdduserData($data)
	      {
		   $this->db->insert($this->table, $data);
		//  echo $this->db->last_query();
		  return  $this->db->insert_id();
		  }
		  
		  public function updateDetails($where,$data)
		  {
			 $this->db->where($where);
             $this->db->update($this->table, $data); 
             return true;
		  }
		  public function deletedata($where)
		  {
			 $this->db->where($where);
             $this->db->delete($this->table); 
		  }
		
		
}

