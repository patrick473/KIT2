<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
  
      <!-- Styles -->
     
      <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{ asset('css/main.css')}}" rel="stylesheet">


    </head>
    <body >
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark  ">


            <a class="navbar-brand " href="#">
                    <img src="{{ URL::asset('images/hu-logo.png') }}" width="30" height="30" class="d-inline-block align-top" alt="HU Logo">
                    Kennis Instrument Toetsprogramma
            </a>

            <!-- Opens and closes extendible link list on mobile -->
            <button class="navbar-toggler"
             type="button" data-toggle="collapse"
              data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" 
               aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

<!-- The actual menu -->

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            
            @if (Route::has('login'))
                    @auth
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ url('/home') }}">Home</a>
                        </li>
                    @else
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ route('register') }}">Register</a>
                    </li>
                    @endauth
            @endif
        </ul>
    </div>
            </nav>
       
            <div class="content">
                    
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        

           <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
