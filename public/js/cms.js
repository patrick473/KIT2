



$('#pageselectbutton').on('click',()=>{
    let html;
    var settings = {
        
        "url": "http://localhost:8000/api/admin/content/"+1,
        "method": "GET"
       
      }
      
      $.ajax(settings).done(function (response) {
        let contentjson = JSON.parse(response);
        console.log(contentjson);
        $.each(contentjson.sections,(i,e)=>{
            console.log(e.id);
            
            switch (e.type) {
                case 'text':
                   html = `<div class="textsection form-group" data-index="`+e.id+`" data-type="text" id="section`+e.id+`"> 
                    <div class="row">
                    <h4>Text section order: `+e.id+`</h4>
                    </div>
                    <div class="row">
                    <label for="section`+e.id+`textboxtitle" class="control-label"> title </label>
                    <input type="text" id="section`+e.id+`textboxtitle" value="`+e.title+`" class="form-control">
                    </div>
                    <br>
                    <div class="row">
                    <label for="section`+e.id+`textarea" class="control-label"> content </label>
                    <textarea  id="section`+e.id+`textarea" rows="4"  class="form-control">`+e.content+`</textarea>
                    </div>
                    <hr>
                    </div>
                    `;
                 
                    
                    break;

                 case 'bulletpoints':

                 let listItems = e.items;
                 let listString = '';
                 listItems.forEach(elem => {
                     listString += '<li class="list-group-item justify-content-between class="li'+e.id+'">'+elem+'</li>'
                 });
                     html=`<div class="bulletsection form-group" data-index="`+e.id+`" data-type="bulletpoints" id="section`+e.id+`"> 
            <div class="row">
            <h4>Bulletpoint section order: `+e.id+`</h4>
            </div>
            <div class="row">
            <label for="section`+e.id+`textboxtitle" class="control-label"> title </label>
            <input type="text" id="section`+e.id+`textboxtitle" class="form-control">
            </div>
            <br>
            <div class="row">
            <label for="section`+e.id+`textarea" class="control-label"> content </label>
            <textarea  id="section`+e.id+`textarea" rows="4" class="form-control"></textarea>
            </div>
            <div class="row">
            <p>Add items to bulletpoint list:</p>
            </div>
            <div class="row">
             <ul class="list-group-flush" id="ul`+e.id+`">
             <li class="list-group-item justify-content-between buttonitem"> <input type="text" class="" id="section`+e.id+`bulval" placeholder="New Item">
             <button class="btn btn-primary btn-sm"  type="button" onclick="addbulletpoint(`+e.id+`)">Add new Item</button></li>
             `+listString+ `
             
           </ul>
           </div>
             <hr>
             </div>`;
                    break;
             }
             $('#contentcreatorsection').append(html);
        })

      });
})












$('#opensectionmodal').on('click',()=>{
    $('#addContent').modal('show');
})

//handler of modal button to add section to main page
$('#addsectionbutton').on('click',()=>{

    let section = $('#sectionselector').val();
    let ElementID = document.getElementById("contentcreatorsection").childElementCount+1;
    let html;
    
    switch (section) {
       case 'text':
           html = `<div class="textsection form-group" data-index="`+ElementID+`" data-type="text" id="section`+ElementID+`"> 
           <div class="row">
           <h4>Text section order: `+ElementID+`</h4>
           </div>
           <div class="row">
           <label for="section`+ElementID+`textboxtitle" class="control-label"> title </label>
           <input type="text" id="section`+ElementID+`textboxtitle" class="form-control">
           </div>
           <br>
           <div class="row">
           <label for="section`+ElementID+`textarea" class="control-label"> content </label>
           <textarea  id="section`+ElementID+`textarea" rows="4" class="form-control"></textarea>
           </div>
           <hr>
           </div>
           `;
           
           
           break;
        case 'bulletpoints':
            html=`<div class="bulletsection form-group" data-index="`+ElementID+`" data-type="bulletpoints" id="section`+ElementID+`"> 
            <div class="row">
            <h4>Bulletpoint section order: `+ElementID+`</h4>
            </div>
            <div class="row">
            <label for="section`+ElementID+`textboxtitle" class="control-label"> title </label>
            <input type="text" id="section`+ElementID+`textboxtitle" class="form-control">
            </div>
            <br>
            <div class="row">
            <label for="section`+ElementID+`textarea" class="control-label"> content </label>
            <textarea  id="section`+ElementID+`textarea" rows="4" class="form-control"></textarea>
            </div>
            <div class="row">
            <p>Add items to bulletpoint list:</p>
            </div>
            <div class="row">
             <ul class="list-group-flush" id="ul`+ElementID+`">
             <li class="list-group-item justify-content-between buttonitem"> <input type="text" class="" id="section`+ElementID+`bulval" placeholder="New Item">
             <button class="btn btn-primary btn-sm"  type="button" onclick="addbulletpoint(`+ElementID+`)">Add new Item</button></li>
             
           </ul>
           </div>
             <hr>
             </div>` ;
           break;
    }
    $('#contentcreatorsection').append(html);

   
    
})


//handler of submitting json data to server

$('#submitcontentcreation').on('click',()=>{
    let json = {"sections":[]}

    $('#contentcreatorsection').children('div').each((i,e)=>{
        let title,content,listItems;
        let id = $(e).data("index");
        let type = $(e).data("type");
        switch (type) {
            case 'text':
                 title = $(e).find("input").val();
                 content = $(e).find("textarea").val();
                json.sections.push({"id":id,"type":type,"title":title,"content":content});
                break;
            case 'bulletpoints':
             title = $(e).find("input").val();
             content = $(e).find("textarea").val();
             listItems = [];
              $('#ul'+id+' li').each((i,e)=>{
                  listContent = $(e).text();
                  if( !$(e).is(".buttonitem")){

                  
                  listItems.push($(e).text());
                  
                  }
              });
            
            json.sections.push({"id":id,"type":type,"title":title,"content":content,"items":listItems});
                break;
            
        }
    })
    console.log(json);
    let sendableJson = JSON.stringify(json);
    let url = "http://localhost:8000/api/admin/content/"+$('#pageselector').val();

    $.ajax({
        type: "POST",
        url: url,
        data : sendableJson,
        contentType:'json',
        processData: false,
        contentType: 'charset=UTF-8' 
    })
})


function addbulletpoint(sectionid){
    let newBulletPointValue = $('#section'+sectionid+'bulval').val();
    $('#section'+sectionid+'bulval').val('');
    $('#ul'+sectionid).append('<li class="list-group-item justify-content-between class="li'+sectionid+'">'+newBulletPointValue+'</li>')
    

}