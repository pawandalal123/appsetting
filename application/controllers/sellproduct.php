<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');







class SellProduct extends MY_AppController {



	function __construct() {



    	parent::__construct();



	}	

	        public function SellProduct($type = false,$type1 = false)

			{

				if($this->input->post('submit')){

			 		$this->sellProductHere();

				}

				$this->data['titleDisplay']='Post free Classified list India | Free Ads Posting Sites';

				$this->data['keywordDisplay']='Free classifieds, free classifieds in india, free ads posting, free classifieds list, free ad posting sites, classified sites, post free classified ads, free classified ads, post free ads, freeads';

				$this->data['descDisplay']="Indiabiztrade: Post free classified ads for the widest range of products & services. One of India's best ad posting sites among the best classified on web";

				$this->data['userId']=$this->session->userdata('UserId');

				$this->data['sellcategory']=$this->common->sellproductcategory();

				$this->data['stateData']= $this->common->selectAllState('state');

				$this->data['view_file'] = 'usedproduct/productsell';

				$this->load->view('layouts/sellproduct_default', $this->data); 

	        }

			public function Listall($type = false,$type1 = false)

			{

	   		$this->data['view_file'] = 'usedproduct/productlistall';

		    $this->load->view('layouts/sellproduct_default', $this->data);

	        }

			public function sellProductHere()

		 	{

		  		$userData = $this->input->post();

				@extract($userData);

		  	if($this->session->userdata('logged_in')== true)

			  {

			  $this->db->trans_begin();

			  $this->form_validation->set_rules('title', 'Title', 'required');

			  $this->form_validation->set_rules('product_description', 'Description', 'required');

			  $this->form_validation->set_rules('Address', 'Address', 'required');

             if ($this->form_validation->run())

			 {

			    $image=array_filter($_FILES['fileField']['name']);

	         	$this->load->model('User');

			    $sellCatId = $userData['categorylistsell'];

				$sellConditionArray = array('18','19');

				if(!in_array($sellCatId,$sellConditionArray )){



		           $productData = array('user_id' => $this->session->userdata('UserId'),
										   'title' => $title,
										   'contect_person'=> $this->session->userdata('DisplayName'),
										   'price'=>$price,
										   'product_description'=>$product_description,
										   'state'=>$state,
										   'district'=>$districList,
										   'city'=>$CityList,
										   'sellertype'=>$radio,
										   'address'=>$Address,
										   'category'=>$categorylistsell,
										   'subcategory'=>$subcategorysell,
										   'brand_id'=>$productbrand,
										   "date"=>date('Y-m-d h:i:s'));

		  			}elseif($sellCatId=='18'){

				       $productData = array('user_id' => $this->session->userdata('UserId'),
											'title' => $title,
											'position'=>$radio,
											'experience'=>$expyear,
											'brand_id'=>$jobtype,
											'price'=>$Sallery,
											'salary_type'=>$Sallerytype.'-'.$expMonth,
											'product_description'=>$product_description,
											'category'=>$categorylistsell,
											'subcategory'=>$subcategorysell,
											'contect_person'=> $this->session->userdata('DisplayName'),
											'state'=>$state,
											'district'=>$districList,
											'city'=>$CityList,



											"date"=>date('Y-m-d h:i:s'));

					 }else{

				       $productData = array('user_id' => $this->session->userdata('UserId'),

											'title' => $title,
											'furnished'=>$Furnished,
											'Bedrooms'=>$Bedrooms,
											'Bathrooms'=>$Bathrooms,
											'price'=>$Price,
											'broker_free'=>$Broker,
											'area'=>$Area,
											'product_description'=>$product_description,
											'category'=>$categorylistsell,
											'subcategory'=>$subcategorysell,
											'contect_person'=> $this->session->userdata('DisplayName'),

											'state'=>$state,

											'district'=>$districList,

											'city'=>$CityList,

											"date"=>date('Y-m-d h:i:s'));

			}



				    $Insert = $this->User->AdduserData('sell_product',$productData);
					$productIdDisplay = $this->db->insert_id();
					if($this->db->trans_status() === FALSE){
                    	$this->db->trans_rollback();
						$this->data['err_msg'] = 'There is some technical issue. Please try later.';

                    }else{
                        $this->db->trans_commit();
						$to=$this->session->userdata('email');
						$from='no-reply@indiabiztrade.com';
						$subject='Thanks For Registration';

						$body='<div style="width:600px; margin:0 auto; height:510px; border:solid 1px #A9A9A9; padding:1%;">

	<span style="float:left;"><img src="'.WEBROOT_PATH_IMAGES.'logo.png" alt="" title="" width="118" height="111" /></span> 

	<div style="float:right; width:50%;">

	<span style="float:right; text-align:right; font-family:"Aller",Arial, Helvetica, sans-serif; font-size:16px; padding:10% 0% 0.8% 0.2%; width:80%; color:#000;">Questions?</span>

	<span style="float:right; text-align:right; font-family:"Aller",Arial, Helvetica, sans-serif; font-size:20px; padding:0% 0% 0.8% 0.2%; width:100%; color:#78B205;">+91 124 4113661</span>

	<span style="float:right; text-align:right; font-family:"Aller",Arial, Helvetica, sans-serif; font-size:13px; padding:1% 0% 0.8% 0.2%; width:100%; color:#000;">Mon-Sat: 8am - 10pm <a href="mailto:info@indiabiztrade.com" style="color:#71AC05;">info@indiabiztrade.com</a> </span>

	</div>

	<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#000; text-align:left; padding:7% 0.5% 0.8% 0%;">Dear '.$this->session->userdata('DisplayName').',</span>

	<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:left; padding:1% 0.5% 0.8% 0%; line-height:19px;">Welcome to Indiabiz Trade (India Largest Market Place). Your product is successfully listed on indiabiztrade. </span>

	<span style="float:left; width:100%;">

	

	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:dashed 1px #A9A9A9; padding:1%; margin-top:1%;">

	  <tr>

		<td><span style="float:left; padding:1% 0.5% 0.2% 2%; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000;">Use the following Link to see your product display:</span></td>

	  </tr>

	  <tr>

		<td><span style="float:left; padding:1% 0.5% 1% 2%; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000;">Link: <a href="'.SITE_URL.'productdetail/'.$this->common->cleanURL($title).'/'.$productIdDisplay.'" style="color:#71AC05;">'.SITE_URL.'productdetail/'.$this->common->cleanURL($title).'/'.$productIdDisplay.'</a></span></td>

	  </tr>

	</table>
	</span>
	<span style="float:left; padding:2% 0.5% 0% 0%; font-weight:bold; font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#000; text-align:left; width:100%;">When you log in to your account, you will be able to do the following: </span>
	<span style="float:left; width:100%; margin-left:-4%; text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; line-height:19px;">
	</span>
	<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:left; padding:1% 0.5% 0.8% 0%; line-height:19px;">If you have any questions about your account or any other matter, please feel free to contact us at <a href="#" style="color:#71AC05;">info@indiabiztrade.com</a> or by phone at <em style="color:#71AC05;">+91 124 4113661</em>.</span>

	<span style="clear:both"></span>

	

	<span style="clear:both;"></span><br />

	</div>

	<div style="background:#DFDFDF;  width:614px; margin:0 auto;  height:75px;  padding:0% 0.5% 0.5% 0.5%; border-bottom:solid 1px #A9A9A9; border-left:solid 1px #A9A9A9; border-right:solid 1px #A9A9A9">
	<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#8D8D8D; text-align:center; padding:1% 0.5% 0.8% 0%; line-height:19px;">Copyright © 2015. Indiabiz Trade . Any other trademarks or trade names are properties of their respective owners. </span>
	<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#8D8D8D; text-align:center; padding:1% 0.5% 0.8% 0%; line-height:19px;">Indiabiz Trade  | M-23 Sector 14, Gurgaon, India</span>
	</div>';
						$sendemail=$this->common->sendemail($to,$from,$subject,$body);
						$this->uploadSellProductImages($image , 'fileField' , $Insert);
						$this->data['succ_msg'] = 'Your product will display after 3-4 hrs. Thank you.';
					}
			}

	 }

			  else

			  {

			  $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user_signup.email_id]');
			  $this->form_validation->set_rules('name', 'Name', 'required');
			  $this->form_validation->set_rules('title', 'Title', 'required');
			  $this->form_validation->set_rules('product_description', 'Description', 'required');
			  $this->form_validation->set_rules('Address', 'Address', 'required');
             if ($this->form_validation->run())
			 {
			 	$this->db->trans_begin();
			 	$image=array_filter($_FILES['fileField']['name']);
		    	$password=  chr(rand(65,90)).chr(rand(65,90)).rand(89258,28244225);	  
	        	$Data = array('email_id' => $email,
							  'mobile_no' => $mobile,
							  "password"=> md5($password),
							  'profile_name'=>$name,
							  "enroll_date"=>date('Y-m-d h:i:s'));
		    	$this->load->model('User');
		    	$Insert = $this->User->AdduserData('user_signup',$Data);
				$sellCatId = $userData['categorylistsell'];

				$sellConditionArray = array('18','19');

				if(!in_array($sellCatId,$sellConditionArray )){

		  			$productData = array( 'user_id' => $Insert ,

											'title' => $title,

											'contect_person' => $name,

											'price' => $price,

											'product_description' => $product_description,

											'state' => $state,

											'district' => $districList,

											'city' => $CityList,

											'sellertype' => $radio,

											'address' => $Address,

											'category' => $categorylistsell,

											'subcategory' => $subcategorysell,

											'brand_id' => $productbrand,

											"date" => date('Y-m-d h:i:s'));



		  			}else if($sellCatId=='18')



						{



				      $productData = array('user_id' => $Insert,

											  'title' => $title,

											  'position'=>$radio,

											  'experience'=>$expyear,

											  'brand_id'=>$jobtype,

											  'price'=>$Sallery,

											  'salary_type'=>$Sallerytype.'-'.$expMonth,

											  'image_name'=>$image_name,

											  'product_description'=>$product_description,

											  'category'=>$categorylistsell,

											  'subcategory'=>$subcategorysell,

											  'contect_person'=> $name,

											  'state'=>$state,

											  'district'=>$districList,

											  'city'=>$CityList,

											  "date"=>date('Y-m-d h:i:s'));

						 }

						 else

			         {



				 $productData = array('user_id' => $Insert,



											  'title' => $title,

											  'furnished'=>$Furnished,

											  'Bedrooms'=>$Bedrooms,

											  'Bathrooms'=>$Bathrooms,

											  'price'=>$Price,

											  'broker_free'=>$Broker,

											  'area'=>$Area,

											  'image_name'=>$image_name,

											  'product_description'=>$product_description,

											  'category'=>$categorylistsell,

											  'subcategory'=>$subcategorysell,

											  'contect_person'=> $name,

											  'state'=>$state,

											  'district'=>$districList,

											  'city'=>$CityList,

											  "date"=>date('Y-m-d h:i:s'));

			}



					$Insert1 = $this->User->AdduserData('sell_product',$productData);

					$productIdDisplay = $this->db->insert_id();



					//echo $this->db->last_query();



					if($this->db->trans_status() === FALSE){

                    	$this->db->trans_rollback();

						$this->data['err_msg'] = 'There is some technical issue. Please try later.';



                    }else{



                        $this->db->trans_commit();

						$newdata = array(

							   'UserId'     => $Insert,

                               'email'     => $email,

							   'mobile'    => $mobile,

							   'emailstatus'     => 'Pending',

							   'mobilestatus'    => 'Pending',

							   'DisplayName'    => $name,

							   'DisplayAddress'    => '',

                               'logged_in' => TRUE

                                     );

                        $this->session->set_userdata($newdata);

						$to=$email;

						$from='no-reply@indiabiztrade.com';

						$subject='Thank You';

						$body='<div style="width:600px; margin:0 auto; height:510px; border:solid 1px #A9A9A9; padding:1%;">

	<span style="float:left;"><img src="'.WEBROOT_PATH_IMAGES.'logo.png" alt="" title="" width="118" height="111" /></span> 

	<div style="float:right; width:50%;">

	<span style="float:right; text-align:right; font-family:"Aller",Arial, Helvetica, sans-serif; font-size:16px; padding:10% 0% 0.8% 0.2%; width:80%; color:#000;">Questions?</span>

	<span style="float:right; text-align:right; font-family:"Aller",Arial, Helvetica, sans-serif; font-size:20px; padding:0% 0% 0.8% 0.2%; width:100%; color:#78B205;">+91 124 4113661</span>

	<span style="float:right; text-align:right; font-family:"Aller",Arial, Helvetica, sans-serif; font-size:13px; padding:1% 0% 0.8% 0.2%; width:100%; color:#000;">Mon-Sat: 8am - 10pm <a href="mailto:info@indiabiztrade.com" style="color:#71AC05;">info@indiabiztrade.com</a> </span>

	</div>

	<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#000; text-align:left; padding:7% 0.5% 0.8% 0%;">Dear '.$name.',</span>

	<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:left; padding:1% 0.5% 0.8% 0%; line-height:19px;">Welcome to Indiabiz Trade (India Largest Market Place). Your product is successfully listed on indiabiztrade. </span>

	<span style="float:left; width:100%;">

	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:dashed 1px #A9A9A9; padding:1%; margin-top:1%;">

	  <tr>

		<td><span style="float:left; padding:1% 0.5% 0.2% 2%; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000;">Use the following deatils for login to log in:</span></td>

	  </tr>

	  <tr>

		<td><span style="float:left; padding:1% 0.5% 1% 2%; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000;">Email: <a href="#" style="color:#71AC05;">'.$email.'</a></span></td>

	  </tr>

	  <tr>

		<td><span style="float:left; padding:1% 0.5% 1% 2%; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000;">Password: <a href="#" style="color:#71AC05;">'.$password.'</a></span></td>

	  </tr>

	

	</table>

	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:dashed 1px #A9A9A9; padding:1%; margin-top:1%;">

	  <tr>

		<td><span style="float:left; padding:1% 0.5% 0.2% 2%; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000;">Use the following Link to see your product display:</span></td>

	  </tr>

	  <tr>

		<td><span style="float:left; padding:1% 0.5% 1% 2%; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000;">Link: <a href="href="'.SITE_URL.'productdetail/'.$this->common->cleanURL($title).'/'.$productIdDisplay.'"" style="color:#71AC05;">'.SITE_URL.'productdetail/'.$this->common->cleanURL($title).'/'.$productIdDisplay.'</a></span></td>

	  </tr>

	  

	

	</table>

	</span>

	<span style="float:left; padding:2% 0.5% 0% 0%; font-weight:bold; font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#000; text-align:left; width:100%;">When you log in to your account, you will be able to do the following: </span>

	<span style="float:left; width:100%; margin-left:-4%; text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; line-height:19px;">

	

	</span>

	<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:left; padding:1% 0.5% 0.8% 0%; line-height:19px;">If you have any questions about your account or any other matter, please feel free to contact us at <a href="#" style="color:#71AC05;">info@indiabiztrade.com</a> or by phone at <em style="color:#71AC05;">+91 124 4113661</em>.</span>

	<span style="clear:both"></span>

	

	<span style="clear:both;"></span><br />

	</div>

	<div style="background:#DFDFDF;  width:614px; margin:0 auto;  height:75px;  padding:0% 0.5% 0.5% 0.5%; border-bottom:solid 1px #A9A9A9; border-left:solid 1px #A9A9A9; border-right:solid 1px #A9A9A9">

	<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#8D8D8D; text-align:center; padding:1% 0.5% 0.8% 0%; line-height:19px;">Copyright © 2015. Indiabiz Trade . Any other trademarks or trade names are properties of their respective owners. </span>

	<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#8D8D8D; text-align:center; padding:1% 0.5% 0.8% 0%; line-height:19px;">Indiabiz Trade  | M-23 Sector 14, Gurgaon, India</span>

	</div>';

						$sendemail=$this->common->sendemail($to,$from,$subject,$body);

						$this->uploadSellProductImages($image , 'fileField' , $Insert1);

						$this->data['succ_msg'] = 'Your product will display after 3-4 hrs. Thank you.';



					}



			  }



		 } 



	}



	

	public function uploadSellProductImages($data = array() , $fieldName = 'fileField' , $productId){



		if(count($data) > 0){		 



			foreach($data as $key => $insertimage){					

				$_FILES['fileField'.$key]['name']= $_FILES[$fieldName]['name'][$key];

				$_FILES['fileField'.$key]['type']= $_FILES[$fieldName]['type'][$key];

				$_FILES['fileField'.$key]['tmp_name']= $_FILES[$fieldName]['tmp_name'][$key];

				$_FILES['fileField'.$key]['error']= $_FILES[$fieldName]['error'][$key];

				$_FILES['fileField'.$key]['size']= $_FILES[$fieldName]['size'][$key];

				//pr($_FILES['fileField'.$key]);	

				$name = $insertimage;

				$up_path = 'Document';

				$input_name ='fileField'.$key;

				$image_name = $this->uploadimage($up_path,$input_name,$insertimage);

				if($image_name['error']==true)

				{

					$this->data['error_message']= $image_name['error_type'];

				}

				else

				{

					$insertimagesData = array("product_id" => $productId,"images_name" => $image_name['file_name']);

				    $Insertimages = $this->User->AdduserData('sellproduc_images',$insertimagesData);

				}

									

			}

		}

	}







}