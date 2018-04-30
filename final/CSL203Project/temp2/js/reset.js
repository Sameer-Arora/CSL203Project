
$(document).ready(function() {
	//alert('enterd form');
	// Initialize popover for all required inputs
	$('input').popover({
		placement: 'bottom',
		container: 'body',
		trigger: 'manual',
		selector: 'true',
		content: function() {
			console.log($(this).val());
			return $(this).attr('title');
		},
		template: '<div class="popover" role="tooltip"><div class="arrow"></div><div class="popover-content"></div></div>'
	}).focus(function() {
		$(this).popover('hide');
	});

});
	

function validateForm(form) {

	//alert('enterd form');

	var email = $(form).find("input[name='email']");
	
	//console.log(email.val());

	var password = $(form).find("input[name='password']");

	var emailPattern = new RegExp('^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$');

	// Email length regex pattern.
	var emailLengthPattern = new RegExp(email.attr('pattern'));
	
	var UsernamePattern = new RegExp(username.attr('pattern'));

	// Password regex pattern.
	var passwordPattern = new RegExp(password.attr('pattern'));

	var phonePattern =new RegExp(phone.attr('pattern'));

	// Password validation.
	if (!passwordPattern.test(password.val())) {
		password.popover('show');
		return false;
	}
	
	// Email validation.
  if (!emailPattern.test(email.val()) || !emailLengthPattern.test(email.val())) {
		//alert('email successfully');
		try{  
  		email.popover('show');
  		}
  		catch(e){
  			console.trace();
  		}
		//alert('email successfully');

    	return false;
    } else {
		email.addClass('valid');
	}
	
	//alert('Submitted successfully');
	
	if ( username && !UsernamePattern.test(username.val())) {
		console.log(username.val());
		username.popover('show');
		return false;
	}


	if ( phone && !phonePattern.test(phone.val())) {
		console.log(phone.val());
		username.popover('show');
		return false;
	}

	// No validation errors.
	//alert('Submitted successfully');
	
	// In this demo, prevent the form from submitting.
	return true;
}

function validateEmail(input) {
		

	var emailPattern = new RegExp('^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$');

	var emailLengthPattern = new RegExp($(input).attr('pattern'));

	console.log(input.value);
	if (input.setCustomValidity) {
		input.setCustomValidity('');
		
		if (input.validity && !input.validity.valid) {
			input.setCustomValidity(input.title);
		}
	}
	

	if (emailPattern.test(input.value) && emailLengthPattern.test(input.value)) {
		$(input).addClass('valid');
	} else {
		$(input).removeClass('valid');
	}
}

/*
Sets a custom validation to require both password fields to match each other
*/
function validatePassword(input) {
		
	console.log(input.value);
	
	var passwordPattern = new RegExp($(input).attr('pattern'));
	
	if (input.setCustomValidity) {
		input.setCustomValidity('');
		
		if (input.validity && !input.validity.valid) {
			input.setCustomValidity(input.title);
		}
	}
	if (passwordPattern.test(input.value)) {
			$(input).addClass('valid');
		} else {
			$(input).removeClass('valid');
		}
	
}

function validatephone(input) {
		
	
	var phonePattern = new RegExp($(input).attr('pattern'));
	
	if (input.setCustomValidity) {
		input.setCustomValidity('');
		
		if (input.validity && !input.validity.valid) {
			input.setCustomValidity(input.title);
		}
	}
	if (phonePattern.test(input.value)) {
			$(input).addClass('valid');
		} else {
			$(input).removeClass('valid');
		}
	
}

function validateRequired(input) {
	
	if (input.setCustomValidity) {
		input.setCustomValidity('');
		
		if (input.validity && !input.validity.valid) {
			input.setCustomValidity(input.title);
		}
	}
	
	if (input.value.length > 0) {
  	$(input).addClass('valid');
  } else {
		$(input).removeClass('valid');
	}
}

