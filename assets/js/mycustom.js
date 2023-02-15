function test(val){
    // $item = document.getElementById('item').value;
    if(val != ""){
        $.ajax({
            url:base_url+"TodoController/insert",
            type:"post",
            data:{list:val},
            success:function(returnedData){
              if(returnedData){
                $('#create_list').modal('hide')
                alert("success!");
              }else{
                alert("failed!");
              }
            }
        })
    }else{
        alert("No entry");
    }
}