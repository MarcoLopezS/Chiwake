$(function() {

	/* @reload captcha
	------------------------------------------- */			   
	function reloadCaptcha(){
		$("#captcha").attr("src","libs/smartform/php/captcha.php?r=" + Math.random())
	}
	
	$('.captcode').click(function(e){
		e.preventDefault();
		reloadCaptcha();
	});
		   
	$( "#smart-form" ).validate({
	
		/* @validation states + elements 
		------------------------------------------- */
		errorClass: "state-error",
		validClass: "state-success",
		errorElement: "em",
		onkeyup: false,
		onclick: false,
		
		/* @validation rules 
		------------------------------------------ */
		rules: {
			nombre: {
				required: true,
				minlength: 2
			},
			apellidos: {
				required: true,
				minlength: 2
			},
			email: {
				required: true,
				email: true
			},
			telefono: {
				required: true
			},
			fecha: {
				required: true
			},
			hora: {
				required: true
			},
			personas: {
				required: true,
				number: true
			}
		},
	
		messages:{
			nombre: {
				required: 'Ingresa tu nombre',
				minlength: 'Mínimo 2 caracteres'
			},
			apellidos: {
				required: 'Ingresa tus apellidos',
				minlength: 'Mínimo 2 caracteres'
			},
			email: {
				required: 'Ingresa tu email',
				email: 'El email ingresado no es válido'
			},
			telefono: {
				required: 'Ingresa tu teléfono'
			},
			fecha: {
				required: 'Ingresa la fecha'
			},
			hora: {
				required: 'Ingresa la hora'
			},
			personas: {
				required: 'Ingresa la cantidad personas',
				number: 'Ingrese un número valido'
			},
		},

		/* @validation highlighting + error placement  
		---------------------------------------------------- */
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.field').addClass(errorClass).removeClass(validClass);
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.field').removeClass(errorClass).addClass(validClass);
		},
		errorPlacement: function(error, element) {
		   if (element.is(":radio") || element.is(":checkbox")) {
				element.closest('.option-group').after(error);
		   } else {
				error.insertAfter(element.parent());
		   }
		},
		
		/* @ajax form submition 
		---------------------------------------------------- */
        submitHandler:function(form) {
			$(form).ajaxSubmit({
			    target:'.result',			   
				beforeSubmit:function(){ 
					$('.form-footer').addClass('progress');
				},
				error:function(){
					$('.form-footer').removeClass('progress');
				},
				success:function(){
					$('.form-footer').removeClass('progress');
					$('.alert-success').show().delay(10000).fadeOut();
					$('.field').removeClass("state-error, state-success");
					if( $('.alert-error').length == 0){
						$('#smart-form').resetForm();
						reloadCaptcha();
					}
				 }
		  	});
		}
		// end submitHandler:
	});
	
});