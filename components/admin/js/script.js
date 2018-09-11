;(function($){
	$(function(){
		$('#phone_number').mask('+7(999)999-99-99');
		$('#passport_data').mask('9999-999999');

		if ($('#list-group').length) {
			var listGR = document.querySelector('#list-group');
			var mixer = mixitup(listGR,{
				controls: {
			        enable: false
			    }
			});
		}
		
		$('.controls.btn-group .control.btn').on('click', function(e){
			e.preventDefault();
			var filter = $(this).data('filter');
			$(this).siblings().removeClass('mixitup-control-active');
			$(this).addClass('mixitup-control-active');
			mixer.filter(filter);
		});

		$(document).on('click', '.btn-edit-user', function(e){
			var $this = $(this);
			e.preventDefault();
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
				    $('#birthday').val(userInfo.birthday);
				    $('#profession').val(userInfo.profession);
				    $('#phone_number').val(userInfo.phone_number);
				    $('#city').val(userInfo.city);
				    $('#passport_data').val(userInfo.passport_data);
			    	$('#'+userInfo.gender).attr('checked','checked');
				
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		});

		$(document).on('click', '.btn-remove-user', function(e){
			var $this = $(this);
			e.preventDefault();
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
		});

		$(document).on('click', '.genLinkBtn', function(e){
			var $this = $(this),
				$form = ($this.closest('.generate_links')) ? $this.closest('.generate_links') : null;
				

			if ($form ) {
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