$(function(){
	count = 0;
	var base_url = window.location.origin;

	//Lấy số đơn hàng mới nhất của đơn vị đặt hàng
	$('#donhang-iddvdh').change(function() {
		var iddvdh = $(this).val();
		$.ajax({
			url: base_url+'/hapulico/donhang/lists',
			type: 'GET',
			dataType: 'text',
			data: {id: iddvdh},
			success: function(result){
				$('#donhang-sodh').val(result);
			}
		});
	});
	
	//Thêm mới sản phẩm
	//Nếu chưa chọn đơn vị đặt hàng thì chưa cho thêm sản phẩm
	$('#modalButton').click(function (){
		if($('#donhang-sodh').val()!==''){
			$('#modal').modal('show');
			$('#save-modal').text('Thêm mới');
			$('#donhangchitiet-soluong').val('');
			$('#donhangchitiet-tiendo').val('');
		}
	});

	$('#save-modal').click(function(){
		
		$('#donhang-iddvdh').prop('disabled',true );
		$('#donhang-sodh').prop('disabled',true);
		$('#donhang-ngay').prop('disabled',true);
		
		if ($('tbody tr td div').hasClass('empty')) {
			$('tbody').html('');
		}

		var idsanpham = $('#donhangchitiet-idsanpham > option:last').attr('value');
		var tensanpham = $('#donhangchitiet-idsanpham > option:last').html();
		var soluong = $('#donhangchitiet-soluong').val();
		var tiendo = $('#donhangchitiet-tiendo').val();

		if ($('#save-modal').text() == 'Thêm mới'){
			count = count + 1;
			output = '<tr id="row_'+count+'" data-key="0">';
			output += '<td data-col-seq="1">'+count+'</td>';
			output += '<td data-col-seq="2">'+tensanpham+'<input type="hidden" id="idsanpham_'+count+'" name="Donhangchitiet['+count+'][idsanpham]" class="idsanpham" value="'+idsanpham+'" /></td>';
			output += '<td data-col-seq="3" style="text-align:center">'+soluong+'<input type="hidden" id="donhangchitiet-'+count+'-soluong" class="donhangchitiet-'+count+'-soluong" name="Donhangchitiet['+count+'][soluong]"></td>';
			output += '<td data-col-seq="4" style="text-align:right"><input type="hidden" id="donhangchitiet-'+count+'-gia" class="donhangchitiet-'+count+'-gia" name="Donhangchitiet['+count+'][gia]"></td>';
			output += '<td data-col-seq="5" style="text-align:center">'+tiendo+'<input type="hidden" id="donhangchitiet-'+count+'-tiendo" class="donhangchitiet-'+count+'-tiendo" name="Donhangchitiet['+count+'][tiendo]"></td>';
			output += '<td><button type="button" class="btn btn-primary view_detail" id='+count+'>Sửa</button>';
			output += '<button type="button" class="btn btn-danger delete_detail" id='+count+'>Xóa</button></td>';
			output += '</tr>';
			$('tbody').append(output);
		}
		else{
			var row_id = $('#hidden_row_id').val();
			output += '<td data-col-seq="1">'+row_id+'</td>';
			output += '<td data-col-seq="2">'+tensanpham+'<input type="hidden" id="idsanpham_'+row_id+'" name="Donhangchitiet['+row_id+'][idsanpham]" class="idsanpham" value="'+idsanpham+'" /></td>';
			output += '<td data-col-seq="3" style="text-align:center">'+soluong+'<input type="hidden" id="donhangchitiet-'+row_id+'-soluong" class="donhangchitiet-'+row_id+'-soluong" name="Donhangchitiet['+row_id+'][soluong]"></td>';
			output += '<td data-col-seq="4" style="text-align:right"><input type="hidden" id="donhangchitiet-'+row_id+'-gia" class="donhangchitiet-'+row_id+'-gia" name="Donhangchitiet['+row_id+'][gia]"></td>';
			output += '<td data-col-seq="5" style="text-align:center">'+tiendo+'<input type="hidden" id="donhangchitiet-'+row_id+'-tiendo" class="donhangchitiet-'+row_id+'-tiendo" name="Donhangchitiet['+row_id+'][tiendo]"></td>';
			output += '<td><button type="button" class="btn btn-primary view_detail" id='+row_id+'>Sửa</button>';
			output += '<button type="button" class="btn btn-danger delete_detail" id='+row_id+'>Xóa</button></td>';
			$('#row_'+row_id+'').html(output);
		}

		$.ajax({
			url: base_url+'/hapulico/donhang/getprice',
			type: 'GET',
			dataType: 'text',
			data: {id: idsanpham},
			success: function(result){
				$('#row_'+count+' td[data-col-seq="4"]').text(result);
			}
		});

		// $('tbody').append(element);
		$('#modal').modal('hide');
	});

	$(document).on('click', '.view_detail', function() {
		event.preventDefault();
		$('#modal').modal('show');
		$('#save-modal').text('Sửa');
		var row_id = $(this).attr('id');
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
			return false;
		}
	});
});