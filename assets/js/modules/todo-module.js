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
				var item = $("input#item").val();
				var todo_id = $("input#todo_id").val();
				$.ajax({
					url:controller+"insert",
					type:"post",
					data:{list:item,todo_id:todo_id},
					success:function(returnedData){
						alert(returnedData);
						if(returnedData){
							$('#modal-container').modal('hide');
							alert("success!");
						}else{
							alert("failed!");
						}
					}
				})
			});
		}
		return{
			modal_view:modal_view,
			add_list:add_list,
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
							return "<button type='button' class='btn btn-block btn-warning btn-xs buttonModal' data-id='"+data+"'>EDIT</i></a>";
						}
					},
				],
				"drawCallback":function(){
					fn.modal_view();
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