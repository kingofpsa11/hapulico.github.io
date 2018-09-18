$(function(){
	// count = 0;
	var base_url = window.location.origin;

	$('#modalButton').click(function (){
		$('#modal').modal('show');
	});

	$('#save-modal').click(function(){
		// count = count + 1;
		var elements = $('tbody>tr[data-key]');
		var element = $('tbody>tr[data-key]:last').clone();
		element.attr('data-key', elements.length);
		element.attr('id', 'stt_'+elements.length);
		var stt = parseInt(element.children('[data-col-seq]:first').html());
		stt++;
		element.children('[data-col-seq]:first').html(stt);

		var tensanpham = $('#donhangchitiet-idsanpham');
		console.log(tensanpham);
		

		$('tbody').append(element);

		$('#modal').modal('hide');
	});


});
