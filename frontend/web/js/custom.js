$(function(){
	// count = 0;
	var base_url = window.location.origin;

	$('#modalButton').click(function (){
		$('#modal').modal('show');
	});

	$('#save-modal').click(function(){
		// count = count + 1;
<<<<<<< HEAD
		var element = $('tbody>tr:first');
		console.log(element);
		var content = element.html();
		$('tbody').append("<tr>"+content+"</tr>");
		// $.get({
		// 	url: base_url+'/hapulico/donhang/laygia',
		// 	data: {
		// 		idsanpham: $('#idsanpham').val(),
		// 		soluong: $('#soluong').val(),
		// 		tiendo: $('#tiendo').val(),
		// 	},
		// 	dataType: 'json',
		// 	success: function(result){
		// 		var content = $('tr').html();
		// 		console.log(content);
		// 	}
		// });
		$('#modal').modal('hide');
	});

});
=======
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
>>>>>>> 38279bb2e19d7d931fa0f62738638b81df5923ed
