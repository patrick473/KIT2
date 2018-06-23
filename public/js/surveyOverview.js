$(document).on("click",".addSurvey",(e)=>{
        let group_id = $(e.target).data("group_id");
        location.href = "/selectsurvey/"+group_id;
});
