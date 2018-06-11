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
           `
           $('#contentcreatorsection').append(html);
           
           break;
        case 'bulletpoints':
            html=''
           break;
    }

   
    
})


//handler of submitting json data to server

$('#submitcontentcreation').on('click',()=>{
    let json = {"sections":[]}

    $('#contentcreatorsection').children('div').each((i,e)=>{
       
        let id = $(e).data("index");
        let type = $(e).data("type");
        switch (type) {
            case 'text':
                let title = $(e).find("input").val();
                let content = $(e).find("textarea").val();
                json.sections.push({"id":id,"title":title,"content":content})
                break;
            case 'bulletpoints':
                
                break;
            
        }
    })
console.log(json);
    let sendablejson = JSON.stringify(json);
    let url = "http://localhost:8000/api/admin/content/"+$('#pageselector').val();

    $.ajax({
        type: "POST",
        url: url,
        data : sendablejson,
        contentType:'json',
        processData: false,
        contentType: 'charset=UTF-8' 
    })
})


