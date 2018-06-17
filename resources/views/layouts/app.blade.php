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

       @include('includes.head')


<!-- Start of main content -->

        
        <div class="contentSection ">

            <div class="row">
                <div class="sideBarSection col-sm-2">
                    @if(Auth::check())
                        @include('includes.sidebar')
                    @endif
                    </div>
                <div class="mainContentSection col-sm-10">
                    @include('includes.who')
            @yield('content')
                </div>
            </div>
        </div>

 
<!-- footer -->
        
             @include('includes.footer')         


            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="{{ asset('js/bootstrap.min.js') }}"></script>
            @yield('extrascripts')
</body>
</html>
