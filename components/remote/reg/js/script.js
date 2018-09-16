;(function($){
	$(function(){
		$("input[type='tel']").mask("+7(999)999-99-99");
		$('input#passport_data').mask("9999-999999");
		
		$('#region').on('change', function(){
			var regionId = $(this).val();

			$('#region').attr('disabled', true);
			$('#city').attr('disabled', true);

			$.ajax({
				url: '/',
				type: 'POST',
				data: 'getCities='+regionId,
			})
			.done(function(data) {
				console.log("success");
				var jsonData = JSON.parse(data);
				var length = jsonData.length, result = '';

				if(length > 0) {

				   result += '<option selected value="">Выберите область...</option><option value="409201" selected="selected">Без города</option>';
				   for (var i = 0; i < length; i++) {
				   	result += '<option value="' + jsonData[i].id + '">' + jsonData[i].name + '</option>';
				   }


				} 

				$("#city").html(result);
				$('#region').attr('disabled', false);
				$('#city').attr('disabled', false);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		});


		$(document).on('submit','.register', function(e){
			e.preventDefault();
			var	data_fields = $(this).serialize();
				
			$.ajax({
				url: '/handlers/handlerRegister.php',
				type: 'POST',
				data: data_fields,
			})
			.done(function(data) {
				console.log("success");
				console.log(data);
				var jsonData = JSON.parse(data);
				if (jsonData.success) {
					$('.success-text').show();
					window.location = '/';
				}
				

			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		});
		
	});
})(jQuery);