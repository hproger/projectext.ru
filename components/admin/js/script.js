;(function($){
	$(function(){
		$('#phone_number').mask('+7(999)999-99-99');
		$('#passport_data').mask('9999-999999');

		if ($('#list-group').length) {
			var listGR = document.querySelector('#list-group');
			var mixer = mixitup(listGR);
		}
		
		$(document).on('click', function(e){
			var $this = $(e.target),
				$form = ($this.closest('.generate_links')) ? $this.closest('.generate_links') : null;
				

			if (!$this.hasClass('nav-link')) {
				e.preventDefault();
				if ($this.hasClass('btn-edit-user')) {
					console.log('будем редактировать');
					$.ajax({
						url: '/handlers/userEdit.php',
						type: 'POST',
						data: 'userId='+$this.data('id'),
					})
					.done(function(resp) {
						console.log("success");
						var jsonData = JSON.parse(resp),
						    userInfo = jsonData.data[0];

						    $('#user_id').val(userInfo.id);
						    $('#last_name').val(userInfo.last_name);
						    $('#first_name').val(userInfo.first_name);
						    $('#middle_name').val(userInfo.middle_name);
						    $('#gender').val(userInfo.gender);
						    $('#birthday').val(userInfo.birthday);
						    $('#profession').val(userInfo.profession);
						    $('#phone_number').val(userInfo.phone_number);
						    $('#city').val(userInfo.city);
						    $('#passport_data').val(userInfo.passport_data);
						
					})
					.fail(function() {
						console.log("error");
					})
					.always(function() {
						console.log("complete");
					});
					
				}
				else if ($this.hasClass('btn-remove-user')) {
					console.log('будем удалять');
					$.ajax({
						url: '/handlers/userEdit.php',
						type: 'POST',
						data: 'userId='+$this.data('id')+'&remove=1',
					})
					.done(function(resp) {
						console.log("success");
						var jsonData = JSON.parse(resp);
						// console.log(jsonData);
						if (jsonData.success) {
							$this.closest('.list-group-item').remove();
						}
					})
					.fail(function() {
						console.log("error");
					})
					.always(function() {
						console.log("complete");
					});
				}
				else if ($form && $this.hasClass('genLinkBtn')) {
					var serlData = $form.serialize();

					$.ajax({
						url: '/handlers/handlerGenerateLinks.php',
						type: 'POST',
						data: serlData,
					})
					.done(function(resp) {
						var jsonData = JSON.parse(resp),
							respData = jsonData.data,
							listLi = '';
						if (jsonData.success) {
							console.log("success");
							for (var i = 0; i < respData.length; i++) {
								listLi += '<li class="list-group-item">'+respData[i].link+'</li>';
							}
						}
						else {

						}
						
					})
					.fail(function() {
						console.log("error");
					})
					.always(function() {
						console.log("complete");
					});
					
				}
			}
		});
		$(document).on('click', '#user_info button[type="submit"]', function(e){
			e.preventDefault();
			var $thisForm = $(this).closest('form'),
				req = $thisForm.serialize();

			$.ajax({
				url: '/handlers/userEdit.php',
				type: 'POST',
				// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
				data: req+'&save=1',
			})
			.done(function(resp) {
				console.log("success");
				var jsonData = JSON.parse(resp);
				// console.log(jsonData);
				if (jsonData.success) {
					$thisForm.find('button[type="submit"]').addClass('is-valid');
				}
				else {
					$thisForm.find('button[type="submit"]').addClass('is-invalid');
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