Todo = function () {
	var controller = base_url + 'todocontroller/'
	var property = {};

	var fn = function() {
		function view_modal(){
			$("button#pets").unbind();
			$("button#pets").on('click', function(){
				modal.my_modal();

				return false;
			});
		}
		function submit_data(){
			$("button#save").unbind();
			$("button#save").on('click', function(){

				var formData = {
					name: $("#name").val(),
					species: $("#species").val(),
					age: $("#age").val(),
				  };
				
				$.ajax({
					url: controller + "insertData",
					type: 'POST',
					data: formData,
					success: function(returndata){
						if(returndata){
							alert('Pet added succesfully!');
						}
						else{
							alert('Failed!');
						}
						// alert(returndata);
					}
				}
					
				)

				
				// $.ajax ({
                //     url: controller + "insert",
                //     type: 'POST',
                //     data: {name1:name, name2:spe, name3:age},
                //     success: function(response){
                //         if(response){
                //             $('#modal-container').modal('hide');
                //             alert('success');
                //         }
                //         else {
                //             alert('insert error');
                //         }
                //     }
                // });
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
				// "processing": true,
    			// "serverSide": true,
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
					{ data: 'age' }
				]
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