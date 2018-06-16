$(document).ready(() => {
    let pageId = $("#content").data("page");
    let html;
    let settings = {
      url: "http://localhost:8000/api/admin/content/" + pageId,
      method: "GET"
    };
  
    $.ajax(settings).done(function(response) { 
        let contentjson = JSON.parse(response);
        let alignment,contentcolor;
        console.log(contentjson);
        $.each(contentjson.sections, (i, e) => {
            console.log(i);
            alignment = "";
            contentcolor = "";
            if (i%2==1){ 
            alignment = 'justify-content-end ';
            contentcolor = 'bg-grey';
        };
            switch (e.type) {
                case "text":
                  html =
                    ` <div id="aboutkit" class="container-fluid `+ contentcolor+`">
                    <div class="row `+ alignment +`">
                        <div class="col-sm-8">
                        <h2>`+e.title+`</h2><br>
                          
                        <p>`+e.content+`
                        </p><br>
                        
                           
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
                  
                  html =`
                  <div id="aboutkit" class="container-fluid">
                  <div class="row `+ alignment +`">
                      <div class="col-sm-8">
                          <h2>`+e.title+`</h2><br>
                          
                          <p>`+e.content+`
                          </p><br>
                          <ul class="list-group" id="ul">
                          `+listString+`  
                          </ul>
                         
                      </div>
                      
                  </div>
                  </div>
                            `;
                  break;
                  case "video":
                    html = `
                    <div id="aboutkit" class="container-fluid `+ contentcolor+`">
                    <div class="row `+ alignment +`">
                        <div class="col-sm-8">
                        <h2>`+e.title+`</h2><br>
                          
                        `+e.content+`
                        <br>
                        
                           
                        </div>
                        
                    </div>
                    </div>
                    `
              }
              $("#content").append(html);
        });
    });
  });
  