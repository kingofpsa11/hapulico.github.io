$(function(){
	// count = 0;
	var base_url = window.location.origin;

	$('#modalButton').click(function (){
		$('#modal').modal('show');
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
		if ($('tbody tr td div').hasClass('empty')) {
			$('tbody').html('');
		}

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

		$('#modal').modal('hide');
	});

});


