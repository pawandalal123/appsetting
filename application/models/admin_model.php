<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
  // public $table;
  public function __construct()
   {
    $this->table='core_site__admin_users';
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

function select_data($cols='*',$where=false,$where_or=false,$where_in=false) {
     if($where){
       $this->db->where($where);
     }else if($where_or){
     $this->db->where($where_or , NULL, false);
   }else if($where_in){
     $this->db->where($where_in , NULL, false);
   }
     $this->db->select($cols);
     #$this->db->from();
     $query=$this->db->get($this->table);
    //echo $this->db->last_query();die;
      
     return $query->result();
}

      //validate_user() function check that user is authentic or not
    function validate_user( $email, $password ) {
         //echo $email.$password; die;
        //  query to retrieve the admin's details
        // based on the received email and password
      $conditions = array();
      $conditions['email']=$email;
      $conditions['password']=$password;
      $conditions['user_type']=1;
      $conditions['status']=1;
      $login  =  $this->db->select('id, email,name')
               ->from($this->table)
               ->where($conditions)->get()->result();
            // echo $this->db->last_query();
        // The results of the query are stored in $login.
        // If a value exists, then the user account exists and is validated
        if ( is_array($login) && count($login) == 1 )
         {
            // Set the users details into the $details property of this class
             $this->details = $login[0];
          //print_r($this->details); die;
            // Call set_session to set the user's session vars via CodeIgniter
             $this->set_session();
             return true;
          }

        return false;
    }

    function set_session() {
        // session->set_userdata is a CodeIgniter function that
        // stores data in a cookie in the user's browser.  Some of the values are built in
        // to CodeIgniter, others are added (like the IP address).  See CodeIgniter's documentation for details.
        $this->session->set_userdata( array(
                'id'=>$this->details->id,
                'name'=> $this->details->name,
                'isLoggedIn'=>true
            )
        );
    }
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

