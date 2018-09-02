;(function($){
	$(function(){
		$(document).on('click', '.btn-logout', function(e){
			e.preventDefault();
			var type = $(this).data('type');
			$.ajax({
				url: 'index.php',
				type: 'POST',
				// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
				data: 'logout='+type,
			})
			.done(function(data) {
				console.log("success");
				var resp = JSON.parse(data);
				if (resp.success) {
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