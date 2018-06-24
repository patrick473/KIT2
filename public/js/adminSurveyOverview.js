$(document).on("click",".addSurvey",(e)=>{
        let group_id = $(e.target).data("group_id");
        location.href = "/admin/selectsurvey/"+group_id;
});

$(document).delegate(".removeSurvey_group","click",(e)=>{
    let survey_id = $("#removeSurvey_group").data("survey_id");
    let group_id = $("#addSurvey").data("group_id");

    let url = "/api/admin/surveyGroup/"+survey_id+"/"+group_id;
    $.ajax({
        type: "GET",
        url: url,
        contentType:'json',
        processData: false,
        contentType: 'charset=UTF-8',
        success:function (response) {
            location.reload();
          }
    })
})
