/**
 * Created by Danny Mostert on 7-6-2018.
 */

var numberOfQuestions = 0;

function initialize(){
    //fillOptions();
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
                    "<input id='question-title" + numberOfQuestions + "' type='text' value='" + qttl + "' class='form-control example-input example-title-input question-title'></input>" +
                    "<div class='question row'>" +
                        "<div class='question-content col-md-6'>" +
                            "<textarea id='question-description" + numberOfQuestions + "' class='example-input form-control survey-textarea question-description'>" + qdesc + "</textarea>" +
                            "<input id='question-type" + numberOfQuestions + "' value='" + type + "' type='hidden'/>" +
                            "<input id='question-id" + numberOfQuestions + "' value='" + qid + "' type='hidden'/>" +
                        "</div>" +
                        "<div class='question-content col-md-6'>" +
                            "<textarea id='question-answer" + numberOfQuestions + "' disabled class='example-input form-control survey-textarea'></textarea>" +
                        "</div>" +
                    "</div>" +
                "</div>" +
            "</div><br/>"
            );
    }
}

//TODO: Function to converts questions to JSON
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

//TODO: Function that saves the question JSON
function saveSurvey(){
    console.log(JSON.parse(toJSON()));
    $.ajax({
        url: "/api/admin/survey",
        type: "POST",
        data: toJSON(),
        contentType: 'json',
        success: function(response){
            response = JSON.parse(response);
            console.log(response);
            $("#survey-id").val(response.id);
            $.each(response.questions, function (index, question) {
                $("#question-id" + (index + 1)).val(question.id);
            });
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

//TODO: ADD FUCNTION TO FILL SELECT LIST WITH ALL OPTIONS

// EVENT LISTENERS
$("#add-question-button").click(function(){
    addNewQuestion($("#question-title-input").val(), $("#question-description-input").val(), $("#question-type-input").val(), "");
    clearQuestionFields();
});

$("#survey-title-input").keyup(function(){
    $("#example-title").text($("#survey-title-input").val());
});

$("#test").click(function() {
    saveSurvey()
});