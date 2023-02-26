Todo = function () {
	var controller = base_url + 'TodoController/'
	var property = {};
	var fn = function(){
		function modal_view(){
			$("button.buttonModal").unbind();
			$("button.buttonModal").on('click',function(){
				var todo_id = $(this).data('id') || null;
				property.todo_id = todo_id;
				modal.todo_modal();
			});
		}
		function add_list(){
			$("button#createlist").unbind();
			$("button#createlist").on('click',function(){
				property.item = $("input#item").val();
				property.todo_id = $("input#todo_id").val();
				property.row_status = "1";
				// property.row_status = $("input#row_status").val();
				
				$.ajax({
					url:controller+"insert",
					type:"post",
					data:property,
					success:function(returnedData){
						if(returnedData){
							$('#modal-container').modal('hide');
							Swal.fire({
								icon:"success",
								title:"New item Added",
								text:"You have successfully added an item to todolist",
								showConfirmButton:false,
								showCloseButton:true,
							}).then(()=>{
								window.open(window.location.href,"_self");
							})
						}else{
							Swal.fire({
								icon:"success",
								title:"Database Error",
								text:"Something went wrong while adding data into the database.",
								showConfirmButton:false,
								showCloseButton:true,
							}).then(()=>{
								window.open(window.location.href,"_self");
							})
						}
					}
				})
			});
		}
		function delete_confirm(){
			$("button#deleteButton").unbind();
			$("button#deleteButton").on('click',function(){
				property.todo_id = $(this).data('id');
				property.row_status = "0";
				
				$.ajax({
					url: controller+"delete_confirm",
					type:"post",
					data:property,
					success:function(returnedData){
						var todoObject = JSON.parse(returnedData);
						property.item = todoObject['item_desc'];
						Swal.fire({
							icon:"warning",
							title:"DELETE ITEM",
							html:"Are you sure you want to delete: "+todoObject['item_desc']+"<p><button type='button' class='btn btn-danger btn-xs btn-block mt-2' onclick='Swal.clickConfirm()'>Delete</button></p>",
							showConfirmButton:false,
							showCloseButton:true,
							preConfirm:function(){
								$.ajax({
									url:controller+"insert",
									type:"post",
									data:property,
									success:function(){
										Swal.fire({
											icon:"success",
											title:"Item Deleted",
											text:todoObject['item_desc']+" has been deleted.",
											allowOutsideClick:false,
											showConfirmButton:false,
											showCloseButton:true,
										}).then(()=>{window.open(window.location.href,"_self");})
									}
								})	
								
							}
						})
					}
				})
			});
		}
		return{
			modal_view:modal_view,
			add_list:add_list,
			delete_confirm:delete_confirm,
		}
	}();
	var tables = function(){
		function gen_table(){
			$("#maintable").DataTable().destroy();
			$("#maintable").DataTable({
				"ajax":{
					url: controller + "fetch_task",
					type:"get",
					data:function(sentData){
						sentData.row_status = "1";
					},
					dataSrc:function(returnedData){
						return returnedData;
					},
				},
				"columns": [
					{ data: 'item_desc' },
					{ data: 'status' },
					{ data: 'todo_id',render : function (data)
						{
							return "<button type='button' class='btn btn-block btn-warning btn-xs buttonModal' data-id='"+data+"'>EDIT</i></a>"+"<button type='button' class='btn btn-block btn-danger btn-xs' data-id='"+data+"' id='deleteButton'>DELETE</i></a>";
						}
					},
				],
				"drawCallback":function(){
					fn.modal_view();
					fn.delete_confirm();
				}
			});
		}
		return{
			gen_table:gen_table
		}
	}();
	var modal = function(){
		function todo_modal(){
			$.ajax({
				url:controller+"todo_modal/",
				type:"post",
				datatype:"html",
				data:property,
				success:function(returnedData){
					show_modal(returnedData);
				},
				complete: function(){
					fn.add_list();
				}
			});
		}
		return{
			todo_modal:todo_modal
		}
	}();
	return {
		property: property,
		fn      : fn,
		tables   : tables,
		modal	: modal
	}
}();