$(function(){
	count = 0;
	var base_url = window.location.origin;

	$('#modalButton').click(function (){
		$('#modal').modal('show');
		$('#donhangchitiet-idsanpham > option:last').attr('value','');
		$('#donhangchitiet-idsanpham > option:last').html('');
		$('#donhangchitiet-soluong').val('');
		$('#donhangchitiet-tiendo').val('');
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
		if ($('tbody tr td div').hasClass('empty')) {
			$('tbody').html('');
		}
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
			return false;
		}
	});
});



