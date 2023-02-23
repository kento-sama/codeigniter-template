Todo = function () {
	var controller = base_url + 'TodoController/'
	var property = {};

	var fn = function() {
		function add_todo() {
			$('button#save').unbind();
			$('button#save').on('click', function() {
				var player_id = $(this).data('id') || null;
				//console.log(player_id);
				property.player_id  = player_id;
				modal.add_modal();

				return false;
			});
		}
		function saveData(){
			$('button#save').unbind();
			$('button#save').on('click', function() {
				//modal.add_modal();
				var formData = {
					id : $('#id').val(),
					first_name: $('#first_name').val(),
					last_name: $("#last_name").val(),
					age: $("#age").val(),
				  };
				
				 $.ajax({
					url: controller + 'savedata',
					type: 'POST',
					data: formData,
					success: function(returnData){
						//alert(returnData);
						// if(returnData != ''){
						// 	alert('here');
						// }
						if(returnData){
                            $('#modal-container').modal('hide');
                            alert('Successfully Added !');
							location.reload();
                        }
                        else {
                            alert('Error in adding product');
                        }
					}
					
				})
//return false;
			});
		}
		// function edit_todo() {
		// 	$('button#editbtn').unbind();
		// 	$('button#editbtn').on('click', function() {		
		// 		alert ($(this).data('id'));
		// 		var todo_id = $(this).data('id');
		// 		$.ajax({
		// 			url: controller + "edit_player" + todo_id,
		// 			datatype: 'json',
		// 			success: function(response) {
		// 				modal.edit_modal(response);
		// 			}
		// 		});
		// 		modal.edit_modal();

		// 		return false;
		// 	});
		// }
	

		return {
			add_todo: add_todo,
			//edit_todo: edit_todo
			saveData: saveData
		}										
	}();

	var modal = function() {
		function add_modal() {
			$.ajax({
				url: controller+"view_modal ",
				datatype: 'html',
				data: property,
				type: 'POST',
				success: function(response) {
					//console.log(response);
				  show_modal(response);
				},
				complete: function(){
					fn.saveData();
					// config();
				},
			  });
		}
		// function edit_modal(todo) {
		// 	$.ajax({
		// 		url: controller + "edit_player",
		// 		datatype: 'html',
		// 		success: function(response) {
		// 			show_modal(response);
		// 			alert(todo.id);
		// 			// Fill form fields with existing data
		// 			$('#id').val(todo.id);
		// 			$('#first_name').val(todo.first_name);
		// 			$('last_name').val(todo.last_name);
		// 			$('age').val(todo.age);
		// 		},
		// 		complete: function() {
		// 			// config();
		// 		},
		// 	});
		// }

		return {
			add_modal: add_modal
			//edit_modal: edit_modal
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
				data: 'id',
				render: function(data, type, row) {
				  return '<button type="button" class="edit-btn btn btn-warning" id="save" data-id="'+data+'">Edit</button>';
				  //data-id="'+data+'" 
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
			 drawCallback: function(settings) {
				fn.add_todo();
			 
				

				//return false;
			  //});
			//   $('#playertbl').on('click', '.delete-btn', function() {
			// 	// handle delete button click
			//   });
			},
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