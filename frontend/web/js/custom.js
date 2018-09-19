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
		// 
		element.attr('data-key', elements.length);
		element.attr('id', 'stt_'+elements.length);

		//Tạo STT mới
		var stt = parseInt(element.children('[data-col-seq]:first').html());
		stt++;
		element.children('[data-col-seq]:first').html(stt);

		//Giá trị tên sản phẩm trong modal
		var idsanpham = $('#donhangchitiet-idsanpham > option:last').attr('value');
		var tensanpham = $('#donhangchitiet-idsanpham > option:last').html();
		console.log(idsanpham);
		console.log(tensanpham);
		console.log(element.children('td[data-col-seq="1"]').html());
		element.children('[data-col-seq="1"] input').attr('value', idsanpham);
		element.children('[data-col-seq="2"]').text(tensanpham);

		// Giá trị số lượng trong modal
		var soluong = $("#donhangchitiet-soluong").val();
		element.children('[data-col-seq="3"]').text(soluong);

		$('tbody').append(element);

		$('#modal').modal('hide');
	});

});


