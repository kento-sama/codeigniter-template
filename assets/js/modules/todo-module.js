Todo = function () {
	var controller = base_url + 'todo/'
	var property = {};

	var fn = function() {
		function add_todo() {
			$('button#add-todo').unbind();
			$('button#add-todo').on('click', function() {
				modal.add_modal();

				return false;
			});
		}

		return {
			add_todo: add_todo
		}
	}();

	var table = function() {
		function generate_table() {
			// TODO: generate datatable here
			$('table#sample-table').DataTable().destroy();
			$('table#sample-table').DataTable();
		}

		return {
			generate_table: generate_table
		}
	}();

	var modal = function() {
		function add_modal() {
			console.log("open modal");
		}

		return {
			add_modal: add_modal
		}
	}();

	return {
		property: property,
		fn      : fn,
		table   : table,
		modal	: modal
	}
}();