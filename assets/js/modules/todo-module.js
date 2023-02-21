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
		  $("#playertbl").DataTable({
			ajax: {
			  type: 'GET',
			  url: controller + "data_Table",
			  dataSrc: ''
			},
			columns: [
			  { data: 'id' },
			  { data: 'first_name' },
			  { data: 'last_name' },
			  { data: 'age' },
			  {
				data: null,
				render: function(data, type, row) {
				  return '<button class="edit-btn btn btn-warning">Edit</button>';
				}
			  },
			  {
				data: null,
				render: function(data, type, row) {
				  return '<button class="delete-btn btn btn-danger">Delete</button>';
				}
			  }
			],
			// lengthMenu: [
			// 	[5, 10, 15, -1],
			// 	[5, 10, 15, 'All'],
			// ],
			columnDefs: [
			  {
				targets: 0,
				visible: false,
				searchable: false
			  }
			],
			order: [[0, "desc"]],
			// drawCallback: function(settings) {
			//   $('#playertbl').on('click', '.edit-btn', function() {
			// 	// handle edit button click
			//   });
			//   $('#playertbl').on('click', '.delete-btn', function() {
			// 	// handle delete button click
			//   });
			// },
			error: function() {
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


