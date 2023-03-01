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
			$('button#submitbtn').unbind();
			$('button#submitbtn').on('click', function() {
				modal.add_modal();
				var formData = {
					id : $('#id').val(),
					first_name: $('#first_name').val(),
					last_name: $("#last_name").val(),
					age: $("#age").val(),
					status: $("#row_status").val()
				  };
				
				 $.ajax({
					url: controller + 'savedata',
					type: 'POST',
					data: formData,
					success: function(returnData){
						if(returnData){
                            $('#modal-container').modal('hide');
							if(formData.status==2){
								alert('Successfully Added !');
							location.reload();
							}else{
								alert('Successfully Updated !');
								location.reload();
							}
                           
                        }
                        else {
                            alert('Error in Adding Player');
                        }
					}
					
				})
          //return false;
			});
		}
		function delete_data() {
			$('button.delete-btn').unbind();
			$('button.delete-btn').on('click', function() {
			  property.id = $(this).data('id');
				
			  Swal.fire({
				title: 'Are you sure?',
				text: 'You will not be able to recover this player!',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Yes, delete it!',
				cancelButtonText: 'Cancel',
				reverseButtons: true
			  }).then((result) => {
				if (result.isConfirmed) {
				  $.ajax({
					url: controller + 'deleteData',
					type: 'POST',
					data: property,
					success: function(returnData) {
					  if (returnData) {
						$('#modal-container').modal('hide');
						Swal.fire({
						  title: 'Deleted!',
						  text: 'The player has been deleted.',
						  icon: 'success'
						}).then(() => {
						  location.reload();
						});
					  } else {
						Swal.fire({
						  title: 'Error!',
						  text: 'Error in Deleting Record',
						  icon: 'error'
						});
					  }
					}
				  });
				}
			  });
			});
		  }
		
	
		
	

		return {
			add_todo: add_todo,
			saveData: saveData,
			delete_data: delete_data
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
				data: 'id',
				render: function(data, type, row) {
				  return '<button type="button" class="edit-btn btn btn-warning" id="save" data-id="'+data+'">Edit</button>';
				}
			  },
			  {
				data: 'id',
				render: function(data, type, row) {
				  return '<button type="button" class="delete-btn btn btn-danger"  data-id="'+data+'">Delete</button>';
				  //
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
			 drawCallback: function() {
				fn.add_todo();
				fn.delete_data();
				
			 
				

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