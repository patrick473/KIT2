$(document).ready(() => {
  let pageId = $("#content").data("page");
  let html;
  let settings = {
    url: "http://localhost:8000/api/admin/content/" + pageId,
    method: "GET"
  };

  $.ajax(settings).done(function(response) {
    let contentjson = JSON.parse(response);
    console.log(contentjson);
    $.each(contentjson.sections, (i, e) => {
      console.log(e.id);

      switch (e.type) {
        case "text":
          html =
            `<div  class="container-fluid">
                    <div class="row">
                    <div class="col-sm-12">
                        <h2>` +e.title +`</h2><br> 
                    <p>` +e.content +`</p><br>
                    </div>
                    </div>
                     </div>`;
          
          break;
        case "bulletpoints":
          let listItems = e.items;
          let listString = "";
          listItems.forEach(elem => {
            listString +=
              '<li class="list-group-item justify-content-between class="li' +e.id +'">' +elem +"</li>";
          });
          
          html =`<div  class="container-fluid">
                     <div class="row">
                     <div class="col-sm-12"> 
                     <h2>` +e.title +`</h2><br> 
                     <p>` +e.content +`</p><br>  
                     <ul class="list-group" id="ul`+e.id+`">
                     `+listString+`  
                     </ul>
                     </div>

                    `;
          break;
          case "video":
          html=`<div class="container-fluid">
          <div class="row">
                    <div class="col-sm-12">
                        <h2>` +e.title +`</h2><br> 
                    ` +e.content +`<br>
                    </div>
                    </div>
          </div>`;
      }
      $("#content").append(html);
    });
  });
});
