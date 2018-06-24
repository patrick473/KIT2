$(document).on("click",".addSurvey",(e)=>{
        let group_id = $(e.target).data("group_id");
        location.href = "/selectsurvey/"+group_id;
});

$(document).on("click",".removeSurvey_group",(e)=>{
    let survey_id = $("#removeSurvey_group").data("survey_id");
    let group_id = $("#addSurvey").data("group_id");

    let url = "/api/survey/surveyGroup/"+survey_id+"/"+group_id;
    $.ajax({
        type: "GET",
        url: url,
        contentType:'json',
        processData: false,
        contentType: 'charset=UTF-8'
    }).done(function (response) {
      //location.reload();
    })
})
