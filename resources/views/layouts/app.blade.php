
<!DOCTYPE html>

<html lang="{{ config('app.locale') }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     
         <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" >
                        {{ config('app.name', 'Laravel') }}
                    </a>




                </div>



                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        
                    </ul>
  



                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-left">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="loginusers">Login</a></li>
                              
                
                        @elseif(Request::is('*/edit'))
                            <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">
                                <a href="#"  data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                         </ul>

                                 @elseif(Request::is('cityvehiclemovement/*'))
                            <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">
                                <a href="#"  data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                         </ul>

                         @elseif(Request::is('vehicleinfos/*'))
                            <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">
                                <a href="#"  data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                         </ul>
                               @elseif(Request::is('changepassword'))
                            <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">
                                <a href="#"  data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                         </ul>



                           @elseif(Request::is('vehiclehandovers/*'))
                            <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">
                                <a href="#"  data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                         </ul>
                         @elseif(Request::is('vehiclemovement/*'))
                            <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">
                                <a href="#"  data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                         </ul>
                             @elseif(Request::is('vehicleservice/*'))
                            <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">
                                <a href="#"  data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                         </ul>

                        @else

 

                            <li class="dropdown">
                                <a href="#" class="" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Mantainance <span class="caret"></span>
                                </a>               
                                <ul class="dropdown-menu" role="menu">        
                                        
                                  @if (Auth::user()->suppliers=='yes')
                                   <li class=""><a href="suphome">Suppliers</a></li>
                                   @endif
                                     @if (Auth::user()->garages=='yes')
                                    <li class=""><a href="garagehome">Garage</a></li>
                                     @endif
                                     @if (Auth::user()->fuelstations=='yes')
                                    <li class=""><a href="FuelStation">FuelStation</a></li>
                                    @endif
                                    @if (Auth::user()->fuelprices=='yes')
                                    <li class=""><a href="FuelTypesandPrice">Fuel Types and Price</a></li>
                                    @endif
                                    @if (Auth::user()->vehicletypes=='yes')
                                    <li class=""><a href="Vehicle Types">Vehicle Types</a></li>
                                   @endif

                                   @if (Auth::user()->vehicletypes=='yes')
                                    <li class=""><a href="vehicledrivershome">Vehicle Drivers</a></li>
                                    @endif

                                    @if (Auth::user()->vehicletypes=='yes')

                                    <li class=""><a href="vehicleinfohome">VehicleInfo</a></li>
                                    @endif

                                       @if (Auth::user()->vehicletypes=='yes')

                                    <li class=""><a href="abysiniahome">Add Abysinia Card</a></li>
                                    @endif
                                    @if (Auth::user()->vehicletypes=='yes')
                                     <li class=""><a href="vehiclehandover">Vehicle Hand Over</a></li>
                                     @endif
                              

                                </ul>
                            </li>

                                  <li class="dropdown">
                                <a href="#" class="" data-toggle="dropdown" role="button" aria-expanded="false">
                                User <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                @if (Auth::user()->userregisters=='yes')
                                    <li><a href="registerusers">Register</a></li>
                                    @endif

                                @if (Auth::user()->rolesdef=='yes')
                                     <li><a href="rolehome">Role</a></li>

                                      <li><a href="passwordreset">Password Reset</a></li>
                                     @endif
                                   </li>

                                </ul>
                            </li>
                             <li class="dropdown">
                                <a href="#" class="" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Order <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                @if (Auth::user()->fuelorders=='yes')
                                   <li><a href="orderfuelhome">Fuel,Oil For Field Work</a></li>

                                   <li><a href="orderfuelcityhome">Fuel,Oil For City Work</a></li>
                                @endif

                                @if (Auth::user()->vehiclesevices=='yes')
                                    <li><a href="vehicleservicehome"> Vehicle Maintainance</a></li>
                                @endif

                                @if (Auth::user()->vehiclemovements=='yes')
                                    <li><a href="vehiclemovhome">Daily Vehicle Movement For Field</a></li>

                                    <li><a href="cityvehiclemovhome">Daily Vehicle Movement For City(Abysinia)</a></li>
                                @endif
                                </ul>
                            </li>

                             <li class="dropdown">
                                <a href="#" class="" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Report<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                   
                                    
                                   @if (Auth::user()->reports=='yes')
                                     <li><a href="listsuppliers">List Of Suppliers</a></li>
                                    <li> <a href="/vehiclemovreports"  >Vehicle Movement Reports</a></li>

                                       <li> <a href="/vehicleservicereports"  >Vehicle Service Reports</a></li>
                                    @endif
                                    
                                </ul>
                               
                            </li>
                         

                          

                            </ul>
                             
                            <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">
                                <a href="#"  data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                  
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                         
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

       
   
    <script src="{{ asset('js/search.js') }}"></script>
    

</body>
</html>
