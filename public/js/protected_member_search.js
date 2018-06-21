$(document).ready(function(){

 fetch_member_data();

});


 function fetch_member_data(query = '') {
  let group_id = $( "#MemberBody" ).data("group_id");
  $.ajax({
   url:"/api/group/invite/member_action/"+group_id,
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

 $(document).on("click",".memberInvitebutton",(e)=>{
     let user_id = $(e.target).data("user_id");
     let group_id = $('#MemberBody').data("group_id");

     console.log(group_id);

     let url = "/api/invite/member/"+user_id+'/'+group_id;
     $.ajax({
         type: "POST",
         url: url,
         contentType:'json',
         processData: false,
         contentType: 'charset=UTF-8'
     }).done(function (response) {
       fetch_member_data();
     })
 })
