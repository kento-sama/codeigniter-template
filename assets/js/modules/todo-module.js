Todo = function () {
	var controller = base_url + 'TodoController/'
	var property = {};

	var fn = function() {
		function add_todo() {
			$('button#addbtn').unbind();
			$('button#addbtn').on('click', function() {
				modal.add_modal();

				return false;
			});
		}

		return {
			add_todo: add_todo
		}
	}();

	var modal = function() {
		function add_modal() {
			$.ajax({
				url: controller+"view_modal ",
				datatype: 'html',
				success: function(response) {
					//console.log(response);
				  show_modal(response);
				},
				complete: function(){
					// config();
				},
			  });
		}

		return {
			add_modal: add_modal
		}
	}();
	var table = function() {
		function generate_table() {
			//Get data from server using CodeIgniter
			$.ajax({
				url: controller+"data_Table",
				dataType: 'json',
				success: function() {
					// Create DataTable
					$("#playertbl").DataTable();
				},
				error: function () {
					alert('Error retrieving player data!');
				}
			});
		}

		return {
			generate_table: generate_table
		}
	}();

	return {
		property: property,
		fn      : fn,
		table   : table,
		modal   : modal
	}
}();


