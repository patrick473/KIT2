<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
<body>
    

        <!-- NAVBAR -->

        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark  ">


            <a class="navbar-brand " href="#">
                    <img src="{{ URL::asset('images/hu-logo.png') }}" width="30" height="30" class="d-inline-block align-top" alt="HU Logo">
                    Kwaliteit Instrument Toetsprogramma
            </a>

            <!-- Opens and closes extendible link list on mobile -->
            <button class="navbar-toggler"
             type="button" data-toggle="collapse"
              data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" 
               aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Authentication Links. do not touch this-->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                        
                                <li class="nav-item dropdown show">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
        
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
        
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                     
                            
                        @endguest
                    </ul>
                </div>
          
        </nav>


<!-- Start of main content -->



        <main class="contentSection">
            @yield('content')
        </main>

 

        <footer class="text-muted">
            <div class="container">
              <p class="float-right">
                <a href="#">Back to top</a>
              </p>
              <p>Album example is © Bootstrap, but please download and customize it for yourself!</p>
              <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
            </div>
          </footer>
                      


            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
