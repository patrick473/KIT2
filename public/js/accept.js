$(document).on("click",".deleteInvite",(e)=>{
    let invite_id = $('#deleteInvite').data("invite_id");

    let url = "/api/invite/"+invite_id;
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

$(document).on("click",".acceptInvite",(e)=>{
    let invite_id = $('#acceptInvite').data("invite_id");
    console.log(invite_id);
    let url = "/api/invite/accept/"+invite_id;
    $.ajax({
        type: "POST",
        url: url,
        contentType:'json',
        processData: false,
        contentType: 'charset=UTF-8'
    }).done(function (response) {
      location.reload();
    })
})
