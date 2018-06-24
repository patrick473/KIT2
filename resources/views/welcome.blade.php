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
           




    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @include('scripts.startpagecontentscript')
    <!--<script src="{{ asset('js/loaddynamiccontentfront.js') }}"></script>-->
    </body>
</html>
