$(function(){
	count = 0;
	var base_url = window.location.origin;
	$('#donhang-iddvdh').change(function() {
		$.$.ajax({
			url: base_url+'hapulico/donhang/lists',
			type: 'default GET (Other values: POST)',
			dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {param1: 'value1'},
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
		$.post("lists?id="+$(this).val(), function(data) {
		var value = data.split("+");
		$( "#donhang-sodh" ).val(value[0]);
	});
	
	$('#modalButton').click(function (){
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
	});


	$('#save-modal').click(function(){
<<<<<<< HEAD
		count ++;
		//Tabular form kartik
=======
		
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
			var tensanpham = $('#donhangchitiet-idsanpham > option:last').html();
			var soluong = $('#donhangchitiet-soluong').val();
			var tiendo = $('#donhangchitiet-tiendo').val();

		if ($('#save-modal').text() == 'Thêm mới'){
			count = count + 1;
			output = '<tr id="row_'+count+'" data-key="0">';
			output += '<td data-col-seq="1">'+count+'</td>';
			output += '<td data-col-seq="2">'+tensanpham+'<input type="hidden" id="idsanpham_'+count+'" class="idsanpham" value="'+idsanpham+'" /></td>';
			output += '<td data-col-seq="3" style="text-align:center">'+soluong+'</td>';
			output += '<td data-col-seq="4" style="text-align:right"></td>';
			output += '<td data-col-seq="5" style="text-align:center">'+tiendo+'</td>';
			output += '<td><button type="button" class="btn btn-primary view_detail" id='+count+'>Sửa</button>';
			output += '<button type="button" class="btn btn-danger delete_detail" id='+count+'>Xóa</button></td>';
			output += '</tr>';
			$('tbody').append(output);
		}
		else{
			var row_id = $('#hidden_row_id').val();
			output = '<td data-col-seq="1">'+row_id+'</td>';
			output += '<td data-col-seq="2">'+tensanpham+'<input type="hidden" id="idsanpham_'+row_id+'" class="idsanpham" value="'+idsanpham+'" /></td>';
			output += '<td data-col-seq="3" style="text-align:center>'+soluong+'</td>';
			output += '<td data-col-seq="4" style="text-align:right"></td>';
			output += '<td data-col-seq="5" style="text-align:center">'+tiendo+'</td>';
			output += '<td><button type="button" class="btn btn-primary view_detail" id='+row_id+'>Sửa</button> ';
			output += '<button type="button" class="btn btn-danger delete_detail" id='+row_id+'>Xóa</button></td>';
			$('#row_'+row_id+'').html(output);
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
>>>>>>> 363bd637cbb618b2210d54ca052b4ac00d9dced4
			return false;
		}
	});
});



