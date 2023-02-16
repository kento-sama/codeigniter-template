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
			add_product : add_product
		}
	}();

	var table = function() {

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