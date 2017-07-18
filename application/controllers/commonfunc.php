<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class CommonFunc extends MY_AppController {	
	function __construct() {
    	parent::__construct();
	}	

	public function categorylist()
	{


		if (!$this->input->is_ajax_request()) 
		{

		   exit('No direct script access allowed');

		}

            $categoryID= $this->input->post('category');
			$categorylist = $this->db->where(array('category_id'=>$categoryID,'status'=>1))
                             ->group_by('id')
					 		 ->get('subcategories')								
							 ->result();
							 //echo $this->db->last_query();

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

	public function getsubcatlist()
	{
		if (!$this->input->is_ajax_request()) 
		{
		   exit('No direct script access allowed');
		}
		$datacat=array();
		$condition = "name like '%".$this->input->get('term')."%' and status=1";

		$categorylist = $this->db->where($condition)
                             ->group_by('id')
					 		 ->get('subcategories')								
							 ->result();
							// echo $this->db->last_query();


		foreach($categorylist as $categorylist)
        {
            $a = array(
				'id' => trim($categorylist->id),
				'label' => trim($categorylist->name),
				'value' => trim($categorylist->name)
			);

			$datacat[] = $a;
            // $datacat[$categorylist->id] =  trim(ucwords($categorylist->name));
        }

        echo json_encode($datacat);
	}

	public function searchlist()
	{
		if (!$this->input->is_ajax_request()) 
		{
		   exit('No direct script access allowed');
		}
        $searhval= $this->input->post('searhval');
		$condition="sub_cat_id = '".$searhval."' and templetes.is_default=0 and templetes.status=1";
        $this->db->where($condition);
		$gettemplatedata = $this->db->get('templetes')								
							 ->result();
							 //echo $this->db->last_query();
							 if(count($gettemplatedata)>0)
							 {
							 	?>
							 	  <div class="tab-content" id="searchresult" style="display: block;">
                                   <ul>
							 	<?php
							 	foreach($gettemplatedata as $gettemplatedata)
							 	{
							 		?>
							 		<li>
                             <div class="imgbox">
                            <img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES.$gettemplatedata->background_image?>" alt="" style="width: 270px; height: 270px;">
                            <div class="overlay"><h4><?php echo $gettemplatedata->temlete_name;?></h4><span><?php echo $gettemplatedata->tag_line;?></span></div>
                             </div>
                            <a href="javascript::void(0);" <?php if($searhval==1)  {?> onclick="maketempletelist('<?php echo $searhval;?>')"    <?php } ?>>Preview</a>
                             </li>
							 		<?php

							 	}
							 	?>
							 	  </ul>
							 	  </div>
							 	<?php
							 }

	}
	


}



?>