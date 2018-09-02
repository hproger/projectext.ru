;(function($){
	$(function(){

		$("input[type='tel']").mask("+7(999)999-99-99");
		$('input#passport_data').mask("9999-999999");

		$(document).on('click', '.btn-user', function(e){
			e.preventDefault();
			var type = $(this).data('type');
			if (type == 'student') {
				$('#users-type-btn').hide(100);
				$('form.login')[0].reset();
				$('#login-'+type).show(200);
			}
			else if (type == 'expert') {
				$('#users-type-btn').hide(100);
				$('#login-'+type).show(200);
			}
			else if (type == 'volunteer') {
				$('#users-type-btn').hide(100);
				$('#login-'+type).show(200);
			}
		});
		$(document).on('click', '.close-login', function(e){
			e.preventDefault();
			$(this).parent().parent().hide(100);
			$('#users-type-btn').show(200);
		});
		$(document).on('click', '.btn-register', function(e){
			e.preventDefault();
			$('#login-student').hide(100);
			$('.success-text').hide();
			$('form.register fieldset').show();
			$('#register-student').show(200);
		});
		$(document).on('click', '.close-register', function(e){
			e.preventDefault();
			$('#register-student').hide(100);
			$('form.login')[0].reset();
			$('#login-student').show(200);
		});

// РЕГИСТРАЦИЯ ОБУЧАЮЩЕГОСЯ
		$(document).on('submit','.register', function(e){
			e.preventDefault();
			var id = $(this).data('id'),
				data_fields;
			if (id == 'student') {
				data_fields = $(this).serialize();
				
				data_fields += "&type_user="+id;
				console.log(data_fields);

				$.ajax({
					url: 'handlers/handlerRegister.php',
					type: 'POST',
					// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
					data: data_fields,
				})
				.done(function() {
					console.log("success");
					$('form.register fieldset').hide();
					$('.success-text').show();
					$('form.register')[0].reset();

				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
				
			}
		});

// АВТОРИЗАЦИЯ СО ВСЕХ ФОРМ
		$(document).on('submit','.login', function(e){
			e.preventDefault();
			var id = $(this).data('id'),
				data_fields;
			if (id == 'student') {
				data_fields = $(this).serialize();
				
				data_fields += "&type_user="+id;
				
				$.ajax({
					url: 'handlers/handlerLogin.php',
					type: 'POST',
					// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
					data: data_fields,
				})
				.done(function(resp) {
					console.log("success");
					// console.log(data);
					var jsonData = JSON.parse(resp);
					if (jsonData.success) {
						window.location = '/';
					}

				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
				
			}
		});
		
	});
})(jQuery);