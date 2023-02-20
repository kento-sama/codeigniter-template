Todo = function () {
	var controller = base_url + 'TodoController/'
	var property = {};

	var fn = function() {
		function add_product(){
			$('button#addBtn').unbind();
			$('button#addBtn').on('click', function(){
				modal.add_modal();

				return false;
			});
		}
		return {
			add_product : add_product,
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
					{
						render: function(){
							return '<button class="btn btn-warning">Edit</button> <button class="btn btn-danger">Delete</button>';
						}
					}
				]
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
				dataType: "html",
				success: function(response){
					show_modal(response);
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