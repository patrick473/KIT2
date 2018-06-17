$(document).on("click",".deletebutton",(e)=>{
    let id = $(e.target).data("id");

    let url = "/api/group/"+id;
    $.ajax({
        type: "DELETE",
        url: url,
        contentType:'json',
        processData: false,
        contentType: 'charset=UTF-8'
    }).done(function (response) {
      document.getElementById('search').value = '';
      fetch_customer_data();
    })
})
