$(document).ready(function(){
	var i = 0;
	$('#adddivcont').click(function() {
	    var data= '<div class="col-md-12"><hr/><div class="form-group"><label for="name-in" class="col-md-3 label-heading">Name</label><div class="col-md-9"><input type="text" class="form-control usrname"  name="contact['+i+'][usrname]" value=""><span></span></div></div>'+
							'<div class="form-group"><label for="name-in" class="col-md-3 label-heading">Email</label><div class="col-md-9"><input type="text" class="form-control email" name="contact['+i+'][email]" value=""></div></div>'+
							'<div class="form-group"><label for="phone-in" class="col-md-3 label-heading">Phone Number</label><div class="col-md-9"><input type="text" class="form-control phone" name="contact['+i+'][phone]" value=""></div></div></div>';	
		$("#addrow").append(data);
		i++
	});	
	
	function IsEmail(email) {
		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!regex.test(email)) {
			return false;
		}else{
			return true;
		}
	}

	$('#validabtn').click(function() {
		$('.error').hide();
		$('.usrname').each(function() {
			var pattern = /^[a-z][a-z\s]*$/;
			if(!$(this).val().match(pattern)){
				$( $(this) ).after( "<p class='error'>Please enter valid name</p>" );
			}
		});
		$('.email').each(function() {
			if(IsEmail($(this).val())==false || $(this).val() == "") {
				$( $(this) ).after( "<p class='error'>Please enter valid email</p>" );
            }
		});
		$('.phone').each(function() {	
			if (isNaN($(this).val()) || $(this).val() == "") {
				$( $(this) ).after( "<p class='error'>Please enter valid numbers</p>" );
			}	
		});
	});
});