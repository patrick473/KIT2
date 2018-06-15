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
                            <h2>Kwaliteit Instrument Toetsprogramma</h2><br>
                            <h4>Give me some of your food give me some of your food give me some of your food meh, 
                            i don't want it stare at wall turn and meow stare at wall some more meow again continue staring show belly lies down</h4><br>
                            <p>Cat ipsum dolor sit amet, plop down in the middle where everybody walks hiding behind the couch until lured out by a feathery toy.
                                Knock dish off table head butt cant eat out of my own dish milk the cow stick butt in face scream at teh bath run outside as soon as door open. 
                                Grab pompom in mouth and put in water dish. 
                                Stare at ceiling light sniff catnip and act crazy,
                                but behind the couch, but spend six hours per day washing,
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
                          <h2>Kwaliteit Instrument Toetsprogramma</h2><br>
                          <h4>Give me some of your food give me some of your food give me some of your food meh, 
                          i don't want it stare at wall turn and meow stare at wall some more meow again continue staring show belly lies down</h4><br>
                          <p>Cat ipsum dolor sit amet, plop down in the middle where everybody walks hiding behind the couch until lured out by a feathery toy.
                              Knock dish off table head butt cant eat out of my own dish milk the cow stick butt in face scream at teh bath run outside as soon as door open. 
                              Grab pompom in mouth and put in water dish. 
                              Stare at ceiling light sniff catnip and act crazy,
                              but behind the couch, but spend six hours per day washing,
                          </p><br>
                          <ul class="list-group" id="ul">
                          `+listString+`  
                          </ul>
                         
                      </div>
                      
                  </div>
                  </div>
                            `;
                  break;
              }
              $("#content").append(html);
        });
    });
  });
  