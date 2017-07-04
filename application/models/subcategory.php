<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategory extends CI_Model {
	// public $table;
	public function __construct()
	 {
		$this->table='subcategories';
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

function select_data($cols='*',$where=false) {
     if($where){
  		 $this->db->where($where);
  	 }
	   $this->db->select($cols);
	   #$this->db->from();
	   $query=$this->db->get($this->table);
	  //echo $this->db->last_query();die;
	   return $query->result();
}

public function getlist($where=false)
{
	if($where){
  		 $this->db->where($where);
  	 }
        $query = $this->db->get($this->table);
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
             return false;
		  }
		  public function deletedata($where)
		  {
			 $this->db->where($where);
             $this->db->delete($this->table); 
		  }
		
		
}

