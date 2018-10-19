$(function(){
	//Hàm này dùng cho cập nhật đơn hàng
	//Thêm mới, chỉnh sửa sản phẩm bằng modal
	count = 0;
	stt = 0;
	var base_url = window.location.origin;


	$('#modalButton').click(function (){

		//Mở modal khi đã chọn đơn vị
		if($('#donhang-sodh').val()!==''){
			$('#modal').modal('show');
			$('#save-modal').text('Thêm mới');
			$('#w5 option:selected').val('');
			$('#donhangchitiet-soluong').val('');
			$('#donhangchitiet-tiendoyeucau').val('');
		}
	});

	//Khi ấn nút Save trong modal thì thêm một sản phẩm mới vào đơn hàng
	$('#save-modal').click(function(){

		//Xóa nội dung của bảng nếu bảng chưa có sản phẩm
		if ($('tbody tr td div').hasClass('empty')) {
			$('tbody').html('');
		}

		//Lấy các giá trị của sản phẩm trong modal vào các biến
		var sanpham_id = $('#w6 option:selected').val();
		var tensanpham = $('#w6 option:selected').text();
		var soluong = $('#donhangchitiet-soluong').val();
		soluong = soluong.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");//Chuyển số thành định dạng Việt Nam
		var tiendoyeucau = $('#donhangchitiet-tiendoyeucau').val();

		if(sanpham_id && soluong && tiendoyeucau){
			if ($('#save-modal').text() == 'Thêm mới'){//Nếu tên button của modal là "Thêm mới" thì thêm 1 sản phẩm mới
				count ++;
				stt++;
				output = '<tr id="row_'+count+'" data-key='+count+'>';
				output += '<td data-col-seq="0">'+stt+'</td>';
				output += '<td data-col-seq="1">'+tensanpham+'<input type="hidden" id="idsanpham_'+count+'" name="Donhangchitiet['+count+'][sanpham_id]" class="sanpham_id" value="'+sanpham_id+'" /></td>';
				output += '<td data-col-seq="2" style="text-align:center">'+soluong+'<input type="hidden" id="donhangchitiet-'+count+'-soluong" class="donhangchitiet-'+count+'-soluong" name="Donhangchitiet['+count+'][soluong]" value="'+soluong+'"></td>';
				output += '<td data-col-seq="3" style="text-align:right"><input type="hidden" id="donhangchitiet-'+count+'-gia" class="donhangchitiet-'+count+'-gia" name="Donhangchitiet['+count+'][gia]"></td>';
				output += '<td data-col-seq="4" style="text-align:center">'+tiendoyeucau+'<input type="hidden" id="donhangchitiet-'+count+'-tiendoyeucau" class="donhangchitiet-'+count+'-tiendoyeucau" name="Donhangchitiet['+count+'][tiendoyeucau]" value="'+tiendoyeucau+'"></td>';
				output += '<td data-col-seq="5" style="text-align:center"></td>';
				output += '<td><button type="button" class="btn btn-primary view_detail" id='+count+'>Sửa</button> ';
				output += '<button type="button" class="btn btn-danger delete_detail" id='+count+'>Xóa</button></td>';
				output += '</tr>';
				$('tbody').append(output);
			}
			else{//Nếu tên button của modal là "Sửa" thì update sản phẩm trong bảng sản phẩm
				var row_id = $('#hidden_row_id').val();
				output = '<td data-col-seq="1">'+row_id+'</td>';
				output += '<td data-col-seq="2">'+tensanpham+'<input type="hidden" id="idsanpham_'+row_id+'" name="Donhangchitiet['+row_id+'][sanpham_id]" class="sanpham_id" value="'+sanpham_id+'" /></td>';
				output += '<td data-col-seq="3" style="text-align:center">'+soluong+'<input type="hidden" id="donhangchitiet-'+row_id+'-soluong" class="donhangchitiet-'+row_id+'-soluong" name="Donhangchitiet['+row_id+'][soluong]" value="'+soluong+'"></td>';
				output += '<td data-col-seq="4" style="text-align:right"><input type="hidden" id="donhangchitiet-'+row_id+'-gia" class="donhangchitiet-'+row_id+'-gia" name="Donhangchitiet['+row_id+'][gia]"></td>';
				output += '<td data-col-seq="5" style="text-align:center">'+tiendoyeucau+'<input type="hidden" id="donhangchitiet-'+row_id+'-tiendoyeucau" class="donhangchitiet-'+row_id+'-tiendoyeucau" name="Donhangchitiet['+row_id+'][tiendoyeucau]" value="'+tiendo+'"></td>';
				output += '<td><button type="button" class="btn btn-primary view_detail" id='+count+'>Sửa</button> ';
				output += '<button type="button" class="btn btn-danger delete_detail" id='+count+'>Xóa</button></td>';
				$('#row_'+row_id+'').html(output);
			}

			// Lấy giá của sản phẩm theo đơn vị đặt hàng
			$.ajax({
				url: base_url+'/hapulico/donhang/getprice',
				type: 'GET',
				dataType: 'text',
				data: {id: sanpham_id},
				success: function(result){
					$('#row_'+count+' td[data-col-seq="3"] > input').attr('value', result);
					result = result.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."); // Chuyển đối số thành định dạng Việt Nam
					var gia = $('#row_'+count+' td[data-col-seq="3"]').html()+result;
					$('#row_'+count+' td[data-col-seq="3"]').html(gia);
				}
			});

			// Xóa các giá trị trong modal
			$('#w6 option:selected').val('');
			$('#w6 option:selected').text('Chọn sản phẩm');
			$('#donhangchitiet-soluong').val('');
			$('#donhangchitiet-tiendoyeucau').val('');
			$('#modal').modal('hide');
		}
	});
	
	//Khi click vào button "Sửa" thì lấy các giá trị của sản phẩm đưa vào modal
	$(document).on('click', '.view_detail', function(event){
		$('#modal').modal('show');
		var row_id = $(this).attr('id');
		$('#hidden_row_id').val(row_id);
		$('#w6 option:selected').val($('#row_'+row_id+' > td[data-col-seq="1"] input').val());			//tên sản phẩm
		$('#w6 option:selected').text($('#row_'+row_id+' > td[data-col-seq="1"]').text());				//tên sản phẩm
		$('#donhangchitiet-soluong').val($('#row_'+row_id+' > td[data-col-seq="3"]:first').text());		//số lượng
		$('#donhangchitiet-tiendoyeucau').val($('#row_'+row_id+' td[data-col-seq="5"]:first').text());	//tiến độ yêu cầu
		$('#save-modal').text('Sửa');																	//đổi label của button #save-modal
	});

	//Khi click vào button "Xóa" thì xóa sản phẩm trong bảng đơn hàng
	$(document).on('click', '.delete_detail', function(event) {
		event.preventDefault();
		row_id = $(this).attr('id');
		if(confirm('Chắc chắn xóa?')){
			$('#row_'+row_id).remove();
			stt--;
		}
		else{
			return false;
		}
	});
});

$(function() {
	
	//Hàm này dùng để chỉnh sửa Thông tin đăng ký dự án
	//Tạo thêm các dòng nhập liệu

	var thanhtien = 0;

	// Tính tổng tiền của đơn hàng
	$('input[id*="quantity"]').each(function(index, element) {
		var gia = $($('input[id*="price"]')[index]).val();
		var soluong = $(element).val();
		thanhtien += gia*soluong;
	});

	// Chuyển đổi thành tiền thành định dạng ở Việt Nam
	$('#giatridonhang').text(thanhtien.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));

	//Thêm mới sản phẩm khi click vào nút Thêm dòng
	$(document).on('click', '#themmoi', function(event) {
		var count = $('#w2 > table > tbody > tr').length - 1;
		count++;

		output = $('#w2 > table > tbody > tr[id="row_0"]').clone();
		output.attr('id', 'row_'+count);
		output.attr('data-key', count);

        $('tbody').append(output);
        $('#row_'+count+' > td[data-col-seq="0"]').text(count+1);

        $('#row_'+count+' > td[data-col-seq="1"] > div').removeClass('field-thongtinduan-0-product');
        $('#row_'+count+' > td[data-col-seq="1"] > div').addClass('field-thongtinduan-'+count+'-product');
        $('#row_'+count+' > td[data-col-seq="1"] > div > input').attr('name','Thongtinduan['+count+'][product]');
        $('#row_'+count+' > td[data-col-seq="1"] > div > input').attr('id','thongtinduan-'+count+'-product');
        $('#row_'+count+' > td[data-col-seq="1"] > div > input').val('');

        $('#row_'+count+' > td[data-col-seq="2"] > div').removeClass('field-thongtinduan-0-quantity');
        $('#row_'+count+' > td[data-col-seq="2"] > div').addClass('field-thongtinduan-'+count+'-quantity');
        $('#row_'+count+' > td[data-col-seq="2"] > div > input').attr('name','Thongtinduan['+count+'][quantity]');
        $('#row_'+count+' > td[data-col-seq="2"] > div > input').attr('id','thongtinduan-'+count+'-quantity');
        $('#row_'+count+' > td[data-col-seq="2"] > div > input').val('');

        $('#row_'+count+' > td[data-col-seq="3"] > div').removeClass('field-thongtinduan-0-price');
        $('#row_'+count+' > td[data-col-seq="3"] > div').addClass('field-thongtinduan-'+count+'-price');
        $('#row_'+count+' > td[data-col-seq="3"] > div > input').attr('name','Thongtinduan['+count+'][price]');
        $('#row_'+count+' > td[data-col-seq="3"] > div > input').attr('id','thongtinduan-'+count+'-price');
        $('#row_'+count+' > td[data-col-seq="3"] > div > input').val('');
        $('#row_'+count+' > td[data-col-seq="3"] > div > input').inputmask("integer",{
                'removeMaskOnSubmit' : true,
                'groupSeparator' : '.',
                'autoGroup' : true,
                'autoUnmask' : true,
                'unmaskAsNumber' : true,
            },
        );
        $('#row_'+count+' > td[data-col-seq="4"] > button').attr('id',count);
	});

	$(document).on('click', '.remove-product', function(event) {
		row_id = $(this).attr('id');
		if(row_id>0){
			$('#row_'+row_id).remove();
		}
		else{
			return false;
		}
		
	});
	// Bắt sự kiện thay đổi trong input soluong và gia
	$(document).on('keyup', 'input[id*="quantity"], input[id*="price"]', function(event) {
		var thanhtien = 0;
		
		$('input[id*="quantity"]').each(function(index, element) {
			var gia = $($('input[id*="price"]')[index]).val();
			var soluong = $(element).val();
			thanhtien += gia*soluong;
		});

		$('#giatridonhang').text(thanhtien.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));

	});
});

$(function() {
	// Lấy đơn hàng mới nhất của đơn vị đặt hàng thông qua action lists trong DonhangController
	$('#donhang-dvdh_id').change(function(event) {
		var base_url = window.location.origin;
		var id = $(this).val();
		$.ajax({
			url: base_url+'/hapulico/donhang/lists',
			type: 'GET',
			dataType: 'json',
			data: {id: 'id'},
			success: function(data){
				console.log(data);
			}
		})

		
	});
});