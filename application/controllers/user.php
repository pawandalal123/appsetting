<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_AppController {	
	function __construct() {
    	parent::__construct();

	}	


	public function index()
	{
		$this->load->model("templetes");
		$this->load->model("category");
		$catArray = array();
		$productArray = array();
		//////////// get all active category
        $getactivecat = $this->category->select_data(array('id','name'),array('status'=>1));
        if(count($getactivecat)>0)
        {
        	foreach($getactivecat as $getactivecat)
        	{
        		$catArray[$getactivecat->id] = $getactivecat->name;

        	}
        	$getcatKey = array_keys($catArray);
        	$getcatKey = implode(',', $getcatKey);
        	$condition = "cat_id in ('".$getcatKey."') and is_default=0 and status=1";
        	$getproducts = $this->templetes->select_data('*',$condition);
        	
        	if(count($getproducts)>0)
        	{
        		foreach($getproducts as $getproducts)
        		{
        			$catname = $catArray[$getproducts->cat_id];
        			$productArray[$catname][$getproducts->sub_cat_id] =array('temlete_name'=>$getproducts->temlete_name,
        				                                                     'background_image'=>$getproducts->background_image,
        				                                                     'tag_line'=>$getproducts->tag_line);
        		}

        	}
        	////////// get templets for category///
        }
        // print_r($productArray);

		$this->data['titlehome']='Landing Page Home';
		$this->data['view_file'] = 'web/index';
		$this->data['productArray']=$productArray;
		$this->load->view('layouts/testDefault', $this->data); 
	}

	public function gettempletes()
	{
		if (!$this->input->is_ajax_request()) 
		{

		   exit('No direct script access allowed');

		}
		$this->load->model('subcategory');
		$this->load->model("templetes");
		$subcatid = $this->input->post('subcatid');
		$condition = array('id'=>$this->input->post('subcatid'));
		$getsubcat = $this->subcategory->getBy($condition,array('name'));

		///////// get templets based on category////
		$condition = "sub_cat_id = '".$subcatid."' and status=1";
        $getproducts = $this->templetes->select_data('*',$condition);
		?>
		 <script>
    $(document).ready(function() 
    {
	   var owl = $("#owl-demo2");
      owl.owlCarousel({

      items : 5, //10 items above 1000px browser width
      itemsDesktop : [1000,5], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0;
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
      
      });

      // Custom Navigation Events
      $(".next").click(function(){
        owl.trigger('owl.next');
      })
      $(".prev").click(function(){
        owl.trigger('owl.prev');
      })
      


    });
    </script>
      <h3>You Have Previewing <span> <?php echo $getsubcat->name;?></span></h3>
        <div class="popup-nav">
          <ul>
              <li><a href="#" class="active">iOS Mobile App</a></li>
                <li><a href="#"> Website</a></li>
            </ul>
        </div>
        
        <div id="demo2">
            <?php 
            if(count($getproducts)>0)
            {
            ?>
            <div id="owl-demo2" class="owl-carousel">
            <?php 
            foreach($getproducts as $getproducts)
            {
             ?>
             <div class="item" onclick="settemplete('<?php echo $getproducts->id?>')" >
                <img src="<?php echo WEBROOT_PATH_UPLOAD_IMAGES.$getproducts->background_image;?>" alt="">
                    <div class="overlay-chuch">
                    	<h3><?php echo $getproducts->temlete_name;?></h3>
                        <p><?php echo $getproducts->tag_line;?></p>
                        <a href="#" class="sign-in" style="background: <?php echo $getproducts->color_code; ?>!important">Sign In</a>
                        <a href="#" class="sign-up">Sign Up</a>
                    </div>
                </div>
                
                
              
              <?php
              }
              ?>
            </div>
            <div class="customNavigation">
                <a class="prev">Previous</a>
                <a class="next">Next</a>
            </div>
            <?php 
            }
            ?>
        </div>
        <p>Forget Ebay and other forms of advertising for your property that costs you hard earned money. Why not do it all for free? Investment Assets Properties have ready several locations around the world to take your free listings for any luxury property.</p>
        <div class="row"><a href="#" class="active">Start</a></div>
        <div class="social-popup social-popup2">
          <h5>LIKE WHAT YOU SEE ? SHARE IT</h5>
            <ul>
              <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-facebook2.png" alt=""></a></li>
                <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-twitter2.png" alt=""></a></li>
                <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-googlep.png" alt=""></a></li>
                <li><a href="#"><img src="<?php echo WEBROOT_PATH_IMAGES;?>icon-message.png" alt=""></a></li>
            </ul>
        </div>
    
		<?php
	}

	public function settemplete()
	{
		if (!$this->input->is_ajax_request()) 
		{
		   exit('No direct script access allowed');
		}
		$status['status']='success';
		$status['islogin']='no';
		$templeteid  =$this->input->post('templeteid');
		$this->session->set_userdata( array(
		            'templete_id'=>$templeteid
		        ));
		if($this->session->userdata('logged_in') && $this->session->userdata('logged_in')!='')
		{
			$this->load->model("templetes");
			$condition = array('id'=>$templeteid);
			$gettempData = $this->templetes->getBy($condition);
			if($gettempData)
			{
				$insertData = array('temlete_name'=>$gettempData->temlete_name,
					                'background_image'=>$gettempData->background_image,
					                'color_code'=>$gettempData->color_code,
					                'tag_line'=>$gettempData->tag_line,
					                'user_id'=>$this->session->userdata('UserId'),
					                'is_default'=>1,
					                'cat_id'=>$gettempData->cat_id,
					                'sub_cat_id'=>$gettempData->sub_cat_id,
					                'created_at'=>date('Y-m-d H:i:s'));
				$tempid = $this->templetes->AdduserData($insertData);
				$status['temoleteid']=$tempid;
			}
				
			    $status['islogin']='yes';
		}
		// echo 'pawan';
		// die;
		echo json_encode($status);
             flush();	
	}

	public function setcolor($value)
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect(SITE_URL);
		}
		if($value)
		{
			
			$this->load->model("templetes");
			$condition = array('id'=>$value);
			$gettempData = $this->templetes->getBy($condition);
			if($gettempData)
			{
				////////upadte color code/////
				if($this->input->post('savecolor'))
				{
					$upadteData = array('color_code'=>$this->input->post('colorInput'));
					$upadte = $this->templetes->updateDetails($condition,$upadteData);
					if($upadte)
					{
						redirect('user/settags/'.$value);

					}
					else
					{
						$msg="some technical issue";
					    $this->session->set_userdata( array('msg'=>$msg,'class' => 'error'));
						
					}

				}
				
				$this->data['gettempData'] = $gettempData;

				$this->data['view_file'] = 'web/setcolor';
				$this->data['templete_id'] = $value;
				$this->load->view('layouts/testDefault', $this->data); 
			}
			else
			{

		   }
	    }
		else
		{

		}
	}

	public function settags($value)
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect(SITE_URL);
		}
		if($value)
		{
			$this->load->model("templetes");
			$condition = array('id'=>$value);
			$gettempData = $this->templetes->getBy($condition);
			if($gettempData)
			{
				if($this->input->post('savedetails'))
				{
					$userData = $this->input->post();
				    @extract($userData );
				    // print_r($userData);
					$this->form_validation->set_rules('tempname', 'Name', 'trim|required|xss_clean');
					$this->form_validation->set_rules('tagline', 'Tag line', 'trim|required|xss_clean|max_length[50]');
					$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
					if($this->form_validation->run())
					{
						$upadteData = array('temlete_name'=>$tempname,
							                'tag_line'=>$tagline);
						$upadte = $this->templetes->updateDetails($condition,$upadteData);
						if($upadte)
						{
							redirect('user/setimage/'.$value);

						}
						else
						{
							$msg="some technical issue";
							$this->session->set_userdata( array('msg'=>$msg,'class' => 'error'));
						}

					}
				}
				
				$this->data['gettempData'] = $gettempData;
				$this->data['templete_id'] = $value;
			    $this->data['view_file'] = 'web/settags';
			    $this->load->view('layouts/testDefault', $this->data); 

			}
			else
			{

			}
		}
		else
		{

		}
	}

	public function setimage($value)
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect(SITE_URL);
		}
		if($value)
		{
			$this->load->model("templetes");
			$condition = array('id'=>$value);
			$gettempData = $this->templetes->getBy($condition);
			if($gettempData)
			{
				///////////// make gallery images////
				$gelimageArray = $this->templetes->select_data(array('background_image'),array('status'=>1));
				$this->data['gelimageArray'] = $gelimageArray;
				$this->data['gettempData'] = $gettempData;
				$this->data['templete_id'] = $value;
			    $this->data['view_file'] = 'web/setimage';
			    $this->load->view('layouts/testDefault', $this->data); 

			}
			else
			{

			}
		}
		else
		{

		}
	}


	public function upatdeimge()
	{
		if (!$this->input->is_ajax_request()) 
		{
		   exit('No direct script access allowed');
		}
		$userData = $this->input->post();
	    @extract($userData );
		$this->load->model("templetes");
		$condition = array('id'=>$updateid);
		if($upadtefor=='image')
		{
			$name = $fileField;
			$up_path = 'upload';
			$input_name ='fileField';
			$image_name = $this->uploadimage($up_path,$input_name,$fileField);
			if($image_name['error']==true)
			{
				$status['error_message']= $image_name['error_type'];
				$status['status']='error';
			}
			else
			{
				$imagename = $image_name['file_name'];
				$updateArray = array('background_image'=>$imagename);
				$upadte = $this->templetes->updateDetails($condition,$updateArray);
				if($upadte)
				{
					$status['imagelink']=WEBROOT_PATH_UPLOAD_IMAGES.$imagename;
					$status['status']='success';

				}
				else
				{
					$status['status']='error';

				}
			}


		}
		else
		{
		    $gettempData = $this->templetes->getBy($condition);
			if($gettempData)
			{
				$updateArray = array('background_image'=>$imagename);
				$upadte = $this->templetes->updateDetails($condition,$updateArray);
				if($upadte)
				{
					$status['imagelink']=WEBROOT_PATH_UPLOAD_IMAGES.$imagename;
					$status['status']='success';

				}
				else
				{
					$status['status']='error';

				}
			}
			else
			{
				$status['status']='error';
			}
	   }
		echo json_encode($status);

	}
		

}

