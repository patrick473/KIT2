var questionlist= [];

$(document).ready(function(){

 fetch_survey_data();

});

$("#form").submit(function saveanswers(e) {
  e.preventDefault();
  var data =  {
    survey_id: $("#SurveyBody").data("groupid"),
    user_id: $("#SurveyBody").data("userid"),
    answers: []
  };
  $.each(questionlist,function(index, question){
    if (question.type === "Radio"){
      console.log($("input[name='question" + question.id + "']:checked").val());
      data["answers"].push({
        "id": question.id,
        "value": $("input[name='question" + question.id + "']:checked").val()
      });
    }
    else {
      data["answers"].push({
        "id": question.id,
        "value": $("#question" + question.id).val()
      });
    }
  });
  console.log(data);
$.ajax({
  url:"/api/survey/answer",
  method:'POST',
  data:JSON.stringify(data),
  contentType:'json',
  processData: false,
  success:function(data){
    console.log(data);
  },
    error: function(xhr){
      console.log(xhr);
    }
})
window.location.href ='/group/surveyAnswers/'+$('#SurveyBody').data("groupid")
})

function fetch_survey_data(query = '') {
 let group_id = $('#SurveyBody').data("groupid");
 $.ajax({
  url:"/api/survey/"+group_id,
  method:'GET',
  dataType:'json',
  success:function(data)
  {
      $("#surveyid").val(data.surveyid);
      $('#SurveyBody').append("<h3>" + data.title + "</h3>");
      $('#SurveyBody').append("<p>" + data.description + "</p>");

      questionlist = data.questions;
    $.each(data.questions,(i,e)=>{

    if (e.type == "Text") {
        $
        $('#body').append("<h5>"+e.title+"</h5>" +
            "<div class='row'>" +
            "<div class='col-md-12 col-xs-12'>"+e.description+"</div>" +
            "<div class='col-md-12 col-xs-12'><textarea class='form-control' id='question"+e.id+"' required> </textarea></div>" +
            "</div>");
    }
    if (e.type == "Slider") {
        $('#body').append(`<div class="row">
          <div class="col-md-12">
            <h5>`+e.title+`</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <p>`+e.description+`</p>
          </div>
        </div>
        <div class='row'>
          <div class="col-md-12">
            <div class="slider-wrapper row">
                <input class='col-md-12 col-xs-12 slider' type='range' id="question`+e.id+`"/ required>
                <input disabled value=`+e.attributes.start+` class='autosave col-md-4 col-xs-4 slider-start start'/><input disabled value=`+e.attributes.middle+` class='autosave slider-middle col-md-4 col-xs-4 middle'/><input disabled value=`+e.attributes.end+` class='autosave slider-end col-md-4 col-xs-4 end'/>
            </div>
          </div>
        </div>

          </div>`);
    }
    if (e.type == "Radio") {
      $('#body').append(`<div class="row">
      <div class="col-md-12">
        <h5>`+e.title+`</h5>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <p>`+e.description+`</p>
      </div>
    </div>`);
        $('#body').append(`<input type=radio value="`+e.attributes.first+`" name="question`+e.id+`" required >`+e.attributes.first+`</input><br>`);
        $('#body').append(`<input type=radio value="`+e.attributes.second+`" name="question`+e.id+`">`+e.attributes.second+`</input><br>`);
        $('#body').append(`<input type=radio value="`+e.attributes.third+`" name="question`+e.id+`">`+e.attributes.third+`</input><br>`);
        $('#body').append(`<input type=radio value="`+e.attributes.fourth+`" name="question`+e.id+`">`+e.attributes.fourth+`</input><br>`);
        $('#body').append(`<input type=radio value="`+e.attributes.fifth+`" name="question`+e.id+`">`+e.attributes.fifth+`</input>`);



    }
    $('#body').append("<hr>");
                });

               
  }
 })
}
