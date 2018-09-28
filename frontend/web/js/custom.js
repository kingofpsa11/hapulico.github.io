$(function(){
	count = 0;
	var base_url = window.location.origin;

	$('#modalButton').click(function (){
<<<<<<< HEAD
<<<<<<< HEAD
		$('#modal').modal('show');
		$('#donhangchitiet-idsanpham > option:last').attr('value','');
		$('#donhangchitiet-idsanpham > option:last').html('');
		$('#donhangchitiet-soluong').val('');
		$('#donhangchitiet-tiendo').val('');
=======
		if($('#donhang-sodh').val()!==''){
			$('#modal').modal('show');
			$('#save-modal').text('Thêm mới');
			$('#donhangchitiet-soluong').val('');
			$('#donhangchitiet-tiendo').val('');
		}
>>>>>>> 363bd637cbb618b2210d54ca052b4ac00d9dced4
=======
		$('#modal').modal('show');
		$('donhangchitiet-soluong').val('');
		$('donhangchitiet-tiendo').val('');
>>>>>>> parent of 363bd63... 25/09/2018
	});

	$('#save-modal').click(function(){
<<<<<<< HEAD
		count ++;
		//Tabular form kartik
=======
		
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
>>>>>>> 363bd637cbb618b2210d54ca052b4ac00d9dced4
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
<<<<<<< HEAD
		var gia;
		//Giá trị tên sản phẩm trong modal
		var idsanpham = $('#donhangchitiet-idsanpham > option:last').attr('value');
		var tensanpham = $('#donhangchitiet-idsanpham > option:last').html();
		var soluong = $('#donhangchitiet-soluong').val();
		var tiendo = $('#donhangchitiet-tiendo').val();

		output = '<tr data-key="0" id="row_'+count+'">';
		output += '<td>'+count+'</td>';
		output += '<td data-col-seq="1" id="tensanpham_"'+count+'><input type="hidden" name="row_id" id="hidden_row_id_'+count+'" value="'+idsanpham+'"/>'+tensanpham+'</td>';
		output += '<td data-col-seq="2" id="soluong_'+count+'">'+soluong+'</td>';
		output += '<td data-col-seq="3" id="gia_'+count+'">'+gia+'</td>';
		output += '<td style="text-align:center" data-col-seq="5" id="tiendo_'+count+'">'+tiendo+'</td>';
		output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button>'+' ';
		output += '<button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
		output += '</tr>';

		$('tbody').append(output);
		$.ajax({
			type: "GET",
			url: base_url+"/hapulico/banggia/getprice",
			data: {
				id: idsanpham,
			},
			success: function(result){
				$('#gia_'+count).html(Number(result));
			},
			dataType: 'text',
		});
		$('#modal').modal('hide');
	});

	$(document).on('click', '.view_details', function(){
		var row_id = $(this).attr('id');
		$('#modal').modal('show');
		$('#donhangchitiet-idsanpham > option:last').attr('value',$('#hidden_row_id').attr('value'));
		$('#donhangchitiet-idsanpham > option:last').html($(''));
		$('#donhangchitiet-soluong').val($('#soluong_'+row_id+'').html());
		$('#donhangchitiet-tiendo').val($('#tiendo_'+row_id+'').html());
	});

	$(document).on('click', '.remove_details', function(){
		var row_id = $(this).attr("id");
		if(confirm("Are you sure you want to remove this row data?"))
		{
			$('#row_'+row_id+'').remove();
		}
		else
		{
=======
		var idsanpham = $('#donhangchitiet-idsanpham > option:last').attr('value');
=======
		if ($('#save-modal').text() == 'Thêm mới'){
			var idsanpham = $('#donhangchitiet-idsanpham > option:last').attr('value');
>>>>>>> parent of 363bd63... 25/09/2018
			var tensanpham = $('#donhangchitiet-idsanpham > option:last').html();
			var soluong = $('#donhangchitiet-soluong').val();
			var tiendo = $('#donhangchitiet-tiendo').val();
			count = count + 1;
			var output = '<tr id="row_'+count+'" data-key="0">';
			output += '<td data-col-seq="1">'+count+'</td>';
<<<<<<< HEAD
			output += '<td data-col-seq="2">'+tensanpham+'<input type="hidden" id="idsanpham_'+count+'" name="Donhangchitiet['+count+'][idsanpham]" class="idsanpham" value="'+idsanpham+'" /></td>';
			output += '<td data-col-seq="3" style="text-align:center">'+soluong+'<input type="hidden" id="donhangchitiet-'+count+'-soluong" class="donhangchitiet-'+count+'-soluong" name="Donhangchitiet['+count+'][soluong]"></td>';
			output += '<td data-col-seq="4" style="text-align:right"><input type="hidden" id="donhangchitiet-'+count+'-gia" class="donhangchitiet-'+count+'-gia" name="Donhangchitiet['+count+'][gia]"></td>';
			output += '<td data-col-seq="5" style="text-align:center">'+tiendo+'<input type="hidden" id="donhangchitiet-'+count+'-tiendo" class="donhangchitiet-'+count+'-tiendo" name="Donhangchitiet['+count+'][tiendo]"></td>';
			output += '<td><button type="button" class="btn btn-primary view_detail" id='+count+'>Sửa</button>';
			output += '<button type="button" class="btn btn-danger delete_detail" id='+count+'>Xóa</button></td>';
=======
			output += '<td data-col-seq="2">'+tensanpham+'<input type="hidden" id="idsanpham_'+count+'" class="idsanpham" value="'+idsanpham+'" /></td>';
			output += '<td data-col-seq="3">'+soluong+'</td>';
			output += '<td data-col-seq="4"></td>';
			output += '<td data-col-seq="5">'+tiendo+'</td>';
			output += '<td><button type="button" class="btn btn-primary view_detail" id='+count+'>View</button>';
			output += '<button type="button" class="btn btn-danger delete_detail" id='+count+'>Delete</button></td>';
>>>>>>> parent of 363bd63... 25/09/2018
			output += '</tr>';
			$('tbody').append(output);
		}
		else{
<<<<<<< HEAD
			var row_id = $('#hidden_row_id').val();
<<<<<<< HEAD
			output += '<td data-col-seq="1">'+row_id+'</td>';
			output += '<td data-col-seq="2">'+tensanpham+'<input type="hidden" id="idsanpham_'+row_id+'" name="Donhangchitiet['+row_id+'][idsanpham]" class="idsanpham" value="'+idsanpham+'" /></td>';
			output += '<td data-col-seq="3" style="text-align:center">'+soluong+'<input type="hidden" id="donhangchitiet-'+row_id+'-soluong" class="donhangchitiet-'+row_id+'-soluong" name="Donhangchitiet['+row_id+'][soluong]"></td>';
			output += '<td data-col-seq="4" style="text-align:right"><input type="hidden" id="donhangchitiet-'+row_id+'-gia" class="donhangchitiet-'+row_id+'-gia" name="Donhangchitiet['+row_id+'][gia]"></td>';
			output += '<td data-col-seq="5" style="text-align:center">'+tiendo+'<input type="hidden" id="donhangchitiet-'+row_id+'-tiendo" class="donhangchitiet-'+row_id+'-tiendo" name="Donhangchitiet['+row_id+'][tiendo]"></td>';
			output += '<td><button type="button" class="btn btn-primary view_detail" id='+row_id+'>Sửa</button>';
=======
			output = '<td data-col-seq="1">'+row_id+'</td>';
			output += '<td data-col-seq="2">'+tensanpham+'<input type="hidden" id="idsanpham_'+row_id+'" class="idsanpham" value="'+idsanpham+'" /></td>';
			output += '<td data-col-seq="3" style="text-align:center>'+soluong+'</td>';
			output += '<td data-col-seq="4" style="text-align:right"></td>';
			output += '<td data-col-seq="5" style="text-align:center">'+tiendo+'</td>';
			output += '<td><button type="button" class="btn btn-primary view_detail" id='+row_id+'>Sửa</button> ';
>>>>>>> parent of edb09c1... 26/09/2018
			output += '<button type="button" class="btn btn-danger delete_detail" id='+row_id+'>Xóa</button></td>';
			$('#row_'+row_id+'').html(output);
=======
			// var row_id = $('#')
>>>>>>> parent of 363bd63... 25/09/2018
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
<<<<<<< HEAD
		$('#hidden_row_id').val(row_id);
		$('#donhangchitiet-soluong').val() = $('#row_'+row_id+' > td[data-col-seq="3"]').html();
		$('#donhangchitiet-tiendo').val() = $('#row_'+row_id+' td[data-col-seq="5"]').html();
	});

	$(document).on('click', '.delete_detail', function() {
		event.preventDefault();
		row_id = $(this).attr('id');
		if(confirm('Chắc chắn xóa?')){
			$('#row_'+row_id).remove();
		}
		else{
>>>>>>> 363bd637cbb618b2210d54ca052b4ac00d9dced4
			return false;
		}
=======
		console.log($('#row_'+row_id+' > td[data-col-seq="3"]'));
		// $('#donhangchitiet-soluong').val() = $('#row_'+row_id+' td[data-col-seq="3"]').text();
		// $('#donhangchitiet-tiendo').val() = $('#row_'+row_id+' td[data-col-seq="5"]').text();
>>>>>>> parent of 363bd63... 25/09/2018
	});
});



