Todo = function () {
	var controller = base_url + 'todocontroller/'
	var property = {};

	var fn = function() {
		function view_modal(){
			$("button.pets").unbind();
			$("button.pets").on('click', function(){
				
				property.pet_id = $(this).data('id') || null;
				
				modal.my_modal();

				return false;
			});
		}
		function submit_data(){
			$("button#save").unbind();
			$("button#save").on('click', function(){

				var formData = {
					id: $("#id").val(),
					name: $("#name").val(),
					species: $("#species").val(),
					age: $("#age").val(),
				  };
				
				$.ajax({
					url: controller + "saveData",
					type: 'POST',
					data: formData,
					success: function(returndata){
						if(returndata){

							alert('Pet added succesfully!');
							location.reload();
						}
						else{
							alert('Failed!');
						}
					}
				}	
				)
			});
		}

		return{
			view_modal:view_modal,
			submit_data:submit_data
		}	
	}();

	var table = function() {
		function generate_table() {

			$("#pettable").DataTable({
				ajax: {
					url: controller + "getData",
					type: 'GET',
					dataSrc: function(x){
						return x
					}
				},
				columns: [
					{ data: 'id' },
					{ data: 'name' },
					{ data: 'species' },
					{ data: 'age' },
					{ data: 'id',
						render: function(data) {
							return '<button type="button" class="btn btn-warning pets" data-id="'+data+'" >Edit</button>';
						}
					}

					// { data: null,
					// 	render: function(data, type, row) {
					// 		return '<button class="delete-btn btn btn-danger" >Delete</button>'
					// 	}
					// }
				],

				drawCallback: function(){
					fn.view_modal();
				}

			});
		}

		return{
			generate_table: generate_table
		}

	}();

	var modal = function() {
		function my_modal(){
			$.ajax({
				url:controller + "open_modal",
				datatype:"html",
				type: "POST",
				data: property,
				success:function(response){
					show_modal(response);
				},
				complete: function(){
					fn.submit_data();
				}				
			});
		}
		return {
			my_modal:my_modal
		}

	}();

	return {
		property: property,
		fn      : fn,
		table 	: table,
		modal   : modal
	}
}();