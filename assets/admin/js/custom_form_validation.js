$(document).ready(function(){
		   
	$('#addAdmin').validationEngine();
	$('#addcategory').validationEngine();
	$('#insert_subCategory').validationEngine();
	$('#uploadexcel').validationEngine();
	$('#changePass').validationEngine();
	$('#contentFrm').validationEngine();
	$('#addContact').validationEngine();
	$('#add_Adv').validationEngine();
	
	$(".editCategoy").click(function(){
		var id = $(this).attr("rel");
		//alert(id);
		var part='editCategoy';
		var dataString='id='+id+'&part='+part;
		$.ajax
		({
			type: "POST",
			url: WEBROOT_PATH+"admin/popup",	
			data: dataString,
			cache: false,
			success: function(data)
			{
				//alert(data);
				$("#modal-regular2").html(data);
			} 
		});
	});								
	$(".addsubcat").click(function(){
		//var id = $(this).attr("rel");
		//alert(id);
		var part='add_subcat';
		var dataString='part='+part;
		$.ajax
		({
			type: "POST",
			url: WEBROOT_PATH+"admin/addPopup",	
			data: dataString,
			cache: false,
			success: function(data)
			{
				//alert(data);
				$("#add_subcategory").html(data);
			} 
		});
	});										

$(".addSubCatExcel").click(function(){
		//var id = $(this).attr("rel");
		//alert(id);
		var part='upload_subcat_excel';
		var dataString='part='+part;
		$.ajax
		({
			type: "POST",
			url: WEBROOT_PATH+"admin/addPopup",	
			data: dataString,
			cache: false,
			success: function(data)
			{
				//alert(data);
				$("#modalExcel").html(data);
			} 
		});
	});			
	$(document).on('click' , '.editSubCat' ,function(){
		var id = $(this).attr("rel");
		//alert(id)
		var part='editSubCategoy';
		var dataString='id='+id+'&part='+part;
		$.ajax
		({
			type: "POST",
			url: WEBROOT_PATH+"admin/popup",	
			data: dataString,
			cache: false,
			success: function(data)
			{
				//alert(data);
				$("#modal-regular2").html(data);
			} 
		});
	});								

	$("#profile").click(function(){
		var id = $(this).attr("rel");
		var part='profile';
		//alert(id);
		var dataString='id='+id+'&part='+part;
		$.ajax
		({
			type: "POST",
			url: WEBROOT_PATH+"admin/popup",	
			data: dataString,
			cache: false,
			success: function(data)
			{
				//alert(data);
				$("#modal-user-profile").html(data);
			} 
		});
	});								
								

	$(".viewMore").click(function(){
		var id = $(this).attr("rel");
		var part='readPage';
		//alert(id);
		var dataString='id='+id+'&part='+part;
		$.ajax
		({
			type: "POST",
			url: WEBROOT_PATH+"admin/popup",	
			data: dataString,
			cache: false,
			success: function(data)
			{
				//alert(data);
				$("#pageModal").html(data);
			} 
		});
	});								

	$(".viewReq").click(function(){
		var id = $(this).attr("rel");
		var part='leadReq';
		//alert(id);
		var dataString='id='+id+'&part='+part;
		$.ajax
		({
			type: "POST",
			url: WEBROOT_PATH+"admin/popup",	
			data: dataString,
			cache: false,
			success: function(data)
			{
				//alert(data);
				$("#leadModal").html(data);
			} 
		});
	});								
								

	$(".editImage").click(function(){
		var id = $(this).attr("rel");
		var part='editAds';
		//alert(id);
		var dataString='id='+id+'&part='+part;
		$.ajax
		({
			type: "POST",
			url: WEBROOT_PATH+"admin/popup",	
			data: dataString,
			cache: false,
			success: function(data)
			{
				//alert(data);
				$("#modal_image").html(data);
			} 
		});
	});								
								

	$(".profilePic").click(function(){
		var id = $(this).attr("rel");
		var part='profilePic';
		//alert(id);
		var dataString='id='+id+'&part='+part;
		$.ajax
		({
			type: "POST",
			url: WEBROOT_PATH+"admin/popup",	
			data: dataString,
			cache: false,
			success: function(data)
			{
				//alert(data);
				$("#modal_pic").html(data);
			} 
		});
	});								
								
	});
