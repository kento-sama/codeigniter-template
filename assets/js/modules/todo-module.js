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
				})
			});
		}

		function delete_data()
		{
			$("button#petsDelete").unbind();
			$("button.petsDelete").on('click', function(){ 

				property.pet_id = $(this).data('id') || null;  
				property.row_status = '0';

				$.ajax({
					url: controller + "getDelete",
					method: "POST",
					data: property,

					success:function(returndata){
						// data ID gikan sa button
						// alert(data);
						
						var pets = JSON.parse(returndata);
						pets.row_status = "0";
						// console.log(pets);

						Swal.fire({
							icon:"warning",
							title: "Delete Data",
							html: "Are you sure you want to delete this data? <p><button type='button' class='btn btn-danger btn-xs btn-block mt-2' onclick='Swal.clickConfirm()'>Yes, delete it!</button></p>",
							showConfirmButton: false,
							showCloseButton: true,
							preConfirm: function(){
								console.log(pets);
								$.ajax({
									url: controller + "saveData",
									type: "POST",
									data: pets,
									success: function(data){
										if(data)

										Swal.fire({
											icon: "success",
											title: "Your data has been deleted.",
											allowOutsideClick: false,
											showConfirmButton: false,
											showCloseButton: true,
										}).then(()=>{window.open(window.location.href, "_self");})
										else{
											Swal.fire({
												icon: "Error",
												title: "Fail to delete data.",
												allowOutsideClick: false,
												showConfirmButton: false,
												showCloseButton: true,
											}).then(()=>{window.open(window.location.href, "_self");})
										}
									}
								})
							}
						})
						

					}

				}) 		 
		   })
		}

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