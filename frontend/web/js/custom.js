$(function(){
	count = 0;
	var base_url = window.location.origin;


	$('#modalButton').click(function (){
		if($('#donhang-sodh').val()!==''){
			$('#modal').modal('show');
			$('#save-modal').text('Thêm mới');
			$('#w5 option:selected').val('');
			// $('#w5 option:selected').text('Chọn sản phẩm');
			console.log($('#w5 option:selected').text());
			$('#donhangchitiet-soluong').val('');
			$('#donhangchitiet-tiendo').val('');
		}
	});

	$('#save-modal').click(function(){
		
		// console.log(count);

		//Xóa nội dung của bảng nếu bảng chưa có sản phẩm
		if ($('tbody tr td div').hasClass('empty')) {
			$('tbody').html('');
		}
		
		//Giá trị tên sản phẩm trong modal

		var idsanpham = $('#w5 option:selected').val();
		var tensanpham = $('#w5 option:selected').text();
		var soluong = $('#donhangchitiet-soluong').val();
		var tiendo = $('#donhangchitiet-tiendo').val();

		if(idsanpham && soluong && tiendo){
			if ($('#save-modal').text() == 'Thêm mới'){
				count ++;
				output = '<tr id="row_'+count+'" data-key='+count+'>';
				output += '<td data-col-seq="1">'+count+'</td>';
				output += '<td data-col-seq="2">'+tensanpham+'<input type="hidden" id="idsanpham_'+count+'" name="Donhangchitiet['+count+'][idsanpham]" class="idsanpham" value="'+idsanpham+'" /></td>';
				output += '<td data-col-seq="3" style="text-align:center">'+soluong+'<input type="hidden" id="donhangchitiet-'+count+'-soluong" class="donhangchitiet-'+count+'-soluong" name="Donhangchitiet['+count+'][soluong]" value="'+soluong+'"></td>';
				output += '<td data-col-seq="4" style="text-align:right"><input type="hidden" id="donhangchitiet-'+count+'-gia" class="donhangchitiet-'+count+'-gia" name="Donhangchitiet['+count+'][gia]"></td>';
				output += '<td data-col-seq="5" style="text-align:center">'+tiendo+'<input type="hidden" id="donhangchitiet-'+count+'-tiendo" class="donhangchitiet-'+count+'-tiendo" name="Donhangchitiet['+count+'][tiendo]" value="'+tiendo+'"></td>';
				output += '<td><button type="button" class="btn btn-primary view_detail" id='+count+'>Sửa</button> ';
				output += '<button type="button" class="btn btn-danger delete_detail" id='+count+'>Xóa</button></td>';
				output += '</tr>';
				$('tbody').append(output);
			}
			else{
				var row_id = $('#hidden_row_id').val();
				output = '<td data-col-seq="1">'+row_id+'</td>';
				output += '<td data-col-seq="2">'+tensanpham+'<input type="hidden" id="idsanpham_'+row_id+'" name="Donhangchitiet['+row_id+'][idsanpham]" class="idsanpham" value="'+idsanpham+'" /></td>';
				output += '<td data-col-seq="3" style="text-align:center">'+soluong+'<input type="hidden" id="donhangchitiet-'+row_id+'-soluong" class="donhangchitiet-'+row_id+'-soluong" name="Donhangchitiet['+row_id+'][soluong]" value="'+soluong+'"></td>';
				output += '<td data-col-seq="4" style="text-align:right"><input type="hidden" id="donhangchitiet-'+row_id+'-gia" class="donhangchitiet-'+row_id+'-gia" name="Donhangchitiet['+row_id+'][gia]"></td>';
				output += '<td data-col-seq="5" style="text-align:center">'+tiendo+'<input type="hidden" id="donhangchitiet-'+row_id+'-tiendo" class="donhangchitiet-'+row_id+'-tiendo" name="Donhangchitiet['+row_id+'][tiendo]" value="'+tiendo+'"></td>';
				output += '<td><button type="button" class="btn btn-primary view_detail" id='+count+'>Sửa</button> ';
				output += '<button type="button" class="btn btn-danger delete_detail" id='+count+'>Xóa</button></td>';

				$('#row_'+row_id+'').html(output);
			}

			$.ajax({
				url: base_url+'/hapulico/donhang/getprice',
				type: 'GET',
				dataType: 'text',
				data: {id: idsanpham},
				success: function(result){
					$('#row_'+count+' td[data-col-seq="4"] > input').val(result);
					var gia = $('#row_'+count+' td[data-col-seq="4"]').html()+result;
					$('#row_'+count+' td[data-col-seq="4"]').html(gia);
				}
			});

			$('#w5 option:selected').val('');
			$('#w5 option:selected').text('Chọn sản phẩm');
			$('#donhangchitiet-soluong').val('');
			$('#donhangchitiet-tiendo').val('');
			$('#modal').modal('hide');
		}
	});

	$(document).on('click', '.view_detail', function(event) {
		$('#modal').modal('show');
		var row_id = $(this).attr('id');
		console.log
		$('#hidden_row_id').val(row_id);
		$('#w5 option:selected').val($('#row_'+row_id+' > td[data-col-seq="2"] input:first').val());
		$('#w5 option:selected').text($('#row_'+row_id+' > td[data-col-seq="2"]:first').text());
		$('#donhangchitiet-soluong').val($('#row_'+row_id+' > td[data-col-seq="3"]:first').text());
		$('#donhangchitiet-tiendo').val($('#row_'+row_id+' td[data-col-seq="5"]:first').text());
		$('#save-modal').text('Sửa');
	});

	$(document).on('click', '.delete_detail', function(event) {
		event.preventDefault();
		row_id = $(this).attr('id');
		if(confirm('Chắc chắn xóa?')){
			$('#row_'+row_id).remove();
		}
		else{
			return false;
		}
	});

	$('#submitButton').click(function(event) {
		console.log($('tr [id="row_1"]').length);
		
		if($('#donhang-sodh').val() == ''){
			event.preventDefault();
			console.log('1');
		}
		else if($('tr [id="row_1"]').length == 0){
			event.preventDefault();
			console.log('123');
		}
	});

});