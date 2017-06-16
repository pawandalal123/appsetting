<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class CommonFunc extends MY_AppController {	
	function __construct() {
    	parent::__construct();
	}	
	public function CityList(){



		if (!$this->input->is_ajax_request()) {

		   exit('No direct script access allowed');

		}

            $stateID= $this->input->post('state');

			$cityList = $this->db->select('district,district_id')

							->where('state_id',$stateID)

					 		 ->get('district')								

							 ->result();



			$html = '';



			foreach($cityList as $city){



				$html.='<option value='.$city->district_id.'>'.$city->district.'</option>';



			}	 



			echo $html;			



	     



	}
	public function districList(){



		if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		}



            $districtID= $this->input->post('district');



			$districList = $this->db->select('city,city_id')



							->where('district_id',$districtID)



					 		 ->get('city')								



							 ->result();



			$html = '';



			foreach($districList as $city){



				$html.='<option value='.$city->city_id.'>'.$city->city.'</option>';



			}	 



			echo $html;			



	     



	}
	public function brandDetails(){



		if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		}

            $subcategoryId= $this->input->post('subcatId');

			$brandList = $this->db->where('subcategory',$subcategoryId)

                             ->group_by('brand_id')

					 		 ->get('sellbrands')								

							 ->result();



			$html = '';



			$html='<div class="field1">



                    <label>Type: <span>*</span></label>



                    <div class="select">



                                <select class="brandId"  name="productbrand"  data-bvalidator="required">';



                                foreach($brandList as $brandListDta){



				$html.='<option value='.$brandListDta->brand_id.'>'.$brandListDta->brand_name.'</option>';



			}	



                                 $html.='</select>



                      </div>



                     



                      </div>';



			 



			echo $html;			



	     



	}
	public function brandDetailsmanage(){



		if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		}



            $subcategoryId= $this->input->post('subcatId');



			$brandList = $this->db->where('subcategory',$subcategoryId)



                             ->group_by('brand_id')



					 		 ->get('sellbrands')								



							 ->result();



			



                                foreach($brandList as $brandListDta){



				echo '<option value='.$brandListDta->brand_id.'>'.$brandListDta->brand_name.'</option>';



			}	



                                



			 



				



	     



	}
	public function categorylist(){



		if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		}



            $categoryID= $this->input->post('category');



			$categorylist = $this->db->where('cat_id',$categoryID)



                             ->group_by('subcategory')



					 		 ->get('subcategory')								



							 ->result();



			$html = '';



			foreach($categorylist as $category){



				$html.='<option value='.$category->sub_cat_id.'>'.$category->subcategory.'</option>';



			}	 



			echo $html;			



	     



	}
	public function categorylistsellmange(){



		if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		}



            $categoryID= $this->input->post('category');



			$categorylist = $this->db->where('category',$categoryID)



                             ->group_by('id')



					 		 ->get('categorysell')								



							 ->result();



			



								foreach($categorylist as $category){



				echo  '<option value='.$category->id.'>'.$category->category_name.'</option>';



			}	



                  



	}
	public function categorylistsell(){



		if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		}



            $categoryID= $this->input->post('category');



			$categorylist = $this->db->where('category',$categoryID)



                             ->group_by('id')



					 		 ->get('categorysell')								



							 ->result();



							



			$html = '';



			$html.='<div class="field1">



                    <label>Subcategory: <span>*</span></label>



                    <div class="select">



                                <select class="subcategorysell"  name="subcategorysell"  data-bvalidator="required">



                                <option selected>Select Subcategory</option>';



								foreach($categorylist as $category){



				$html.='<option value='.$category->id.'>'.$category->category_name.'</option>';



			}	



                   $html.='</select>



                     <div id="passwordst"></div>



                      </div> </div>';



					  if($categoryID=='21' || $categoryID=='23' || $categoryID=='22' || $categoryID=='25' || $categoryID=='11' || $categoryID=='17' || $categoryID=='15' || $categoryID=='16' || $categoryID=='14' || $categoryID=='24')



					  {



						  $html.='<div class="brand">



					  </div>



					  <div class="field1">



                    	<label>Add Title: <span>*</span></label>



                        <input id="title" name="title" tabindex="1" class="signUpInputNew" type="text"  data-bvalidator="required"/>



                    </div>



					  



					  <div class="field1">



                    	<label>Price: <span>*</span></label>



                        <input id="price" name="price" tabindex="1" class="signUpInputNew" type="text"  data-bvalidator="maxlength[10],number,required" />



                       </div>



                      



                      <div class="field1"> <div class="field1">



                    	<label>Describe your ads unique:</label>



                        <textarea name="product_description" id="textarea" cols="45" rows="5" class="product_desc"></textarea>



                    </div>



                    



                    <div class="field1">



                    	<label>Seller Information:</label>



                        <p class="fl"><input type="radio" name="radio" id="radio" value="1" data-bvalidator="required"/>An Individual</p>



						<p class="fl"><input type="radio" name="radio" id="radio" value="2" data-bvalidator="required"/>A Professional/Business</p>



                    </div>';



					  }



					  if($categoryID=='18')



					  {



						  $html.='<div class="field1">



                    	<label>Add Title: <span>*</span></label>



                        <input id="title" name="title" tabindex="1" class="signUpInputNew" type="text"  data-bvalidator="required"/>



                    </div><div class="field1">



                    	<label>Position:</label>



                        <p class="fl"><input type="radio" name="radio" id="radio" value="part" />Part Time</p>



						<p class="fl"><input type="radio" name="radio" id="radio" value="full" />Full Time</p>



                     </div>



					 <div class="field1">



                    	<label>Exprience: <span>*</span></label>



                        <div class="select">



                        <select class="expyear" name="expyear" data-bvalidator="required">



                         <option selected="">Select Year</option>';



						 for($i=1; $i<=30; $i++)



						 {



							 $html.='<option selected="" value="'.$i.'">'.$i.'</option>';



						 }



                      $html.='</select>



                 </div>



				 <div class="select">



                        <select class="expMonth" name="expMonth" data-bvalidator="required">



                         <option selected="">Select Month</option>';



						 for($i=0; $i<=11; $i++)



						 {



							 $html.='<option selected="" value="'.$i.'">'.$i.'</option>';



						 }



                      $html.='</select>



                    </div>



                    </div>



					<div class="field1">



                    	<label>Sallery: <span>*</span></label>



                        <input id="Sallery" name="Sallery" tabindex="1" class="signUpInputNew" style="width:200px;" type="text"  data-bvalidator="number,required" />



						<div class="select">



                        <select class="Sallerytype" name="Sallerytype" data-bvalidator="required">



							 <option selected="" value="1">Weekly</option>



							 <option selected="" value="2">Monthly</option>



							 <option selected="" value="3">Yearly</option>



                    </select>



                       </div>



					   <div class="field1">



                    <label>Type: <span>*</span></label>



                    <div class="select">



                                <select class="jobtype"  name="jobtype"  data-bvalidator="required">';                               



							$brand_name = $this->db->where('category',$categoryID)



                             ->group_by('brand_id')



					 		 ->get('sellbrands')								



							 ->result();



								foreach($brand_name as $brand_nameList){



				            $html.='<option value='.$brand_nameList->brand_id.'>'.$brand_nameList->brand_name.'</option>';



			                 }	



                     $html.='</select>



                     <div id="passwordst"></div>



                      </div> </div>



					



					  



                      



                      <div class="field1"> <div class="field1">



                    	<label>Describe your ads unique:</label>



                        <textarea name="product_description" id="textarea" cols="45" rows="5" class="product_desc"></textarea>



                    </div>';



					  }



					  



					  if($categoryID==19)



					  {



						  



						 $html.='<div class="field1">



                    	<label>Furnished:</label>



                        <p class="fl"><input type="radio" name="Furnished" id="radio" value="Yes" />Yes</p>



						<p class="fl"><input type="radio" name="Furnished" id="radio" value="No" />No</p>



                        </div>



					    <div class="field1">



                    	<label>Bedrooms: </label>



                        <div class="select">



                        <select class="Bedrooms" name="Bedrooms" data-bvalidator="required">



                         <option selected="">Select Number</option>';



						 for($i=1; $i<=30; $i++)



						 {



							 $html.='<option selected="" value="'.$i.'">'.$i.'</option>';



						 }



                      $html.='</select>



                 </div>



				 



                    </div>



					<div class="field1">



                    	<label>Bathrooms: </label>



                        <div class="select">



                        <select class="Bathrooms" name="Bathrooms" >



                         <option selected="">Select Year</option>';



						 for($i=1; $i<=30; $i++)



						 {



							 $html.='<option selected="" value="'.$i.'">'.$i.'</option>';



						 }



                      $html.='</select>



                      </div>



				 



                    </div>



					<div class="field1">



                    	<label>Broker Free:</label>



                        <p class="fl"><input type="radio" name="Broker" id="radio" value="Yes" />Yes</p>



						<p class="fl"><input type="radio" name="Broker" id="radio" value="No" />No</p>



                     </div>



					 <div class="field1">



                    	<label>Add Title: <span>*</span></label>



                        <input id="title" name="title" tabindex="1" class="signUpInputNew" type="text"  data-bvalidator="required"/>



                    </div>



					 <div class="field1">



                    	<label>Area:</label>



                        <input id="Area" name="Area" tabindex="1" class="signUpInputNew"  type="text"  data-bvalidator="number,required" />



						



                       </div>



					<div class="field1">



                    	<label>Price: <span>*</span></label>



                        <input id="Price" name="



						" tabindex="1" class="signUpInputNew"  type="text"  data-bvalidator="number,required" />



						



                       </div>



					



                      <div class="field1"> <div class="field1">



                    	<label>Describe your ads unique:</label>



                        <textarea name="product_description" id="textarea" cols="45" rows="5" class="product_desc"></textarea>



                    </div>';



					  



					  }



					  



			 



			echo $html;			



	     



	}
	public function CheckEmail(){



		if (!$this->input->is_ajax_request()) {

		   exit('No direct script access allowed');

		}



            $EmailId= $this->input->post('email');

			$CheckEmail = $this->db->select('email_id')

							->where('email_id',$EmailId)

					 		 ->get('user_signup')	;

							$html='';					

							if($CheckEmail->num_rows() > 0)

							{

		                     $html.=1;

							}

							 else

							 {

							 $html.=0;



							}



			echo $html;			

	}
	public function changePasswordRequest(){



		if (!$this->input->is_ajax_request()) {

		   exit('No direct script access allowed');

		}



            $EmailId= $this->input->post('email');

			$CheckEmail = $this->db->where('email_id',$EmailId)

					 		       ->get('user_signup')	;

							$html='';					

							if($CheckEmail->num_rows() > 0)

							{

							   $userdata=$CheckEmail->row();

							   $where=array("id"=>$userdata->id);

							   $this->load->model('User');

						          $newPass = chr(rand(65,90)).chr(rand(65,90)).rand(89258,28244225);

                                                          $updatedata=array("password"=>md5($newPass));                                                          $Data=array("user"=>$userdata->id,"password"=>$newPass,"pass_change_date"=>date('Y-m-d h:i:s'));



							   $Insert = $this->User->AdduserData('password_regenrate',$Data);

							   $update = $this->User->updateDetails($where,'user_signup',$updatedata);

							   $subject='New Password';

							   $body='<div style="width:600px; margin:0 auto; height:410px; border:solid 1px #A9A9A9; padding:1%;">

<span style="float:left;"><img src="'.WEBROOT_PATH_IMAGES.'logo.png" alt="" title="" width="118" height="111" /></span> 

<div style="float:right; width:50%;">

<span style="float:right; text-align:right; font-family:"Aller",Arial, Helvetica, sans-serif; font-size:16px; padding:10% 0% 0.8% 0.2%; width:80%; color:#000;">Questions?</span>

<span style="float:right; text-align:right; font-family:"Aller",Arial, Helvetica, sans-serif; font-size:20px; padding:0% 0% 0.8% 0.2%; width:100%; color:#78B205;">+91-9818115210</span>

<span style="float:right; text-align:right; font-family:"Aller",Arial, Helvetica, sans-serif; font-size:13px; padding:1% 0% 0.8% 0.2%; width:100%; color:#000;">Mon-Sat: 8am - 10pm <a href="mailto:info@indiabiztrade.com" style="color:#71AC05;">info@indiabiztrade.com</a> </span>

</div>

<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#000; text-align:left; padding:7% 0.5% 0.8% 0%;">Dear '.$userdata->profile_name.',</span>

<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:left; padding:1% 0.5% 0.8% 0%; line-height:19px;">Welcome to Indiabiz Trade (India Largest Market Place). To log in when visiting our site just click <a href="'.SITE_URL.'login'.'" style="color:#71AC05;">Login</a> at the top of every page, and then enter your e-mail address and password.</span>

<span style="float:left; width:100%;">

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:dashed 1px #A9A9A9; padding:1%; margin-top:1%;">

  

  <tr>

    <td><span style="float:left; padding:1% 0.5% 1% 2%; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000;">New Password: <a href="#" style="color:#71AC05;">'.$newPass.'</a></span></td>

  </tr>

</table>

</span>



<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:left; padding:1% 0.5% 0.8% 0%; line-height:19px;">If you have any questions about your account or any other matter, please feel free to contact us at <a href="#" style="color:#71AC05;">info@indiabiztrade.com</a> or by phone at <em style="color:#71AC05;">+91 124 4113661</em>.</span>

<span style="clear:both"></span>



<span style="clear:both;"></span><br />

</div>

<div style="background:#DFDFDF;  width:614px; margin:0 auto;  height:75px;  padding:0% 0.5% 0.5% 0.5%; border-bottom:solid 1px #A9A9A9; border-left:solid 1px #A9A9A9; border-right:solid 1px #A9A9A9">

<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#8D8D8D; text-align:center; padding:1% 0.5% 0.8% 0%; line-height:19px;">Copyright © 2015. Indiabiz Trade . Any other trademarks or trade names are properties of their respective owners. </span>

<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#8D8D8D; text-align:center; padding:1% 0.5% 0.8% 0%; line-height:19px;">Indiabiz Trade  | M-23 Sector 14, Gurgaon, India</span>

</div>';

							   $from='no-reply@indiabiztrade.com';

							   $passwordEmail=$this->common->sendemail($userdata->email_id,$from,$subject,$body);

		                       $html.=1;

							}

							 else

							 {

							 $html.=0;

							 }

			echo $html;			

	}
	public function Checkpassword(){

		if (!$this->input->is_ajax_request()) {

		   exit('No direct script access allowed');

		}



            $userId= $this->input->post('userId');

			$oldpassword= $this->input->post('oldpassword');

			$where=array("id"=>$userId,"password"=>md5($oldpassword));

			$Checkoldpassword = $this->db->select('email_id')

							->where($where)

					 		 ->get('user_signup')	;

							$html='';					

							if($Checkoldpassword->num_rows() > 0)

							{

		                     $html.=0;

							}

							 else

							 {

							 $html.=1;

							}

			echo $html;			

	}
	public function CheckuserLogin(){

		if (!$this->input->is_ajax_request()) {

		   exit('No direct script access allowed');



		}



            $EmailId= $this->input->post('email');

			$CheckEmail = $this->db->where('email_id',$EmailId)

					 		 ->get('user_signup')	;

							$html='';					

							if($CheckEmail->num_rows() > 0)

							{

								$CheckLoginData = $CheckEmail->row();

						       $newdata = array(



                             //  'username'  => 'johndoe',



							   'UserId'=> $CheckLoginData->id,

                               'email'=> $CheckLoginData->email_id,

							   'mobile'=> $CheckLoginData->mobile_no,

							   'emailstatus'=> $CheckLoginData->email_status,

							   'mobilestatus'=> $CheckLoginData->mobile_status,

							   'DisplayName'=> $CheckLoginData->profile_name,

							   'DisplayAddress'=> $CheckLoginData->permanent_address,

                               'logged_in' => TRUE

                                     );

                             $this->session->set_userdata($newdata);

		                     $html.=1;

							}

							 else

							 {

							 $html.=0;

							}

			echo $html;			

	}
	public function AddsendMobile()
	{



			 if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		}



		                  



                          $userData = $this->input->post();



						  $ipaddress=$_SERVER['REMOTE_ADDR'];



						  if ($this->agent->is_browser())



                          {



							  



                               $agent = $this->agent->browser().' '.$this->agent->version();



							   $networkType='Web';



                          }



						  elseif ($this->agent->is_robot())



                          {



							  



                               $agent = $this->agent->robot();



							   $networkType='Web';



                          }



						  elseif($this->agent->is_mobile())



						  {



							  $agent = $this->agent->mobile();



							  $networkType='Mobile';



						  } 



						  else



						  {



							  $agent='Undefine';



							  $networkType='Undefine';



						  }



						  $Data = array('name' => $userData['senedname'],'email' => $userData['email'],'message' => $userData['message'],"mobile"=> $userData['Mobile'],"product_id"=>$userData['id'],"ip_address"=>$ipaddress,"request_from"=>$agent,"network"=>$networkType,"date"=>date('Y-m-d h:i:s'));



						   $this->load->model('User');



		                   $Insert = $this->User->AdduserData('products_enqiry',$Data);



						   $this->load->model('common');



						   $to=$userData['email'];



						   $body=$userData['message'];



						   $from='no-reply@indiabiztrade.com';



						   $subject='Your Enquiry';



						   $sendmail=$this->common->sendemail($to,$from,$subject,$body);



		                   echo 1;



			  



		}
	public function sendtoFreind()
	{



			 if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		}



                          $userData = $this->input->post();



						  $Data = array('email' => $userData['email'],"mobile"=> $userData['Mobile'],"toemail"=> $userData['toemail'],"message"=>$userData['message'],"product_id"=>$userData['id'],"date"=>date('Y-m-d h:i:s'));



						   $this->load->model('User');



		                   $Insert = $this->User->AdduserData('forward_freind',$Data);



		                   echo 1;



			  



		}
	public function newssubscription()
	{
		if (!$this->input->is_ajax_request())
	   {
		   exit('No direct script access allowed');
	   }
                          $userData = $this->input->post();
						  $Data = array('email_id' => $userData['email'],"enrolldate"=>date('Y-m-d h:i:s'));
						   $this->load->model('User');
		                   $Insert = $this->User->AdduserData('tbl_news_subscription',$Data);
		                   echo 1;
		}
	 public function Submitenqiury(){

		if (!$this->input->is_ajax_request()) {

		   exit('No direct script access allowed');

		}

            $Productdata= $this->input->post();
		    $Details=$this->common->ViewProductDetails(false,$Productdata['productid']);
			if($Productdata['type']==1)
			{



				if($Details->product_image!='')



				{



					$path=WEBROOT_PATH_sell.''.$Details->product_image;



					



				}



				else



				{



					$path=WEBROOT_PATH_IMAGES.''.'nophoto2.gif';



				}



			echo ' <div class="modal-header">



               <a href="#" class="close" data-dismiss="modal" onClick="closeDialog ();">&times;</a>



       <h3><img src='.$path.' width="30" height="30px">'.$Details->company_name.'</h3>



					</div>



			 



               <div class="modal-body">



              	<div class="divDialogElements">



               <form>



			   <label for="textfield">Name:</label>



  <input type="text"  name="senedname" id="name"   data-bvalidator="email,required" class="text_f" />



  <br clear="all" />



						  <label for="textfield">E-mail:</label>



  <input type="text"  name="email" id="email"   data-bvalidator="email,required" class="text_f" />



  <br clear="all" />



  <label for="textfield">Mobile:</label>



  <input type="text"  name="Mobile" id="Mobile"   data-bvalidator="email,required" class="text_f" />



  <br clear="all" />



  



  <label for="textfield">Message:</label>



  <textarea name="requirment" id="requirment" cols="45" rows="5"  data-bvalidator="required" style="width: 492px;



height: 80px;"></textarea>



  <br clear="all" />



                        </form>



                           </div>



                   </div>



                   <div class="modal-footer">



                   <input type="hidden" class="for" id='.$Productdata['productid'].' />



					<a href="#" class="btn btn-primary btn-large" onclick="mailsend()" >Submit</a></div>';



	     



	}



	



	if($Productdata['type']==2)



			{



			echo ' <div class="modal-header">



               <a href="#" class="close" data-dismiss="modal" onClick="closeDialog ();">&times;</a>



       <h3><img src='.WEBROOT_PATH_sell.''.$Details->product_image.' width="30" height="30px">'.$Details->company_name.'</h3>



					</div>



			 



              <div class="modal-body">



              	<div class="divDialogElements">



               <form id="form1">



						  <label for="textfield">Your E-mail:</label>



  <input type="text"  name="email" id="email"   data-bvalidator="email,required" class="text_f" />



  <br clear="all" />



  <label for="textfield">Mobile:</label>



  <input type="text"  name="Mobile" id="Mobile"    class="text_f" />



  <br clear="all" />



  <label for="textfield">To Email:</label>



  <input type="text"  name="emailto" id="emailto"   class="text_f" />



  <br clear="all" />



  <label for="textfield">Message:</label>



  <textarea name="Message" id="requirment" cols="45" rows="5"  data-bvalidator="required" style="width: 492px;



height: 80px;"></textarea>



  <br clear="all" />



                        </form>



                           </div>



                   </div>



                   <div class="modal-footer">



                    <input type="hidden" class="for" id='.$Productdata['productid'].' />



					<a href="#" class="btn btn-primary btn-large" onclick="mailsendfreind()"  >Submit</a></div>';



	     



	}



	



	}
	 public function viewdetailslogin(){



		if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		}



			echo ' <div class="loginpopup"><div class="modal-header ">

               <a href="#" class="close" data-dismiss="modal" onClick="closeDialog ();">&times;</a>

                <h3>Please Enter your Login Details</h3>

					</div>

              <div class="modal-body">

              	<div class="divDialogElements">

						  <label for="textfield">E-mail:</label>

  <input type="text"  name="email" id="email"   data-bvalidator="email,required" class="text_f" />

  <br clear="all" />

  <label for="textfield">Password:</label>

  <input type="password"  name="password" id="password"   data-bvalidator="email,required" class="text_f" />

  <br clear="all" />

                           </div>

                   </div>

                   <div class="modal-footer">

				   <a href="#" class="forgetpopshow" >Forget Password</a>

					<a href="#" class="btn btn-primary btn-large" onclick="checklogin()" >Submit</a></div></div>

					<div class="forgetpasspopup" style="display:none;">

					<div class="modal-header"  >

               <a href="#" class="close" data-dismiss="modal" onClick="closeDialog ();">&times;</a>

                <h3>Genrate New Password</h3>

					</div>

              <div class="modal-body">

              	<div class="divDialogElements">

						  <label for="textfield">E-mail:</label>

  <input type="text"  name="email" id="emailforgetpass"  data-bvalidator="email,required" class="text_f signUpInputNew" /><div id="emailresonse" style="display:none;"></div><div id="emailre" style="display:none;"></div>

  <br clear="all" />



                           </div>

                   </div>

                   <div class="modal-footer">

				   <a href="#" class="loginpopupshow" >Login</a>

					<a href="#" class="btn btn-primary btn-large passwordregenrate" >Genrate Password</a></div></div>';



	}
	 public function suggestions(){
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
            $categoryID= $this->input->get('term');
			$searchFeild= $this->input->get('search_field');
			if($searchFeild=='Products')
			{
				
    		/*$where="category like '".$categoryID."%'";
			$this->db->select('category as data');
            $query1 = $this->db->where($where)
			                   ->order_by('category','asc')
			                  ->get('tbl_category')
			                  ->result();
			$where1="subcategory like '".$categoryID."%'";
			$this->db->select('subcategory as data');
			$query2 = $this->db->where($where1)
                                    ->group_by('sub_cat_id')
								    ->order_by('subcategory','asc')
					 	            ->get('subcategory')								
							 ->result();
*/
		    $where2="company_name like '".$categoryID."%'";
			$this->db->select('company_name as data');
			$query3 = $this->db->where($where2)
								->limit(10) 
								->group_by('company_name')       
					 	        ->get('tbl_company_details')								
							    ->result();
	
			$where3="bussiness_nature like '".$categoryID."%'";
			$this->db->select('bussiness_nature as data');
			$query4 = $this->db->where($where3)
								->limit(10)
								->group_by('bussiness_nature')
					 	        ->get('tbl_product_details')								
							 	->result();
			
				
			
						 
			$query = array_merge($query3,$query4);
			foreach($query as $category)
			{
				 $data[] = array('label' => $category->data,
                                 'value' => $category->data);
			}	
			}

			elseif($searchFeild=='BuyLeads')
			{

			$where="subcategory like '%".$categoryID."%'";
			$this->db->select('subcategory as data');
			$categorylist = $this->db->where($where)
                             ->group_by('sub_cat_id')
					 		 ->get('subcategory')								
							 ->result();
			$where2="company_name like '%".$categoryID."%'";
			$this->db->select('company_name as data');
			$query2 = $this->db->where($where2)
                                    ->group_by('company_id')
					 	            ->get('tbl_company_details')								
							        ->result();				 

			$query = array_merge($categorylist, $query2);				 
			foreach($query as $category)
			{
				$data[] = array('label' => $category->data,
				                'value' => $category->data);

			}	
			}

			elseif($searchFeild=='Suppliers')
			{

			$where="category_name like '%".$categoryID."%'";
			$categorylist = $this->db->where($where)
                             ->group_by('id')
					 		 ->get('categorysell')								
							 ->result();
			foreach($categorylist as $category){
				 $data[] = array('label' => $category->category_name,
                                 'value' => $category->category_name);
			}	
			}
    		else
			{
				$where1="subcategory like '".$categoryID."%'";
			    $this->db->select('subcategory,sub_cat_id,category.cat_id');
		    	$query2 = $this->db->join('category' , 'category.cat_id=subcategory.cat_id','inner')
			                       ->where($where1)
                                   ->group_by('sub_cat_id')
					 	           ->get('subcategory')								
							        ->result();
			foreach($query2 as $category){

				 $data[] = array('label' => $category->subcategory,
                                 'value' => $category->subcategory,
								 'subcat' => $category->sub_cat_id,
								 'catId' => $category->cat_id);
			}					  
			}


		//	echo $this->db->last_query();

			echo json_encode($data);
             flush();		

	}


	   public function categorylistOnLode(){



		  if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		 }

            $categoryID= $this->input->post('LastId');

			if($categoryID!='')

			{



		    $where='cat_id > "'.$categoryID.'" ORDER BY cat_id asc LIMIT 10';

			$categorylist = $this->db->where($where)

					 		 ->get('category')								

							 ->result();

		//  echo $this->db->last_query();

		  foreach($categorylist as $allcatgeroy){  ?> 

<li  class="as_country_container" id="<?php echo $allcatgeroy->cat_id; ?>"><a href="<?php echo SITE_URL;?>catlist/<?php  echo str_replace(' ','-',$allcatgeroy->alternate_category).'/'.$allcatgeroy->cat_id;?>"><?php  echo $allcatgeroy->category;?></a></li>



     <?php  



	     $last_id=$allcatgeroy->cat_id; } 



			



			}



	



	}



	



	 public function productOnLode(){



		  if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		 }



            $ProductIdID= $this->input->post('LastId');



			$Ctaid= $this->input->post('CatId');



			if($ProductIdID!='')



			{



		    $where='product_id > "'.$ProductIdID.'" and category="'.$Ctaid.'" ORDER BY product_id asc LIMIT 10';



			$Productlist = $this->db->join('company_details' , 'company_details.company_id=product_details.company_id','inner')



		                               ->join('user_signup' , 'user_signup.id=company_details.user_id','inner')



                                       ->where($where)



									  



					 		 ->get('product_details')								



							 ->result();



							 



	//	  echo $this->db->last_query();



		  foreach($Productlist as $ProductlistData){  ?> 



<div class="info_list" id="<?php echo $ProductlistData->product_id ?>">



            	<h3><a href="<?php echo SITE_URL;?>user/mycatalog/home/<?PHP echo str_replace(' ','-',$ProductlistData->company_name).'/'.$ProductlistData->product_id;?>"><?php echo $ProductlistData->company_name;?></a></h3>



                <div class="info_list_box clearfix">



                	<div class="info_img">



                    <?php



if($ProductlistData->product_image!='')



{



	$path=WEBROOT_PATH_sell.''.$ProductlistData->product_image;



}



else



{



	$path=WEBROOT_PATH_IMAGES.''.'nophoto2.gif';



}



?>



                    <img src="<?php echo $path;?>"><a href="#" class="zoom" onClick="document.getElementById('fade<?php echo $ProductlistData->product_id ?>').style.display = 'block';document.getElementById('lightpec<?php echo $ProductlistData->product_id ?>').style.display = 'block';"><img src="<?php echo WEBROOT_PATH_IMAGES;?>zoom.png"></a></div>



                    <div class="info_details">



                    	<ul class="info_contact">



                        <li class="info_name"><a href="<?php echo SITE_URL;?>category/viewdetails/<?PHP echo str_replace(' ','-',$ProductlistData->bussiness_nature).'/'.$ProductlistData->product_id;?>"><?php echo $ProductlistData->bussiness_nature;?></a></li>



                        <li class="info_name"><?php echo $ProductlistData->contect_person;?></li>



                         <?php



						if($ProductlistData->mobile_no!='')



						{



							echo '<li class="info_mobile">+91-'.$ProductlistData->mobile_no.'</li>';



						}



						if($ProductlistData->wesite!='')



						{



							echo '<li class="info_web">+91-'.$ProductlistData->wesite.'</li>';



						}



						?>



                        <li class="info_email"><?php echo $ProductlistData->email_id;?></li>



                        <li class="info_add"><?php echo $ProductlistData->state.','.$ProductlistData->distric;?></li>



                        </ul>



                    </div>



                    



                    <div class="info_sendto">



                    	<ul class="sendto_list">



                        <li class="sendto_email"><a href="#" class="send_to_email" id="<?php echo $ProductlistData->product_id ?>/1">SMS/Email Me</a></li>



                        <li class="send_enquiry"><a href="#" title="Forward to Friends" class="send_to_email" id="<?php echo $ProductlistData->product_id ?>/2">Forward</a></li>



                        <li class="write_review"><a href="<?php echo SITE_URL;?>category/viewdetails/<?PHP echo str_replace(' ','-',$ProductlistData->company_name).'/'.$ProductlistData->product_id;?>">View Details</a></li>



                        <li class="write_review"><div class="fb-like" data-href="<?php echo SITE_URL;?>/category/viewdetails/<?PHP echo str_replace(' ','-',$ProductlistData->company_name).'/'.$ProductlistData->product_id;?>" data-width="700px" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div></li>



                        </ul>



                    </div>



                </div>



            </div>



            <div id="fade<?php echo $ProductlistData->product_id ?>" class="black_overlay" onClick="document.getElementById('fade<?php echo $ProductlistData->product_id; ?>').style.display = 'none';document.getElementById('lightpec<?php echo $ProductlistData->product_id ?>').style.display = 'none';"></div>



            <div id="lightpec<?php echo $ProductlistData->product_id ?>" class="popup_box clearfix">



<div class="popup_hdr clearfix">



<div class="close_b1"><a id="close" onClick="document.getElementById('fade<?php echo $ProductlistData->product_id ?>').style.display = 'none';document.getElementById('lightpec<?php echo $ProductlistData->product_id; ?>').style.display = 'none';">X</a></div>



  <div class="hdg1"><?php echo $ProductlistData->company_name.' ('.$ProductlistData->bussiness_nature.')';?></div>



                          <div class="date_time pdg_l">



                                <span class="fa-clock-o fa"></span>



                                <span class="time-info">Membere Since:<?php echo date("F j, Y",strtotime($ProductlistData->join_date));?></span>



                                <span class="fa-map-marker fa"></span>



                                <span class="place-info"> <?php echo $ProductlistData->state.','.$ProductlistData->distric;?></span>



                            </div>



  </div>



  



  



  



<div class="inr_box">



<div class="popup_gallery">



<?php



if($ProductlistData->product_image!='')



{



	$path=WEBROOT_PATH_sell.''.$ProductlistData->product_image;



}



else



{



	$path=WEBROOT_PATH_IMAGES.''.'nophoto2.gif';



}



?>



<img src="<?php echo $path;?>" style="height:350px; width:350px;"></div>







<div class="popup_enquiry">



<h3 class="h3_p">Send Email Enquiry</h3>



<textarea name="textarea" id="requirment" cols="45" rows="5" class="texta_w"></textarea>



<input type="text" class="inp_w" placeholder="Entere Name" id="senedname" />



<input type="text" class="inp_w" placeholder="Enter Email" id="email" />



<input type="text" class="inp_w" placeholder="Enter Mobile" id="Mobile" />



<input type="button" class="btn btn-blue" name="button" id="button" value="Send Enquiry"  onclick="mailsend()" />



<?php /*?><?php



if($this->session->userdata('Userid')!='')



{ 



?>



<div class="contact_info">



<h3>Your Contact Information:</h3>



Mr. Pawan Dalal (pawan.dalal123@gmail.com)<br>



Way2012 (Delhi, India)<br>



Mobile: +(91)-9999102918<br>



</div>



<?php



}



?><?php */?>



</div>







</div>















</div>



     <?php  



	                     } 



			



			}



	



	}



	



	 public function productsubcatOnLode(){



		  if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		 }



            $ProductIdID= $this->input->post('LastId');



			$SubCtaid= $this->input->post('subcatId');



			if($ProductIdID!='')



			{



		    $where='product_id > "'.$ProductIdID.'" and sub_category="'.$SubCtaid.'" ORDER BY product_id asc LIMIT 10';



			$Productlist = $this->db->join('company_details' , 'company_details.company_id=product_details.company_id','inner')



		                               ->join('user_signup' , 'user_signup.id=company_details.user_id','inner')



			                  ->where($where)



					 		 ->get('product_details')								



							 ->result();



							 



		 // echo $this->db->last_query();



		  foreach($Productlist as $ProductlistData){







		  		  $stateNameData=$this->common->stateDisplayName($ProductlistData->state);



	    		  $districtNameData=$this->common->districtDisplayName($ProductlistData->distric);



				  



			  if($ProductlistData->product_image!='')



{



	$path=WEBROOT_PATH_sell.''.$ProductlistData->product_image;







}



else



{



	$path=WEBROOT_PATH_IMAGES.''.'nophoto2.gif';



}



			  ?> 



<div class="info_list" id="<?php echo $ProductlistData->product_id ?>">



            	<h3><a href="<?php echo SITE_URL;?>category/viewdetails/<?PHP echo str_replace(' ','-',$ProductlistData->company_name).'/'.$ProductlistData->product_id;?>"><?php echo $ProductlistData->company_name;?></a></h3>



                <div class="info_list_box clearfix">



                	<div class="info_img"><img src="<?php echo $path;?>" class="info_img2"><a href="#" class="zoom" onClick="document.getElementById('fade<?php echo $ProductlistData->product_id ?>').style.display = 'block';document.getElementById('lightpec<?php echo $ProductlistData->product_id ?>').style.display = 'block';"><img src="<?php echo WEBROOT_PATH_IMAGES;?>zoom.png"></a></div>



                    <div class="info_details">



                    	<ul class="info_contact">



                        <li class="info_name"><?php echo $ProductlistData->contect_person;?></li>



                        <li class="info_mobile">+91-<?php echo $ProductlistData->mobile_no;?></li>



                        <li class="info_web"><?php echo $ProductlistData->wesite;?></li>



                        <li class="info_email"><?php echo $ProductlistData->email_id;?></li>



                        <li class="info_add"><?php echo $stateNameData->state.','.$districtNameData->district;?></li>



                        </ul>



                    </div>



                    



                    <div class="info_sendto">



                    	<ul class="sendto_list">



                        <li class="sendto_email"><a href="#" class="send_to_email" id="<?php echo $ProductlistData->product_id ?>/1">SMS/Email Me</a></li>



                        <li class="send_enquiry"><a href="#" title="Forward to Friends" class="send_to_email" id="<?php echo $ProductlistData->product_id ?>/2">Forward </a></li>



                        <li class="write_review"><a href="<?php echo SITE_URL;?>category/viewdetails/<?PHP echo str_replace(' ','-',$ProductlistData->company_name).'/'.$ProductlistData->product_id;?>">View Details</a></li>



                        <li class="write_review"><div class="fb-like" data-href="<?php echo SITE_URL;?>/category/viewdetails/<?PHP echo str_replace(' ','-',$ProductlistData->company_name).'/'.$ProductlistData->product_id;?>" data-width="700px" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div></li>



                        </ul>



                    </div>



                </div>



                



                <div id="fade<?php echo $ProductlistData->product_id ?>" class="black_overlay" onClick="document.getElementById('fade<?php echo $ProductlistData->product_id; ?>').style.display = 'none';document.getElementById('lightpec<?php echo $ProductlistData->product_id ?>').style.display = 'none';">



            </div>



            <div id="lightpec<?php echo $ProductlistData->product_id ?>" class="popup_box clearfix">



<div class="popup_hdr clearfix">



<div class="close_b1"><a id="close" onClick="document.getElementById('fade<?php echo $ProductlistData->product_id; ?>').style.display = 'none';document.getElementById('lightpec<?php echo $ProductlistData->product_id ?>').style.display = 'none';">X</a></div>



  <div class="hdg1"><?php echo $ProductlistData->company_name.' ('.$ProductlistData->bussiness_nature.')';?></div>



                          <div class="date_time pdg_l">



                                <span class="fa-clock-o fa"></span>



                                <span class="time-info">Membere Since:<?php echo date("F j, Y",strtotime($ProductlistData->join_date));?></span>



                                <span class="fa-map-marker fa"></span>



                                <span class="place-info"> <?php echo $ProductlistData->state.','.$ProductlistData->distric;?></span>



                            </div>



  </div>



  



  



  



<div class="inr_box">



<div class="popup_gallery">







	



	<img src="<?php echo $path;?>" style="height:350px; width:350px;">



   







</div>







<div class="popup_enquiry">



<h3 class="h3_p">Send Email Enquiry</h3>



<textarea name="textarea" id="requirment" cols="45" rows="5" class="texta_w"></textarea>



<input type="text" class="inp_w" placeholder="Entere Name" id="senedname" />



<input type="text" class="inp_w" placeholder="Enter Email" id="email" />



<input type="text" class="inp_w" placeholder="Enter Mobile" id="Mobile" />



<input type="button" class="btn btn-blue" name="button" id="button" value="Send Enquiry"  onclick="mailsend()" />



<?php



if($this->session->userdata('Userid')!='')



{ 



?>

<!--

<div class="contact_info">



<h3>Your Contact Information:</h3>



Mr. Pawan Dalal (pawan.dalal123@gmail.com)<br>



Way2012 (Delhi, India)<br>



Mobile: +(91)-9999102918<br>



</div>

-->

<?php



}



?>



</div>







</div>















</div>



            </div>



     <?php  



	                     } 



			



			}



	



	}



	



	public function searchproductOnLode(){
		  if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		 }
            $ProductIdID= $this->input->post('LastId');
			$searchfeild= $this->input->post('searchon');



			if($ProductIdID!='')



			{



		      $where="tbl_product_details.product_id > $ProductIdID and (`tbl_category`.`category` like '".$searchfeild."' or tbl_subcategory.subcategory like '%".$searchfeild."%' or company_name like '%".$searchfeild."%' or bussiness_nature like '%".$searchfeild."%' ) order by tbl_product_details.product_id asc limit 10 ";



			     $SearchProductDetails =$this->db->join('company_details' , 'company_details.company_id=product_details.company_id','inner')



				                 ->join('category' , 'category.cat_id=product_details.category','left')



			                     ->join('subcategory' , 'subcategory.sub_cat_id=product_details.sub_category','left')



								 ->where($where)



		                         ->get('product_details');



				 					$searchListingData = $SearchProductDetails->result();



							 



	   // echo $this->db->last_query();



		  foreach($searchListingData as $dataList)



			{ 



			if($dataList->product_image!='')



{



	$path=WEBROOT_PATH_sell.''.$dataList->product_image;







}



else



{



	$path=WEBROOT_PATH_IMAGES.''.'nophoto2.gif';



}



			



			?>



          <div class="supply_list1 clearfix" id="<?php echo $dataList->product_id; ?>">



            	<div class="supply_img"><a href="<?php echo SITE_URL;?>category/viewdetails/<?PHP echo str_replace(' ','-',$dataList->company_name).'/'.$dataList->product_id;?>"><img src="<?php echo $path;?>"></a></div>



                <div class="supply_desc">



                	<h3><a href="<?php echo SITE_URL;?>category/viewdetails/<?PHP echo str_replace(' ','-',$dataList->company_name).'/'.$dataList->product_id;?>"><?php echo $dataList->bussiness_nature	;?></a></h3>



                   <p> <?php echo $dataList->company_name;?> <a href="<?php echo SITE_URL;?>category/viewdetails/<?PHP echo str_replace(' ','-',$dataList->company_name).'/'.$dataList->product_id;?>">more...</a></p>



                   <ul class="contact_list">



                   <li class="address"><?php echo $dataList->wesite	;?></li>



                   <li class="email"><?php



				   $DetailsDta= $this->common->ViewProductDetails(FALSE,$dataList->product_id);



				    echo $DetailsDta->email_id	;?></li>



                   <li class="website"><?php echo $dataList->wesite	;?></li>



                   <li class="phone"><?php echo $DetailsDta->mobile_no	;?></li>



                  </ul>



                   <a href="#"  class="send_to_email gre_btn" id="<?php echo $dataList->product_id; ?>/1">Send Enquiry</a>



                </div>



          </div>



          



            <?php } 



			



			}



	



	}



	



	public function searchproductOnLodeall(){



		  if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		 }



            $ProductIdID= $this->input->post('LastId');



			$searchfeild= $this->input->post('searchon');



			if($ProductIdID!='')



			{



		      $where="tbl_product_details.product_id > $ProductIdID and (`tbl_category`.`category` like '%".$searchfeild."%' or tbl_subcategory.subcategory like '%".$searchfeild."%' or company_name like '%".$searchfeild."%' ) order by tbl_product_details.product_id asc limit 1 ";



			     $SearchProductDetails =$this->db->join('category' , 'category.cat_id=product_details.category','left')



			                     ->join('subcategory' , 'subcategory.sub_cat_id=product_details.sub_category','left')



								 ->where($where)



		                         ->get('product_details');



				 					$searchListingData = $SearchProductDetails->result();



							 



	   // echo $this->db->last_query();



		  foreach($searchListingData as $dataList)



			{ ?>



          <div class="supply_list1 clearfix" id="<?php echo $dataList->product_id; ?>">



            	<div class="supply_img"><a href="<?php echo SITE_URL;?>category/viewdetails/<?PHP echo str_replace(' ','-',$dataList->company_name).'/'.$dataList->product_id;?>"><img src="<?php echo WEBROOT_PATH_sell.''.$dataList->product_image;?>"></a></div>



                <div class="supply_desc">



                	<h3><a href="<?php echo SITE_URL;?>category/viewdetails/<?PHP echo str_replace(' ','-',$dataList->company_name).'/'.$dataList->product_id;?>"><?php echo $dataList->company_name	;?></a></h3>



                   <p> <?php echo $dataList->company_name;?> <a href="<?php echo SITE_URL;?>category/viewdetails/<?PHP echo str_replace(' ','-',$dataList->company_name).'/'.$dataList->product_id;?>">more...</a></p>



                   <ul class="contact_list">



                   <li class="address"><?php echo $dataList->wesite	;?></li>



                   <li class="email"><?php



				   $DetailsDta= $this->common->ViewProductDetails(FALSE,$dataList->product_id);



				    echo $DetailsDta->email_id	;?></li>



                   <li class="website"><?php echo $dataList->wesite	;?></li>



                   <li class="phone"><?php echo $DetailsDta->mobile_no	;?></li>



                  </ul>



                   <a href="#"  class="send_to_email gre_btn" id="<?php echo $dataList->product_id; ?>/1">Send Enquiry</a>



                </div>



          </div>



          



            <?php } 



			



			}



	



	}



	



	



	  public function LeadDataOnloade(){



		  if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		 }



            $LeadId= $this->input->post('LastId');



			if($LeadId!='')



			{



		    $where='lead_id > "'.$LeadId.'" ORDER BY lead_id asc LIMIT 10';



			$Dtatadisplay = $this->db->where($where)



					 		 ->get('buy_leads')								



							 ->result();



							 



	 // echo $this->db->last_query();



		  foreach($Dtatadisplay as $Dtatadisplay){  ?> 



<div class="ltest_buy_lead clearfix" id="<?php echo $Dtatadisplay->lead_id;?>">



          <h3><a href="<?php echo SITE_URL?>/buylead/viewdetails/<?php echo str_replace(' ','-',$Dtatadisplay->product_name).'/'.$Dtatadisplay->lead_id;?>"><?php echo $Dtatadisplay->product_name;?></a> <span class="verified_img2">Verified & Updated</span></h3>



			<div class="list_txt fl"><p><?php echo substr($Dtatadisplay->requirment,0,150);?> <a href="<?php echo SITE_URL?>/buylead/viewdetails/<?php echo str_replace(' ','-',$Dtatadisplay->product_name).'/'.$Dtatadisplay->lead_id;?>">more...</a></p>



<p>Quantity Needed <?php echo $Dtatadisplay->quantity; ?></p>







<div class="updated">



<p class="fl"><img src="<?php echo WEBROOT_PATH_IMAGES?>location.png" class="fl"><strong>Location:</strong> India</p>



<p class="fr">Updated: <?php echo date("F j, Y",strtotime($Dtatadisplay->date));?></p>



</div>







</div>







</div>



     <?php  



	      } 



			



			}



	



	}



	



	



	public function emailVerification(){



		if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		}



			echo ' <div class="modal-header">



               <a href="#" class="close" data-dismiss="modal" onClick="closeDialog ();">&times;</a>



       <h3>Please Enter Verification Code Send On Your Email</h3>



					</div>



              <div class="modal-body">



              	<div class="divDialogElements">



               <form id="form1">



						  <label for="textfield">Enter Code:</label>



  <input type="text"  name="emailcode" id="emailcode"   data-bvalidator="email,required" class="text_f" />



  <br clear="all" />



                          </form>



                           </div>



                   </div>



                   <div class="modal-footer">



					<a href="#" class="btn btn-primary btn-large">Submit</a></div>';



	}



	



	public function sellereDetails(){



		if (!$this->input->is_ajax_request()) {



			



		   exit('No direct script access allowed');



		}



		 $LeadId= $this->input->post('leadId');



		 $this->load->model('common');



		 $this->load->model('User');



		 $condition=array("user_id"=>$this->session->userdata('UserId'));



		 $condition1=array("user_id"=>$this->session->userdata('UserId'),"lead_id"=>$LeadId);



		 $leadExits=$this->common->Checkuserlead($condition1);



		 if($leadExits>0)



		 {



		 }



		 else



		 {



		 $insertData=array("user_id"=>$this->session->userdata('UserId'),"lead_id"=>$LeadId,"total_amount"=>'15',"on_time"=>date('Y-m-d h:i:s'));



		 $Insert = $this->User->AdduserData('user_leads_history',$insertData);



		 $checkCredits=$this->common->CheckuserCredits($condition);



		 $updateData=array("remaining"=>$checkCredits->remaining-15);



		 $update=$this->User->updateDetails($condition,'tbl_user_credits',$updateData);



		 }



		 $leadDataDisplay= $this->common->ViewLeadProductDetails(false,$LeadId);



		 $condition=array('cat_id'=>$leadDataDisplay->category);



		 $condition1=array('sub_cat_id'=>$leadDataDisplay->subcategory);



		 $CategoryName=$this->common->CategoryName($condition);



		 $SubCategoryNameDisplay=$this->common->SubCategoryNameDisplay($condition1);



			echo ' <div class="modal-header">



       <h3>View The Details Of '.$leadDataDisplay->product_name.'</h3>



					</div>



                            <div class="modal-body">



                        	<div class="divDialogElements">



                            <div class="buy_lead1 pd clearfix" id="3">



                        	<div class="buy_lead_left">



                        	<h3>'.$SubCategoryNameDisplay->subcategory.'</h3>



                            <p><strong>Listed In: '.$CategoryName->category.' </strong><br>



                            <strong>Quantity:'.$leadDataDisplay->quantity.'</strong><br>



                            '.$leadDataDisplay->product_name.'</p>



<p><strong>Additional Information Provided by Buyer</strong><br>



'.$leadDataDisplay->requirment.'</p>



                        </div>



                        <div class="buy_lead_divider"><img src="'.WEBROOT_PATH_IMAGES.'divider-shadow.png"></div>



                        <div class="buy_lead_right">



                        <img src="'.WEBROOT_PATH_IMAGES.'verified-sticker.png" class="verified_strip">



<ul class="liststyle fs12">



                        <li class="calender">'.date("F j, Y",strtotime($leadDataDisplay->date)).'</li>



                            <li class="in_flag">'.$leadDataDisplay->state.','.$leadDataDisplay->distric.','.$leadDataDisplay->city.'</li>



                            </ul>



                            <ul class="liststyle fs12">



							<li>Contect:'.$leadDataDisplay->contect_person.'</li>



                            <li>Mobile : +(91)-'.$leadDataDisplay->mobile_no.'</li>



                            <li>Email :'.$leadDataDisplay->email_id.'</li>



                            </ul>



                            <h2><span>Price:</span> 15 Credits Only</h2>



                        </div>                        



                        



                  </div>



                           </div>



                   </div>



                   <div class="modal-footer">



					<a href="#" class="btn btn-primary btn-large close"  data-dismiss="modal" onClick="closeDialog ();">Close</a></div>';



	}



	



	public function MobilelVerification(){



		if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		}



		 $userID= $this->input->post('userId');



		 $where="user_id ='".$userID."'";



		 $Dtatadisplay = $this->db->where($where)



					 		 ->get('verification_code')	;



		$html='';



							 



		$html.='<div class="modal-header">



               <a href="#" class="close" data-dismiss="modal" onClick="closeDialog ();">&times;</a>



       <h3>Please Enter Verification Code Send On Mobile</h3>



					</div>



              <div class="modal-body">



              	<div class="divDialogElements">';



							 



		 if($Dtatadisplay->num_rows()>0)



		 {



		 



			$html.='



               <form id="form1">



			   <div style="display:block" id="ver_pend_mob" class="mobile_v mt5 dbg bnr lh"><strong>Your Mobile Number is not yet verified. Please enter the verification code sent on your Mobile Number.</strong>



			   <br><b>Enter Verification Code</b>&nbsp;&nbsp;&nbsp;



			   <input type="text" style="width: 70px; height: 12px; border: 1px solid rgb(177, 151, 121); padding: 4px;" class="lh" id="mobauth">       &nbsp;&nbsp;&nbsp;



                          </form></div>



                   </div>



                   <div class="modal-footer">



				   <span>Did not receive code? <a href="">Click here to resend</a>&nbsp;&nbsp;<input type="button" value="Verify" id="ver_but" name="ver_but"  class="btn btn-primary btn-large">';



					



	}



	else



	{



		   $this->load->model('User');



		   $codeNumber=rand(10000,999999999);



		   $VerificationData = array('user_id' =>  $userID,'code_for' =>'Mobile','codenumber'=>$codeNumber,'date'=>date('Y-m-d h:i:s'));



		   $Insert = $this->User->AdduserData('verification_code',$VerificationData);



	       $html.=' <form id="form1">



			  						  <label for="textfield">Enter Code:</label>



  <input type="text"  name="emailcode" id="emailcode"   data-bvalidator="email,required" class="text_f" />



  <br clear="all" />



                          </form></div>



                   </div>



                   <div class="modal-footer">



				 					<a href="#" class="btn btn-primary btn-large">Submit</a></div>';



	}



                         echo $html;



	}



	



	



	public function suggestionscontect(){



		if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		}



            $ID= $this->input->get('term');



			$searchFeild= $this->input->get('search_field');



			if($searchFeild=='state')



			{



				



			$where="state like '%".$ID."%'";



	        $query1 = $this->db->where($where)



			                  ->get('tbl_location')



			                  ->result();



	



			foreach($query1 as $statelist){



				



				              $data[] = array('label' => $statelist->state,



                              'value' => $statelist->state);



			}	



			}



			elseif($searchFeild=='pincode')



			{



			$where="zip like '%".$ID."%'";



			$ziplist = $this->db->where($where)



                             ->group_by('zip')



					 		 ->get('zipcode')								



							 ->result();



			foreach($ziplist as $ziplistdata){



				



				              $data[] = array('label' => $ziplistdata->zip,



                              'value' => $ziplistdata->zip);



			}	



			}



	



			else



			{



				



			$where="district like '%".$ID."%'";



			$statelist = $this->db->select('district as data')



		                   	->where($where)



                             ->group_by('district')



					 		 ->get('tbl_location')								



							 ->result();



							 



			$where1="city like '%".$ID."%'";



			$citylist = $this->db->select('city as data')



			                  ->where($where1)



                             ->group_by('city')



					 		 ->get('tbl_location')								



							 ->result();



							



			$listdata=array_merge($statelist,$citylist);



			foreach($listdata as $listdatalocation){



				 $data[] = array('label' => $listdatalocation->data,



                              'value' => $listdatalocation->data);



			}	



			}



		//	echo $this->db->last_query();



			echo json_encode($data);



             flush();		



	     



	}



	public function bussinessDetails(){



		if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		}



		 $companyId= $this->input->post('company');



		 $type= $this->input->post('type');



		 $this->load->model('common');



		 $condition=array("company_id"=>$companyId);



         $conditionAnother=array("tbl_company_details.company_id"=>$companyId);



         $companyDetails = $this->common->companyDetails($condition);



		 $incomData=$this->common->income();



		 $bussinessTypeData=$this->common->bussinessType();



		 $ownershipTypeData=$this->common->ownershipType();



		 $companybussinessdetailsData=$this->common->companybussinessdetails($condition);



		 



		 if($type=='Bussiness_Contect')



		 {



		?>        



                        <div class="cdfield">



                        <input type="hidden" name="company_id" value="<?php echo $companyId?>"/>



                        <label>Company Logo</label>



                        <div class="cp_imgbox">



                        <div class="con_pro_m">



                        <fieldset>



                        <div  id="imgstore">



                        <?php



						if($companyDetails->copmnay_logo=='')



						{



							?>



							 <img id="target" src="<?php echo WEBROOT_PATH_IMAGES;?>nophoto2.gif" alt="your image" />



                             <?php



						}



						else



						{



						?>



                        <img id="target" src="<?php echo WEBROOT_PATH_sell.$companyDetails->copmnay_logo;?>" alt="your image" />



                        <?php



						}



						?>



                        </div>



                        </fieldset>



                         <div class="uplod_t"><a>Upload a Photo</a></div>



                         <input type='file' name="logo" id="imgInp" />



                        </div>



                        </div>



                        </div>



                        <div class="clear"></div>



                        <div class="cdfield">



               	    <label>IndiaBizSaath Catalog</label>



                    <div><?PHP echo SITE_URL.'user/mycatalog/home'.'/'.$companyDetails->company_name.'/'.$companyDetails->company_id;?></div>



                    </div>



                    



                    <div class="cdfield">



               	    <label>Alternate Website</label>



                        <input id="website" name="website" value="<?php echo  $companyDetails->website;?>" tabindex="1" class="wdt2" type="text"  />



                    </div>



                        



                  <div class="cdfield3 clearfix">



                    <label>Business Type</label>



                    <div class="cdfield_r">



                    <?php 



					foreach($bussinessTypeData as $bussinessTypeData)



					{



					?>



                    <div class="field_ct">



                    <input name="" type="checkbox" value="">



                    <label><?php echo $bussinessTypeData->bussiness_name;?></label>



                    </div>



                    <?php } ?>



                    </div>



                    </div>



                    <div class="cdfield">



                	<label>Year Of Establish:</label>



                    <input id="establish" name="establish" tabindex="1" class="wdt2" type="text" value="<?php echo $companybussinessdetailsData->year_of_start?>" />                    </div>



                  



                    <div class="cdfield">



               	    <label>No. of Employees</label>



                        <select name="Employees" class="wdt2" tabindex="1">



		<option value="" selected="selected">---Choose One---</option>



        <?php



		for($i=1; $i<=150; $i++)



		{



			if($companybussinessdetailsData->employess==$i)



			{



				echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';



			}



			else



			{



			echo '<option value="'.$i.'">'.$i.'</option>';



			}



		}



		



		?>



        </select>



                    </div>



                    <div class="cdfield">



               	    <label>Revenue Sales Turnover</label>



                        <select name="Turnover" class="wdt2" tabindex="1">



		<option value="" selected="selected">---Choose One---</option>



        <?php



		foreach($incomData as $incomData)



		{



			if($companybussinessdetailsData->tarnover==$incomData->income_id)



			{



				echo '<option value="'.$incomData->income_id.'" selected="selected">'.$incomData->incme_name.'</option>';



			}



			else



			{



			echo '<option value="'.$incomData->income_id.'">'.$incomData->incme_name.'</option>';



			}



		}



		?>



        </select>



                    </div>



                    <div class="cdfield">



               	    <label>Ownership Type</label>



                        <select name="Ownership" class="wdt2" tabindex="1">



		<option value="" selected="selected">---Choose One---</option>



         <?php



		foreach($ownershipTypeData as $ownershipTypeData)



		{



			if($companybussinessdetailsData->ownership==$ownershipTypeData->ownership_id)



			{



				echo '<option value="'.$ownershipTypeData->ownership_id.'" selected="selected">'.$ownershipTypeData->ownershipname.'</option>';



			}



			else



			{



			echo '<option value="'.$ownershipTypeData->ownership_id.'">'.$ownershipTypeData->ownershipname.'</option>';



			}



			



		}



		?>



        </select>



                    </div>



                    



                    



                <!-- contact details end -->



                <div class="submit_btn clearfix">                



                <button type="submit" onClick="button_b" class="btn btn-blue formsave"> Update Details </button>                



                </div>



        <?php



	}



	   



	    if($type=='RegistrationDetails')



		{



			?>



            <div class="cdfield">



             <input type="hidden" name="company_id" value="<?php echo $companyId?>"/>



<label>Registration No.</label>



<input id="Registration" name="Registration_no"  value="<?php echo $companybussinessdetailsData->RegistrationNo;?>" tabindex="1" class="wdt2" type="text" />



</div>







<div class="cdfield">



<label>Registration Authority</label>



<input id="RegistrationAuthority" name="RegistrationAuthority" value="<?php echo $companybussinessdetailsData->RegistrationAuthority;?>" tabindex="1" class="wdt2" type="text" />



</div>







<div class="cdfield">



<label>CIN No.</label>



<input id="CIN" name="CIN" tabindex="1" class="wdt2" value="<?php echo $companybussinessdetailsData->CINNo;?>" type="text" />



</div>







<div class="cdfield">



<label>TAN No.</label>



<input id="TAN" name="TAN" tabindex="1" class="wdt2" value="<?php echo $companybussinessdetailsData->TANNo;?>" type="text" />



</div>







<div class="cdfield">



<label>PAN No.</label>



<input id="PAN" name="PAN" tabindex="1" class="wdt2" value="<?php echo $companybussinessdetailsData->PANNo;?>" type="text" />



</div>







<div class="cdfield">



<label>Service Tax No.</label>



<input id="ServiceTax" name="ServiceTax" tabindex="1" class="wdt2" value="<?php echo $companybussinessdetailsData->ServiceTaxNo;?>" type="text" />



</div>







<div class="cdfield">



<label>Excise Reg. No.</label>



<input id="ExciseReg" name="ExciseReg" tabindex="1" class="wdt2" value="<?php echo $companybussinessdetailsData->ExciseRegNo;?>" type="text" />



</div>







<div class="cdfield">



<label>TIN No. / VAT No.</label>



<input id="TINVAT" name="TINVAT" tabindex="1" class="wdt2" value="<?php echo $companybussinessdetailsData->TIN_VATNo;?>" type="text" />



</div>







<div class="cdfield">



<label>DGFT/IE Code</label>



<input id="DGFTCode" name="DGFTCode" tabindex="1" class="wdt2" value="<?php echo $companybussinessdetailsData->DGFTCode;?>" type="text" />



</div>















<div class="submit_btn clearfix">                



                <button onClick="button_b" class="btn btn-blue formsave" > Update Details </button>                



          </div>







            <?php



		}



		



	}	



	



	public function enquirystatus()



	{



		if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		}



		



		 $type= $this->input->post('type');



		 $uid= $this->input->post('uid');



		 $enquiey='';



		foreach($uid as $enquieyId)



		{



			$enquiey.=$enquieyId."'".","."'";



			



		}



		$where = "tbl_products_enqiry.id in ('".substr($enquiey,0,-3)."')";



		$this->load->model('User');



		



		if($type=='junk')



		{



			$updateData=array("status"=>'junk');



			$updateEnquiry = $this->User->updateDetails($where,'tbl_products_enqiry',$updateData);



			//echo $this->db->last_query();



			echo "Successfully Transfer";



		}



		if($type=='Trash')



		{



			$updateData=array("status"=>'Trash');



			$updateEnquiry = $this->User->updateDetails($where,'tbl_products_enqiry',$updateData);



			//echo $this->db->last_query();



			echo "Successfully Transfer";



		}



		if($type=='Inbox')



		{



			$updateData=array("status"=>'Pending');



			$updateEnquiry = $this->User->updateDetails($where,'tbl_products_enqiry',$updateData);



			//echo $this->db->last_query();



			echo "Successfully Transfer";



		}



		



		/*if($type=='delete')



		{



			//$updateData=array("status"=>'Trash');



			$updateEnquiry = $this->User->deletedata($where,'tbl_products_enqiry');



			echo $this->db->last_query();



			echo "Successfully Deleted";



		}*/



		



	}



	public function searchbuyleads()



	{



		if (!$this->input->is_ajax_request()) 



		{



		   exit('No direct script access allowed');



		}



		$serachfeild= $this->input->post('searchfeild');



		$this->load->model('common');



		$LeadData=$this->common->SearchLeadProductDetails($serachfeild,1);



		$condition=array('cat_id'=>$LeadData->category);



		$condition1=array('sub_cat_id'=>$LeadData->subcategory);



		$CategoryName=$this->common->CategoryName($condition);



		$SubCategoryNameDisplay=$this->common->SubCategoryNameDisplay($condition1);



		//echo $serachfeild;



		// echo 1;



		 ?>



         <script>



		$(document).ready(function(){



		$('.example-5').liteTabs({ boxed: true, fadeIn: true });



		 $(window).scroll(function(){



		//	alert('pawan');



		 /* window on scroll run the function using jquery and ajax */



		var WindowHeight = $(window).height(); /* get the window height */



		if($(window).scrollTop() +1 >= $(document).height() - WindowHeight){ /* check is that user scrolls down to the bottom of the page */

			var loadURL = SITE_URL+'assets/img/loading_icon.gif';

			$("#loader").html("<img src="+loadURL+" alt='loading'/>"); /* displa the loading content */



			var LastDiv = $(".scrolling:last"); /* get the last div of the dynamic content using ":last" */



			var LastId  = $(".scrolling:last").attr("id");



			var searchon='<?php echo $serachfeild;?>';



			 /* get the id of the last div */



			//var ValueToPass = "lastid="+LastId; /* create a variable that containing the url parameters which want to post to getdata.php file */



			$.post(SITE_URL+'commonfunc/searchbuyleadsuserScroll',{'LastId':LastId,'searchon':searchon},function(data,status)



		     {



				 $("#loader").html("");



					if(data)



					{



						



						LastDiv.after(data);



					}



			



		     });



				  return false;



		}



		return false;



	});



			});



         </script>	



		 <div class="example-5">



<ul style="padding:0 10px 0 10px;">



    <li><a href="#1">All<span>(3</span>)</a></li>



    <li><a href="#3">India<span>(2)</span></a></li>



    <li><a href="#4">My Local Area<span>(0)</span></a></li>



    <li><a href="#5">My State<span>(0)</span></a></li>



</ul>



		     	<div name="#1">



           		<div class="buy_lead_tab pd">



                <?php



				if($LeadData==0)



				{



					echo "No Leads In This Category";



				}



				else



				{



					foreach($LeadData as $displayDatda)



					{



				?>



               	  <div class="buy_lead1 pd clearfix scrolling" id="<?php echo $displayDatda->lead_id?>">



                   	<div class="buy_lead_left">



                        	<h3><?php echo $displayDatda->subcategory;?></h3>



                            <p><strong>Quantity: <?php echo $displayDatda->quantity;?></strong><br>



                            <?php echo $displayDatda->product_name;?>



</p>



<p><strong>Additional Information Provided by Buyer</strong><br>



<?php echo $displayDatda->requirment;?>



</p>



                         </div>



                        <div class="buy_lead_divider"><img src="<?php echo  WEBROOT_PATH_IMAGES;?>divider-shadow.png"></div>



                        <div class="buy_lead_right">



                        <img src="<?php echo  WEBROOT_PATH_IMAGES;?>verified-sticker.png" class="verified_strip">



<ul class="liststyle fs12">



                        <li class="calender"><?php echo date("F j, Y",strtotime($displayDatda->date));?></li>



                            <li class="in_flag"><?php echo $displayDatda->state.','.$displayDatda->distric.','.$displayDatda->city?></li>



                            </ul>



                            <ul class="liststyle fs12">



                            <li>Mobile : +(91)-93xxxxxxxx</li>



                            <li>Email : xxxxxxxx@xxxxxxxx.xxx</li>



                            </ul>



                            <h2><span>Price:</span> 15 Credits Only</h2>



                            <a href="#" class="buy_lead_btn"><p>Contact Buyer Now</p>



							<p><span>Buy this Lead</span></p></a>



                        </div>



                        



                  </div>



                  <?php }  } ?>



                </div>



            </div>



            			<div name="#2">



            Tab 2



            </div>



            <div name="#3">



            Tab 3



            </div>



            <div name="#4">



            Tab 4



            </div>



            



</div>



                <?php



	}



	



	public function BuyleadOnloadeuser(){



		  if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		 }



             $ProductIdID= $this->input->post('LastId');



			 $catId= $this->input->post('searchonCt');



			 $SUBcATID= $this->input->post('searchonSt');



			 $userId=$this->session->userdata('UserId');



             $condition=array('user_id'=>$userId);



			 $checkCredits = $this->common->CheckuserCredits($condition);



			 if($catId!=='' && $SUBcATID!=='')



		   {



			  $where="tbl_buy_leads.lead_id >'".$ProductIdID."' and (tbl_buy_leads.category in ('".$catId."') or tbl_buy_leads.subcategory in ('".$SUBcATID."')) order by tbl_buy_leads.lead_id asc limit 1";



		   }



		



		     $LeadDataDetails =$this->db->join('company_details' , 'company_details.company_id=buy_leads.company_id','left')



			                          ->where($where)



			                          ->get('buy_leads');



									//  echo $this->db->last_query();



								 



		                         if($LeadDataDetails->num_rows()>0)



									{



										$LeadDataDetailsData=$LeadDataDetails->result();



										foreach($LeadDataDetailsData as $leadDataDisplay)



										{



											 $condition=array('cat_id'=>$leadDataDisplay->category);



				                             $condition1=array('sub_cat_id'=>$leadDataDisplay->subcategory);



				                             $CategoryName=$this->common->CategoryName($condition);



				                             $SubCategoryNameDisplay=$this->common->SubCategoryNameDisplay($condition1);



											 ?>



                                             <div class="buy_lead1 pd clearfix" id="<?php echo $leadDataDisplay->lead_id;?>">



                   	<div class="buy_lead_left">



                        	<h3><?php echo $SubCategoryNameDisplay->subcategory;?></h3>



                            <p><strong>Listed In: <?php echo $CategoryName->category;?></strong><br>



                            <strong>Quantity: <?php echo $leadDataDisplay->quantity;?></strong><br>



                            <?php echo $leadDataDisplay->product_name;?>



</p>



<p><strong>Additional Information Provided by Buyer</strong><br>



<?php  echo $leadDataDisplay->requirment; ?>



</p>



                         </div>



                        <div class="buy_lead_divider"><img src="<?php echo  WEBROOT_PATH_IMAGES;?>divider-shadow.png"></div>



                        <div class="buy_lead_right">



                        <img src="<?php echo  WEBROOT_PATH_IMAGES;?>verified-sticker.png" class="verified_strip">



<ul class="liststyle fs12">



                        <li class="calender"><?php echo date("F j, Y",strtotime($leadDataDisplay->date));?></li>



                            <li class="in_flag"><?php echo $leadDataDisplay->state.','.$leadDataDisplay->distric.','.$leadDataDisplay->city?></li>



                            </ul>



                            



                            <ul class="liststyle fs12">



                            <li>Mobile : +(91)-93xxxxxxxx</li>



                            <li>Email : xxxxxxxx@xxxxxxxx.xxx</li>



                            </ul>



                            <h2><span>Price:</span> 15 Credits Only</h2>



                            <?php



							



							if($checkCredits->remaining>=20)



		                	{



			                ?>



                            



                            <a href="#" class="buy_lead_btn contectseller" id="<?php  echo $leadDataDisplay->lead_id;?>"><p>Contact Buyer Now</p>



							<p><span>Buy this Lead</span></p></a>



                            <?php



							}



							else



							{



								?>



								 <a href="<?php echo SITE_URL;?>payment/makepayment/leads" class="buy_lead_btn" id="<?php  echo $leadDataDisplay->lead_id;?>">                             <p>Contact Buyer Now</p>



							<p><span>Buy this Lead</span></p></a>



                            <?php



							}



							



		



							?>



                        </div>



                  </div>



                                             <?php



											



										}



				 					



									}



	



	}



	public function BuyleadOnloadeuserContry(){



		  if (!$this->input->is_ajax_request()) {



		   exit('No direct script access allowed');



		 }



             $ProductIdID= $this->input->post('LastId');



			 $catId= $this->input->post('searchonCt');



			 $SUBcATID= $this->input->post('searchonSt');



			 $state= $this->input->post('state');



			 $userId=$this->session->userdata('UserId');



             $condition=array('user_id'=>$userId);



			 $checkCredits = $this->common->CheckuserCredits($condition);



			 if($catId!=='' && $SUBcATID!=='')



		   {



			  $where="tbl_buy_leads.lead_id >'".$ProductIdID."' and (tbl_buy_leads.category in ('".$catId."') or tbl_buy_leads.subcategory in ('".$SUBcATID."')) and tbl_company_details.state in ('".$state."') order by tbl_buy_leads.lead_id asc limit 1";



		   }



		



		     $LeadDataDetails =$this->db->join('company_details' , 'company_details.company_id=buy_leads.company_id','left')



			                          ->where($where)



			                          ->get('buy_leads');



									//  echo $this->db->last_query();



								 



		                         if($LeadDataDetails->num_rows()>0)



									{



										$LeadDataDetailsData=$LeadDataDetails->result();



										foreach($LeadDataDetailsData as $leadDataDisplay)



										{



											 $condition=array('cat_id'=>$leadDataDisplay->category);



				                             $condition1=array('sub_cat_id'=>$leadDataDisplay->subcategory);



				                             $CategoryName=$this->common->CategoryName($condition);



				                             $SubCategoryNameDisplay=$this->common->SubCategoryNameDisplay($condition1);



											 ?>



                                             <div class="buy_lead2 pd clearfix" id="<?php echo $leadDataDisplay->lead_id;?>">



                   	<div class="buy_lead_left">



                        	<h3><?php echo $SubCategoryNameDisplay->subcategory;?></h3>



                            <p><strong>Listed In: <?php echo $CategoryName->category;?></strong><br>



                            <strong>Quantity: <?php echo $leadDataDisplay->quantity;?></strong><br>



                            <?php echo $leadDataDisplay->product_name;?>



</p>



<p><strong>Additional Information Provided by Buyer</strong><br>



<?php  echo $leadDataDisplay->requirment; ?>



</p>



                         </div>



                        <div class="buy_lead_divider"><img src="<?php echo  WEBROOT_PATH_IMAGES;?>divider-shadow.png"></div>



                        <div class="buy_lead_right">



                        <img src="<?php echo  WEBROOT_PATH_IMAGES;?>verified-sticker.png" class="verified_strip">



<ul class="liststyle fs12">



                        <li class="calender"><?php echo date("F j, Y",strtotime($leadDataDisplay->date));?></li>



                            <li class="in_flag"><?php echo $leadDataDisplay->state.','.$leadDataDisplay->distric.','.$leadDataDisplay->city?></li>



                            </ul>



                            



                            <ul class="liststyle fs12">



                            <li>Mobile : +(91)-93xxxxxxxx</li>



                            <li>Email : xxxxxxxx@xxxxxxxx.xxx</li>



                            </ul>



                            <h2><span>Price:</span> 20 Credits Only</h2>



                            <?php



							



							if($checkCredits->remaining>=20)



		                	{



			                ?>



                            



                            <a href="#" class="buy_lead_btn contectseller" id="<?php  echo $leadDataDisplay->lead_id;?>"><p>Contact Buyer Now</p>



							<p><span>Buy this Lead</span></p></a>



                            <?php



							}



							else



							{



								?>



								 <a href="<?php echo SITE_URL;?>payment/makepayment/leads" class="buy_lead_btn" id="<?php  echo $leadDataDisplay->lead_id;?>">                             <p>Contact Buyer Now</p>



							<p><span>Buy this Lead</span></p></a>



                            <?php



							}



							



		



							?>



                        </div>



                  </div>



                                             <?php



											



										}



				 					



									}



	



	}



	



	public function searchbuyleadsuserScroll()



	{



		if (!$this->input->is_ajax_request()) 



		{



		   exit('No direct script access allowed');



		}



		$serachfeild= $this->input->post('searchon');



		$nextId= $this->input->post('LastId');



		$this->load->model('common');



		$LeadData=$this->common->SearchLeadProductDetailsNext($nextId,$serachfeild,1);



		$condition=array('cat_id'=>$LeadData->category);



		$condition1=array('sub_cat_id'=>$LeadData->subcategory);



		$CategoryName=$this->common->CategoryName($condition);



		$SubCategoryNameDisplay=$this->common->SubCategoryNameDisplay($condition1);



        ?>



		<?php



			



					foreach($LeadData as $displayDatda)



					{



				?>



               	  <div class="buy_lead1 pd clearfix scrolling" id="<?php echo $displayDatda->lead_id?>">



                   	<div class="buy_lead_left">



                        	<h3><?php echo $displayDatda->subcategory;?></h3>



                            <p><strong>Quantity: <?php echo $displayDatda->quantity;?></strong><br>



                            <?php echo $displayDatda->product_name;?>



</p>



<p><strong>Additional Information Provided by Buyer</strong><br>



<?php echo $displayDatda->requirment;?>



</p>



                         </div>



                        <div class="buy_lead_divider"><img src="<?php echo  WEBROOT_PATH_IMAGES;?>divider-shadow.png"></div>



                        <div class="buy_lead_right">



                        <img src="<?php echo  WEBROOT_PATH_IMAGES;?>verified-sticker.png" class="verified_strip">



<ul class="liststyle fs12">



                        <li class="calender"><?php echo date("F j, Y",strtotime($displayDatda->date));?></li>



                            <li class="in_flag"><?php echo $displayDatda->state.','.$displayDatda->distric.','.$displayDatda->city?></li>



                            </ul>



                            <ul class="liststyle fs12">



                            <li>Mobile : +(91)-93xxxxxxxx</li>



                            <li>Email : xxxxxxxx@xxxxxxxx.xxx</li>



                            </ul>



                            <h2><span>Price:</span> 15 Credits Only</h2>



                            <a href="#" class="buy_lead_btn"><p>Contact Buyer Now</p>



							<p><span>Buy this Lead</span></p></a>



                        </div>



                        



                  </div>



                  <?php }   ?>







                <?php



	}



	



	public function paymentattempt()



	{



		if (!$this->input->is_ajax_request()) 



		{



		   exit('No direct script access allowed');



		}



		$planId= $this->input->post('planId');



		$amount= $this->input->post('amount');



		$moi=rand(5000,9999999);



	    $paymentrefrence='INLED'.'-'.$moi;



		//echo $this->session->userdata('UserId');



		$this->load->model('User');



		$this->load->model('common');



		$where=array("user_id"=>$this->session->userdata('UserId'));



		$checkUserAttempt=$this->common->checkpaymentattempt($where);



		if($checkUserAttempt==0)



		{



			



	    	$insertAttempt=array("user_id"=>$this->session->userdata('UserId'),"plan_id"=>$planId,"amount"=>$amount,"moi"=>$paymentrefrence,"date"=>date('Y-m-d h:i:s'));



		    $Insert = $this->User->AdduserData('payment_details',$insertAttempt);



			//echo $this->db->last_query();



		}



		else



		{



			



			$updatedata=array("plan_id"=>$planId,"amount"=>$amount,"moi"=>$paymentrefrence,"date"=>date('Y-m-d h:i:s'));



		    $update = $this->User->updateDetails($where,'payment_details',$updatedata);



			



		}



		



	}



	



	



	public function DeleteFeature()



	{



		if (!$this->input->is_ajax_request()) 



		{



		   exit('No direct script access allowed');



		}



		$ID=$this->input->post('featureId');



		$condition=array("feature_id"=>$ID);



		$this->load->model('contectupdate');



		$delete=$this->contectupdate->deletedata($condition,'site_features');



		



	}



	



	public function DeleteFeatureTest()

	{

		if (!$this->input->is_ajax_request()) 

		{

		   exit('No direct script access allowed');

		}

		$ID=$this->input->post('featureId');

		$condition=array("testo_id"=>$ID);

		$this->load->model('contectupdate');

		$delete=$this->contectupdate->deletedata($condition,'testomonial');

	}

	

	public function DeleteUsedProduct()

	{

		if (!$this->input->is_ajax_request()) 

		{

		   exit('No direct script access allowed');

		}

		$ID=$this->input->post('productid');

		$condition=array("product_id"=>$ID);

		$this->load->model('contectupdate');

		$delete=$this->contectupdate->deletedata($condition,'sell_product');

		$deleteimages=$this->contectupdate->deletedata($condition,'sellproduc_images');

	}



	public function DeleteFeatureNews()



	{



		if (!$this->input->is_ajax_request()) 



		{



		   exit('No direct script access allowed');



		}



		$ID=$this->input->post('featureId');



		$condition=array("news_id"=>$ID);



		$this->load->model('contectupdate');



		$delete=$this->contectupdate->deletedata($condition,'news_display');



		



	}



	



	public function bussinessDelete()



	{



		if (!$this->input->is_ajax_request()) 



		{



		   exit('No direct script access allowed');



		}



		$ID=$this->input->post('featureId');



		$condition=array("lead_id"=>$ID);



		$this->load->model('contectupdate');



		$delete=$this->contectupdate->deletedata($condition,'buy_leads');



	}



	public function productDelete()



	{



		if (!$this->input->is_ajax_request()) 



		{



		   exit('No direct script access allowed');



		}



		$ID=$this->input->post('featureId');



		$condition=array("product_id"=>$ID);



		$this->load->model('contectupdate');



		$delete=$this->contectupdate->deletedata($condition,'product_details');



	}



	



	public function changepasswords()



	{



		if (!$this->input->is_ajax_request()) 



		{



		   exit('No direct script access allowed');



		}



		$userId= $this->input->post('userId');



		$password= $this->input->post('newpassword');



        $this->load->model('User');



		$this->load->model('common');



		$where=array("id"=>$userId);



		$updatedata=array("password"=>md5($password));



		$update = $this->User->updateDetails($where,'user_signup',$updatedata);



		



	}



	public function productprefrence()



	{



		if (!$this->input->is_ajax_request()) 



		{



		   exit('No direct script access allowed');



		}



		$CtaegoryId=$this->input->post('uid');



		$CtaList='';



		$Dta=implode(',',$CtaegoryId);



		$this->load->model('User');



		$checkExits=$this->db->get('userbuylead_prefernce');



		if($checkExits->num_rows()>0)



		{



			$condition=array("user_id"=>$this->session->userdata('UserId'),);



		    $updateData=array("prefrence_cat_id"=>$Dta);



		    $update = $this->User->updateDetails($condition,'userbuylead_prefernce',$updateData);



		}



		else



		{



		    $insertCatPrefrence=array("user_id"=>$this->session->userdata('UserId'),"prefrence_cat_id"=>$Dta);



		    $Insert = $this->User->AdduserData('userbuylead_prefernce',$insertCatPrefrence);



		}



		



	}



	



	public function homecontentDispaly()



	{



		if (!$this->input->is_ajax_request()) 



		{



		   exit('No direct script access allowed');



		}



		



		$comapanyId = $this->input->post('CompId');



		$condition = array( "company_id" => $comapanyId );



		$UsercompnayList=$this->common->companyHomeContent($condition);



		?>



        <p> <b>Key Description of your Company</b> (Visible on your website and IndiaBizsaath search)</p>



<textarea id="textarea1" name="keydescription"><?php echo $UsercompnayList->key_description; ?></textarea>



<?php echo form_error('keydescription');?>











<br><br>







<p><b>Detailed Description of your Website Home Page</b></p>



<div class="field1">



<textarea id="textarea2" name="description" ><?php echo $UsercompnayList->home_content; ?></textarea>



<?php echo form_error('description');?>







</div>



        <?php



	//	echo json_encode($UsercompnayList);



		//$companyHomeContent->key_description;



		



	}



	



	



	



}



?>