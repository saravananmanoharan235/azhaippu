function add_driver_form(){ alert();
	var error = 0;
	//var regex = /^([a-zA-Z\u0600-\u06FF])+$/; 
        var regex = /^([a-zA-Z])+$/;
	if(jQuery('#form1').find('#fname').val() == ''){
		jQuery('#form1').find('#fname').addClass('error');
		jQuery('#form1').find('#fname').next().show();
		error++;
	}else{

		jQuery('#form1').find('#fname').next().hide();
		
		if(!regex.test(jQuery('#form1').find('#fname').val())){
			jQuery('#form1').find('#fname').addClass('error');
			jQuery('#form1').find('#fname').next().next().show();
			error++;
		}else{
			jQuery('#form1').find('#fname').removeClass('error');
			jQuery('#form1').find('#fname').next().next().hide();
		}
	}
	
	
	if(jQuery('#form1').find('#mname').val() == ''){
		jQuery('#form1').find('#mname').addClass('error');
		jQuery('#form1').find('#mname').next().show();
		error++;
	}else{

		jQuery('#form1').find('#mname').next().hide();
		
		if(!regex.test(jQuery('#form1').find('#mname').val())){
			jQuery('#form1').find('#mname').addClass('error');
			jQuery('#form1').find('#mname').next().next().show();
			error++;
		}else{
			jQuery('#form1').find('#mname').removeClass('error');
			jQuery('#form1').find('#mname').next().next().hide();
		}
	}
	
	/*
	if(!regex.test(jQuery('#form1').find('#lname').val()) && jQuery('#form1').find('#lname').val()!=''){
		jQuery('#form1').find('#lname').addClass('error');
		jQuery('#form1').find('#lname').next().show();
		error++;
	}else{
		jQuery('#form1').find('#lname').removeClass('error');
		jQuery('#form1').find('#lname').next().hide();
	}
	*/
	
	if(jQuery('#form1').find('#lname').val() == ''){
		jQuery('#form1').find('#lname').addClass('error');
		jQuery('#form1').find('#lname').next().show();
		error++;
	}else{

		jQuery('#form1').find('#lname').next().hide();
		
		if(!regex.test(jQuery('#form1').find('#lname').val())){
			jQuery('#form1').find('#lname').addClass('error');
			jQuery('#form1').find('#lname').next().next().show();
			error++;
		}else{
			jQuery('#form1').find('#lname').removeClass('error');
			jQuery('#form1').find('#lname').next().next().hide();
		}
	}
	
	
	
	if(jQuery('#form1').find('#emailid').val() == ''){
		jQuery('#form1').find('#emailid').addClass('error');
		jQuery('#form1').find('#emailid').next().show();
		error++;
	}else{
		jQuery('#form1').find('#emailid').removeClass('error');
		jQuery('#form1').find('#emailid').next().hide();
		//var regex = /^([a-zA-Z0-9_.+-\u0600-\u06FF\u0660-\u0669])+\@(([a-zA-Z0-9-\u0600-\u06FF\u0660-\u0669])+\.)+([a-zA-Z0-9\u0600-\u06FF\u0660-\u0669]{2,4})+$/;
                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!regex.test(jQuery('#form1').find('#emailid').val()) && jQuery('#form1').find('#emailid').val() !=''){
			jQuery('#form1').find('#emailid').addClass('error');
			jQuery('#form1').find('#emailid').next().next().show();
			error++;
		}else{
			jQuery('#form1').find('#emailid').removeClass('error');
			jQuery('#form1').find('#emailid').next().next().hide();
			
		}
	}
	
	
	if(jQuery('#form1').find('#mobileno').val() == ''){
		jQuery('#form1').find('#mobileno').addClass('error');
		jQuery('#form1').find('#mobileno').next().show();
		error++;
	}else{
		jQuery('#form1').find('#mobileno').next().hide();
		if(isNaN(jQuery('#form1').find('#mobileno').val())){
			jQuery('#form1').find('#mobileno').addClass('error');
			jQuery('#form1').find('#mobileno').next().next().show();
			error++;
		}else{
 //var regex2 = /^([a-zA-Z])+$/;
			//if(!jQuery('#form1').find('#mobileno').val().match('[0-9\u0660-\u0669]{9}')){
            if(!jQuery('#form1').find('#mobileno').val().match('[0-9]{9}')){
				jQuery('#form1').find('#mobileno').addClass('error');
				jQuery('#form1').find('#mobileno').next().next().show();
				error++;
			}else{
				jQuery('#form1').find('#mobileno').removeClass('error');
				jQuery('#form1').find('#mobileno').next().next().hide();
			}
		}
	}
	var myval;
	if(jQuery('#form1').find('#code').length > 0){
	if(jQuery('#form1').find('#code').val()!=''){
		
		 $.ajax({
           url: 'https://najez-online.com/api/rest_api/check_ref_code/',
           type: 'GET',
		   async:false,
           ContentType: 'application/json',
           data: {'code': jQuery('#form1').find('#code').val()},
           success: function (response) {
           var datas = JSON.parse(response);
			myval=datas.data;
		   
		       
           }
		});
		
//    if(!jQuery('#form1').find('#code').val().match('[0-9]{6}')){
		if(myval == 'not found'){
				jQuery('#form1').find('#code').addClass('error');
				jQuery('#form1').find('#code').next().show();
				error++;
			}else{
				jQuery('#form1').find('#code').removeClass('error');
				jQuery('#form1').find('#code').next().hide();
			}
	} }
	
	if(jQuery('#form1').find('#identy').val() == ''){
		jQuery('#form1').find('#identy').addClass('error');
		jQuery('#form1').find('#identy').next().show();
		error++;
	}else{
		
		jQuery('#form1').find('#identy').next().hide();
		if(isNaN(jQuery('#form1').find('#identy').val())){
			jQuery('#form1').find('#identy').addClass('error');
			jQuery('#form1').find('#identy').next().next().show();
			error++;
		}else{

			//if(!jQuery('#form1').find('#identy').val().match('[0-9\u0660-\u0669]{0,10}')){
                            if(!jQuery('#form1').find('#identy').val().match('[0-9]{10}')){
				jQuery('#form1').find('#identy').addClass('error');
				jQuery('#form1').find('#identy').next().next().show();
				error++;
			}else{
				jQuery('#form1').find('#identy').removeClass('error');
				jQuery('#form1').find('#identy').next().next().hide();
			}
		}
	}
	
	/*if(jQuery('#form1').find('#date').length > 0){
		//alert();
		if(jQuery('#form1').find('#date').val() == ''){
			jQuery('#form1').find('#date').addClass('error');
			jQuery('#form1').find('#date').next().show();
			error++;
		}else{
			jQuery('#form1').find('#date').removeClass('error');
			jQuery('#form1').find('#date').next().hide();
			if(getYears(jQuery('#form1').find('#date').val()) < 21 && jQuery('#form1').find('#date').val()!=''){
				jQuery('#form1').find('#date').addClass('error');
				jQuery('#form1').find('#date').next().next().show();
				error++;
			}else{
				jQuery('#form1').find('#date').removeClass('error');
				jQuery('#form1').find('#date').next().next().hide();
			}
		}
	}*/
	if(jQuery('#form1').find('#dob_dd').length > 0){
		//alert();
		if(jQuery('#form1').find('#dob_dd').val() == ''){
			jQuery('#form1').find('#dob_dd').addClass('error');
			jQuery('#form1').find('#dob_mm').addClass('error');
			jQuery('#form1').find('#dob_yy').addClass('error');
			jQuery('#form1').find('#dob_dd').next().show();
			error++;
		}else{ 
			jQuery('#form1').find('#dob_dd').removeClass('error');
			jQuery('#form1').find('#dob_dd').next().hide();
			if(jQuery('#form1').find('#dob_mm').length > 0){
				//alert();
				if(jQuery('#form1').find('#dob_mm').val() == ''){
					jQuery('#form1').find('#dob_mm').addClass('error');
					jQuery('#form1').find('#dob_mm').next().show();
					error++;
				}else{
					jQuery('#form1').find('#dob_mm').removeClass('error');
					jQuery('#form1').find('#dob_mm').next().hide();
					if(jQuery('#form1').find('#dob_yy').length > 0){
						//alert();
						if(jQuery('#form1').find('#dob_yy').val() == ''){
							jQuery('#form1').find('#dob_yy').addClass('error');
							jQuery('#form1').find('#dob_yy').next().show();
							error++;
						}else{
							jQuery('#form1').find('#dob_yy').removeClass('error');
							jQuery('#form1').find('#dob_yy').next().hide();
							var dobdate = jQuery('#form1').find('#dob_dd').val()+'/'+jQuery('#form1').find('#dob_mm').val()+'/'+jQuery('#form1').find('#dob_yy').val();
							if(getYears(dobdate) < 21 && dobdate!=''){
								jQuery('#form1').find('#dob_dd').addClass('error');
								jQuery('#form1').find('#dob_dd').next().next().show();
								error++;
							}else{
								jQuery('#form1').find('#dob_dd').removeClass('error');
								jQuery('#form1').find('#dob_dd').next().next().hide();
							}
						}
					}
				}
			}
		}
	}
	
	
	
	//var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
	//alert(jQuery('#date').val());
	
	
	if(jQuery('#form1').find('#city').val() == ''){
		jQuery('#form1').find('#city').addClass('error');
		jQuery('#form1').find('#city').next().show();
		error++;
	}else{
		jQuery('#form1').find('#city').removeClass('error');
		jQuery('#form1').find('#city').next().hide();
	}
	
	
	//alert(error);
	if(error==0){
		var url = "frontend_register/check_emailid_driver";
				$.ajax({
					type: "post",
					url: url,
					data: {emailid: jQuery('#form1').find('#emailid').val()},
					success: function(responseData) {
						var email_count = parseInt(responseData);
						if(email_count > 0){
							$('#emailid').addClass("error");
							//$('#emailid').next().html('Email id already registered');
							$('#emailid').next().next().next().show();
							//$('.step1_btn').attr('disabled',true);
							error++;
						}else{
							$('#emailid').removeClass("error");
							//$('#emailid').next().html('');
							$('#emailid').next().next().next().hide();
							$('.step1_btn').attr('disabled',false); 
							jQuery('#form1').find('.field_val').hide();
							jQuery('#form1').find('.step1, .step2, .step3, .step4').hide();
							jQuery('.row .crcl').each(function(){
								jQuery(this).find('.circle').removeClass("active");
							});
							jQuery('.row .crcl:nth-child(2)').find(".circle").addClass("active");
							jQuery('#form1').find('.step2').show();
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log(errorThrown);
					}
				});
		
	}else{
		jQuery('.field_val').show();
	}
	
}