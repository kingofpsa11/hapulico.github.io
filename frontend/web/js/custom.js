$(function(){
	// count = 0;
	var base_url = window.location.origin;

	$('#modalButton').click(function (){
		$('#modal').modal('show');
	});

	$('#save-modal').click(function(){
		// count = count + 1;
		var elements = $('tbody>tr[data-key]');
		var element = $('tbody>tr[data-key]:first').clone();
		element.attr('data-key', elements.length);
		element.children('[data-col-seq]:first').html()
		console.log(element.children('[data-col-seq]:first').html());

		$('tbody').append(element);

		$('#modal').modal('hide');
	});


});
