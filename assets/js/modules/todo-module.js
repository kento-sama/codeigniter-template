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
			add_list:add_list
		}
	}();
	var tables = function(){
		function gen_table(){
			// alert("Im here!");
			$("#maintable").DataTable({
				ajax:{
					url: controller + "fetch_task",
					dataSrc: ''
				},
				columns: [
					{ data: 'item_desc' },
					{ data: 'status' },
				]
			})
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