<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends CI_Model {
	
	    public function __construct() {
		parent::__construct();	
}

//add_data() function insert the data to the database
//it accept two parameter $table & $param
//$table take the table name where data to be inserted
//$param is column, value pair array to be inserted
// it return affected row;
function add_data($table,$param) {
   $this->db->insert($table, $param);
   return $this->db->insert_id();
}	
//update_data() function update the data to the database
//it accept three parameter $table , $cols & $where
//$table take the table name where data to be inserted
//$cols is column, value pair array to be inserted
//$where is the condition array
// it return true if updated
function update_data($table,$cols=false,$where = false) {
 
		if($where){
  			 $this->db->where($where);
  		 }
      	$this->db->update($table,$cols);
	   //echo $this->db->last_query();die;
       return true;
}  

var $details;

//validate_user() function check that user is authentic or not
function validate_user( $email, $password ) {
     //echo $email.$password; die;
    //  query to retrieve the admin's details
    // based on the received email and password
	$conditions = array();
	$conditions['email']=$email;
	$conditions['password']=$password;
	$login  =  $this->db->select('user_id, email,firstname,lastname,profile_image')
    			 ->from('tbl_admin')
   				 ->where($conditions)->get()->result();
				// echo $this->db->last_query();
    // The results of the query are stored in $login.
    // If a value exists, then the user account exists and is validated
    if ( is_array($login) && count($login) == 1 ) {
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
            'id'=>$this->details->user_id,
            'name'=> $this->details->firstname . ' ' . $this->details->lastname,
			'photo'=>$this->details->profile_image,
            'isLoggedIn'=>true
        )
    );
}

//select_data() function select the data from the database
//it can accept five parameter $table , $cols , $where,$where_or,$where_in
//$table take the table name where in data to be updated
//$cols is column, value pair array to be inserted bydefault it take *

//$where is the conditional array with 'and' clouse
//$where_or is the conditional string with 'or' clouse
//$where_in is the conditional string with 'in' clouse
// it return Record Set

function select_data($table,$cols='*',$where=false,$where_or=false,$where_in=false) {
     if($where){
  		 $this->db->where($where);
  	 }else if($where_or){
		 $this->db->where($where_or , NULL, false);
	 }else if($where_in){
		 $this->db->where($where_in , NULL, false);
	 }
	   $this->db->select($cols);
	   #$this->db->from();
	   $query=$this->db->get($table);
	  //echo $this->db->last_query();die;
	    
	   return $query->result();
}


//delete_db() function delete the data from the database
//it accept two parameter $table  & $where
//$table take the table name from where data to be delete
//$where is the conditional array
// it return affected row if done
function delete_db($table,$where = false) {
 
	if($where){
  			 $this->db->where($where , NULL, false);
  		 }
   	      $this->db->delete($table);
	      //echo $this->db->last_query();die;
          return $this->db->affected_rows();  
            
 }  
//active_deactive_db() function active/deactive the data in database
//it accept three parameter $table , $cols & $where
//$table take the table name where data to be activated/deactivated
//$cols is column, value pair array to be activated/deactivated
//$where is the condition array
// it return affected row if done
function active_deactive_db($table,$cols=false,$where = false) {
 
		if($where){
  			 $this->db->where($where);
  		 }
   	     $this->db->update($table,$cols);
	     //echo $this->db->last_query();die;
         return $this->db->affected_rows();  
	
 }  
	
//change_password() function change the specified admin password
//it accept three parameter $table , $cols & $where
//$table take the table name where password to be changed
//$cols is column, value pair array to be changed
//$where is the condition array
// it return true if done	

function change_password($table,$cols=false,$where = false) {
 
		if($where){
  			 $this->db->where($where);
  		 }
   	      $this->db->update($table,$cols);
	      //echo $this->db->last_query();die;
          return true;
	
 }  

} //controller
