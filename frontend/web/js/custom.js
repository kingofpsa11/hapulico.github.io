$(function(){
	count = 0;
	var base_url = window.location.origin;

	$('#modalButton').click(function (){
		$('#modal').modal('show');
		$('donhangchitiet-soluong').val('');
		$('donhangchitiet-tiendo').val('');
	});

	$('#save-modal').click(function(){
		
<<<<<<< HEAD
<<<<<<< HEAD
		var elements = $('tbody>tr[data-key]');
		var element = $('tbody>tr[data-key]:last').clone();
		// 
		element.attr('data-key', elements.length);
		element.attr('id', 'stt_'+elements.length);

		//Tạo STT mới
		var stt = parseInt(element.children('[data-col-seq]:first').html());
		stt++;
		element.children('[data-col-seq]:first').html(stt);

		//Giá trị tên sản phẩm trong modal
		var idsanpham = $('#donhangchitiet-idsanpham > option:last').attr('value');
		var tensanpham = $('#donhangchitiet-idsanpham').val();
		// console.log(idsanpham);
		console.log(tensanpham);
		// console.log(element.children('td[data-col-seq="1"]').html());
		element.children('[data-col-seq="1"] input').attr('value', idsanpham);
		element.children('[data-col-seq="2"]').text(tensanpham);

		// Giá trị số lượng trong modal
		var soluong = $("#donhangchitiet-soluong").val();
		element.children('[data-col-seq="3"]').text(soluong);

		$('tbody').append(element);
=======
=======
>>>>>>> 9225bbeae9abd06f9362dea6cfa687aac0ae15d0
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
<<<<<<< HEAD
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
		
=======

		$('tbody').append(
			"<tr data-key="0"> \
				<td>1</td> \
				<td data-col-seq="2">Đèn Halumos 150W</td> \
				<td data-col-seq="3">20</td> \
				<td data-col-seq="4">1500000</td> \
				<td style="text-align:center" data-col-seq="5">2018-09-15</td> \
				<td style="text-align:center">\
					<a href="javascript:void()"><span class="glyphicon glyphicon-user"></span></a>\
					<a href="/hapulico/donhang/delete?id=0" title="Delete" aria-label="Delete" data-pjax="0" data-confirm="Are you sure you want to delete this item?" data-method="post"><span class="glyphicon glyphicon-trash"></span></a>\
				</td>\
			</tr>"
		)
		// $('tbody').append(element);
<<<<<<< HEAD
>>>>>>> 9225bbeae9abd06f9362dea6cfa687aac0ae15d0
=======
>>>>>>> 9225bbeae9abd06f9362dea6cfa687aac0ae15d0

>>>>>>> b51e3a5549d92bcdbb89927121c592e4d336d98d
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


