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
			$cityList = $this->db->select('district')
							->where('state',$stateID)
                             ->group_by('district')
					 		 ->get('location')								
							 ->result();
			$html = '';
			foreach($cityList as $city){
				$html.='<option value='.$city->district.'>'.$city->district.'</option>';
			}	 
			echo $html;			
	     
	}
	
	public function districList(){
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
            $districtID= $this->input->post('district');
			$districList = $this->db->select('city')
							->where('district',$districtID)
                             ->group_by('city')
					 		 ->get('location')								
							 ->result();
			$html = '';
			foreach($districList as $city){
				$html.='<option value='.$city->city.'>'.$city->city.'</option>';
			}	 
			echo $html;			
	     
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
			foreach($categorylist as $category){
				$html.='<option value='.$category->id.'>'.$category->category_name.'</option>';
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
	
	
	  public function AddsendMobile()
		 {
			 if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
                          $userData = $this->input->post();
						  $Data = array('name' => $userData['senedname'],'email' => $userData['email'],'message' => $userData['message'],"mobile"=> $userData['Mobile'],"product_id"=>$userData['id'],"date"=>date('Y-m-d h:i:s'));
						   $this->load->model('User');
		                   $Insert = $this->User->AdduserData('products_enqiry',$Data);
		                   echo 1;
			  
		}
		
		public function sendtoFreind()
		 {
			 if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
                          $userData = $this->input->post();
						  $Data = array('email' => $userData['email'],"mobile"=> $userData['Mobile'],"toemail"=> $userData['emailto'],"message"=>$userData['message'],"product_id"=>$userData['id'],"date"=>date('Y-m-d h:i:s'));
						   $this->load->model('User');
		                   $Insert = $this->User->AdduserData('forward_freind',$Data);
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
			echo ' <div class="modal-header">
               <a href="#" class="close" data-dismiss="modal" onClick="closeDialog ();">&times;</a>
       <h3><img src='.WEBROOT_PATH_sell.''.$Details->product_image.' width="30" height="30px">'.$Details->company_name.'</h3>
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
			echo ' <div class="modal-header">
               <a href="#" class="close" data-dismiss="modal" onClick="closeDialog ();">&times;</a>
       <h3>Please Enter your Login Details</h3>
					</div>
              <div class="modal-body">
              	<div class="divDialogElements">
               <form id="form1">
						  <label for="textfield">E-mail:</label>
  <input type="text"  name="email" id="email"   data-bvalidator="email,required" class="text_f" />
  <br clear="all" />
  <label for="textfield">Password:</label>
  <input type="password"  name="password" id="password"   data-bvalidator="email,required" class="text_f" />
  <br clear="all" />
                        </form>
                           </div>
                   </div>
                   <div class="modal-footer">
					<a href="#" class="btn btn-primary btn-large" onclick="checklogin()" >Submit</a></div>';
	}
	
	
	public function suggestions(){
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
            $categoryID= $this->input->get('term');
			$searchFeild= $this->input->get('search_field');
			if($searchFeild=='Products')
			{
				/*echo "SELECT category as data FROM tbl_category  WHERE category like '%".$categoryID."%' 
			 UNION SELECT subcategory as data FROM tbl_subcategory  WHERE     subcategory like '%".$categoryID."%'";
		     $sql = "SELECT category as data FROM tbl_category  WHERE category like '%".$categoryID."%' 
			 UNION SELECT subcategory as data FROM tbl_subcategory  WHERE     subcategory like '%".$categoryID."%'  ";   
            $query = $this->db->query($sql);
			$reult = $this->fetch();*/
			$where="category like '%".$categoryID."%'";
			$this->db->select('category as data');
            $query1 = $this->db->where($where)
			                  ->get('tbl_category')
			                  ->result();
						
						
			$where1="subcategory like '%".$categoryID."%'";
			$this->db->select('subcategory as data');
			$query2 = $this->db->where($where1)
                                    ->group_by('sub_cat_id')
					 	            ->get('subcategory')								
							 ->result();
							 
		    $where2="company_name like '%".$categoryID."%'";
			$this->db->select('company_name as data');
			$query3 = $this->db->where($where2)
                                    ->group_by('company_id')
					 	            ->get('tbl_company_details')								
							 ->result();
							 
			$where3="bussiness_nature like '%".$categoryID."%'";
			$this->db->select('bussiness_nature as data');
			$query4 = $this->db->where($where3)
                                    ->group_by('product_id')
					 	            ->get('tbl_product_details')								
							 ->result();
							// echo $this->db->last_query();
			$query = array_merge($query1, $query2,$query3,$query4);
			foreach($query as $category){
				
				              $data[] = array('label' => $category->data,
                              'value' => $category->data);
			}	
			}
			elseif($searchFeild=='BuyLeads')
			{
				$where="subcategory like '%".$categoryID."%'";
			$categorylist = $this->db->where($where)
                             ->group_by('sub_cat_id')
					 		 ->get('subcategory')								
							 ->result();
			foreach($categorylist as $category){
				
				              $data[] = array('label' => $category->subcategory,
                              'value' => $category->subcategory);
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
				
			$where1="subcategory like '%".$categoryID."%'";
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
							 
	//	  echo $this->db->last_query();
		  foreach($categorylist as $allcatgeroy){  ?> 
<li  class="as_country_container" id="<?php echo $allcatgeroy->cat_id; ?>"><a href="<?php echo SITE_URL;?>category/allindex/<?php  echo $allcatgeroy->category.'/'.$allcatgeroy->cat_id;?>"><?php  echo $allcatgeroy->category;?><span class="fr count">4931</span></a></li>
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
            	<h3><a href="<?php echo SITE_URL;?>category/viewdetails/<?PHP echo str_replace(' ','-',$ProductlistData->company_name).'/'.$ProductlistData->product_id;?>"></a><?php echo $ProductlistData->company_name;?></h3>
                <div class="info_list_box clearfix">
                	<div class="info_img"><img src="<?php echo WEBROOT_PATH_sell.''.$ProductlistData->product_image;?>"></div>
                    <div class="info_details">
                    	<ul class="info_contact">
                        <li class="info_name"><?php echo $ProductlistData->contect_person;?></li>
                        <li class="info_mobile">+91-<?php echo $ProductlistData->mobile_no;?></li>
                        <li class="info_web"><?php echo $ProductlistData->wesite;?></li>
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
							 
	//	  echo $this->db->last_query();
		  foreach($Productlist as $ProductlistData){  ?> 
<div class="info_list" id="<?php echo $ProductlistData->product_id ?>">
            	<h3><a href="<?php echo SITE_URL;?>category/viewdetails/<?PHP echo str_replace(' ','-',$ProductlistData->company_name).'/'.$ProductlistData->product_id;?>"><?php echo $ProductlistData->company_name;?></a></h3>
                <div class="info_list_box clearfix">
                	<div class="info_img"><img src="<?php echo WEBROOT_PATH_sell.''.$ProductlistData->product_image;?>"></div>
                    <div class="info_details">
                    	<ul class="info_contact">
                        <li class="info_name"><?php echo $ProductlistData->contect_person;?></li>
                        <li class="info_mobile">+91-<?php echo $ProductlistData->mobile_no;?></li>
                        <li class="info_web"><?php echo $ProductlistData->wesite;?></li>
                        <li class="info_email"><?php echo $ProductlistData->email_id;?></li>
                        <li class="info_add"><?php echo $ProductlistData->state.','.$ProductlistData->distric;?></li>
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
		      $where="tbl_product_details.product_id > $ProductIdID and (`tbl_category`.`category` like '".$searchfeild."' or tbl_subcategory.subcategory like '".$searchfeild."' or company_name like '".$searchfeild."' or bussiness_nature='".$searchfeild."' ) order by tbl_product_details.product_id asc limit 1 ";
			     $SearchProductDetails =$this->db->join('company_details' , 'company_details.company_id=product_details.company_id','inner')
				                 ->join('category' , 'category.cat_id=product_details.category','left')
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
                    <input id="establish" name="establish" tabindex="1" class="wdt2" type="text" value="<?php echo $companybussinessdetailsData->year_of_start?>" />
                    </div>
                  
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
<input id="Registration" name="Registration_no" tabindex="1" class="wdt2" type="text" />
</div>

<div class="cdfield">
<label>Registration Authority</label>
<input id="RegistrationAuthority" name="RegistrationAuthority" tabindex="1" class="wdt2" type="text" />
</div>

<div class="cdfield">
<label>CIN No.</label>
<input id="CIN" name="CIN" tabindex="1" class="wdt2" type="text" />
</div>

<div class="cdfield">
<label>TAN No.</label>
<input id="TAN" name="TAN" tabindex="1" class="wdt2" type="text" />
</div>

<div class="cdfield">
<label>PAN No.</label>
<input id="PAN" name="PAN" tabindex="1" class="wdt2" type="text" />
</div>

<div class="cdfield">
<label>Service Tax No.</label>
<input id="ServiceTax" name="ServiceTax" tabindex="1" class="wdt2" type="text" />
</div>

<div class="cdfield">
<label>Excise Reg. No.</label>
<input id="ExciseReg" name="ExciseReg" tabindex="1" class="wdt2" type="text" />
</div>

<div class="cdfield">
<label>TIN No. / VAT No.</label>
<input id="TINVAT" name="TINVAT" tabindex="1" class="wdt2" type="text" />
</div>

<div class="cdfield">
<label>DGFT/IE Code</label>
<input id="DGFTCode" name="DGFTCode" tabindex="1" class="wdt2" type="text" />
</div>

<div class="cdfield">
<label>CST No.</label>
<input id="company_name" name="company_name" tabindex="1" class="wdt2" type="text" />
</div>

<div class="cdfield">
<label>SSI No. / MSME No.</label>
<input id="company_name" name="company_name" tabindex="1" class="wdt2" type="text" />
</div>

<div class="cdfield">
<label>EPF No.</label>
<input id="company_name" name="company_name" tabindex="1" class="wdt2" type="text" />
</div>

<div class="cdfield">
<label>ESI No.</label>
<input id="company_name" name="company_name" tabindex="1" class="wdt2" type="text" />
</div>

<div class="cdfield">
<label>SCT No.</label>
<input id="company_name" name="company_name" tabindex="1" class="wdt2" type="text" />
</div>

<div class="cdfield">
<label>DNB No.</label>
<input id="company_name" name="company_name" tabindex="1" class="wdt2" type="text" />
</div>

<div class="cdfield">
<label>RBI No.</label>
<input id="company_name" name="company_name" tabindex="1" class="wdt2" type="text" />
</div>

<div class="cdfield">
<label>FSSAI-LICENSE NO.</label>
<input id="company_name" name="company_name" tabindex="1" class="wdt2" type="text" />
</div>

<div class="cdfield">
<label>N.S.I.C No.</label>
<input id="company_name" name="company_name" tabindex="1" class="wdt2" type="text" />
</div>

<div class="cdfield">
<label>S.S.T No.</label>
<input id="company_name" name="company_name" tabindex="1" class="wdt2" type="text" />
</div>

<div class="submit_btn clearfix">                
                <button onClick="button_b" class="btn btn-blue formsave" > Update Details </button>                
          </div>

            <?php
		}
		
	}	
}
?>