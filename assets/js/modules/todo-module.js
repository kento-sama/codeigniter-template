Todo = function () {
	var controller = base_url + 'todocontroller/'
	var property = {};

	var fn = function() {
		function view_modal(){
			$("button#pets").unbind();
			$("button#pets").on('click', function(){
				modal.my_modal();
			});
		}
		return{
			view_modal:view_modal
		}	
	}();

	var table = function() {

	}();

	var modal = function() {
		function my_modal(){
			$.ajax({
				url:controller+"add_modal",
				datatype:"html",
				success:function(returnedData){
					show_modal(returnedData);
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
		modal   : modal
	}
}();