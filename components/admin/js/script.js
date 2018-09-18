;(function($){
	$(function(){

// ПОДКЛЮЧЕНИЕ МАСКИ К ПОЛЯМ ТЕЛЕФОНА И ПАСПОРТНЫХ ДАННЫХ
		$('#phone_number').mask('+7(999)999-99-99');
		$('#passport_data').mask('9999-999999');

// ИНИЦИАЛИЗАЦИЯ ПЛАГИНА ФИЛЬТРАЦИИ ПОЛЬЗОВАТЕЛЕЙ
		if ($('#list-group').length) {
			var listGR = document.querySelector('#list-group');
			var mixer = mixitup(listGR,{
				controls: {
			        enable: false
			    }
			});
		}
		
// ФИЛЬТРАЦИЯ ПОЛЬЗОВАТЕЛЕЙ
		$('.controls.btn-group .control.btn').on('click', function(e){
			e.preventDefault();
			var filter = $(this).data('filter');
			$(this).siblings().removeClass('mixitup-control-active');
			$(this).addClass('mixitup-control-active');
			mixer.filter(filter);
		});

// РЕДАКТИРОВАНИЕ ПОЛЬЗОВАТЕЛЬСКИХ ДАННЫХ
		$(document).on('click', '.btn-edit-user', function(e){
			var $this = $(this);
			$('button[type="submit"]').removeClass('is-valid').removeClass('is-invalid');
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
				    userInfo = jsonData.data[0],
				    city = userInfo.city.split(',');

				    $('#user_id').val(userInfo.id);
				    $('#last_name').val(userInfo.last_name);
				    $('#first_name').val(userInfo.first_name);
				    $('#middle_name').val(userInfo.middle_name);
				    $('#birthday').val(userInfo.birthday);
				    $('#profession').val(userInfo.profession);
				    $('#phone_number').val(userInfo.phone_number);
				    $('#passport_data').val(userInfo.passport_data);
			    	$('#'+userInfo.gender).attr('checked','checked');
			    	$('#region').val(city[0]);
			    	$('#region').trigger('change');
				    setTimeout(function(){
				    	$('#city').val(city[1]);
				    },500);
				
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		});

// УДАЛЕНИЕ ПОЛЬЗОВАТЕЛЯ
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

// УДАЛЕНИЕ ВРЕМЕННОЙ ССЫЛКИ
		$(document).on('click', '.btn-remove-link', function(e){
			var $this = $(this);
			e.preventDefault();
			console.log('будем удалять');
			$.ajax({
				url: '/handlers/handlerGenerateLinks.php',
				type: 'POST',
				data: 'linkId='+$this.data('id')+'&remove=1',
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

		$(document).on('click', '.list-group input', function(){
			$(this).select();
		});

// ВЫГРУЗКА В EXCEL
		$(document).on('click','.downloadXLS', function(e){
			e.preventDefault();

			listTable = '<table><thead><tr><th>Ссылки</th></tr></thead><tbody>';
			$(this).closest('.tab-pane.fade').find('.list-group li').each(function(){
				listTable += "<tr><td>"+$(this).find('input').val()+"</td></tr>";
			});
			listTable += '</tbody></table>';
			 var url='data:application/vnd.ms-excel,' + encodeURIComponent(listTable);
			location.href=url;
		});

// ГЕНЕРАЦИЯ ВРЕМЕННЫХ ССЫЛОК 
		$(document).on('click', '.genLinkBtn', function(e){
			e.preventDefault();
			var $this = $(this),
				$form = ($this.closest('.generate_links')) ? $this.closest('.generate_links') : null,
				$list_group = $(this).closest('.tab-pane.fade').find('.list-group');
				

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
							listLi += '<li class="list-group-item ovfx-a df"> <input type="text" class="form-control" value="'+respData[i].link+'" readonly /><button type="button" data-id="'+respData[i].id+'" class="btn btn-danger btn-remove-link"><i class="fas fa-times"></i></button></li>';
						}
						$list_group.html(listLi);
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

// СОХРАНЕНИЕ ИНФОРМАЦИИ О ПОЛЬЗОВАТЕЛЕ
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

// ПОДГРУЗКА НАСЕЛЁННЫХ ПУНКТОВ ВЫБРАННОГО РЕГИОНА
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
				// console.log(data);
				var length = jsonData.length, result = '';
				console.log(jsonData);
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

	});
})(jQuery);