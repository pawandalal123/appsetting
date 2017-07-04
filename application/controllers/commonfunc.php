<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class CommonFunc extends MY_AppController {	
	function __construct() {
    	parent::__construct();
	}	

	public function categorylist()
	{



		if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		}


            $categoryID= $this->input->post('category');
			$categorylist = $this->db->where(array('category_id'=>$categoryID,'status'=>1))
                             ->group_by('id')
					 		 ->get('subcategories')								
							 ->result();
							 echo $this->db->last_query();


			$html = '';


         if(count($categorylist)>0)
         {
         	foreach($categorylist as $category)
			{

				$html.='<option value='.$category->id.'>'.$category->name.'</option>';

			}

         }
				 



			echo $html;			



	     



	}
	


	



}



?>