$(document).ready(function(){

 fetch_member_data();

});


 function fetch_member_data(query = '') {
  let group_id = $( "#UserBody" ).data("group_id");
  $.ajax({
   url:"/api/admin/member/member_action/"+group_id,
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('#UserBody').html(data.table_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_member_data(query);
 });

 $(document).on("click",".addMember",(e)=>{
     let user_id = $(e.target).data("user_id");
     let group_id = $('#UserBody').data("group_id");

     let url = "/api/admin/group/member/"+user_id+'/'+group_id;
     $.ajax({
         type: "POST",
         url: url,
         contentType:'json',
         processData: false,
         contentType: 'charset=UTF-8'
     }).done(function (response) {
       location.reload();
     })
 })

 $(document).on("click",".deleteMember",(e)=>{
     let member_id = $(e.target).data("member_id");

     let url = "/api/member/"+member_id;
     console.log(url);
     $.ajax({
         type: "DELETE",
         url: url,
         contentType:'json',
         processData: false,
         contentType: 'charset=UTF-8'
     }).done(function (response) {
       location.reload();
     })
 })
