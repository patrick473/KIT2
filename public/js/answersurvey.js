$(document).ready(function(){

 fetch_survey_data();

});

$("submit").click(function saveanswers() {
  let data = {user_id: , survey_id: , answers:[{

  }]};
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
 let group_id = $('#SurveyBody').data("group_id");
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

    $.each(data.questions,(i,e)=>{

    if (e.type == "Text") {
        $('#body').append("<textarea> </textarea><br>");
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
                <input class='col-md-12 col-xs-12 slider' type='range'/>
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
        $('#body').append(`<input type=radio >`+e.attributes.first+`</input><br>`);
        $('#body').append(`<input type=radio >`+e.attributes.second+`</input><br>`);
        $('#body').append(`<input type=radio >`+e.attributes.third+`</input><br>`);
        $('#body').append(`<input type=radio >`+e.attributes.fourth+`</input><br>`);
        $('#body').append(`<input type=radio >`+e.attributes.fifth+`</input>`);



    }

                });


  }
 })
}
