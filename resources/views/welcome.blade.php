<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
  
      <!-- Styles -->
     
      <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link href="{{ asset('css/main.css')}}" rel="stylesheet">

 

    </head>
    <body >
        @include('includes.head')
      
       
            <div class="jumbotron text-center bg-primary">
                <h1>Kwaliteit Instrument Toetsprogramma 2.0</h1>
                <p>De tool om uw Toetsprogramma te evalueren</p>
            </div>

            <div id="content" data-page="2">

            </div>
            <!-- about app container -->
            <div id="aboutkit" class="container-fluid">
            <div class="row">
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
                    <button class="btn btn-default btn-lg">Meer informatie</button>
                   
                </div>
                <div class="col-sm-4">
                        <i class="material-icons" id="firstIcon">feedback</i>
                </div>
            </div>
            </div>
            <!-- about company container-->
            <div id="aboutcompany" class="container-fluid bg-grey">
            <div class="row">
                    <div class="col-sm-4">
                            <i class="material-icons" id="secondIcon">business</i>
                    </div>
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
                            <button class="btn btn-default btn-lg">Meer informatie</button>
                           
                        </div>

            </div>

            </div>

            <!-- what is offered section -->
            <div id="services" class="container-fluid text-center">
            <h2> services</h2>
            <h4>Wat bieden wij</h4>
            <br>
            <div class="row slideanim">
                    <div class="col-sm-4">
                            <i class="material-icons md-96" id="">business</i>
                        <h4>POWER</h4>
                        <p>Lorem ipsum dolor sit amet..</p>
                    </div>
                    <div class="col-sm-4">
                            <i class="material-icons md-96" id="">business</i>
                        <h4>POWER</h4>
                        <p>Lorem ipsum dolor sit amet..</p>
                    </div>
                    <div class="col-sm-4">
                            <i class="material-icons md-96" id="">business</i>
                        <h4>POWER</h4>
                        <p>Lorem ipsum dolor sit amet..</p>
                    </div>

                </div>
                <br><br>
                <div class="row slideanim">
                <div class="col-sm-4">
                        <i class="material-icons md-96" id="">business</i>
                        <h4>POWER</h4>
                        <p>Lorem ipsum dolor sit amet..</p>
                    </div>
                    <div class="col-sm-4">
                            <i class="material-icons md-96" id="">business</i>
                        <h4>POWER</h4>
                        <p>Lorem ipsum dolor sit amet..</p>
                    </div>
                    <div class="col-sm-4">
                            <i class="material-icons md-96" id="">business</i>
                        <h4>POWER</h4>
                        <p>Lorem ipsum dolor sit amet..</p>
                    </div>

                </div>
            </div>

            <!-- Contact -->

            <div id="contactsection" class="container-fluid bg-grey">
                <h2 class="text-center">Contact</h2>
                <div class="row">
                    <div class="col-sm-5">
                        <p >We proberen zo snel mogelijk contact op te nemen met u.</p>
                       

                        
                        <p > <i class="material-icons " id="postalIcon">email</i> Postbus 14007,3508 SB, Utrecht</p>
                        <p > <i class="material-icons " id="emailIcon">message</i> <a href="mailto:lectoraatberoepsonderwijs@hu.nl">lectoraatberoepsonderwijs@hu.nl</a></p>
                        <p id="phonePart"> <i class="material-icons " id="phoneIcon">local phone</i> <a href="callto:088 - 481 13 43">088 - 481 13 43</a></p>
                        
                    </div>
                </div>

            </div>
            </div>

            @include('includes.footer') 
            

        

         
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/loaddynamiccontentfront.js') }}"></script>
    </body>
</html>
