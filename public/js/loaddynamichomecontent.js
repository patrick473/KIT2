const PAGEID = 1;

$(document).ready(()=>{

    var settings = {
        
        "url": "http://localhost:8000/api/admin/content/"+PAGEID,
        "method": "GET"
       
      }
      
      $.ajax(settings).done(function (response) {
        let contentjson = JSON.parse(response);
        console.log(contentjson);
        $.each(contentjson.sections,(i,e)=>{
            console.log(e.id);
            let html = `<div id="`+e.title+`" class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h2>`+e.title+`</h2><br> 
                    <p>`+e.content+`
                    </p><br>
                    
                   
                </div>
               
            </div>
            </div>`;
            $("#homecontent").append(html);
        })

      });
      
})
