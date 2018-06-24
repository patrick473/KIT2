$(document).on("click",".addSurvey",(e)=>{
        let group_id = $(e.target).data("group_id");
        location.href = "/selectsurvey/"+group_id;
});

$(document).on("click",".removeSurvey_group",(e)=>{
    let survey_id = $("#removeSurvey_group").data("survey_id");
    console.log(survey_id);

    let url = "/api/survey/surveyGroup/"+survey_id;
    $.ajax({
        type: "DELETE",
        url: url,
        contentType:'json',
        processData: false,
        contentType: 'charset=UTF-8'
    }).done(function (response) {
      location.reload();
    })
})
