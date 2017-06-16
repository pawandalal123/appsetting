<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');







class Common extends CI_Model {



	public function __construct() {

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

public function cleanURL($string) {

   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.



   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.

}



	public function userCategorySubCategoryList($condition = false , $limit = 15){

		$userCategory = $this->db->select('category.cat_id ,category,alternate_category,category.image,count(*) as Total');

		if($limit){

			$this->db->limit($limit);

		}

		if($condition){

			$this->db->limit($condition);

		}



		$userCategory = $this->db->join('subcategory' , 'category.cat_id=subcategory.cat_id')
							 ->where('length(category) < 40')
							 ->having('Total  > 5' , NULL, false)
							 ->group_by('category.cat_id')
					 		 ->get('category')
							 ->result();
		foreach($userCategory as $userCategory){			
			$categoryId = $userCategory->cat_id;
			$condition = array('cat_id' => $categoryId);
			$subCategory[$userCategory->category] = $this->userSubCategory($condition);	

			$subCategory[$userCategory->category]['CategoryName'] = $userCategory->category;

			$subCategory[$userCategory->category]['CategoryNameUrl'] = $userCategory->alternate_category;

			$subCategory[$userCategory->category]['CategoryLogo'] = $userCategory->image;

			$subCategory[$userCategory->category]['categoryId'] = $categoryId;



		}



		return $subCategory;



	}



	



	public function popularCategorySubCategoryList($condition = false , $limit = 12){

		$userCategory = $this->db->select('category.cat_id,alternate_category,category.image,category,count(*) as Total');

		if($limit){

			$this->db->limit($limit);
		}



		if($condition){
			$this->db->limit($condition);
		}

		$userCategory = $this->db->join('subcategory' , 'category.cat_id=subcategory.cat_id')
							 ->where('length(category) < 30')
							 ->having('Total  > 4' , NULL, false)
							 ->group_by('category.cat_id')
					 		 ->get('category')								
							 ->result();


		foreach($userCategory as $userCategory){

			$categoryId = $userCategory->cat_id;
			$condition = array('cat_id' => $categoryId);
			$subCategoryLimit=3;
			$subCategory[$userCategory->category] = $this->userSubCategory($condition,$subCategoryLimit);
			$subCategory[$userCategory->category]['CategoryName'] = $userCategory->category;
			$subCategory[$userCategory->category]['CategoryNameUrl'] = $userCategory->alternate_category;
			$subCategory[$userCategory->category]['CategoryLogo'] = $userCategory->image;

			$subCategory[$userCategory->category]['categoryId'] = $categoryId;
		}	



		return $subCategory;



	}







	public function userSubCategory($subCategoryID = false , $limit = false){



		if($subCategoryID){



			$this->db->where($subCategoryID);



		}



		if($limit){



			$this->db->limit($limit);



		}



		$subCategoryData = $this->db->get('subcategory')



				 					->result();



		return $subCategoryData;



	}



	public function userSubCategoryName($subCategoryID = false){



		if($subCategoryID){



			$this->db->where($subCategoryID);



		}



		



		$subCategoryData = $this->db->get('subcategory')



				 					->row();



		return $subCategoryData;



	}



	public function userCategoryListing( $limit = false){



		



		if($limit){



			$this->db->limit($limit);



		}



		$CategoryData = $this->db->get('category')



				 					->result();



		return $CategoryData;



	}



		public function CityList( $limit = false){

		if($limit){

			$this->db->limit($limit);

		}

		$StateData = $this->db->get('state')

				 					->result();

		return $StateData;



	}



	   public function categorySubCategory($CategoryName = false,$CategoryID = false , $limit = false){
		 if($CategoryID){
			$this->db->where('category.cat_id', $CategoryID);
		 }
		if($limit){
			$this->db->limit($limit);
		}
		$subCategoryData = $this->db->select('subcategory.*,count(1) as totalData')
								   ->join('subcategory','category.cat_id=subcategory.cat_id','LEFT')
								   ->join('product_details', 'subcategory.sub_cat_id=product_details.sub_category','LEFT')
								   ->group_by('subcategory.sub_cat_id')
		                           ->get('category')
				 					->result();
									//echo $this->db->last_query();
		return $subCategoryData;
	   }


	   public function sellcategorySubCategory($CategoryName = false,$CategoryID = false , $limit = false){



		 if($CategoryID){



			$this->db->where('categorysell.category', $CategoryID);



		 }



		if($limit){



			$this->db->limit($limit);



		}



		$subCategoryData =$this->db->join('categorysell' , 'sellcategory.id=categorysell.category')



                              ->group_by('categorysell.id')



					 	   	 ->get('sellcategory')								



							 ->result();



									//echo $this->db->last_query();



		return $subCategoryData;



	   }


	     public function SubCategoryData($category=false,$categoryId=false,$subCategoryID = false , $limit = false)
		 {
			 if($subCategoryID)
			 {
				$this->db->where('sub_category', $subCategoryID);
			 }
			if($limit)
			{
				$this->db->limit($limit);
			}

		$subCategoryData =$this->db->join('company_details' , 'company_details.company_id=product_details.company_id','inner')
		                               ->join('user_signup' , 'user_signup.id=company_details.user_id','inner')
									   	->get('tbl_product_details');
				 					if($subCategoryData->num_rows() > 0)
									{
										$subCategoryDataList= $subCategoryData->result();
											//echo $this->db->last_query();
									}
									else
									{
										$subCategoryDataList=0;
									}
		                              return $subCategoryDataList;
	   }


	   public function SubCategoryLeadData($category=false,$categoryId=false,$subCategoryID = false , $limit = false){



		 if($subCategoryID){



			$this->db->where('subcategory', $subCategoryID);



		 }



		if($limit){



			$this->db->limit($limit);



		}



		$subCategoryData =$this->db->get('tbl_buy_leads');



				 					if($subCategoryData->num_rows() > 0)



		{



			$subCategoryDataList= $subCategoryData->result();



		}



		else



		{



			$subCategoryDataList=0;



		}



									



		return $subCategoryDataList;



	   }



	   



	   



	   



	   public function categoryListingdata($catType=false,$CategoryID = false , $limit = false){



		 if($CategoryID){



			$this->db->where('category', $CategoryID);



		 }



		if($limit){



			$this->db->limit($limit);



		}



		$categoryListingdata =$this->db->join('company_details' , 'company_details.company_id=product_details.company_id','inner')



		                               ->join('user_signup' , 'user_signup.id=company_details.user_id','inner')



									   ->group_by('product_details.product_id')



		                                 ->get('product_details');



		if($categoryListingdata->num_rows() > 0)



		{



			$CategoryIDList= $categoryListingdata->result();



		}



		else



		{



			$CategoryIDList=0;



		}



		



		return $CategoryIDList;



		



	   }



		public function LeadcategoryListingdata($catType=false,$CategoryID = false , $limit = false){



		 if($CategoryID){



			$this->db->where('category', $CategoryID);



		 }



		if($limit){



			$this->db->limit($limit);



		}



		$categoryListingdata =$this->db->get('buy_leads');



		if($categoryListingdata->num_rows() > 0)



		{



			$CategoryIDList= $categoryListingdata->result();



		}



		else



		{



			$CategoryIDList=0;



		}



		



									//echo $this->db->last_query();



		return $CategoryIDList;



	   }



	   



	   



	   



	    public function ViewProductDetails($catName=false,$productId=false){



		 if($productId){



			$this->db->where('product_details.product_id', $productId);



		 }



		     $DataView =$this->db->join('company_details' , 'company_details.company_id=product_details.company_id','inner')



		                        ->join('user_signup' , 'user_signup.id=company_details.user_id','inner')



		                         ->get('product_details')



		                         ->row();



		



									//echo $this->db->last_query();



		 return $DataView;



	   }



	   



	   



	    public function ViewLeadProductDetails($catName=false,$CategoryID=false){



		 if($CategoryID){



			$this->db->where('buy_leads.lead_id', $CategoryID);



		 }

		     $DataView =$this->db->join('company_details' , 'company_details.company_id=buy_leads.company_id','inner')

		                         ->join('user_signup' , 'user_signup.id=company_details.user_id','inner')

		                         ->get('buy_leads')

		                         ->row();

									//echo $this->db->last_query();



		 return $DataView;



	   }



	   public function ViewLeadProductDetailsCount($Condition=false){



		 if($Condition){



			$this->db->where($Condition);



		 }



		     $DataView =$this->db->join('company_details' , 'company_details.company_id=buy_leads.company_id','inner')



		                        ->join('user_signup' , 'user_signup.id=company_details.user_id','inner')



		                         ->get('buy_leads');



		                        $BuyLeadaDta= $DataView->num_rows();



		



									//echo $this->db->last_query();



		 return $BuyLeadaDta;



	   }



	   



	    public function ViewProductsellDetails($productName=false,$productID=false){



		 if($productID){



			$this->db->where('sell_product.product_id', $productID);



		 }



		     $DataView =$this->db->join('user_signup' ,'user_signup.id=sell_product.user_id')



		                         ->get('sell_product')



		                         ->row();



		



									//echo $this->db->last_query();



		 return $DataView;



	   }



	   



	    public function popularusedProducts($condition=false,$limit=false){



		 if($condition){

			$this->db->where($condition);

		 }

		     $DataView =$this->db->group_by('product_id')

			                     ->get('sell_product')

		                         ->result();

									//echo $this->db->last_query();

		 return $DataView;



	   }



	   



	   



	   



	    public function LocationList($groupBy=false,$limit = false){



			if($groupBy)



			{



				$this->db->group_by($groupBy);



			}



			



				if($limit){



			$this->db->limit($limit);



	      	}



		    $LocationData =$this->db->get('location')



				 					->result();



		return $LocationData;



	   }



	   



	   



	    public function CategoryList($groupBy=false,$limit = false){



			if($groupBy)



			{



				$this->db->group_by($groupBy);



			}



			



				if($limit){



			        $this->db->limit($limit);



	      	}



		            $CategoryListData =$this->db->order_by('category','asc')



		                           ->get('category')



				 					->result();



		return $CategoryListData;



	   }



	   



	   public function sellproductcategory($groupBy=false,$limit = false){



			if($groupBy)



			{



				$this->db->group_by($groupBy);



			}



			



				if($limit){



			        $this->db->limit($limit);



	      	}



		            $CategoryListData =$this->db->order_by('buy_category_name','asc')



		                           ->get('sellcategory')



				 					->result();



		return $CategoryListData;



	   }



	   



	   



	    public function BuyleadList($groupBy=false,$limit = false){

			if($groupBy)



			{

				$this->db->group_by($groupBy);

			}



				if($limit)

				{

			        $this->db->limit($limit);



	      	     }

				 $this->db->where(array('tbl_buy_leads.status'=>'Approved'));

		            $BuyleadListData =$this->db->join('company_details' , 'company_details.company_id=buy_leads.company_id','inner')

					                ->order_by('product_name','asc')

		                           ->get('buy_leads')



				 					->result();



		return $BuyleadListData;



	   }



	   



	   



	    public function SliderdisplayImages($groupBy=false,$limit = false){



			if($groupBy)



			{



				$this->db->group_by($groupBy);



			}



			



				if($limit){



			        $this->db->limit($limit);



	      	}



			        $where = "end_date >curdate() and status='Approved' and  image_for='slider' ";



		            $SliderImagesData =$this->db->order_by('image_id','asc')



					               ->where($where)



		                           ->get('display_adds')



				 					->result();



		return $SliderImagesData;



	   }















public function sellCategorySubCategoryList($condition = false , $limit = 15){



		$sellCategory = $this->db->select('sellcategory.id,buy_logo,buy_logo2,buy_category_name');



		if($limit){



			$this->db->limit($limit);



		}



		if($condition){



			$this->db->limit($condition);



		}



		$sellCategory = $this->db->join('categorysell' , 'sellcategory.id=categorysell.category')



                              ->group_by('sellcategory.id')



					 	   	 ->get('sellcategory')								



							 ->result();



							 



		   foreach($sellCategory as $sellCategory){			



			$categoryId = $sellCategory->id;



			$condition = array('category' => $categoryId);



			$subCategory[$sellCategory->buy_category_name] = $this->sellSubCategory($condition);	



			$subCategory[$sellCategory->buy_category_name]['CategoryName'] = $sellCategory->buy_category_name;



			$subCategory[$sellCategory->buy_category_name]['categoryId'] = $categoryId;



			$subCategory[$sellCategory->buy_category_name]['Logo'] = $sellCategory->buy_logo;

			$subCategory[$sellCategory->buy_category_name]['Logo1'] = $sellCategory->buy_logo2;



		}	



		return $subCategory;



	}



	



		public function sellSubCategory($subCategoryID = false , $limit = false){



		if($subCategoryID){



			$this->db->where($subCategoryID);



		}



		if($limit){



			$this->db->limit($limit);



		}



		$subCategoryData = $this->db->get('categorysell')



				 					->result();



									



									//echo $this->db->lat_query();



		return $subCategoryData;



	}



	



	



	public function sellproductSubCategory($CategoryName=false, $CategoryID = false , $limit = false){



		if($CategoryID){



			$this->db->where('category',$CategoryID);



		}



		if($limit){



			$this->db->limit($limit);



		}



		$productsubCategoryData = $this->db->select('id,category_name')



		                                 ->group_by('id')



		                                ->get('categorysell')



				 				     	->result();



									//echo $this->db->last_query();



		return $productsubCategoryData;



	}



	



	  



	public function allListing($subCategoryID=false,$filter=false,$limit = false){



		if($subCategoryID){



			$this->db->where($subCategoryID);



		}



		 if($filter)

		 {



			 if($filter=='sort_price' || $filter=='-sort_price')



			 {

				 $this->db->order_by('tbl_sell_product.price','asc');



			 }



			 elseif($filter=='sort_pricedesc' || $filter=='-sort_pricedesc')



			 {



				 $this->db->order_by('tbl_sell_product.price','desc');

			 }



			 elseif($filter=='sort_date' || $filter=='sort_date')



			 {

				  $this->db->order_by('tbl_sell_product.price','desc');

			 }



			 else

			 {

				$this->db->order_by('tbl_sell_product.product_id', 'desc'); 

			 }

		}



		 else



		 {



			 $this->db->order_by('tbl_sell_product.product_id', 'desc');



		 }



		if($limit){



			$this->db->limit($limit);



		}



		$ListingData = $this->db->group_by('product_id')

		                            ->get('sell_product');

									if($ListingData->num_rows()>0)

									{

				 					$sellListingData = $ListingData->result();

									}

									else

									{

										$sellListingData=0;

									}



									//echo $this->db->last_query();



		return $sellListingData;



	  }



	  



	  public function similarAddData($CategoryID=false,$limit = false){



		if($CategoryID){



			$this->db->where($CategoryID);



		}



		



		if($limit){



			$this->db->limit($limit);



		}



		$ListingData = $this->db->group_by('product_id')



		                            ->get('sell_product');



									



									if($ListingData->num_rows()>0)



									{



				 					$sellListingData = $ListingData->result();



									}



									else



									{



										$sellListingData=0;



									}



									//echo $this->db->last_query();



		return $sellListingData;



	  }



	   public function sellcategoryName($CatgeoryId=false,$limit = false){



			if($CatgeoryId)



			{



				$this->db->where($CatgeoryId);



			}



			



				if($limit){



			        $this->db->limit($limit);



	      	}



		            $CategoryName =$this->db->select('buy_category_name')



					                ->order_by('buy_category_name','asc')



		                           ->get('sellcategory')



				 					->result();



									foreach ($CategoryName as $row)



                                        {



                     $subCategory = $row->buy_category_name;



                              } 







		           return $subCategory;



	   }



	   



	    public function sellsubcategoryName($CatgeoryId=false,$limit = false){



			if($CatgeoryId)



			{



				$this->db->where($CatgeoryId);



			}



			



				if($limit){



			        $this->db->limit($limit);



	      	}



		            $CategoryName =$this->db->select('category_name')



		                                    ->get('tbl_categorysell')



				 					        ->result();



									foreach ($CategoryName as $row)



                                        {



                     $subCategoryName = $row->category_name;



                              } 



		           return $subCategoryName ;



	   }



	   



	    public function sellcategoryBrand($CatgeoryId=false,$limit = false){



			if($CatgeoryId)



			{



				$this->db->where($CatgeoryId);



			}



			



				if($limit){



			        $this->db->limit($limit);



	      	}



		            $BerandName =$this->db->order_by('brand_name','asc')



		                                   ->get('sellbrands')



				 					       ->result();



									//echo $this->db->last_query();



							 return $BerandName;



	   }



	   



	   public function sellcategoryBrandname($brandid=false){



			if($brandid)



			{



				$this->db->where('brand_id',$brandid);



			}



		            $BerandName =$this->db->order_by('brand_name')



		                                   ->get('sellbrands')



				 					       ->row();



									//echo $this->db->last_query();



							 return $BerandName;



	   }



	   



	   



	    public function SearchProductDetails($searchfeild=false, $limit=false){
		 if($searchfeild){
			$where="bussiness_nature='%".$searchfeild."%'  ";
			$where1="company_name like '%".$searchfeild."%' ";
			}
		 if($limit){
			        $this->db->limit($limit);
	     }
		 $SearchProductDetails = $this->db->join('company_details' , 'product_details.company_id=company_details.company_id','LEFT')
		->join('user_signup' , 'company_details.user_id=user_signup.id','LEFT')
		->join('category' , 'product_details.category=category.cat_id','left')
		->join('subcategory' , 'product_details.sub_category=subcategory.sub_cat_id','left')
		->where($where,NULL,false)
		->order_by('tbl_product_details.product_id','ASC')
        ->get('product_details');
		
		$SearchProductCompanyDetails = $this->db->join('company_details' , 'product_details.company_id=company_details.company_id','LEFT')
		->join('user_signup' , 'company_details.user_id=user_signup.id','LEFT')
		->join('category' , 'product_details.category=category.cat_id','left')
		->join('subcategory' , 'product_details.sub_category=subcategory.sub_cat_id','left')
		->where($where1)
		->order_by('tbl_product_details.product_id','ASC')
        ->get('product_details');
		$SearchProductData = $SearchProductDetails->result();
		$SearchProductCompanyData = $SearchProductCompanyDetails->result();
		$searchListingData = array_merge($SearchProductData,$SearchProductCompanyData);
		
       if(count($searchListingData) > 0){
			return $searchListingData;
		}else{
			return 0;
		}
	   }



	   public function SearchallProductDetails($searchfeild=false, $limit=false){



		 if($searchfeild){



			$where="category.category like '%".$searchfeild."%' or tbl_subcategory.subcategory like '%".$searchfeild."%' or company_name like '%".$searchfeild."%' order by tbl_product_details.product_id asc ";



		 }



		 if($limit){



			        $this->db->limit($limit);



	      	}



		     $SearchProductDetails = $this->db->join('category' , 'category.cat_id=product_details.category','left')



			                     ->join('subcategory' , 'subcategory.sub_cat_id=product_details.sub_category','left')



								 ->where($where)



		                         ->get('product_details');



								 



		                         if($SearchProductDetails->num_rows()>0)



									{



				 					$searchListingData = $SearchProductDetails->result();



									}



									else



									{



										$searchListingData=0;



									}



		



									//echo $this->db->last_query();



		 return $searchListingData;



	   }



	   



	   



	   public function allLeadData($condition=false,$limit=false){



		   if($condition)



		   {



			   $this->db->where($condition);



		   }



		



		 if($limit){



			        $this->db->limit($limit);



	      	}



		     $LeadDataDetails =$this->db->join('company_details' , 'company_details.company_id=buy_leads.company_id','left')



			                          ->get('buy_leads');



								 



		                         if($LeadDataDetails->num_rows()>0)



									{



				 					$ListingData = $LeadDataDetails->result();



									}



									else



									{



										$ListingData=0;



									}



		



									//echo $this->db->last_query();



		 return $ListingData;



	   }



	   public function allLeadDataCount($condition=false){



		   if($condition)



		   {



			   $this->db->where($condition);



		   }



		     $LeadDataDetails =$this->db->join('company_details' , 'company_details.company_id=buy_leads.company_id','left')



			                          ->get('buy_leads');



			 $LeadDataDetails->num_rows();



									//echo $this->db->last_query();



		   return $LeadDataDetails;



	   }



	   



	    public function SearchLeadProductDetails($searchfeild=false, $limit=false){



		 if($searchfeild){



			$where="category.category like '".$searchfeild."' or tbl_subcategory.subcategory like '".$searchfeild."' or  tbl_company_details.company_name like '".$searchfeild."' order by tbl_buy_leads.lead_id asc ";



		 }



		 if($limit){



			        $this->db->limit($limit);



	      	}



		     $SearchProductDetails = $this->db->join('category' , 'category.cat_id=buy_leads.category','left')



			                     ->join('subcategory' , 'subcategory.sub_cat_id=buy_leads.subcategory','left')



								 ->join('company_details' , 'company_details.company_id=buy_leads.company_id','left')



								 ->where($where)



		                         ->get('buy_leads');



								 



		                         if($SearchProductDetails->num_rows()>0)



									{



				 					$searchListingData = $SearchProductDetails->result();



									}



									else



									{



										$searchListingData=0;



									}



		



									//echo $this->db->last_query();



		 return $searchListingData;



	   }



	    public function SearchLeadProductDetailsNext($nextid=false, $searchfeild=false,$limit=false){



		 if($searchfeild){



			$where="tbl_buy_leads.lead_id >'".$nextid."' and (tbl_category.category like '".$searchfeild."' or tbl_subcategory.subcategory like '".$searchfeild."' or  tbl_company_details.company_name like '".$searchfeild."') order by tbl_buy_leads.lead_id asc  ";



		 }



		 if($limit)



		 {



			 $this->db->limit($limit);



		 }



		



		     $SearchProductDetails = $this->db->join('category' , 'category.cat_id=buy_leads.category','left')



			                     ->join('subcategory' , 'subcategory.sub_cat_id=buy_leads.subcategory','left')



								  ->join('company_details' , 'company_details.company_id=buy_leads.company_id','left')



								 ->where($where)



		                         ->get('buy_leads');



								 



		                         if($SearchProductDetails->num_rows()>0)



									{



				 					$searchListingData = $SearchProductDetails->result();



									}



									else



									{



										$searchListingData=0;



									}



		



									//echo $this->db->last_query();



		 return $searchListingData;



	   }



	   



	   public function sellproductsearch($searchfeild=false, $filter=false, $limit=false){



		 if($searchfeild){



			$where="tbl_sell_product.title like '%".$searchfeild."%' or tbl_categorysell.category_name like '%".$searchfeild."%' or tbl_sellcategory.buy_category_name like '%".$searchfeild."%'";



		 }



		 if($filter)



		 {



			 if($filter=='sort_price')



			 {



				 $this->db->order_by('tbl_sell_product.price','asc');



			 }



			 elseif($filter=='sort_pricedesc')



			 {



				 $this->db->order_by('tbl_sell_product.price','desc');



			 }



			 elseif($filter=='sort_date')



			 {



				  $this->db->order_by('tbl_sell_product.price','desc');



			 }



			 else



			 {



				



				$this->db->order_by('tbl_sell_product.product_id', 'asc'); 



			 }



			 



		 }



		 if($limit){



			        $this->db->limit($limit);



	      	}



		     $SearchProductDetails = $this->db->join('sellcategory' , 'sellcategory.id=sell_product.category','left')



			                     ->join('categorysell' , 'categorysell.id=sell_product.subcategory','left')



								 ->where($where)



		                         ->get('sell_product');



								 



		                         if($SearchProductDetails->num_rows()>0)



									{



				 					$searchListingData = $SearchProductDetails->result();



									}



									else



									{



										$searchListingData=0;



									}



		



									//echo $this->db->last_query();



		 return $searchListingData;



	   }



	   



	   public function allListingFilter($subCategoryID=false,$filter=false,$limit = false){



		if($subCategoryID){



			$this->db->where($subCategoryID);



		}



		$paramArray = array();



		 if($filter)



		 {



			  $filtersOption=explode('-',$filter);



			  foreach($filtersOption as $filtersOption){



				 $conditionArray = explode('_',$filtersOption);



				 $optionType = $conditionArray[0];



				 unset($conditionArray[0]);



				 $paramArray['Type'][] = $optionType;



				 $paramArray[$optionType] = $conditionArray;



			 }



			



			 if(in_array('Option',$paramArray['Type'],true) && count(array_filter($paramArray['Option'])) > 0)



			 {				



				 $this->db->where_in('brand_id',$paramArray['Option']);



			 }



			 if(in_array('price',$paramArray['Type'],true))



			 {				



				 



				 $price=$paramArray['price'][1];



				 $price2=$paramArray['price'][2];



				 if($price2!='')



				 {



				 $where="price between $price and $price2";



				 }



				 else



				 {



					  $where="price > $price";



				 }



				 $this->db->where($where);



                // $this->db->where('price <=', $price2);



				



			 }



			 if(in_array('locality',$paramArray['Type'],true) && count(array_filter($paramArray['locality'])) > 0)



			 {				



				 $this->db->where_in('state',$paramArray['locality']);



			 }	



			 if(in_array('seller',$paramArray['Type'],true) && count(array_filter($paramArray['seller'])) > 0)



			 {				



				 $this->db->where_in('sellertype',$paramArray['seller']);



			 }



			 if(in_array('bedroom',$paramArray['Type'],true) && count(array_filter($paramArray['bedroom'])) > 0)



			 {				



				 $this->db->where_in('Bedrooms',$paramArray['bedroom']);



			 }



			  if(in_array('jobtype',$paramArray['Type'],true) && count(array_filter($paramArray['jobtype'])) > 0)



			 {				



				 $this->db->where_in('position',$paramArray['jobtype']);



			 }



			 if(in_array('furnished',$paramArray['Type'],true) && count(array_filter($paramArray['furnished'])) > 0)



			 {				



				 $this->db->where_in('furnished',$paramArray['furnished']);



			 }



			 if(in_array('broker',$paramArray['Type'],true) && count(array_filter($paramArray['broker'])) > 0)



			 {				



				 $this->db->where_in('broker_free',$paramArray['broker']);



			 }



			 



			 if(in_array('sort',$paramArray['Type'],true))



			 {				



				 if(in_array('price', $paramArray['sort'] , true))



			 	 {



				 	$this->db->order_by('tbl_sell_product.price','asc');



			 	 }



		



				 if(in_array('pricedesc', $paramArray['sort'] , true))



				 {



					 $this->db->order_by('tbl_sell_product.price','desc');



				 }



				 if(in_array('date', $paramArray['sort'] , true))



				{



					$this->db->order_by('tbl_sell_product.price','desc');



				}



			 }		



			



		 }



		if($limit){



			$this->db->limit($limit);



		}



		$ListingData = $this->db->group_by('product_id')



		                            ->get('sell_product');



									



									if($ListingData->num_rows()>0)



									{



				 					$sellListingData = $ListingData->result();



									}



									else



									{



										$sellListingData=0;



									}



								//	echo $this->db->last_query();



		return $sellListingData;



	  }



	  



	  



	  public function makeUrlSubCatList($catName , $subCatName , $catId , $subCatId , $filter , $optionValue , $optionTypeParam){		



	  		  $url =  SITE_URL.'productsell/subcategoryList/'.$catName.'/'.$subCatName.'/'.$catId.'/'.$subCatId.'/';



			



			  $filtersOption=explode('-',$filter);



			  $conditionCheckArray = array();



			  foreach($filtersOption as $filtersOption){



				 $conditionArray = explode('_',$filtersOption);



				 $optionType = $conditionArray[0];



				 unset($conditionArray[0]);



				 $paramArray['Type'][] = $optionType;



				 $paramArray[$optionType] = $conditionArray;



				 array_filter($paramArray[$optionType]);



			 }			



			 	$conditionCheckArray = $paramArray;



			 	 if(!in_array($optionValue , $paramArray['Option']) && $optionTypeParam === 'Option'){



					 $paramArray['Option'][] = $optionValue;



					 $url.='Option_'.implode('_',$paramArray['Option']).'-';



				 }else if(count($paramArray['Option']) > 0){



						 $url.='Option_'.implode('_',$paramArray['Option']).'-';



				}



				if(!in_array($optionValue , $paramArray['bedroom']) && $optionTypeParam === 'bedroom'){



					 $paramArray['bedroom'][] = $optionValue;



					 $url.='bedroom_'.implode('_',$paramArray['bedroom']).'-';



				 }else if(count($paramArray['bedroom']) > 0){



						 $url.='bedroom_'.implode('_',$paramArray['bedroom']).'-';



				}	



			 	if(!in_array($optionValue , $paramArray['price']) && $optionTypeParam === 'price'){					



					 $paramArray['price'][1] = $optionValue;



					 array_filter($paramArray['price']);



					 $url.='price_'.$paramArray['price'][1].'-';



				 }else if(count($paramArray['price']) > 0){



					 $url.='price_'.$paramArray['price'][1].'_'.$paramArray['price'][2].'-';



				}



			 	if(!in_array($optionValue , $paramArray['seller']) && $optionTypeParam === 'seller'){



					 $paramArray['seller'][] = $optionValue;



					 $url.='seller_'.implode('_',$paramArray['seller']).'-';



				}else if(count($paramArray['seller']) > 0){



					$url.='seller_'.implode('_',$paramArray['seller']).'-';



				}



				if(!in_array($optionValue , $paramArray['jobtype']) && $optionTypeParam === 'jobtype'){



					 $paramArray['jobtype'][] = $optionValue;



					 $url.='jobtype_'.implode('_',$paramArray['jobtype']).'-';



				}else if(count($paramArray['jobtype']) > 0){



					$url.='jobtype_'.implode('_',$paramArray['jobtype']).'-';



				}



				if(!in_array($optionValue , $paramArray['furnished']) && $optionTypeParam === 'furnished'){



					 $paramArray['furnished'][] = $optionValue;



					 $url.='furnished_'.implode('_',$paramArray['furnished']).'-';



				}else if(count($paramArray['furnished']) > 0){



					$url.='furnished'.implode('_',$paramArray['furnished']).'-';



				}



				if(!in_array($optionValue , $paramArray['broker']) && $optionTypeParam === 'broker'){



					 $paramArray['broker'][] = $optionValue;



					 $url.='broker_'.implode('_',$paramArray['broker']).'-';



				}else if(count($paramArray['broker']) > 0){



					$url.='broker_'.implode('_',$paramArray['broker']).'-';



				}



			 	 if(!in_array($optionValue , $paramArray['locality']) && $optionTypeParam === 'locality' ){



					 $paramArray['locality'][] = $optionValue;



					 $url.='locality_'.implode('_',$paramArray['locality']).'-';



				 }else if(count($paramArray['locality']) > 0){



					  $url.='locality_'.implode('_',$paramArray['locality']).'-';



				}



				if(!in_array($optionValue , $paramArray['sort']) && $optionTypeParam === 'sort'){



					 $paramArray['sort'][1] = $optionValue;



					  $url.='sort_'.$paramArray['sort'][1];



				 }else if(count($paramArray['sort']) > 0){



					 $url.='sort_'.$paramArray['sort'][1];



					



				}	



			



			 	$output = array('URL' => $url,



								'paramArray' => $conditionCheckArray



								 );	



				return $output;	



		 }



		 



		 



		 



		 public function userProductCatalog($condition) 



		 {



			 



			 $cataLogData = $this->db->join('company_details' , 'company_details.company_id=product_details.company_id','inner')



			                         ->where($condition)



			                        ->group_by('product_id')



		                            ->get('product_details');



									if($cataLogData->num_rows()>0)



									{



				 					$cataLogDataList = $cataLogData->result();



									}



									else



									{



										$cataLogDataList=0;



									}



									return $cataLogDataList;



												 



		 }



		 



		  public function usersellProductCatalog($condition) 



		 {



			 



			 $cataLogData = $this->db->where($condition)



			                        ->group_by('product_id')



		                            ->get('sell_product');



									if($cataLogData->num_rows()>0)



									{



				 					$cataLogDataList = $cataLogData->result();



									}



									else



									{



										$cataLogDataList=0;



									}



									return $cataLogDataList;



												 



		 }



		 



		  public function userenquiryData($condition,$limit= false) 



		 {



			 if($limit){



			$this->db->limit($limit);



		}



			 



			 $userenquiryData = $this->db->join('product_details' , 'product_details.product_id=products_enqiry.product_id','inner')



			                         ->join('company_details' , 'company_details.company_id=product_details.company_id','inner')



			                         ->where($condition)



		                             ->get('products_enqiry');



									if($userenquiryData->num_rows()>0)



									{



				 					$userenquiryDataList = $userenquiryData->result();



									}



									else



									{



										$userenquiryDataList=0;



									}



									return $userenquiryDataList;



									



												 



		 }



		 



		  public function getcompanyId($condition) 



		 {



			 $CompnayId = $this->db->select('company_id')



			                          ->where($condition)



		                            ->get('company_details')



									->row();



									return $CompnayId;







		 }



		 



		 



		 



		 public function leadListingdata($condition = false , $limit = false)



		 {



		 if($condition){



			$this->db->where($condition);



		 }



		if($limit){



			$this->db->limit($limit);



		}



		$uaserleadListingdata =$this->db->join('company_details' , 'company_details.company_id=buy_leads.company_id','inner')



		                               ->join('user_signup' , 'user_signup.id=company_details.user_id','inner')



									   ->group_by('buy_leads.lead_id')



		                                 ->get('buy_leads');



		if($uaserleadListingdata->num_rows() > 0)



		{



			$uaserleadListing= $uaserleadListingdata->result();



		}



		else



		{



			$uaserleadListing=0;



		}



		



		return $uaserleadListing;



		



	   }



		



		public function userProductListingdata($condition = false , $limit = false){



		 if($condition){



			$this->db->where($condition);



		 }



		if($limit){



			$this->db->limit($limit);



		}



		$userProductListingdata =$this->db->join('company_details' , 'company_details.company_id=product_details.company_id','inner')



		                               ->join('user_signup' , 'user_signup.id=company_details.user_id','inner')



									   ->group_by('product_details.product_id')



		                                 ->get('product_details');



		if($userProductListingdata->num_rows() > 0)



		{



			$ProductList= $userProductListingdata->result();



		}



		else



		{



			$ProductList=0;



		}



		



		return $ProductList;



		



	   } 



	   



	   



	   		public function userStateProductListingdata($condition = false , $limit = false){



		 if($condition){



			$this->db->where($condition);



		 }



		if($limit){



			$this->db->limit($limit);



		}



		$userProductListingdata =$this->db->join('company_details' , 'company_details.company_id=product_details.company_id','inner')



		                               ->join('user_signup' , 'user_signup.id=company_details.user_id','inner')



									   ->group_by('product_details.product_id')



		                                 ->get('product_details');



		if($userProductListingdata->num_rows() > 0)



		{



			$ProductList= $userProductListingdata->result();



		}



		else



		{



			$ProductList=0;



		}



		



		return $ProductList;



		



	   } 



	   



	   



	   



	   public function usercompanyDetails($condition = false , $limit = false)



		 {



		 if($condition){



			$this->db->where($condition);



		 }



		if($limit){



			$this->db->limit($limit);



		}



		$userCompanyData =$this->db->join('company_details' , 'user_signup.id=company_details.user_id','inner')				



							   ->group_by('company_details.company_id')



		                                 ->get('user_signup');



		if($userCompanyData->num_rows() > 0)



		{



			$userCompanyListing= $userCompanyData->result();



		}



		else



		{



			$userCompanyListing=0;



		}



		return $userCompanyListing;



	   }



	   



	    public function companyDetails($condition = false)



		 {



		 if($condition){



			$this->db->where($condition);



		 }



		



		$userCompanyData =$this->db->join('company_details' , 'user_signup.id=company_details.user_id','inner')



									   ->group_by('company_details.company_id')



		                                 ->get('user_signup')



										  ->row();



		



		return $userCompanyData;



	   }



	   



	    public function companyHomeContent($condition = false)



		 {



		 if($condition){



			$this->db->where($condition);



		 }



		



		$userCompanyhomeData =$this->db->get('home_content')



										  ->row();



		



		return $userCompanyhomeData;



	   }



	   



	   public function companyDataDisplayContent($condition = false)



		 {



		  if($condition){



			$this->db->where($condition);



		 }



		$userCompanyContent =$this->db->join('site_features' , 'site_features.company_id=company_details.company_id','inner')



	                             	  ->join('user_signup' , 'user_signup.id=company_details.user_id','inner')



									   ->group_by('site_features.feature_id')



									   ->get('company_details');



									   



		if($userCompanyContent->num_rows() > 0)



		{



			$CompanyContent= $userCompanyContent->result();



		}



		else



		{



			$CompanyContent=0;



		}



		return $CompanyContent;



	   }



	   public function updateSiteFetaureimage($condition = false)



		 {



		  if($condition){



			$this->db->where($condition);



		 }



		    $userCompanyContent =$this->db->get('site_features');



			$CompanyContent= $userCompanyContent->row();



			return $CompanyContent;



	   }



	   



	   



	   



	   public function companyDataDisplayTetmonial($condition = false)



		 {



		  if($condition){



			$this->db->where($condition);



		 }



		$userCompanyContent =$this->db->join('tbl_testomonial' , 'tbl_testomonial.company_id=company_details.company_id','inner')



	                             	  ->join('user_signup' , 'user_signup.id=company_details.user_id','inner')



									   ->group_by('tbl_testomonial.testo_id')



									   ->get('company_details');



									   



		if($userCompanyContent->num_rows() > 0)



		{



			$CompanyContent= $userCompanyContent->result();



		}



		else



		{



			$CompanyContent=0;



		}



		return $CompanyContent;



	   }



	   



	   public function companyDataDisplayNews($condition = false)



		 {



		  if($condition){



			$this->db->where($condition);



		 }



		$userCompanyContent =$this->db->join('news_display' , 'news_display.company_id=company_details.company_id','inner')



	                             	  ->join('user_signup' , 'user_signup.id=company_details.user_id','inner')



									   ->group_by('news_display.news_id')



									   ->get('company_details');



									   



		if($userCompanyContent->num_rows() > 0)



		{



			$CompanyContent= $userCompanyContent->result();



		}



		else



		{



			$CompanyContent=0;



		}



		return $CompanyContent;



	   }



	   



	   public function companyDataDisplayNewsDetails($condition = false)



		 {



		  if($condition){



			$this->db->where($condition);



		 }



		$userCompanyContent =$this->db->join('news_display' , 'news_display.company_id=company_details.company_id','inner')



	                             	  ->join('user_signup' , 'user_signup.id=company_details.user_id','inner')



									   ->group_by('news_display.news_id')



									   ->get('company_details')



		                               ->row();



	



		return $userCompanyContent;



	   }



	   



	   public function ctalognewslist($condition = false)



		 {



		  if($condition){



			$this->db->where($condition);



		 }



		$ctalognewslist =$this->db->get('testomonial');



		if($ctalognewslist->num_rows() > 0)



		{



			$CompanyContent= $ctalognewslist->result();



		}



		else



		{



			$CompanyContent=0;



		}



		return $CompanyContent;



	   }



	   



	    public function headingName($condition = false)



		 {



		  if($condition){



			$this->db->where($condition);



		 }



		$headingNameData =$this->db->group_by('heading_id')



									   ->get('content_heading')



                                        ->result();



	



		return $headingNameData;



	   }



	   public function headingNameDisplay($condition = false)



		 {



		  if($condition){



			$this->db->where($condition);



		 }



		$headingNameData =$this->db->group_by('heading_id')



									   ->get('content_heading')



                                        ->row();



	



		return $headingNameData;



	   }



	   



	   public function userCtalogcatgeoryList($condition = false){



		$productCategory = $this->db->select('category,company_id');



		if($condition){



			$this->db->where($condition);



		}



		$productCategory = $this->db->group_by('category')



		                     ->get('product_details')								



							 ->result();



		foreach($productCategory as $productCategory){			



			$categoryId = $productCategory->category;



			$companyid = $productCategory->company_id;



			$condition = array('category' => $categoryId,'company_id' => $companyid);



			$productsubCategory[$productCategory->category] = $this->userproductSubCategory($condition);	



			$productsubCategory[$productCategory->category]['categoryId'] = $categoryId;



		}	



		return $productsubCategory;



	}



	public function userproductSubCategory($condition = false){



		if($condition){



			$this->db->where($condition);



		}



		$subCategoryData = $this->db->group_by('sub_category')



		                            ->get('product_details')



				 					->result();



		return $subCategoryData;



	}



	



	



	public function CategoryName($categoryID=false){



			if($categoryID)



			{



				$this->db->where($categoryID);



			}



				$CategoryListData =$this->db->order_by('category','asc')



		                                     ->get('category')



				 					         ->row();



		return $CategoryListData;



	   }



	   



	   public function SubCategoryNameDisplay($categoryID=false){



			if($categoryID)



			{



				$this->db->where($categoryID);



			}



				$CategoryListData =$this->db->order_by('sub_cat_id','asc')



		                                     ->get('subcategory')



				 					         ->row();



		return $CategoryListData;



	   }



	   



	    public function income(){



				$incomeData =$this->db->order_by('income_id')



		                                     ->get('income')



				 					         ->result();



		return $incomeData;



	   } 



	   



	    public function bussinessType(){



				$bussinesstypeData =$this->db->order_by('bussiness_id')



		                                     ->get('bussiness_type')



				 					         ->result();



		return $bussinesstypeData;



	   }



	   public function ownershipType(){



				$ownershipTypeData =$this->db->order_by('ownership_id')



		                                     ->get('ownership')



				 					         ->result();



		return $ownershipTypeData;



	   }



	   



	    public function companybussinessdetails($condition=false){



			if($condition)



			{



				$this->db->where($condition);



			}



				$ownershipTypeData =$this->db->get('company_bussiness_details')



				 					         ->row();



		return $ownershipTypeData;



	   }



	   



	    public function requirmentfrequency(){



				$requirmentfrequencyData =$this->db->order_by('requir_id')



		                                     ->get('tbl_requirment_frequency')



				 					         ->result();



		return $requirmentfrequencyData;



	   }



	   



	    public function requirmentunits(){



				$requirmentUnitsData =$this->db->order_by('unit_id')



		                                     ->get('required_units')



				 					         ->result();



		return $requirmentUnitsData;



	   }



	   public function currencyList(){



				$currencyListData =$this->db->order_by('currency_id')



		                                     ->get('currencylist')



				 					         ->result();



		return $currencyListData;



	   }



	   



	   public function userRegisterCategory($userID=false){



		   if($userID)



		   {



			   $this->db->where($userID);



		   }



				$userRegisterCategoryData =$this->db->select('group_concat(category) as data,group_concat(sub_category) as datasub')



				                            ->join('company_details','company_details.company_id=product_details.company_id')



                                             ->get('product_details');



											 if($userRegisterCategoryData->num_rows()>0)



											 {



												 $listuserRegisterCategoryData=$userRegisterCategoryData->row();



											 }



											 else



											 {



												 $listuserRegisterCategoryData==0;



				 					        



											 }



		return $listuserRegisterCategoryData;



	   }



	   public function userRegisterstate($userID=false){



		   if($userID)



		   {



			   $this->db->where($userID);



		   }



				$userRegisterstateData =$this->db->select('group_concat(state) as state')



				                            ->join('company_details','company_details.company_id=product_details.company_id')



                                             ->get('product_details');



											 if($userRegisterstateData->num_rows()>0)



											 {



												 $listuserRegisterstateData=$userRegisterstateData->row();



											 }



											 else



											 {



												 $listuserRegisterstateData=0;



				 					        



											 }



		return $listuserRegisterstateData;



	   }



	   public function CheckuserCredits($condition = false){



			if($condition)



			{



				$this->db->where($condition);



			}



				$CheckuserCreditsData =$this->db->get('user_credits')



				 					            ->row();



		        return $CheckuserCreditsData;



	      }



		  



		  public function Checkuserlead($condition=false){



			if($condition)



			{



				$this->db->where($condition);



			}



				$Checkuserlead =$this->db->get('user_leads_history');



				if($Checkuserlead->num_rows()>0)



				{



					 $Checkuserleaddata=1;



				}



				else



				{



					$Checkuserleaddata=0;



					



				}



				 					         



		    return $Checkuserleaddata;



	      }



		  



		  public function packageDetailsLead()



		  {



			  $paymentData=$this->db->get('tbl_package_plan')



			                        ->result();



									return $paymentData;



		  }



		  



		   public function leadpackageData()



		  {



			  $leadpackageData=$this->db->get('leadpackage')



			                        ->row();



									return $leadpackageData;



		  }



		  



		  public function checkpaymentattempt($condition)



		  {



			  if($condition)



			  {



				  $this->db->where($condition);



			  }



			  $checkstatus = $this->db->get('payment_details');



			  if($checkstatus->num_rows()>0)



			  {



				  $AttemptStatus=1;



				  



			  }



			  else



			  {



				  $AttemptStatus=0;



			  }



			 



			  return $AttemptStatus;



		  }



		  



		   public function checkreply($condition)



		  {



			  if($condition)



			  {



				  $this->db->where($condition);



			  }



			  $checkstatus = $this->db->get('user_reply');



			  if($checkstatus->num_rows()>0)



			  {



				  $Replystatus=$checkstatus->result();



			  }



			  else



			  {



				  $Replystatus=0;



			  }



			 



			  return $Replystatus;



		  }



		   public function checkreplyStatus($condition)



		  {



			  if($condition)



			  {



				  $this->db->where($condition);



			  }



			  $checkstatus = $this->db->get('user_reply');



			  $checkstatusenquiry= $checkstatus->num_rows();



			  return $checkstatusenquiry;



		  }



		   public function userprefrencelead($condition)



		  {



			  if($condition)



			  {



				  $this->db->where($condition);



			  }



			  $checkprefrence = $this->db->get('userbuylead_prefernce');



			  $userprefrencelead= $checkprefrence->row();



			  return $userprefrencelead;



		  }



		  



		   public function checkInbox($condition)



		  {



			  if($condition)



			  {



				  $this->db->where($condition);



			  }



			  $userenquiryData = $this->db->join('product_details' , 'product_details.product_id=products_enqiry.product_id','inner')



			                              ->join('company_details' , 'company_details.company_id=product_details.company_id','inner')



			                              ->where($condition)



		                                  ->get('products_enqiry');



								         	$Inboxstatus=$userenquiryData->num_rows();



									        return $Inboxstatus;



		  }



		  



		  public function userprofilecomplete($userId)



		  {



			  



			  $z=0;



	          $xz=20; 



			  $CheckSignup=$this->db->get('user_signup');



			  if($CheckSignup->num_rows()>0)



			  {



				  $z=$z+$xz;



			  }



			  return $z;



		  }



		  



		  public function userprofileDetails($userId)



		  {



			  if($userId)



			  {



				  $this->db->where('id',$userId);



			  }



			  $userDetails=$this->db->get('user_signup')



			                        ->row();



			  return $userDetails;



		  }



		  



		  public function sendemail($to,$from,$subject,$body)



		  {

		   $this->email->from($from, 'IndiaBiz Trade');

           $this->email->to($to);

          // $this->email->cc('info@quailtec.com');

           //$this->email->bcc('them@their-example.com');

           $this->email->subject($subject);

           $this->email->message($body);

		    $this->email->set_mailtype("html");

           $this->email->send();



		  }



		  



		  public function CheckNextListing($condition=false,$limit=false)



		  {



			  if($condition)



			  {



				  $this->db->where($condition);



			  }



			  if($limit)



			  {



				  $this->db->limit($limit);



			  }



			  



			  $checkStatusList=$this->db->get('product_details');



			  if($checkStatusList->num_rows()>0)



			  {



				  $ListData=$checkStatusList->row();



			  }



			  else



			  {



				  $ListData=0;



			  }



			  return $ListData;



		  }



		  



		  public function checkpriviousListStatus($condition=false,$limit=false)



		  {



			  if($condition)



			  {



				  $this->db->where($condition);



			  }



			  if($limit)



			  {



				  $this->db->limit($limit);



			  }



			  



			  $checkStatusList=$this->db->get('product_details');



			  if($checkStatusList->num_rows()>0)



			  {



				  $ListData=$checkStatusList->row();



			  }



			  else



			  {



				  $ListData=0;



			  }



			  return $ListData;



		  }



		  



		  public function CheckNextsellProduct($condition=false,$limit=false)



		  {



			  if($condition)



			  {



				  $this->db->where($condition);



			  }



			  if($limit)



			  {



				  $this->db->limit($limit);



			  }



			  



			  $checkStatusList=$this->db->get('sell_product');



			  if($checkStatusList->num_rows()>0)



			  {



				  $ListData=$checkStatusList->row();



			  }



			  else



			  {



				  $ListData=0;



			  }



			  return $ListData;



		  }



		  



		  public function checkprivioussellProduct($condition=false,$limit=false)



		  {



			  if($condition)



			  {



				  $this->db->where($condition);



			  }



			  if($limit)



			  {



				  $this->db->limit($limit);



			  }



			  



			  $checkStatusList=$this->db->get('sell_product');



			  if($checkStatusList->num_rows()>0)



			  {



				  $ListData=$checkStatusList->row();



			  }



			  else



			  {



				  $ListData=0;



			  }



			  return $ListData;



		  }



	   



	   public function getProductImages($condition=false,$limit=false)

		  {

			  if($condition)

			  {

				  $this->db->where($condition);

			  }

			  if($limit)

			  {

				  $this->db->limit($limit);

			  }

			  $getProductImagesList=$this->db->select('group_concat(images_name) as data')

			                              ->get('tbl_sellproduc_images');

			  if($getProductImagesList->num_rows()>0)

			  {

				  $ListData=$getProductImagesList->row();

			  }

			  else

			  {

				  $ListData=0;

			  }

			  return $ListData;

		  }

		  public function getProductImag($condition=false,$limit=false)

		  {

			  if($condition)

			  {

				  $this->db->where($condition);

			  }

			  if($limit)

			  {

				  $this->db->limit($limit);

			  }

			  $getProductImagesList=$this->db->get('sellproduc_images')

			                                  ->row();

			

			  return $getProductImagesList;

		  }

		  	  public function selectAllState($condition=false){



/*			if($condition)



			{



				$this->db->where('state_id',$condition);



			}



*/				$StateListData =$this->db->get('state')



				 					         ->result();



		return $StateListData;



	   }



		  



		  public function stateAllDistrict($condition=false){



			if($condition)



			{



				$this->db->where('state_id',$condition);



			}



				$CategoryListData =$this->db->get('district')



				 					         ->result();



		return $CategoryListData;



	   }



		  



		  



		  	  public function stateDisplayName($condition=false){

			if($condition)

			{

				$this->db->where('state_id',$condition);



			}

				$showStateName =$this->db->get('state')

				 					         ->row();

		return $showStateName;



	   }



		



		



		    public function districtDisplayName($condition=false){

			if($condition)

			{

				$this->db->where('district_id',$condition);

			}

				$showdistrictName =$this->db->get('district')

		        ->row();

				return $showdistrictName;

			   }



			  public function cityDisplayName($condition=false){

				if($condition)

				{

					$this->db->where('city_id',$condition);

				}

					$showcityName =$this->db->get('city')

					->row();

					return $showcityName;

	

				}

				

				function count_items($table , $condition){

					if($condition)

					{

						$this->db->where($condition);

					}

					$resulrAllData = $this->db->get($table);

                     return $resulrAllData->num_rows();

                  }



     function get_items($limit, $offset){

       // $data = array();

        $this->db->limit($limit, $offset);

        $Q = $this->db->get('location');

        if($Q->num_rows() > 0){

                $data = $Q->result();

            }

        

       // $Q->free_result();

        return $data;

    }

				

	public function allListingproduct($subCategoryID=false,$filter=false,$limit = false , $offset=false){

                                       



		if($subCategoryID){

			$this->db->where($subCategoryID);

		}

		 if($filter)

		 {

			 if($filter=='sort_price' || $filter=='-sort_price')

			 {

				 $this->db->order_by('tbl_sell_product.price','asc');

			 }

			 elseif($filter=='sort_pricedesc' || $filter=='-sort_pricedesc')



			 {



				 $this->db->order_by('tbl_sell_product.price','desc');

			 }



			 elseif($filter=='sort_date' || $filter=='sort_date')



			 {

				  $this->db->order_by('tbl_sell_product.price','desc');

			 }



			 else

			 {

				$this->db->order_by('tbl_sell_product.product_id', 'desc'); 

			 }

		}



		 else

		 {

			 $this->db->order_by('tbl_sell_product.product_id', 'desc');

		 }

		if($limit)

		{

			$this->db->limit($limit, $offset);

		}

		$ListingData = $this->db->group_by('product_id')

		                            ->get('sell_product');



									if($ListingData->num_rows()>0)

									{

				 					$sellListingData = $ListingData->result();

									}

									else

									{

										$sellListingData=0;

									}



									//echo $this->db->last_query();



		return $sellListingData;

	  }

				

			   }

