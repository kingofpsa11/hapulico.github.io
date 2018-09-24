$(function(){
	count = 0;
	var base_url = window.location.origin;

	$('#modalButton').click(function (){
		$('#modal').modal('show');
		$('donhangchitiet-soluong').val('');
		$('donhangchitiet-tiendo').val('');
	});

	$('#save-modal').click(function(){
		
		//Tabular kartik
		// Clone dòng cuối cùng của 
		// var element = $('tbody>tr[data-key]:last').clone();
		// // 
		// element.attr('data-key', $('tbody>tr[data-key]').length);
		// element.attr('id', 'stt_'+elements.length);

		// //Tạo STT mới
		// var stt = parseInt(element.children('[data-col-seq]:first').html());
		// stt++;
		// element.children('[data-col-seq]:first').html(stt);

		// //Giá trị tên sản phẩm trong modal
		// var idsanpham = $('#donhangchitiet-idsanpham > option:last').attr('value');
		// var tensanpham = $('#donhangchitiet-idsanpham > option:last').html();
		// console.log(idsanpham);
		// console.log(tensanpham);
		// console.log(element.children('td[data-col-seq="1"]').html());
		// element.children('[data-col-seq="1"] input').attr('value', idsanpham);
		// element.children('[data-col-seq="2"]').text(tensanpham);

		// // Giá trị số lượng trong modal
		// var soluong = $("#donhangchitiet-soluong").val();
		// element.children('[data-col-seq="3"]').text(soluong);


		//Gridview yii2

		//Xóa nội dung của bảng nếu bảng chưa có sản phẩm
		if ($('tbody tr td div').hasClass('empty')) {
			$('tbody').html('');
		}
		if ($('#save-modal').text() == 'Thêm mới'){
			var idsanpham = $('#donhangchitiet-idsanpham > option:last').attr('value');
			var tensanpham = $('#donhangchitiet-idsanpham > option:last').html();
			var soluong = $('#donhangchitiet-soluong').val();
			var tiendo = $('#donhangchitiet-tiendo').val();
			count = count + 1;
			var output = '<tr id="row_'+count+'" data-key="0">';
			output += '<td data-col-seq="1">'+count+'</td>';
			output += '<td data-col-seq="2">'+tensanpham+'<input type="hidden" id="idsanpham_'+count+'" class="idsanpham" value="'+idsanpham+'" /></td>';
			output += '<td data-col-seq="3">'+soluong+'</td>';
			output += '<td data-col-seq="4"></td>';
			output += '<td data-col-seq="5">'+tiendo+'</td>';
			output += '<td><button type="button" class="btn btn-primary view_detail" id='+count+'>View</button>';
			output += '<button type="button" class="btn btn-danger delete_detail" id='+count+'>Delete</button></td>';
			output += '</tr>';
			$('tbody').append(output);
		}
		else{
			// var row_id = $('#')
		}
		$.ajax({
			url: base_url+'/hapulico/donhang/getprice',
			type: 'GET',
			dataType: 'text',
			data: {id: idsanpham},
			success: function(result){
				// console.log(result);
				$('#row_'+count+' td[data-col-seq="4"]').text(result);
				// console.log($('row_'+count+'td[data-col-seq="4"]'));
			}
		});
		
		$('#modal').modal('hide');
	});

	$(document).on('click', '.view_detail', function() {
		$('#modal').modal('show');
		var row_id = $(this).attr('id');
		console.log($('#row_'+row_id+' > td[data-col-seq="3"]'));
		// $('#donhangchitiet-soluong').val() = $('#row_'+row_id+' td[data-col-seq="3"]').text();
		// $('#donhangchitiet-tiendo').val() = $('#row_'+row_id+' td[data-col-seq="5"]').text();
	});
});


