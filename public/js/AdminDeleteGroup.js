$(document).on("click",".deletebutton",(e)=>{
    let id = $(e.target).data("id");

    let url = "/api/admin/group/"+id;
    $.ajax({
        type: "DELETE",
        url: url,
        contentType:'json',
        processData: false,
        contentType: 'charset=UTF-8'
    }).done(function (response) {
      document.getElementById('search').value = '';
      fetch_group_data();
    })
})

$(document).on("click",".memberOverview",(e)=>{
  let id = $(e.target).data("id");
  location.href = '/admin/memberOverview/'+id;
})

$(document).on("click",".surveyOverview",(e)=>{
  let id = $(e.target).data("id");
  location.href = '/admin/surveyOverview/'+id;
})
