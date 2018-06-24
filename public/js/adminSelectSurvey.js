$(document).ready(function(){

 fetch_survey_data();

});


 function fetch_survey_data(query = '') {
  let group_id = $('#SurveyBody').data("group_id");
  $.ajax({
   url:"/api/admin/select/"+group_id,
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('#SurveyBody').html(data.table_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_survey_data(query);
 });

 $(document).on("click",".addSurvey",(e)=>{
   let survey_id = $(e.target).data("survey_id");
   let group_id = $('#SurveyBody').data("group_id");
   let url = "/api/admin/survey/"+group_id+'/'+survey_id;
   $.ajax({
     type: "POST",
     url: url,
     contentType:'json',
     processData: false,
     contentType: 'charset=UTF-8'
   }).done(function (response) {
     location.href='/admin/surveyOverview/1';
   })
 });
