$(document).ready(function(){

 fetch_survey_data();

});

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
                tr.append("<td>Title Survey: " + data.title + "</td>");
                $('table').append(tr);

      tr = $('<tr/>');
                tr.append("<td>Beschrijving Survey: " + data.description + "</td>");
                $('table').append(tr);

      tr = $('<tr/>');
                tr.append("<td>Groep: " + data.group + "</td>");
                $('table').append(tr);

    $.each(data.questions,(i,e)=>{

    document.getElementById('test').innerHTML +="<h2>Vraag: " + e.title + "</h2>";
    document.getElementById('test').innerHTML +="<p>Beschrijving: " + e.description + "</p>";
    document.getElementById('test').innerHTML +="<p>Type: " + e.type + "</p>";

    if (e.type == "Text") {
        document.getElementById('test').innerHTML +="<textarea> </textarea>";
    }
    // if (e.type == "Text") {
    //     document.getElementById('test').innerHTML +="<textarea> </textarea>";
    // }
    // if (e.type == "Text") {
    //     document.getElementById('test').innerHTML +="<textarea> </textarea>";
    // }
    // if (e.type == "Text") {
    //     document.getElementById('test').innerHTML +="<textarea> </textarea>";
    // }
                });


  }
 })
}
