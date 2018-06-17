$(document).ready(function(){

 fetch_member_data();

});


 function fetch_member_data(query = '') {
  $.ajax({
   url:"/api/group/member_action",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('#MemberBody').html(data.table_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_member_data(query);
 });
