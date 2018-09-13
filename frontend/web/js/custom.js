$(function(){
	// count = 0;
	var base_url = window.location.origin;

	$('#modalButton').click(function (){
		$('#modal').modal('show');
	});

	$('#save').click(function(){
		// count = count + 1;
		var obj = <?php echo json_encode($data);?>;
		$.get({
			url: 'laygia',
			data: {
				idsanpham: $('#idsanpham').val(),
				soluong: $('#soluong').val(),
				tiendo: $('#tiendo').val(),
			},
			dataType: 'json',
			success: function(result){
				
			}
		});
	// 	// alert(obj.1);
	// 	// alert(obj[1]);
	// 	// output += '<td>'+first_name+' <input type="hidden" name="hidden_first_name[]" id="first_name'+count+'" class="first_name" value="'+first_name+'" /></td>';
	// 	// output += '<td>'+last_name+' <input type="hidden" name="hidden_last_name[]" id="last_name'+count+'" value="'+last_name+'" /></td>';
	// 	// output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button></td>';
	// 	// output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
	// 	// output += '</tr>';
	// 	// $('#user_data').append(output);
	// 	// $('#modal').modal("hide");
	});


});