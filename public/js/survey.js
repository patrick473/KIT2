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
function addNewQuestion(qttl, qdesc, type){
    numberOfQuestions += 1;
    console.log(numberOfQuestions);
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
                            "<input id='question-id" + numberOfQuestions + "' value='" + type + "' type='hidden'/>" +
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

//TODO: function that loops through json array of questions and adds them to the form
/*function addQuestion(qttl, qdesc, type){
    switch(type){
        case 'Text':
            $(".questions-wrapper").append(
                "<div class='row'>" +
                "<div class='col-md-12'>" +
                "<h5 class='question-title'>" + qttl + "</h5>" +
                "<div class='question row'>" +
                "<div class='col-md-5 question-description'>" + qdesc + "</div>" +
                "<div class='question-content col-md-7'>" +
                "<textarea class='form-control survey-input survey-textarea'></textarea>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>"
            );
    }
}*/

//TODO: Function to converts questions to JSON
function toJSON(){
    if(localStorage.getItem("survey_id") === null){
        var json = {
            "title": $("#survey-title-input").val(),
            "description": $("#survey-description-input").val(),
            "questions": []
        }
    }

    for(var x = 1; x < numberOfQuestions + 1; x++) {
        json["questions"].push({
            "type": $("#question-type" + x).val(),
            "title": $("#question-title" + x).val(),
            "description": $("#question-description" + x).val(),
            "attributes": {}
        });
    }

    return JSON.stringify(json);
}

//TODO: Function that saves the question JSON
function saveSurvey(){
    $.ajax({
        url: "/api/admin/survey",
        type: "POST",
        data: toJSON(),
        contentType: 'json',
        success: function(response){
            
            console.log(response.questions);
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
    addNewQuestion($("#question-title-input").val(), $("#question-description-input").val(), $("#question-type-input").val())
    clearQuestionFields();
});

$("#survey-title-input").keyup(function(){
    $("#example-title").text($("#survey-title-input").val());
});

$("#test").click(function() {
    console.log(toJSON());
    saveSurvey()
});