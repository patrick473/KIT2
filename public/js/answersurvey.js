var questionlist= [];

$(document).ready(function(){

 fetch_survey_data();

});

$("#submit").click(function saveanswers() {
  var data = {
    "survey_id": $("#SurveyBody").data("survey_id"),
    "user_id": $("#SurveyBody").data("user_id"),
    "answers": []
  }
  $.each(questionlist,function(question){
    if (question.type === "Radio"){
      data["answers"].push({
        "id": question.id,
        "value": $("input[type='radio'][name='question'" + question.id + "]:checked").val()
      });
    }
    else {
      data["answers"].push({
        "id": question.id,
        "value": $("#question" + question.id).val()
      });
    }
  })
  console.log(data);
$.ajax({
  url:"/api/survey/answer",
  method:'POST',
  data:data,
  dataType:'json',
  success:function(data){

  }
})
})

function fetch_survey_data(query = '') {
 let group_id = $('#SurveyBody').data("groupid");
 $.ajax({
  url:"/api/survey/"+group_id,
  method:'GET',
  data:{query:query},
  dataType:'json',
  success:function(data)
  {
      console.log(data);
      $('#SurveyBody').append("<h3>" + data.title + "</h3>");
      $('#SurveyBody').append("<p>" + data.description + "</p>");

      questionlist = data.questions;
    $.each(data.questions,(i,e)=>{

    if (e.type == "Text") {
        $('#body').append("<textarea id='question"+e.id+"'> </textarea><br>");
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
                <input class='col-md-12 col-xs-12 slider' type='range' id="question`+e.id+`"/>
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
        $('#body').append(`<input type=radio name="question`+e.id+`" >`+e.attributes.first+`</input><br>`);
        $('#body').append(`<input type=radio name="question`+e.id+`">`+e.attributes.second+`</input><br>`);
        $('#body').append(`<input type=radio name="question`+e.id+`">`+e.attributes.third+`</input><br>`);
        $('#body').append(`<input type=radio name="question`+e.id+`">`+e.attributes.fourth+`</input><br>`);
        $('#body').append(`<input type=radio name="question`+e.id+`">`+e.attributes.fifth+`</input>`);



    }

                });


  }
 })
}
