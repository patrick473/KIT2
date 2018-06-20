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

document.getElementById("addMember").onclick = function () {
        let group_id = $(this).data("id");
        location.href = "/group/invite/"+group_id;
};
