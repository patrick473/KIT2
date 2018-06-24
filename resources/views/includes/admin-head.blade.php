<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark  " id="navbar" data-userid="{{Auth::id()}}">


            <a class="navbar-brand " href="{{route('admin.home')}}">
                    <img src="{{ URL::asset('images/hu-logo.png') }}" width="30" height="30" class="d-inline-block align-top" alt="HU Logo">
                    Kwaliteit Instrument Toetsprogramma
            </a>
            <title>Kwaliteits Isntrument Toetsprogramma | Hogeschool Utrecht</title>
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
                                            {{ Auth::user()->username }} <span class="caret"></span>
                                        </a>
        
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('admin.home') }}"
                                                >
                                                 Home 
                                             </a>
                                            <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                                {{ __('Logout') }}
                                            </a>
        
                                          
                                        </div>
                                    </li>
                     
                            
                        @endguest
                    </ul>
                </div>
          
        </nav>