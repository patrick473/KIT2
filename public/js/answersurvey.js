$(document).ready(function(){

 fetch_survey_data();

});

function saveanswers(){
  let url = "/api/survey/answer";
  $.ajax({
    type: "POST",
    url: url,
    contentType:'json',
    processData: false,
    contentType: 'charset=UTF-8'
  }).done(function (response) {
    location.href='/group';
  })
};

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
      tr = $('<tr/>');
                tr.append("<td><h2> " + data.title + "</h2></td>");
                $('table').append(tr);

      tr = $('<tr/>');
                tr.append("<td>Beschrijving Survey: " + data.description + "</td>");
                $('table').append(tr);

      tr = $('<tr/>');
                tr.append("<td>Groep: " + data.group + "</td>");
                $('table').append(tr);

    $.each(data.questions,(i,e)=>{

    document.getElementById('test').innerHTML +="<p>Vraag: " + e.title + "</p>";
    document.getElementById('test').innerHTML +="<p>Beschrijving: " + e.description + "</p>";
    document.getElementById('test').innerHTML +="<p>Type: " + e.type + "</p>";

    if (e.type == "Text") {
        document.getElementById('test').innerHTML +="<textarea> </textarea>";
    }
    if (e.type == "Text") {
        document.getElementById('test').innerHTML +="";
    }
    if (e.type == "Radio Button") {
        document.getElementById('test').innerHTML +="";
    }
    // if (e.type == "Text") {
    //     document.getElementById('test').innerHTML +="<textarea> </textarea>";
    // }
                });


  }
 })
}
