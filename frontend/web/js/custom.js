$(function(){
	count = 0;
	var base_url = window.location.origin;
	$('#donhang-iddvdh').change(function() {
		$.$.ajax({
			url: base_url+'hapulico/donhang/lists',
			type: 'GET',
			dataType: 'text',
			data: {id: idsanpham},
			success: function(result){

			}
		});
		
		$.post("lists?id="+$(this).val(), function(data) {
		var value = data.split("+");
		$( "#donhang-sodh" ).val(value[0]);
	});
	
	$('#modalButton').click(function (){

		$('#modal').modal('show');
		$('#donhangchitiet-idsanpham > option:last').attr('value','');
		$('#donhangchitiet-idsanpham > option:last').html('');
		$('#donhangchitiet-soluong').val('');
		$('#donhangchitiet-tiendo').val('');

		if($('#donhang-sodh').val()!==''){
			$('#modal').modal('show');
			$('#save-modal').text('Thêm mới');
			$('#donhangchitiet-soluong').val('');
			$('#donhangchitiet-tiendo').val('');
		}

	});

	$('#save-modal').click(function(){

		count ++;

		//Tabular form kartik

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



