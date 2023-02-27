Todo = function () {
	var controller = base_url + 'TodoController/'
	var property = {};

	var fn = function() {
		function add_product(){
			$('button#addEditBtn').unbind();
			$('button#addEditBtn').on('click', function(){
				var id = $(this).data('id') || null;
				property.id = id;
				modal.add_modal();

				return false;
			});
		}
		function insert_data(){
			$('button#submitBtn').unbind();
			$('button#submitBtn').on('click', function(){
				var product = {
					id: $('input#id').val(),
					name: $('input#product_name').val(),
					price: $('input#product_price').val(),
					category: $('input#product_category').val(),
					status: $('input#row_status').val()
				};
				$.ajax ({
					url: controller + "insertData",
					type: 'POST',
					data: product,
					success: function(returnedData){
						if(returnedData){
							$('#modal-container').modal('hide');
							if(product.status == 2){
								alert('Successfully Added!');
							}
							else {
								alert('Successfully Updated!');
							}
							location.reload();
						}
						else {
							alert('Error in adding product');
						}
					}
				});
			});
		}
		return {
			add_product : add_product,
			insert_data : insert_data
		}
	}();

	var table = function() {
		function view_table(){
			$('table#productTable').DataTable().destroy();
			$('table#productTable').DataTable({
				ajax: {
					url: controller + "getData",
					type: 'GET',
					dataType: 'json',
					dataSrc: '',
				},
				columns: [
					{data: 'product_name'},
					{data: 'product_price'},
					{data: 'product_category'},
					{data: 'id',
						render: function(data){
							return '<button type="button" class="btn btn-warning" id="addEditBtn" data-id="'+data+'">Edit</button> <button class="btn btn-danger">Delete</button>';
						}
					}
				],
				drawCallback: function() {
					fn.add_product();
				}
			});
		}
		return {
			view_table : view_table
		}
	}();

	var modal = function() {
		function add_modal(){
			$.ajax({
				url: controller + "viewModal",
				type: "POST",
				dataType: "html",
				data: property,
				success: function(response){
					show_modal(response);
				},
				complete: function(){
					fn.insert_data();
				}
			});
		}
		return {
			add_modal : add_modal
		}
	}();

	return {
		property: property,
		fn      : fn,
		table   : table,
		modal	: modal
	}
}();