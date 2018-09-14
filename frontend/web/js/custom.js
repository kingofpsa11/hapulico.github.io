$(function(){
	// count = 0;
	var base_url = window.location.origin;

	$('#modalButton').click(function (){
		$('#modal').modal('show');
	});

	$('#save-modal').click(function(){
		// count = count + 1;
		var content = $('tbody:has(tr)').html();
		console.log(content);
		$.get({
			url: base_url+'/hapulico/donhang/laygia',
			data: {
				idsanpham: $('#idsanpham').val(),
				soluong: $('#soluong').val(),
				tiendo: $('#tiendo').val(),
			},
			dataType: 'json',
			success: function(result){
				var content = $('tr').html();
				console.log(content);
			}
		});
		$('#modal').modal('hide');
	});


});