function step0_btn(){
	jQuery('.step1, .step2, .step3, .step4').hide();
	jQuery('.row .crcl').each(function(){
		jQuery(this).find('.circle').removeClass("active");
	});
	jQuery('.row .crcl:first-child').find(".circle").addClass("active");
	jQuery('.step1').show();
}

function step1_btn(){
	var error = 0;
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
	
	
	if(!regex.test(jQuery('#form1').find('#lname').val()) && jQuery('#form1').find('#lname').val()!=''){
		jQuery('#form1').find('#lname').addClass('error');
		jQuery('#form1').find('#lname').next().show();
		error++;
	}else{
		jQuery('#form1').find('#lname').removeClass('error');
		jQuery('#form1').find('#lname').next().hide();
	}
	if(jQuery('#form1').find('#emailid').val() == ''){
		jQuery('#form1').find('#emailid').addClass('error');
		jQuery('#form1').find('#emailid').next().show();
		error++;
	}else{
		jQuery('#form1').find('#emailid').removeClass('error');
		jQuery('#form1').find('#emailid').next().hide();
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

			if(!jQuery('#form1').find('#mobileno').val().match('[0-9]{9}')){
				jQuery('#form1').find('#mobileno').addClass('error');
				jQuery('#form1').find('#mobileno').next().next().show();
				jQuery('#form1').find++;
			}else{
				jQuery('#form1').find('#mobileno').removeClass('error');
				jQuery('#form1').find('#mobileno').next().next().hide();
			}
		}
	}
	
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

			if(!jQuery('#form1').find('#identy').val().match('[0-9]{0,10}')){
				jQuery('#form1').find('#identy').addClass('error');
				jQuery('#form1').find('#identy').next().next().show();
				error++;
			}else{
				jQuery('#form1').find('#identy').removeClass('error');
				jQuery('#form1').find('#identy').next().next().hide();
			}
		}
	}
	
	if(jQuery('#form1').find('#date').length > 0){
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
function step2_btn(){
	var error = 0;
	if(jQuery('#form1').find('#agree').prop("checked") == false){
		jQuery('#form1').find('.declbox').css("color","#ff0000");
		error++;
	}else{
		jQuery('#form1').find('.declbox').css("color","#67696c");
	}

	if(error==0){
		jQuery('#form1').find('.field_val').hide();
		jQuery('#form1').find('.step1, .step2, .step3, .step4').hide();
		jQuery('.row .crcl').each(function(){
			jQuery(this).find('.circle').removeClass("active");
		});
		jQuery('.row .crcl:nth-child(3)').find(".circle").addClass("active");
		jQuery('#form1').find('.step3').show();
	}else{
		jQuery('#form1').find('.field_val').show();
	}
	
}
function step3_btn(){ 
	var error = 0;
	if(jQuery('#form1').find('#vehicle_sno').length >0 && jQuery('#form1').find('#vehicle_sno').val() == ''){
		jQuery('#form1').find('#vehicle_sno').addClass('error');
		jQuery('#form1').find('#vehicle_sno').next().show();
		error++;
	}else{
		jQuery('#form1').find('#vehicle_sno').removeClass('error');
		jQuery('#form1').find('#vehicle_sno').next().hide();
		var regex = /^([a-zA-Z0-9]{1,100})$/;
		if(jQuery('#form1').find('#vehicle_sno').length >0 && !regex.test(jQuery('#form1').find('#vehicle_sno').val())){
			jQuery('#form1').find('#vehicle_sno').addClass('error');
			jQuery('#form1').find('#vehicle_sno').next().next().show();
			error++;
		}else{
			jQuery('#form1').find('#vehicle_sno').removeClass('error');
			jQuery('#form1').find('#vehicle_sno').next().next().hide();
		}
	}
	if(jQuery('#form1').find('#vehicle_plate_char').length >0 && jQuery('#form1').find('#vehicle_plate_char').val() == ''){
		jQuery('#form1').find('#vehicle_plate_char').addClass('error');
		jQuery('#form1').find('#vehicle_plate_char').next().show();
		error++;
	}else{
		jQuery('#form1').find('#vehicle_plate_char').removeClass('error');
		jQuery('#form1').find('#vehicle_plate_char').next().hide();
		var regex = /^([a-zA-Z]{3})$/;
		if(jQuery('#form1').find('#vehicle_plate_char').length >0 && !regex.test(jQuery('#form1').find('#vehicle_plate_char').val())){
			jQuery('#form1').find('#vehicle_plate_char').addClass('error');
			jQuery('#form1').find('#vehicle_plate_char').next().next().show();
			error++;
		}else{
			jQuery('#form1').find('#vehicle_plate_char').removeClass('error');
			jQuery('#form1').find('#vehicle_plate_char').next().next().hide();
		}
	}
	
	if(jQuery('#form1').find('#vehicle_plate_num').val() == ''){
		jQuery('#form1').find('#vehicle_plate_num').addClass('error');
		jQuery('#form1').find('#vehicle_plate_num').next().show();
		error++;
	}else{
		jQuery('#form1').find('#vehicle_plate_num').removeClass('error');
		jQuery('#form1').find('#vehicle_plate_num').next().hide();
		var regex = /^([0-9]{4})$/;
		if(jQuery('#form1').find('#vehicle_plate_num').length >0 && !regex.test(jQuery('#form1').find('#vehicle_plate_num').val())){
			jQuery('#form1').find('#vehicle_plate_num').addClass('error');
			jQuery('#form1').find('#vehicle_plate_num').next().next().show();
			error++;
		}else{
			jQuery('#form1').find('#vehicle_plate_num').removeClass('error');
			jQuery('#form1').find('#vehicle_plate_num').next().next().hide();
		}
	}
	
	if(jQuery('#form1').find('#vehicle_type').val() == ''){
		jQuery('#form1').find('#vehicle_type').addClass('error');
		jQuery('#form1').find('#vehicle_type').next().show();
		error++;
	}else{
		jQuery('#form1').find('#vehicle_type').removeClass('error');
		jQuery('#form1').find('#vehicle_type').next().hide();
	}
	if(jQuery('#form1').find('#vehicle_year').val() == ''){
		jQuery('#form1').find('#vehicle_year').addClass('error');
		jQuery('#form1').find('#vehicle_year').next().show();
		error++;
	}else{
		jQuery('#form1').find('#vehicle_year').removeClass('error');
		jQuery('#form1').find('#vehicle_year').next().hide();
	}
	if(jQuery('#form1').find('#vehicle_color').val() == ''){
		jQuery('#form1').find('#vehicle_color').addClass('error');
		jQuery('#form1').find('#vehicle_color').next().show();
		error++;
	}else{
		jQuery('#form1').find('#vehicle_color').removeClass('error');
		jQuery('#form1').find('#vehicle_color').next().hide();
		var regex = /^([a-zA-Z]{0,100})$/;
		if(jQuery('#form1').find('#vehicle_color').length >0 && !regex.test(jQuery('#form1').find('#vehicle_color').val())){
			jQuery('#form1').find('#vehicle_color').addClass('error');
			jQuery('#form1').find('#vehicle_color').next().next().show();
			error++;
		}else{
			jQuery('#form1').find('#vehicle_color').removeClass('error');
			jQuery('#form1').find('#vehicle_color').next().next().hide();
		}
	}
	

	if(error==0){
		jQuery('#form1').find('.field_val').hide();
		jQuery('#form1').find('.step1, .step2, .step3, .step4').hide();
		jQuery('.row .crcl').each(function(){
			jQuery(this).find('.circle').removeClass("active");
		});
		jQuery('.row .crcl:nth-child(4)').find(".circle").addClass("active");
		jQuery('#form1').find('.step4').show();
	}else{
		jQuery('#form1').find('.field_val').show();
	}
}
function formsubmitfunc(){
	var error = 0;
	if(jQuery('#form1').find('#photograph').val() == ''){
		jQuery('#form1').find('#photograph').addClass('error');
		jQuery('#form1').find('#photograph').next().show();
		error++;
	}else{
		jQuery('#form1').find('#photograph').removeClass('error');
		jQuery('#form1').find('#photograph').next().hide();
	}
	if(jQuery('#form1').find('#residence').val() == ''){
		jQuery('#form1').find('#residence').addClass('error');
		jQuery('#form1').find('#residence').next().show();
		error++;
	}else{
		jQuery('#form1').find('#residence').removeClass('error');
		jQuery('#form1').find('#residence').next().hide();
	}
	if(jQuery('#form1').find('#driver_license').val() == ''){
		jQuery('#form1').find('#driver_license').addClass('error');
		jQuery('#form1').find('#driver_license').next().show();
		error++;
	}else{
		jQuery('#form1').find('#driver_license').removeClass('error');
		jQuery('#form1').find('#driver_license').next().hide();
	}
	if(jQuery('#form1').find('#vehicle_reg').val() == ''){
		jQuery('#form1').find('#vehicle_reg').addClass('error');
		jQuery('#form1').find('#vehicle_reg').next().show();
		error++;
	}else{
		jQuery('#form1').find('#vehicle_reg').removeClass('error');
		jQuery('#form1').find('#vehicle_reg').next().hide();
	}
	if(jQuery('#form1').find('#vehicle_insur').val() == ''){
		jQuery('#form1').find('#vehicle_insur').addClass('error');
		jQuery('#form1').find('#vehicle_insur').next().show();
		error++;
	}else{
		jQuery('#form1').find('#vehicle_insur').removeClass('error');
		jQuery('#form1').find('#vehicle_insur').next().hide();
	}
	if(jQuery('#form1').find('#auth_img').val() == ''){
		jQuery('#form1').find('#auth_img').addClass('error');
		jQuery('#form1').find('#auth_img').next().show();
		error++;
	}else{
		jQuery('#form1').find('#auth_img').removeClass('error');
		jQuery('#form1').find('#auth_img').next().hide();
	}
	
	if(jQuery('#form1').find('#iban').val() == ''){
		jQuery('#form1').find('#iban').addClass('error');
		jQuery('#form1').find('#iban').next().show();
		error++;
	}else{
		jQuery('#form1').find('#iban').removeClass('error');
		jQuery('#form1').find('#iban').next().hide();
		var regex = /^([a-zA-Z]{2}[0-9]{22})+$/;
		if(!regex.test(jQuery('#form1').find('#iban').val())){
			jQuery('#form1').find('#iban').addClass('error');
			jQuery('#form1').find('#iban').next().next().show();
			error++;
		}else{
			jQuery('#form1').find('#iban').removeClass('error');
			jQuery('#form1').find('#iban').next().next().hide();
		}
	}
	
	if(jQuery('#form1').find('#iban_bank').val() == ''){
		jQuery('#form1').find('#iban_bank').addClass('error');
		jQuery('#form1').find('#iban_bank').next().show();
		error++;
	}else{
		jQuery('#form1').find('#iban_bank').removeClass('error');
		jQuery('#form1').find('#iban_bank').next().hide();
	}
	

	var form = jQuery('#form1').find('form.partnerForm')[0]; // You need to use standard javascript object here
var formData = new FormData(form);

	var url = "frontend_register/partner_reg";
	if(error>0){
		
		jQuery('#form1').find('.field_val').show();
		return false;
		
	}else{
		//var data = $('form.userform').serialize();
		jQuery('#form1').find('.field_val').hide();
		jQuery('.msgpop').show();
				
				jQuery('#form1').find('.step1, .step2, .step3, .step4').hide();
				jQuery('.row .crcl').each(function(){
					jQuery(this).find('.circle').removeClass("active");
				});
				jQuery('.row .crcl:first-child').find(".circle").addClass("active");
				jQuery('#form1').find('.step1').show();
				setTimeout(function() {
					jQuery('.msgpop').hide();
				}, 5000);
		 $.ajax({
            type: 'post',
            url: url,
            data: formData,
			contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
			processData: false, // NEEDED, DON'T OMIT THIS
            success: function (data) {
				$('form.partnerForm')[0].reset();
            }
          });
		  return false;
	}
}

function getYears(from) {
	var datearr = from.split('/');
	from = datearr[2]+'-'+datearr[1]+'-'+datearr[0];
    var d1 = new Date(from),
        d2 = new Date(),
        yr = [],
		tyr = 0;
		
	//console.log(d1);
	//console.log(d2);
    for (var i=d1.getFullYear(); i<d2.getFullYear(); i++) {
        yr.push( i );
		tyr++;
		
    }
	//console.log(tyr);
    return tyr;
}

 
  $(document).ready(function(){
               $('.btn1').addClass('activity');
              $('.btn1, .button1').click(function(){
                $(".contact-form1").hide();
                $(".contact-form ,.crcl").show();
                 $('.btn1').addClass('activity');
                  $('.btn2').removeClass('activity');
				  $('.toggledriver').show();
              });
               $('.btn2, .button2').click(function(){
                $(".contact-form ,.crcl").hide();
                $(".contact-form1").show();
                $('.btn1').removeClass('activity');
                $('.btn2').addClass('activity');
                 $('.toggledriver').hide();
              });
            });

jQuery(document).ready(function(){
    jQuery('.loop').owlCarousel({
    center: true,
    items:2,
    loop:true,
    margin:10,
    responsive:{
        600:{
            items:4
        }
    }
});
jQuery('.owl-dot').each(function(index){
	if(index == 2){
		jQuery(this).click();
	}
});
jQuery('.about_btn1').click(function(){
	jQuery('.more_about').slideToggle("slow");
	jQuery('.about_btn1').hide();
	jQuery('.about_btn2').show();
});
jQuery('.about_btn2').click(function(){
	jQuery('.more_about').slideToggle("slow");
	jQuery('.about_btn1').show();
	jQuery('.about_btn2').hide();
});
/*
jQuery('.step0_btn').click(function(){
	jQuery('.step1, .step2, .step3, .step4').hide();
	jQuery('.row .crcl').each(function(){
		jQuery(this).find('.circle').removeClass("active");
	});
	jQuery('.row .crcl:first-child').find(".circle").addClass("active");
	jQuery('.step1').show();
});

jQuery('.step1_btn').click(function(){ 
	var error = 0;
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
	
	
	if(!regex.test(jQuery('#lname').val()) && jQuery('#lname').val()!=''){
		jQuery('#lname').addClass('error');
		jQuery('#lname').next().show();
		error++;
	}else{
		jQuery('#lname').removeClass('error');
		jQuery('#lname').next().hide();
	}
	if(jQuery('#emailid').val() == ''){
		jQuery('#emailid').addClass('error');
		jQuery('#emailid').next().show();
		error++;
	}else{
		jQuery('#emailid').removeClass('error');
		jQuery('#emailid').next().hide();
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!regex.test(jQuery('#emailid').val()) && jQuery('#emailid').val() !=''){
			jQuery('#emailid').addClass('error');
			jQuery('#emailid').next().next().show();
			error++;
		}else{
			jQuery('#emailid').removeClass('error');
			jQuery('#emailid').next().next().hide();
			
		}
	}
	
	
	if(jQuery('#mobileno').val() == ''){
		jQuery('#mobileno').addClass('error');
		jQuery('#mobileno').next().show();
		error++;
	}else{
		jQuery('#mobileno').next().hide();
		if(isNaN(jQuery('#mobileno').val())){
			jQuery('#mobileno').addClass('error');
			jQuery('#mobileno').next().next().show();
			error++;
		}else{

			if(!jQuery('#mobileno').val().match('[0-9]{9}')){
				jQuery('#mobileno').addClass('error');
				jQuery('#mobileno').next().next().show();
				error++;
			}else{
				jQuery('#mobileno').removeClass('error');
				jQuery('#mobileno').next().next().hide();
			}
		}
	}
	
	if(jQuery('#identy').val() == ''){
		jQuery('#identy').addClass('error');
		jQuery('#identy').next().show();
		error++;
	}else{
		
		jQuery('#identy').next().hide();
		if(isNaN(jQuery('#identy').val())){
			jQuery('#identy').addClass('error');
			jQuery('#identy').next().next().show();
			error++;
		}else{

			if(!jQuery('#identy').val().match('[0-9]{0,10}')){
				jQuery('#identy').addClass('error');
				jQuery('#identy').next().next().show();
				error++;
			}else{
				jQuery('#identy').removeClass('error');
				jQuery('#identy').next().next().hide();
			}
		}
	}
	if(jQuery('#date').attr('disabled') != 'disabled'){
		//alert();
		if(jQuery('#date').val() == ''){
			jQuery('#date').addClass('error');
			jQuery('#date').next().show();
			error++;
		}else{
			jQuery('#date').removeClass('error');
			jQuery('#date').next().hide();
			if(getYears(jQuery('#date').val()) < 21 && jQuery('#date').val()!=''){
				jQuery('#date').addClass('error');
				jQuery('#date').next().next().show();
				error++;
			}else{
				jQuery('#date').removeClass('error');
				jQuery('#date').next().next().hide();
			}
		}
	}
	
	//var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
	//alert(jQuery('#date').val());
	
	
	if(jQuery('#city').val() == ''){
		jQuery('#city').addClass('error');
		jQuery('#city').next().show();
		error++;
	}else{
		jQuery('#city').removeClass('error');
		jQuery('#city').next().hide();
	}
	
	
	//alert(error);
	if(error==0){
		var url = "frontend_register/check_emailid_driver";
				$.ajax({
					type: "post",
					url: url,
					data: {emailid: jQuery('#emailid').val()},
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
							jQuery('.field_val').hide();
							jQuery('.step1, .step2, .step3, .step4').hide();
							jQuery('.row .crcl').each(function(){
								jQuery(this).find('.circle').removeClass("active");
							});
							jQuery('.row .crcl:nth-child(2)').find(".circle").addClass("active");
							jQuery('.step2').show();
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log(errorThrown);
					}
				});
		
	}else{
		jQuery('.field_val').show();
	}
});


jQuery('.step2_btn').click(function(){
	var error = 0;
	if(jQuery('#agree').prop("checked") == false){
		jQuery('.declbox').css("color","#ff0000");
		error++;
	}else{
		jQuery('.declbox').css("color","#67696c");
	}

	if(error==0){
		jQuery('.field_val').hide();
		jQuery('.step1, .step2, .step3, .step4').hide();
		jQuery('.row .crcl').each(function(){
			jQuery(this).find('.circle').removeClass("active");
		});
		jQuery('.row .crcl:nth-child(3)').find(".circle").addClass("active");
		jQuery('.step3').show();
	}else{
		jQuery('.field_val').show();
	}
	
});
jQuery('.step3_btn').click(function(){
	var error = 0;
	if(jQuery('#vehicle_sno').val() == ''){
		jQuery('#vehicle_sno').addClass('error');
		jQuery('#vehicle_sno').next().show();
		error++;
	}else{
		jQuery('#vehicle_sno').removeClass('error');
		jQuery('#vehicle_sno').next().hide();
		var regex = /^([a-zA-Z0-9]{1,100})$/;
		if(!regex.test(jQuery('#vehicle_sno').val())){
			jQuery('#vehicle_sno').addClass('error');
			jQuery('#vehicle_sno').next().next().show();
			error++;
		}else{
			jQuery('#vehicle_sno').removeClass('error');
			jQuery('#vehicle_sno').next().next().hide();
		}
	}
	if(jQuery('#vehicle_plate_char').val() == ''){
		jQuery('#vehicle_plate_char').addClass('error');
		jQuery('#vehicle_plate_char').next().show();
		error++;
	}else{
		jQuery('#vehicle_plate_char').removeClass('error');
		jQuery('#vehicle_plate_char').next().hide();
		var regex = /^([a-zA-Z]{3})$/;
		if(!regex.test(jQuery('#vehicle_plate_char').val())){
			jQuery('#vehicle_plate_char').addClass('error');
			jQuery('#vehicle_plate_char').next().next().show();
			error++;
		}else{
			jQuery('#vehicle_plate_char').removeClass('error');
			jQuery('#vehicle_plate_char').next().next().hide();
		}
	}
	
	if(jQuery('#vehicle_plate_num').val() == ''){
		jQuery('#vehicle_plate_num').addClass('error');
		jQuery('#vehicle_plate_num').next().show();
		error++;
	}else{
		jQuery('#vehicle_plate_num').removeClass('error');
		jQuery('#vehicle_plate_num').next().hide();
		var regex = /^([0-9]{4})$/;
		if(!regex.test(jQuery('#vehicle_plate_num').val())){
			jQuery('#vehicle_plate_num').addClass('error');
			jQuery('#vehicle_plate_num').next().next().show();
			error++;
		}else{
			jQuery('#vehicle_plate_num').removeClass('error');
			jQuery('#vehicle_plate_num').next().next().hide();
		}
	}
	
	if(jQuery('#vehicle_type').val() == ''){
		jQuery('#vehicle_type').addClass('error');
		jQuery('#vehicle_type').next().show();
		error++;
	}else{
		jQuery('#vehicle_type').removeClass('error');
		jQuery('#vehicle_type').next().hide();
	}
	if(jQuery('#vehicle_year').val() == ''){
		jQuery('#vehicle_year').addClass('error');
		jQuery('#vehicle_year').next().show();
		error++;
	}else{
		jQuery('#vehicle_year').removeClass('error');
		jQuery('#vehicle_year').next().hide();
	}
	if(jQuery('#vehicle_color').val() == ''){
		jQuery('#vehicle_color').addClass('error');
		jQuery('#vehicle_color').next().show();
		error++;
	}else{
		jQuery('#vehicle_color').removeClass('error');
		jQuery('#vehicle_color').next().hide();
		var regex = /^([a-zA-Z]{0,100})$/;
		if(!regex.test(jQuery('#vehicle_color').val())){
			jQuery('#vehicle_color').addClass('error');
			jQuery('#vehicle_color').next().next().show();
			error++;
		}else{
			jQuery('#vehicle_color').removeClass('error');
			jQuery('#vehicle_color').next().next().hide();
		}
	}
	
	
	
	if(error==0){
		jQuery('.field_val').hide();
		jQuery('.step1, .step2, .step3, .step4').hide();
		jQuery('.row .crcl').each(function(){
			jQuery(this).find('.circle').removeClass("active");
		});
		jQuery('.row .crcl:nth-child(4)').find(".circle").addClass("active");
		jQuery('.step4').show();
	}else{
		jQuery('.field_val').show();
	}
});

jQuery('#partner_submit').click(function(e){
	var error = 0;
	if(jQuery('#photograph').val() == ''){
		jQuery('#photograph').addClass('error');
		jQuery('#photograph').next().show();
		error++;
	}else{
		jQuery('#photograph').removeClass('error');
		jQuery('#photograph').next().hide();
	}
	if(jQuery('#residence').val() == ''){
		jQuery('#residence').addClass('error');
		jQuery('#residence').next().show();
		error++;
	}else{
		jQuery('#residence').removeClass('error');
		jQuery('#residence').next().hide();
	}
	if(jQuery('#driver_license').val() == ''){
		jQuery('#driver_license').addClass('error');
		jQuery('#driver_license').next().show();
		error++;
	}else{
		jQuery('#driver_license').removeClass('error');
		jQuery('#driver_license').next().hide();
	}
	if(jQuery('#vehicle_reg').val() == ''){
		jQuery('#vehicle_reg').addClass('error');
		jQuery('#vehicle_reg').next().show();
		error++;
	}else{
		jQuery('#vehicle_reg').removeClass('error');
		jQuery('#vehicle_reg').next().hide();
	}
	if(jQuery('#vehicle_insur').val() == ''){
		jQuery('#vehicle_insur').addClass('error');
		jQuery('#vehicle_insur').next().show();
		error++;
	}else{
		jQuery('#vehicle_insur').removeClass('error');
		jQuery('#vehicle_insur').next().hide();
	}
	if(jQuery('#auth_img').val() == ''){
		jQuery('#auth_img').addClass('error');
		jQuery('#auth_img').next().show();
		error++;
	}else{
		jQuery('#auth_img').removeClass('error');
		jQuery('#auth_img').next().hide();
	}
	
	if(jQuery('#iban').val() == ''){
		jQuery('#iban').addClass('error');
		jQuery('#iban').next().show();
		error++;
	}else{
		jQuery('#iban').removeClass('error');
		jQuery('#iban').next().hide();
		var regex = /^([a-zA-Z]{2}[0-9]{22})+$/;
		if(!regex.test(jQuery('#iban').val())){
			jQuery('#iban').addClass('error');
			jQuery('#iban').next().next().show();
			error++;
		}else{
			jQuery('#iban').removeClass('error');
			jQuery('#iban').next().next().hide();
		}
	}
	
	if(jQuery('#iban_bank').val() == ''){
		jQuery('#iban_bank').addClass('error');
		jQuery('#iban_bank').next().show();
		error++;
	}else{
		jQuery('#iban_bank').removeClass('error');
		jQuery('#iban_bank').next().hide();
	}
	
	 
	e.preventDefault();
	var form = $('form.partnerForm')[0]; // You need to use standard javascript object here
var formData = new FormData(form);

	var url = "frontend_register/partner_reg";
	if(error>0){
		
		jQuery('.field_val').show();
		
	}else{
		//var data = $('form.userform').serialize();
		jQuery('.field_val').hide();
		jQuery('.msgpop').show();
				
				jQuery('.step1, .step2, .step3, .step4').hide();
				jQuery('.row .crcl').each(function(){
					jQuery(this).find('.circle').removeClass("active");
				});
				jQuery('.row .crcl:first-child').find(".circle").addClass("active");
				jQuery('.step1').show();
				setTimeout(function() {
					jQuery('.msgpop').hide();
				}, 5000);
		 $.ajax({
            type: 'post',
            url: url,
            data: formData,
			contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
			processData: false, // NEEDED, DON'T OMIT THIS
            success: function (data) {
				$('form.partnerForm')[0].reset();
            }
          });
	}
});
*/



jQuery('#user_regs').click(function(e){
	var error = 0;
	var regex = /^([a-zA-Z])+$/;
	if(jQuery('#user_fname').val() == ''){
		jQuery('#user_fname').addClass('error');
		jQuery('#user_fname').next().show();
		error++;
	}else{
		jQuery('#user_fname').removeClass('error');
		jQuery('#user_fname').next().hide();
		if(!regex.test(jQuery('#user_fname').val()) && jQuery('#user_fname').val()!=''){
			jQuery('#user_fname').addClass('error');
			jQuery('#user_fname').next().next().show();
			error++;
		}else{
			jQuery('#user_fname').removeClass('error');
			jQuery('#user_fname').next().next().hide();
		}
	}

	if(!regex.test(jQuery('#user_lname').val()) && jQuery('#user_lname').val()!=''){
		jQuery('#user_lname').addClass('error');
		jQuery('#user_lname').next().show();
		error++;
	}else{
		jQuery('#user_lname').removeClass('error');
		jQuery('#user_lname').next().hide();
	}
	if(jQuery('#user_email').val() == ''){
		jQuery('#user_email').addClass('error');
		jQuery('#user_email').next().show();
		error++;
	}else{
		jQuery('#user_email').removeClass('error');
		jQuery('#user_email').next().hide();
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!regex.test(jQuery('#user_email').val()) && jQuery('#user_email').val()!=''){
			jQuery('#user_email').addClass('error');
			jQuery('#user_email').next().next().show();
			error++;
		}else{
			jQuery('#user_email').removeClass('error');
			jQuery('#user_email').next().next().hide();
			
		}
	}
	
	
	if(jQuery('#user_mobile').val() == ''){
		jQuery('#user_mobile').addClass('error');
		jQuery('#user_mobile').next().show();
		error++;
	}else{
		jQuery('#user_mobile').next().hide();
		/*if(isNaN(jQuery('#user_mobile').val())){
			jQuery('#user_mobile').addClass('error');
			jQuery('#user_mobile').next().next().show();
			error++;
		}else{
			jQuery('#user_mobile').removeClass('error');
			jQuery('#user_mobile').next().next().hide();
		}*/
		if(isNaN(jQuery('#user_mobile').val())){
			jQuery('#user_mobile').addClass('error');
			jQuery('#user_mobile').next().next().show();
			error++;
		}else{

			if(!jQuery('#user_mobile').val().match('[0-9]{9}')){
				jQuery('#user_mobile').addClass('error');
				jQuery('#user_mobile').next().next().show();
				error++;
			}else{
				jQuery('#user_mobile').removeClass('error');
				jQuery('#user_mobile').next().next().hide();
			}
		}
	}
	if(jQuery('#user_gender').val() == ''){
		jQuery('#user_gender').addClass('error');
		jQuery('#user_gender').next().show();
		error++;
	}else{
		jQuery('#user_gender').removeClass('error');
		jQuery('#user_gender').next().hide();
	}
	if(jQuery('#user_city').val() == ''){
		jQuery('#user_city').addClass('error');
		jQuery('#user_city').next().show();
		error++;
	}else{
		jQuery('#user_city').removeClass('error');
		jQuery('#user_city').next().hide();
	}
	e.preventDefault(); 
	var url = "frontend_register/user_reg";
	if(error>0){
		
		jQuery('.field_val').show();
		
	}else{
		var checkurl = "frontend_register/check_emailid_user";
				$.ajax({
					type: "post",
					url: checkurl,
					data: {emailid: jQuery('#user_email').val()},
					success: function(responseData) {
						var email_count = parseInt(responseData);
						if(email_count > 0){
							$('#user_email').addClass("error");
							//$(emailbox).next().html('Email id already registered');
							$('#user_email').next().next().next().show();
							//$('#user_regs').attr('disabled',true);
							error++;
							//$('.step1_btn').attr('disabled',true);
						}else{
							$('#user_email').removeClass("error");
							//$('#user_email').next().html('');
							$('#user_email').next().next().next().hide();
							//$('#user_regs').attr('disabled',false); 
							var data = $('form.userform').serialize();
								jQuery('.field_val').hide();
								jQuery('.msgpop').show();
										 
										setTimeout(function() {
											jQuery('.msgpop').hide();
										}, 5000);
										console.log();
								 $.ajax({
									type: 'post',
									url: url,
									data: data,
									success: function (data) { //alert(data);
									console.log(data);
										$('form.userform')[0].reset();
									}
								  });
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log(errorThrown);
					}
				});
		
	}
});

    });

	
	$(document).ready(function(){
    /*$(".checkemail_driver").keyup(function(){
        var email = jQuery(this).val();
		//alert(email);
		var emailbox = $(this);
		if(email != ''){
			var atpos = email.indexOf("@");
			var dotpos = email.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
				$(this).addClass("error");
				//$('.step1_btn').attr('disabled',true);
			}else{
				$(this).removeClass("error");
				//$('.step1_btn').attr('disabled',false); 
				var url = "frontend_register/check_emailid_driver";
				$.ajax({
					type: "post",
					url: url,
					data: {emailid: email},
					success: function(responseData) {
						var email_count = parseInt(responseData);
						if(email_count > 0){
							$(emailbox).addClass("error");
							$(emailbox).next().html('Email id already registered');
							$(emailbox).next().show();
							//$('.step1_btn').attr('disabled',true);
						}else{
							$(this).removeClass("error");
							$(emailbox).next().html('');
							$(emailbox).next().hide();
							//$('.step1_btn').attr('disabled',false); 
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log(errorThrown);
					}
				});
			}
		}
		else{
			$(this).removeClass("error");
			$(emailbox).next().html('');
			$(emailbox).next().hide();
			//$('.step1_btn').attr('disabled',false); 
		}
    });*/
	/*$(".checkemail_user").keyup(function(){
        var email = jQuery(this).val();
		//alert(email);
		var emailbox = $(this);
		if(email != ''){
			var atpos = email.indexOf("@");
			var dotpos = email.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
				$(this).addClass("error");
				$('.step1_btn').attr('disabled',true);
			}else{
				$(this).removeClass("error");
				$('.step1_btn').attr('disabled',false); 
				var url = "frontend_register/check_emailid_user";
				$.ajax({
					type: "post",
					url: url,
					data: {emailid: email},
					success: function(responseData) {
						var email_count = parseInt(responseData);
						if(email_count > 0){
							$(emailbox).addClass("error");
							$(emailbox).next().html('Email id already registered');
							$(emailbox).next().show();
							$('.step1_btn').attr('disabled',true);
						}else{
							$(this).removeClass("error");
							$(emailbox).next().html('');
							$(emailbox).next().hide();
							$('.step1_btn').attr('disabled',false); 
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log(errorThrown);
					}
				});
			}
		}
		else{
			$(this).removeClass("error");
			$(emailbox).next().html('');
			$(emailbox).next().hide();
			$('.step1_btn').attr('disabled',false); 
		}
    });
    
	*/
	$('.photo').on('change',function(e){
		var photo = e.target.files[0].name;
		var ext = photo.split('.').pop().toLowerCase();
		if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
			alert('Invalid File. Use only gif, png, jpg, jpeg');
			$(this).val('');
		}
	});
	
	setTimeout(function() {
		jQuery('.msgpop').hide();
	}, 5000);
});

//$(document).ready(function(){
        var itaImgLink = "https://techconlabs.net/najez/assets/home/img/saudi-arabia.jpg";
		var deuImgLink = "https://techconlabs.net/najez/assets/home/img/urdu.jpg";
    	var engImgLink = "https://techconlabs.net/najez/assets/home/img/Grossbritanien.jpg";
		//var fraImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Frankreich.gif";

		var imgBtnSel = $('.dropdown-toggle .imgNavSel');
		var imgBtnIta = $('.dropdown-toggle .imgNavIta');
		var imgBtnEng = $('.dropdown-toggle .imgNavEng');
		var imgBtnDeu = $('.dropdown-toggle .imgNavDeu');
		//var imgBtnFra = $('#imgBtnFra');

		var imgNavSel = $('.dropdown-menu .imgNavSel');
		var imgNavIta = $('.dropdown-menu .imgNavIta');
		var imgNavEng = $('.dropdown-menu .imgNavEng');
		var imgNavDeu = $('.dropdown-menu .imgNavDeu');
		//var imgNavFra = $('#imgNavFra');

		var spanNavSel = $('.lanNavSel');
		var spanBtnSel = $('.lanBtnSel');

		/*imgBtnSel.attr("src",itaImgLink);
		imgBtnIta.attr("src",itaImgLink);
		imgBtnEng.attr("src",engImgLink);
		imgBtnDeu.attr("src",deuImgLink);
		//imgBtnFra.attr("src",fraImgLink);*/
		
		imgNavSel.attr("src",engImgLink);
		imgNavIta.attr("src",itaImgLink);
		imgNavEng.attr("src",engImgLink);
		imgNavDeu.attr("src",deuImgLink);
		//imgNavFra.attr("src",fraImgLink);
		
		$( ".language" ).on( "click", function( event ) {
			var currentId = $(this).attr('id');

			if(currentId == "navIta") {
				imgNavSel.attr("src",itaImgLink);
				spanNavSel.text("AR");
			} else if (currentId == "navEng") {
				imgNavSel.attr("src",engImgLink);
				spanNavSel.text("ENG");
			} else if (currentId == "navDeu") {
				imgNavSel.attr("src",deuImgLink);
				spanNavSel.text("UR");
			} else if (currentId == "navFra") {
				imgNavSel.attr("src",fraImgLink);
				spanNavSel.text("FRA");
			}

			if(currentId == "btnIta") {
				imgBtnSel.attr("src",itaImgLink);
				spanBtnSel.text("AR");
			} else if (currentId == "btnEng") {
				imgBtnSel.attr("src",engImgLink);
				spanBtnSel.text("ENG");
			} else if (currentId == "btnDeu") {
				imgBtnSel.attr("src",deuImgLink);
				spanBtnSel.text("UR");
			} else if (currentId == "btnFra") {
				imgBtnSel.attr("src",fraImgLink);
				spanBtnSel.text("FRA");
			}
			
		});
		
	$(function () {
		var d = new Date();
                $('#date').datepicker({
					//format: 'yyyy-mm-dd',
					format: 'dd/mm/yyyy',
					startDate:'01/01/1940',
					autoclose: true
				});
            });