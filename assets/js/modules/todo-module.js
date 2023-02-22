Todo = function () {
	var controller = base_url + 'TodoController/'
	var property = {};
	var fn = function(){
		function modal_view(){
			$("button#thatsme").unbind();
			$("button#thatsme").on('click',function(){
				modal.todo_modal();
			});
		}
		function edit_modal(val){
			$("button#editButton").unbind();
			$("button#editButton").on('click',function(){
				alert(val);
			});
		}
		function add_list(){
			$("button#createlist").unbind();
			$("button#createlist").on('click',function(){
				var item = $("input#item").val();
				$.ajax({
					url:controller+"insert",
					type:"post",
					data:{list:item},
					success:function(returnedData){
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
			edit_modal:edit_modal
		}
	}();
	var tables = function(){
		function gen_table(){
			$("#maintable").DataTable().destroy();
			$("#maintable").DataTable({
				// "processing":true,
				// "serverSide":true,
				// "searchDelay":1000,
				"ajax":{
					url: controller + "fetch_task",
					type:"get",
					data:function(sentData){
						sentData.test1 = "1";
						sentData.test2 = "2";
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
							return "<a href='#' class='btn btn-block btn-warning btn-xs' onclick='Todo.fn.edit_modal(\""+data+"\")' id='editButton'>EDIT</i></a>";
						}
					},
				],
				// "drawCallback":function(){
				// 	fn.edit_modal();
				// }
			});
		}
		return{
			gen_table:gen_table
		}
	}();
	var modal = function(){
		function todo_modal(){
			$.ajax({
				url:controller+"todo_modal",
				datatype:"html",
				success:function(returnedData){
					//console.log(returnedData);
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