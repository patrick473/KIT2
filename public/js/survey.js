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
function addNewQuestion(qttl, qdesc, type, qid, attributes){
    numberOfQuestions += 1;
    switch(type){
        case 'Text':
            $(".questions-wrapper").append(
            "<div id='question-row" + numberOfQuestions + "' class='wrap question" + qid + " row'>" +
                "<div class='col-md-12'>" +
                    "<input id='question-title" + numberOfQuestions + "' type='text' value='" + qttl + "' class='autosave" + numberOfQuestions + " form-control example-input example-title-input question-title'/>" +
                    "<div class='row'>" +
                        "<div class='question-content col-md-6'>" +
                            "<textarea id='question-description" + numberOfQuestions + "' class='autosave" + numberOfQuestions + " example-input form-control survey-textarea question-description'>" + qdesc + "</textarea>" +
                            "<input id='question-type" + numberOfQuestions + "' value='" + type + "' type='hidden'/>" +
                            "<input id='question-id" + numberOfQuestions + "' value='" + qid + "' type='hidden'/>" +
                        "</div>" +
                        "<div class='question-content col-md-6'>" +
                            "<textarea id='question-answer" + numberOfQuestions + "' disabled class='example-input form-control survey-textarea'></textarea>" +
                            "<div id='" + qid + "' class='remove-question-button" + numberOfQuestions + " col-md-6 col-lg-offset-3 btn btn-danger btn-lg remove-question-button'>Verwijder</div>" +
                        "</div>" +
                    "</div>" +
                "</div>" +
            "</div><br/>"
            );
            $("#question-title" + numberOfQuestions).focus();
            $(".autosave" + numberOfQuestions).on('change', function() {
                saveSurvey();
            });
            $(".remove-question-button" + numberOfQuestions).click(function(event) {
                if(event.target.id === ""){
                    return;
                }
                else{
                    deleteQuestion(event.target.id);
                }
            });
            break;
        case 'Slider':
            $(".questions-wrapper").append(
                "<div id='question-row" + numberOfQuestions + "' class='wrap question" + qid + " row'>" +
                    "<div class='col-md-12'>" +
                            "<input id='question-title" + numberOfQuestions + "' type='text' value='" + qttl + "' class='autosave" + numberOfQuestions + " form-control example-input example-title-input question-title'/>" +
                "<div class='row'>" +
                    "<div class='question-content col-md-6'>" +
                        "<textarea id='question-description" + numberOfQuestions + "' class='autosave" + numberOfQuestions + " example-input form-control survey-textarea question-description'>" + qdesc + "</textarea>" +
                        "<input id='question-type" + numberOfQuestions + "' value='" + type + "' type='hidden'/>" +
                        "<input id='question-id" + numberOfQuestions + "' value='" + qid + "' type='hidden'/>" +
                    "</div>" +
                    "<div class='question-content col-md-6'>" +
                        "<div class='slider-wrapper row'>" +
                            "<input id='question-answer" + numberOfQuestions + "' class='col-md-12 col-xs-12 slider' type='range' disabled/>" +
                            "<input value='" + attributes.start + "' class='autosave" + numberOfQuestions + " form-control col-md-4 col-xs-4 slider-start start" + numberOfQuestions + "'/><input value='" + attributes.middle + "' class='autosave" + numberOfQuestions + " form-control  slider-middle col-md-4 col-xs-4 middle" + numberOfQuestions + "'/><input value='" + attributes.end + "' class='autosave" + numberOfQuestions + " form-control  slider-end col-md-4 col-xs-4 end" + numberOfQuestions + "'/>" +
                        "<div id='" + qid + "' class='remove-question-button" + numberOfQuestions + " col-md-6 col-lg-offset-3 btn btn-danger btn-lg remove-question-button'>Verwijder</div>" +
                    "</div>" +
                "</div>" +
                "</div>" +
                "</div><br/>"
            );
            $("#question-title" + numberOfQuestions).focus();
            $(".autosave" + numberOfQuestions).on('change', function() {
                saveSurvey();
            });
            $(".remove-question-button" + numberOfQuestions).click(function(event) {
                if(event.target.id === ""){
                    return;
                }
                else{
                    deleteQuestion(event.target.id);
                }
            });
            break;
        case 'Radio':
            $(".questions-wrapper").append(
                "<div id='question-row" + numberOfQuestions + "' class='wrap question" + qid + " row'>" +
                "<div class='col-md-12'>" +
                "<input id='question-title" + numberOfQuestions + "' type='text' value='" + qttl + "' class='autosave" + numberOfQuestions + " form-control example-input example-title-input question-title'/>" +
                "<div class='row'>" +
                "<div class='question-content col-md-6'>" +
                "<textarea id='question-description" + numberOfQuestions + "' class='autosave" + numberOfQuestions + " example-input form-control survey-textarea question-description'>" + qdesc + "</textarea>" +
                "<input id='question-type" + numberOfQuestions + "' value='" + type + "' type='hidden'/>" +
                "<input id='question-id" + numberOfQuestions + "' value='" + qid + "' type='hidden'/>" +
                "</div>" +
                "<div class='question-content col-md-6'>" +
                "<div class='slider-wrapper row'>" +
                    "<form id='radio"+numberOfQuestions+"'>" +
                        "<input disabled name='score' type='radio'><input class='autosave" + numberOfQuestions + "' id='first" + numberOfQuestions +"' value='" + attributes.first + "' type='text'/></input><br>" +
                        "<input disabled  name='score' type='radio'><input class='autosave" + numberOfQuestions + "' id='second" + numberOfQuestions +"'  value='" + attributes.second + "'  type='text'/></input><br>" +
                        "<input disabled  name='score' type='radio'><input class='autosave" + numberOfQuestions + "' id='third" + numberOfQuestions +"'  value='" + attributes.third + "'  type='text'/></input><br>" +
                        "<input disabled  name='score' type='radio'><input class='autosave" + numberOfQuestions + "' id='fourth" + numberOfQuestions +"'  value='" + attributes.fourth + "'  type='text'/></input><br>" +
                        "<input disabled  name='score' type='radio'><input class='autosave" + numberOfQuestions + "' id='fifth" + numberOfQuestions +"'  value='" + attributes.fifth + "'  type='text'/></input>" +
                    "</form>" +
                "<div id='" + qid + "' class='remove-question-button" + numberOfQuestions + " col-md-6 col-lg-offset-3 btn btn-danger btn-lg remove-question-button'>Verwijder</div>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div><br/>"
            );
            $("#question-title" + numberOfQuestions).focus();
            $(".autosave" + numberOfQuestions).on('change', function() {
                saveSurvey();
            });
            $(".remove-question-button" + numberOfQuestions).click(function(event) {
                if(event.target.id === ""){
                    return;
                }
                else{
                    deleteQuestion(event.target.id);
                }
            });
            break;
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
            if($("#question-type" + x).val() === "Text"){
                json["questions"].push({
                    "type": $("#question-type" + x).val(),
                    "title": $("#question-title" + x).val(),
                    "description": $("#question-description" + x).val(),
                    "survey_id": $("#survey-id").val(),
                    "id": $("#question-id" + x).val(),
                    "attributes": {}
                });
            }
            else if($("#question-type" + x).val() === "Slider") {
                json["questions"].push({
                    "type": $("#question-type" + x).val(),
                    "title": $("#question-title" + x).val(),
                    "description": $("#question-description" + x).val(),
                    "survey_id": $("#survey-id").val(),
                    "id": $("#question-id" + x).val(),
                    "attributes": {
                        "start": $(".start" + x).val(),
                        "middle": $(".middle" + x).val(),
                        "end": $(".end" + x).val(),
                    }
                });
            }
            else if($("#question-type" + x).val() === "Radio") {
                json["questions"].push({
                    "type": $("#question-type" + x).val(),
                    "title": $("#question-title" + x).val(),
                    "description": $("#question-description" + x).val(),
                    "survey_id": $("#survey-id").val(),
                    "id": $("#question-id" + x).val(),
                    "attributes": {
                        "first": $("#first" + x).val(),
                        "second": $("#second" + x).val(),
                        "third": $("#third" + x).val(),
                        "fourth": $("#fourth" + x).val(),
                        "fifth": $("#fifth" + x).val(),
                    }
                });
            }

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
            $("#" + id).parents(".wrap").fadeOut(250);
            setTimeout(function(){
                $("#" + id).parents(".wrap").remove();
            }, 300);
            numberOfQuestions = numberOfQuestions - 1;
        },
        error: function(xhr, response){
            console.log(response);
        }
    });
}

function loadSurvey(id){
    $.get("/api/admin/survey/" + id, function(response, xhr){
        response = JSON.parse(response);
        $("#survey-title-input").val(response.title);
        $("#survey-description-input").val(response.description);
        $("#survey-id").val(response.surveyid);
        $.each(response.questions, function(index, question){
            if(question.attributes.start === undefined){
                question.attributes.start = " ";
            }
            if(question.attributes.middle === undefined){
                question.attributes.middle = " ";
            }
            if(question.attributes.end === undefined){
                question.attributes.end = " ";
            }
            if(question.attributes.first === undefined){
                question.attributes.first = " ";
            }
            if(question.attributes.second === undefined){
                question.attributes.second = " ";
            }
            if(question.attributes.third === undefined) {
                question.attributes.third = " ";
            }
            if(question.attributes.fourth === undefined){
                question.attributes.fourth = " ";
            }
            if(question.attributes.fifth === undefined){
                question.attributes.fifth = " ";
            }
            addNewQuestion(question.title, question.description, question.type, question.id, question.attributes);
        });
        changeStatus("Voor het laatst opgeslagen: " + response.updated_at.date.slice(0, -7), "orange")
    });
}

function saveSurvey(){
    $(".error-label").remove();
    //Change status text
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
            $("#survey-id").val(response.id);
            $.each(response.questions, function (index, question) {
                $("#question-id" + (index + 1)).val(question.id);
                $(".remove-question-button" + (index + 1)).attr("id", question.id);
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
        attributes = {
            "start": "",
            "middle": "",
            "end": "",
            "first": "",
            "second": "",
            "third": "",
            "fourth": "",
            "fifth": "",
        }
        addNewQuestion($("#question-title-input").val(), $("#question-description-input").val(), $("#question-type-input").val(), "", attributes);
        clearQuestionFields();
        saveSurvey();
    }
});

$("#survey-title-input").keyup(function(){
    $("#example-title").text($("#survey-title-input").val());
});

$(".autosave").on('change', function(){
    saveSurvey();
});

initialize();