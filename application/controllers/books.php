<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Books extends CI_Controller{
 
    function __construct(){
        parent::__construct();
    }
    public function index($offset = 0){
        // Load the tables library
        $this->load->library('table');
        // Query the database and get results
		$config['base_url'] = SITE_URL.'/books/index';
		$config['total_rows'] = 50;
		$config['per_page'] = 10;
		$config['num_links'] = 5;
		$this->pagination->initialize($config);
        $data['books'] = $this->db->get(' tbl_category' ,10, $offset);
        // Create custom headers
    //    $header = array('cat ID', 'category Name');
        // Set the headings
      // $this->table->set_heading($header);
        // Load the view and send the results
        $this->load->view('user/genratebook', $data);
    }
}
?>