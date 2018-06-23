$(document).ready(function(){

 fetch_survey_data();

});


 function fetch_survey_data(query = '') {
  let group_id = $('#SurveyBody').data("group_id");
  $.ajax({
   url:"/api/survey/select/"+group_id,
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
