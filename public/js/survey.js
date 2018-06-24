/**
 * Created by Danny Mostert on 7-6-2018.
 */

var numberOfQuestions = 0;

function initialize(){
    //fillOptions();
    changeStatus("geen", "red");
}

function clearQuestionFields(){
    $("#question-title-input").val("") ;
    $("#question-description-input").val("");
}

//TODO: Add more types
function addNewQuestion(qttl, qdesc, type, qid){
    numberOfQuestions += 1;
    switch(type){
        case 'Text':
            $(".questions-wrapper").append(
            "<div id='question-row" + numberOfQuestions + "' class='row'>" +
                "<div class='col-md-12'>" +
                    "<input id='question-title" + numberOfQuestions + "' type='text' value='" + qttl + "' class='autosave form-control example-input example-title-input question-title'></input>" +
                    "<div class='question row'>" +
                        "<div class='question-content col-md-6'>" +
                            "<textarea id='question-description" + numberOfQuestions + "' class='autosave example-input form-control survey-textarea question-description'>" + qdesc + "</textarea>" +
                            "<input id='question-type" + numberOfQuestions + "' value='" + type + "' type='hidden'/>" +
                            "<input id='question-id" + numberOfQuestions + "' value='" + qid + "' type='hidden'/>" +
                        "</div>" +
                        "<div class='question-content col-md-6'>" +
                            "<textarea id='question-answer" + numberOfQuestions + "' disabled class='example-input form-control survey-textarea'></textarea>" +
                            "<button class='col-md-6 col-lg-offset-3 btn btn-danger btn-lg remove-question-button'>Verwijder</button>" +
                        "</div>" +
                    "</div>" +
                "</div>" +
            "</div><br/>"
            );
            $(".autosave").on('change', function() {
                saveSurvey();
            });
    }
}

function toJSON(){
    if(localStorage.getItem("survey_id") === null){
        var json = {
            "title": $("#survey-title-input").val(),
            "description": $("#survey-description-input").val(),
            "questions": []
        }
    }
    if($("#survey-id").val() != ""){
        json.id = $("#survey-id").val();
    }
    for(var x = 1; x < numberOfQuestions + 1; x++) {
        if($("#question-id" + x).val() != "" && $("#survey-id").val() != ""){
            json["questions"].push({
                "type": $("#question-type" + x).val(),
                "title": $("#question-title" + x).val(),
                "description": $("#question-description" + x).val(),
                "survey_id": $("#survey-id").val(),
                "id": $("#question-id" + x).val(),
                "attributes": {}
            });
        }
        else{
            json["questions"].push({
                "type": $("#question-type" + x).val(),
                "title": $("#question-title" + x).val(),
                "description": $("#question-description" + x).val(),
                "attributes": {}
            });
        }
    }
    return JSON.stringify(json);
}

function deleteQuestion(id){
    $.ajax({
        url: "/api/admin/question/" + id,
        type: "DELETE",
        contentType: 'json',
        success: function(response){
            console.log("removed" + id);
        },
        error: function(xhr, response){
            console.log(resposne);
        }
    });
}

function loadSurvey(id){
    $.get("/api/admin/survey/" + id, function(response, xhr){
        response = JSON.parse(response);
        console.log(response.title);
        $("#survey-title-input").val(response.title);
        $("#survey-description-input").val(response.description);
        $("#survey-id").val(response.surveyid);
        $.each(response.questions, function(index, question){
            addNewQuestion(question.title, question.description, question.type, question.id);
        });
        changeStatus("Voor het laatst opgeslagen: " + response.updated_at.date.slice(0, -7), "orange")
    });
}

function saveSurvey(){
    $(".error-label").remove();
    //Change status text
    console.log($("#survey-title-input").val());
    if($("#survey-title-input").val() === ""){
        validationError("survey-title-input")
        return;
    }
    else{
        changeStatus("Opslaan...", "orange");
    $.ajax({
        url: "/api/admin/survey",
        type: "POST",
        data: toJSON(),
        contentType: 'json',
        success: function(response){
            response = JSON.parse(response);
            console.log("Saved!");
            console.log(response);
            $("#survey-id").val(response.id);
            $.each(response.questions, function (index, question) {
                $("#question-id" + (index + 1)).val(question.id);
            });
            changeStatus("Opgeslagen om: " + getCurrentDateTime(), "green");
        },
        error: function(xhr, response){
            if(xhr.status == 401){
                console.log(response);
            }
            else{
                console.log(response);
            }
        }
    });
    }

}

function validationError(id){
    $("#" + id).after("<label class='error-label'>Geef a.u.b. een waarde op!</label>");
    $("#" + id).focus();
}

function changeStatus(text, color){
    $("#status-label").text(text);
    $("#status-label").css("color", color);
}

function getCurrentDateTime(){
    var d = new Date();
    var time = d.toLocaleTimeString();
    var datetime = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate() + " " + time;
    return datetime;
}

//TODO: ADD FUCNTION TO FILL SELECT LIST WITH ALL OPTIONS

// EVENT LISTENERS
$("#add-question-button").click(function(){
    $(".error-label").remove();
    if($("#question-title-input").val() === ""){
        validationError("question-title-input");
        return;
    }
    else{
        addNewQuestion($("#question-title-input").val(), $("#question-description-input").val(), $("#question-type-input").val(), "");
        clearQuestionFields();
        saveSurvey();
    }
});

$("#survey-title-input").keyup(function(){
    $("#example-title").text($("#survey-title-input").val());
});

$(".autosave").on('change', function() {
    saveSurvey();
});

initialize();