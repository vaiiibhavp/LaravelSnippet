// Validation File

// Add CSS in Main Layout

/*.has-error {
	box-shadow: 0px 0px 2px 1px #DE0707 !important;
}

.error_msg{
	width: 100%; padding: 10px; 
	background-color: rgba(209, 90, 102, 0.31); 
	color: rgb(171, 0, 0); 
	font-size: 15px; 
	text-align: center;
	
}*/


// Add class "val" in form input ex. <input type="text" class="val" val="num alpha m_space s_space max_digit-100"/> ////

$(document).on('click','.val',function(e){
	
	$(this).removeClass('has-error');
	$('.error,br',$(this).parent()).remove();
});

$(document).on('keyup','.val',function(e){

	var val_type = $(this).attr('val');
	var val = $(this).val();
	filtermobile = /^[6-9][0-9]{0,10}/;
	//alert(val.charAt(0));
	if((typeof(val_type)!='undefined') && (val_type.trim()!=''))
	{
		if((val_type.indexOf('spec_char_ignore_start') >= 0) )
		{
			// !"#$%&'()*+,-./:;<=>?@[\]^_`{|}~
			spec_list = [/^[!]/gi,/^["]/gi,/^[#]/gi,/^[$]/gi,/^[%]/gi,/^[&]/gi,/^[']/gi,/^[(]/gi,/^[)]/gi,/^[*]/gi,/^[+]/gi,/^[,]/gi,/^[-]/gi,/^[.]/gi,/^[/]/gi,/^[:]/gi,/^[;]/gi,/^[<]/gi,/^[=]/gi,/^[>]/gi,/^[?]/gi,/^[@]/gi,/^[[]/gi,/^[\\]/gi,/^[\]]/gi,/^[\^]/gi,/^[_]/gi,/^[`]/gi,/^[{]/gi,/^[|]/gi,/^[}]/gi,/^[~]/gi,
						];
			for(x in spec_list)
			{
				val = val.replace(spec_list[x], '');
			}
			//val = val.replace(/^[@]/gi, '').replace(/^[.]/gi, '').replace(/^[_]/gi, '');
			$(this).val(val);
		}
		else if((val_type.indexOf('mobile') >= 0) )
		{


			if(val.indexOf('+') != -1)
				plus = '+';
			else
				plus = '';
			val = val.replace(/[^0-9]/gi, '');

			if(!filtermobile.test(val))
			{
				val = '';
			}
			$(this).val(plus+val);
		}
		
	}
})

$(document).on('keypress','.val',function(e){
	
	var val_type = $(this).attr('val');
	
	$(this).removeClass('has-error');
	if((typeof(val_type)!='undefined') && (val_type.trim()!=''))
	{
		e = (e) ? e : window.event;
		var eve = (e.which) ? e.which : e.keyCode;
		
		if((e.which==0)&&((eve>=37)&&(eve<=40))) return true; //For Mozilla access arrow buttons 
		//else if(((eve==8))||((eve==9))||((eve==46))) return true;
		else if(((eve==8))||((eve==9))) return true;
		else if((val_type.indexOf('s_space') >= 0)&&(($(this)[0].selectionStart==0))&&($(this).val().length!=0)&&((eve==32)))
			return false;
		else if((val_type.indexOf('s_space') >= 0)&&((eve==32))&&($(this).val().length==0))
			return false;
		else if(val_type.trim()=='s_space')
			return true;
		else
		{
			var val_check=0;
			var rule_set=0;
			
			if((val_type.indexOf('all') >= 0))
			{
				val_check=1;
				rule_set=1;
			}
			
			if((val_type.indexOf('spec_char') >= 0))
			{
				//if((((eve>=48)&&(eve<=57))||((eve==8))||((eve==9))||((eve==46))))
				if((eve==64)||(eve==46)||(eve==95))
					val_check=1;
				rule_set=1;
				
			}

			if((val_type.indexOf('num') >= 0))
			{
				//if((((eve>=48)&&(eve<=57))||((eve==8))||((eve==9))||((eve==46))))
				if((((eve>=48)&&(eve<=57))||((eve==8))||((eve==9))))
					val_check=1;
				rule_set=1;
				
			}
			
			if((val_type.indexOf('float_num') >= 0))
			{
				if((((eve>=48)&&(eve<=57))||((eve==8))||((eve==9))||((eve==46))))
					val_check=1;
				rule_set=1;
				
			}
			
			if((val_type.indexOf('comma') >= 0))
			{
				if(eve==44)
					val_check=1;
				rule_set=1;
				
			}
			
			if((val_type.indexOf('alpha') >= 0))
			{
				if((((eve>=97)&&(eve<=122))||((eve>=65)&&(eve<=90))||((eve==8))||((eve==9))||((eve==46))))
					val_check=1;
				rule_set=1;
				
				
			}
			
			if((val_type.indexOf('email') >= 0))
			{
				if((((eve>=97)&&(eve<=122))||((eve>=65)&&(eve<=90))||((eve>=48)&&(eve<=57))||((eve==8))||((eve==9))||((eve==46))||((eve==64))||((eve==95)) ||((eve==45))))
					val_check=1;
				rule_set=1;			
				
			}
			
			if((val_type.indexOf('m_space') >= 0))
			{
				
				if((eve==32))
					val_check=1;
				rule_set=1;
				
			}
			if(val_type.indexOf("min_digit") >= 0)
			{
				min_val=val_type.split('min_digit');
				min_digit=min_val[1].split('-');
				if((typeof(min_digit[1])!='undefined') && (min_digit[1].trim()!=''))
				{
					min_digit=parseInt(min_digit[1]);
					if(!isNaN((min_digit)))
					{
						
					}
				}
			}
			if(val_type.indexOf("max_digit") >= 0)
			{
				max_val=val_type.split('max_digit');
				max_digit=max_val[1].split('-');
				if((typeof(max_digit[1])!='undefined') && (max_digit[1].trim()!=''))
				{
					max_digit=parseInt(max_digit[1]);
					if(!isNaN((max_digit)))
					{
						
						if(rule_set==1)
						{
							if((($(this).val().length)<(max_digit)|| ((eve==8))||((eve==9))||((eve==46)))&&(val_check==1))
								val_check=1;
							else 
								val_check=0;
								
						}
						else if((($(this).val().length)<(max_digit)|| ((eve==8))||((eve==9))||((eve==46))))
							val_check=1;
						else 
							val_check=0;
											
					}
				}
				rule_set=1;
				
			}
			if((val_type.indexOf("decimal") >= 0))
			{
				
				dec_val=val_type.split('decimal');
				dec_digit=dec_val[1].split('-');
				if((typeof(dec_digit[1])!='undefined') && (dec_digit[1].trim()!=''))
				{
					dec_digit=parseInt(dec_digit[1]);
					if(!isNaN((dec_digit)))
					{
						var input = $(this).val();
						if ((e.which != 46 || input.indexOf('.') != -1) && (e.which < 48 || e.which > 57)) {
							//event it's fine
						
						}
						
						if ((input.indexOf('.') != -1) && (input.substring(input.indexOf('.')).length > dec_digit)) {
							
							return false;
						}
											
					}
				}
				
				
			}
			
			
			if(val_check==1 || rule_set==0)
				return true;
			else
				return false;
			
		}
		
	}
	
});

//////////////////////////////////////////////// END /////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////// START ///////////////////////////////////////////////////////////////////

function validat(typ,data)
{
	
	var val_type ='',
	filterchar=/^[a-zA-Z ]+$/,
	filternum=/^[0-9 ]+$/,
	filternumdot=/^[0-9.]+$/,
	filternumcomma=/^[0-9, ]+$/,
	filternumchar=/^[0-9a-zA-Z ]+$/,
	filternumcharspec=/^[0-9a-zA-Z@_.]+$/,
	//filteremail=/^([\w-\.]{2,}@([\w-]{3,}\.)+[\w-]{2,4})?$/,
	filteremail=/^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i,
	filterwebsite=/^(?:(?:https?|ftp):\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,}))\.?)(?::\d{2,5})?(?:[/?#]\S*)?$/i,
	filterstartspace=/^[^-\s][\w\s-]+$/,
	filterspass=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,30}$/,
	filtermobile = /^[6-9][0-9]{0,10}/;
	val_check=0;
	//if(typ==0) data = $(this);
	//else 
	data = $(data);
	
	$('.val',data).removeClass('has-error');
	$(".error,br").remove()

	$('.val',data).each(function(){
		
		val_type = $(this).attr('val');
		var val = $(this).val();

		//console.log($(this).attr('val'));
		//console.log($(this).attr('val_type'));
		if((typeof(val_type)!='undefined'))
		{
			if((val_type.indexOf('nomand') >= 0) && ($(this).val()==null || $(this).val().trim()=='' ));
			else
			{
				if((val_type.trim()=='')||((val_type.indexOf('s_space') >= 0) &&($(this).val().trim()=='')))
				{
					
					if((typeof($(this).val())=='object')&&($(this).val()==null))
					{
						val_check=1;
						if($(this).hasClass('val_select')){
							$(this).parent().addClass('has-error');
							$(this).parent().closest('.survey-com').removeClass('has-error');
							//$(this).parent().closest( ".error" ).css( "display", "block" );
							
						}
						else if($(this).hasClass('val_image'))
						{
							$(this).parent().after('<span class="error" style="display:block;color: #ff0202;position: relative;">Please Choose image </span>');
						}
						else if($(this).hasClass('val_custom_error'))
						{
							
							$(this).parent().closest('.survey-com').find(".custom-error" ).css( "display", "block" );
						}
						else
							$(this).addClass('has-error');
					}
					else if (((typeof($(this).val())!='object'))&&($(this).val().trim()==''))
					{
						val_check=1;
						if($(this).hasClass('val_select'))
						{
							
							$(this).parent().addClass('has-error');
							$(this).parent().closest('.survey-com').removeClass('has-error');
							//$(this).parent().closest( ".error" ).css( "display", "block" );
							//alert()
							//console.log($(this).closest(".survey-com").find('.error'));
						}
						else if($(this).hasClass('val_image'))
						{
							$(this).parent().after('<span class="error" style="display:block;color: #ff0202;position: relative;">Please Choose image </span>');
						}
						else if($(this).hasClass('val_custom_error'))
						{
							
							$(this).parent().closest('.survey-com').find(".custom-error" ).css( "display", "block" );
						}
						else
							$(this).addClass('has-error');
						//$('label',$(this).parent()).html($('label',$(this).parent()).text()	+' <span class="error" style="display:block;color: #ff0202;">* Field is mendatory </span>');
					}

				}
				else
				{
					
					if((val_type.indexOf('s_space') >= 0) && (val_type.indexOf('alpha') >= 0))
					{
						if (!(filterstartspace.test($(this).val())))
						{
							val_check=1;
							$(this).addClass('has-error');
						}
					}

					if((val_type.indexOf('num') >= 0) && (val_type.indexOf('alpha') >= 0) && (val_type.indexOf('spec_char') >= 0))
					{
						if (!(filternumcharspec.test($(this).val())))
						{
							val_check=1;
							$(this).addClass('has-error');
						}
					}
					else if((val_type.indexOf('num') >= 0) && (val_type.indexOf('alpha') >= 0))
					{
						if (!(filternumchar.test($(this).val())))
						{
							val_check=1;
							$(this).addClass('has-error');
						}
					}
					else if((val_type.indexOf('num') >= 0) && (val_type.indexOf('comma') >= 0))
					{
						if (!(filternumcomma.test($(this).val())))
						{
							val_check=1;
							$(this).addClass('has-error');
						}
					}
					else if((val_type.indexOf('float_num') >= 0))
					{
						if (!(filternumdot.test($(this).val())))
						{	
							val_check=1;
							$(this).addClass('has-error');
						}
					}
					else if((val_type.indexOf('num') >= 0))
					{
						if (!(filternum.test($(this).val())))
						{	
							val_check=1;
							$(this).addClass('has-error');
						}
					}
					else if((val_type.indexOf('alpha') >= 0))
					{
						if (!(filterchar.test($(this).val())))
						{
							val_check=1;
							$(this).addClass('has-error');
						}
					}
					else if((val_type.indexOf('crn_pass') >= 0))
					{
						$('.validation').remove();
						if (!(filterspass.test($(this).val())))
						{
							val_check=1;
							$(this).addClass('has-error');
							$(this).after('<span class="error validation" style="display:block;color: #ff0202;position: relative;">Enter valid password </span>');

						}
					}
					else if((val_type.indexOf('pass') >= 0))
					{
						if (!(filterspass.test($(this).val())))
						{
							val_check=1;
							$(this).addClass('has-error');
							$(this).after('<span class="error" style="display:block;color: #ff0202;position: relative;">must contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character, but cannot contain whitespace </span>');

						}
					}
					else if((val_type.indexOf('conf_pas') >= 0))
					{
						if(!confirm_password())
						{
							val_check=1;
							$(this).addClass('has-error');
						}
					}
					if((val_type.indexOf('m_space') == -1) && (!val_type.trim()=='s_space'))
					{
						
						if (($(this).val().indexOf(' ') >=0))
						{
							val_check=1;
							$(this).addClass('has-error');
							
						}
						
					}
					if((val_type.indexOf('email') >= 0))
					{
						if (!(filteremail.test($(this).val())) || ($(this).val().trim()==''))
						{
							val_check=1;
							$(this).addClass('has-error');
							if(!(filteremail.test($(this).val())))
								$(this).after('<span class="error" style="display:block;color: #ff0202;position: absolute;">* Please Enter Valid Email </span>');

						}
					}
					if((val_type.indexOf('website') >= 0))
					{
						if (!(filterwebsite.test($(this).val())) || ($(this).val().trim()==''))
						{
							val_check=1;
							$(this).addClass('has-error');
						}
					}
					if(val_type.indexOf("max_digit") >= 0)
					{
						max_val=val_type.split('max_digit');
						max_digit=max_val[1].split('-');
						if((typeof(max_digit[1])!='undefined') && (max_digit[1].trim()!=''))
						{
							max_digit=parseInt(max_digit[1]);
							if(!isNaN((max_digit)))
							{
								if(($(this).val().length)<=(max_digit));
									//val_check=0;
								else 
								{
									val_check=1;
									$(this).addClass('has-error');
									if(val_type.indexOf("num") >= 0 || val_type.indexOf("mobile") >= 0)
										$(this).addClass('has-error').after('<span class="error" style="display:block;color: #ff0202;position: absolute;">* Please Enter Max '+(max_digit)+' Digits </span>');
									else
										$(this).addClass('has-error').after('<span class="error" style="display:block;color: #ff0202;position: absolute;">* Please Enter Max '+(max_digit)+' Characters </span>');
									

								}
								
							}
						}
								
					}

					if((val_type.indexOf('min_char') >= 0))
					{
						min_val=val_type.split('min_char');
						min_digit=min_val[1].split('-');
						
						if((typeof(min_digit[1])!='undefined') && (min_digit[1].trim()!=''))
						{
							min_digit=parseInt(min_digit[1]);
							if(!isNaN((min_digit)))
							{	
								if(val_type.indexOf("mobile")>=0)
								{
									
									if (!(filtermobile.test($(this).val())) || ($(this).val().trim()==''))
									{
										val_check=1;
										$(this).val('');
										$(this).addClass('has-error');

									}
									else
									{
										val = val.replace("+", "");
									}
									
								}
								//console.log(val.length);
								if((val.length) > (min_digit));
									//val_check=0;
								else 
								{
									val_check=1;
									if(val_type.indexOf("num") >= 0 || val_type.indexOf("mobile") >= 0)
										$(this).addClass('has-error').after('<span class="error" style="display:block;color: #ff0202;position: absolute;">* Please Enter Minimum '+(min_digit+1)+' Digits </span>');
									else
										if((val_type.indexOf('email') >=0))
										{
											
										}
										else
										$(this).addClass('has-error').after('<span class="error" style="display:block;color: #ff0202;position: absolute;">* Please Enter Minimum '+(min_digit+1)+' Characters </span>');
									
								}
								
							}
						}
					}
					
				}
			}
		}
		
	});	
	
	if(val_check==1)
	{
		$( ".has-error:eq(0)" ).focus();
		return false;
	}
	else
	{
		return true;
	}
}

$(document).on('submit','form',function(){
	$('.validation').remove();
	return validat(0,$(this));
});

$(document).on('keypress','.nowrite',function(){
	return false;
});

/*$(".next-step").click(function (e) {
	
	
});*/


/*For confirm password Validation*/
function confirm_password()
{
	var user_password = $('.user_password').val();
	var input=$(".confirm-password");
	var is_name=input.val();
	$('.error_password').remove();
	if(user_password != is_name)
	{ 
		$(".confirm-password").addClass("has-error").after('<span class="error_password" style="display:block;color: #ff0202;position: absolute;">Password should be same as new password</span>'); 
		$(".confirm-password").val(""); 
		return false;
	} 
	else
	{ 
		$(".confirm-password").removeClass("has-error");
		return true;
	}

}
$(".confirm-password").blur(function(){
	confirm_password();
});
$('.confirm-password').keyup(function(){
	$(".confirm-password").removeClass("has-error");
});

/*For Valid number(not allowed zero) Validation)*/
$(".mobile_no").blur(function(){
	var input=$(this);
	var is_name=input.val();
	if(is_name==0 && is_name!=""){ $(".mobile_no").addClass("has-error").after('<span class="error" style="display:block;color: #ff0202;position: absolute;">* Invalid Number</span>'); $(".mobile_no").val(""); } else{ $(".mobile_no").removeClass("has-error"); }
});

$(".postal_code").blur(function(){
	var input=$(this);
	var is_name=input.val();
	if(is_name==0 && is_name!=""){ $(".postal_code").addClass("has-error").after('<span class="error" style="display:block;color: #ff0202;position: absolute;">* Invalid Number</span>'); $(".postal_code").val(""); } else{ $(".postal_code").removeClass("has-error"); }
});