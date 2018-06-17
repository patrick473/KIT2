$(document).ready(function(){

 fetch_customer_data();

});


 function fetch_customer_data(query = '') {
  $.ajax({
   url:"/api/group/action",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('#GroupBody').html(data.table_data);
   } 
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });

$(document).on("click",".deletebutton",(e)=>{
    let id = $(e.target).data("id");
    
    let url = "/api/group/"+id;
    $.ajax({
        type: "DELETE",
        url: url,
        contentType:'json',
        processData: false,
        contentType: 'charset=UTF-8' 
    }).done(function (response) {
        
    })
})