<?php
class Demo extends MY_AppController {

    function __construct() {
        parent::__construct();
    }

    function index() {
        // return to previous page
        redirect(base_url());
    }

    function ci_pagination() {
        $this->load->library('pagination');
        $this->load->library('table');
        $result_per_page = 5;  // the number of result per page
		$tableName = 'location';
        $config['base_url'] = base_url() . '/demo/ci_pagination/';
        $config['total_rows'] = $this->common->count_items($tableName);
        $config['per_page'] = $result_per_page;
        $this->pagination->initialize($config);
        	
        $this->load->view('user/demo');
    }
}