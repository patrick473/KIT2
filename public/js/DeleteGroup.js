$(document).on("click",".groupDeletebutton",(e)=>{
    let id = $(e.target).data("id");

    let url = "/api/group/"+id;
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

$(document).on("click",".memberDeletebutton",(e)=>{
    let id = $(e.target).data("id");

    let url = "/api/member/"+id;
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

$(document).on("click",".addMember",(e)=>{
        let group_id = $(e.target).data("id");
        location.href = "/group/invite/"+group_id;
});

$(document).on("click",".groupOverview",(e)=>{
        let group_id = $(e.target).data("id");
        location.href = "/group/surveyAnswers/"+group_id;
});

$(document).on("click",".groupOverview",(e)=>{
        let group_id = $(e.target).data("id");
        location.href = "/group/surveys/"+group_id;
});
