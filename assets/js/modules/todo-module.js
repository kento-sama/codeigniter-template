Todo = function () {
	var controller = base_url + 'todocontroller/'
	var property = {};

	var fn = function() {
		function view_modal()
		{
			$("button.pets").unbind();
			$("button.pets").on('click', function(){
				
				property.pet_id = $(this).data('id') || null;
				
				modal.my_modal();

				return false;
			});
		}

		function submit_data()
		{
			$("button#save").unbind();
			$("button#save").on('click', function(){

				//another JSON
				var formData = {
					id: $("#id").val(),
					name: $("#name").val(),
					species: $("#species").val(),
					age: $("#age").val(),
					row_status: "1",
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

		function delete_data()
		{
			$("button#save").unbind();
			$("button.petsDelete").on('click', function(){ 



				property.pet_id = $(this).data('id') || null;  
				property.row_status = '0';

				$.ajax({
					url: controller + "getDelete",
					method: "POST",
					data: property,

					success:function(IsReturned){
						//data ID gikan sa button
						// alert(data);
						
						var pets = JSON.parse(IsReturned);

						property.pet_list = {
							name: pets.name,
							species: pets.species,
							age: pets.age
						  };

						// property.pet_list = pets['name'];

						Swal.fire({
							icon:"warning",
							title: "Delete Item",
							html: "Are you sure you want to delete:" +pet_list+"<p><button type='button' class='btn btn-danger btn-xs btn-block mt-2' onclick='Swal.clickConfirm()'>Delete</button></p>",
							showConfirmButton: false,
							showCloseButton: true,
							preConfirm: function(){
								$.ajax({
									url: controller + "saveData",
									type: "POST",
									data: property,
									success: function(){
										Swal.fire({
											icon: "success",
											title: "Item deleted",
											text: pet_list + "has been deleted.",
											allowOutsideClick: false,
											showConfirmButton: false,
											showCloseButton: true,
										}).then(()=>{window.open(window.location.href, "_self");})
									}
								})
							}



						})
						

					}

				}) 		 
		   })
		}

		

		// function delete_data()
		// {
		// 	$("button.petsDelete").unbind();
		// 	$("button.petsDelete").on('click', function() {

		// 		var id = $(this).data('id');

		// 		Swal.fire({
		// 		  title: 'Are you sure?',
		// 		  text: "You won't be able to revert this!",
		// 		  icon: 'warning',
		// 		  showCancelButton: true,
		// 		  confirmButtonColor: '#3085d6',
		// 		  cancelButtonColor: '#d33',
		// 		  confirmButtonText: 'Yes, delete it!'

		// 		}).then((result) => {
		// 		  if (result.isConfirmed) {
		// 			$.ajax({
		// 			  type: 'POST',
		// 			  url: controller + "deleteData",
		// 			  data: {id: id},
		// 			  success: function() {
		// 				Swal.fire(
		// 				  'Deleted!',
		// 				  'Your data has been deleted.',
		// 				  'success'
		// 				)
		// 				location.reload();
		// 			  }
		// 			});
		// 		  }
		// 		})
		// 	  });
			  
		// }

		return{
			view_modal:view_modal,
			submit_data:submit_data,
			delete_data: delete_data
		}	
	}();

	var table = function() {
		function generate_table() {

			$("#tableId").DataTable({
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
							return '<button type="button" class="btn btn-warning pets" data-id="'+data+'" >Edit</button>' +
							 '<button class=" btn btn-danger petsDelete" data-id="'+data+'" >Delete</button>';
						}
					}
				],

				drawCallback: function(){
					fn.view_modal();
					fn.delete_data();
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