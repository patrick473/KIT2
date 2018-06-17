$(document).ready(function(){

 fetch_group_data();

});


 function fetch_group_data(query = '') {
  $.ajax({
   url:"/api/group/group_action",
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
  fetch_group_data(query);
 });
