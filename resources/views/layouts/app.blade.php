<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Oxygen|Signika" rel="stylesheet">
    <script src="https://use.fontawesome.com/899a2e27b0.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @yield('link-css')
</head>
<body>
    <div id="app">
            <header>
            <nav class="navbar navbar-default navbar-static-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        @if(Auth::check())
                            <a class="navbar-brand" href="#menu-toggle" id="menu-toggle"><i class="fa fa-list" aria-hidden="true"></i></a>
                            <a class="navbar-brand" href="{{ route('home') }}">
                                Mejenguitas
                            </a>
                        @endif
                        @if(!Auth::check())
                             <a class="navbar-brand" href="{{ route('/') }}">
                                Mejenguitas
                            </a>
                        @endif

                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @guest
                                <li><a href="{{ route('login') }}"><i class="fa fa-lock" aria-hidden="true"></i> Iniciar Sesi&oacute;n</a></li>
                                <li><a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Registro</a></li>
                            @else
                                <li><a href="{{ route('message.indexForUser') }}">Notificaciones <span class="badge">2</span></a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                               <i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar Sesi&oacute;n
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container">
             @if(Auth::check())
            <div id="wrapper" class="toggled">
                <div class="container-fluid">
                    <!-- Sidebar -->
                    <div id="sidebar-wrapper">
                        <div class="logo text-center">
                             <img src="{{ Auth::user()->url  }}" class=" center-block" alt="Logo" width="100px" height="100px">
                             <h4 id="nameUser">{{ Auth::user()->name }}</h4>
                             <div>
                                <a href="{{ route('user.edit', auth()->user()->id) }}" class="btn Add-friend">
                                  <i class="fa fa-pencil" aria-hidden="true"></i> Edit Profile
                                </a>
                              </div>
                         </div>
                        <ul class="sidebar-nav">
                            
                            <li>
                                <a href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"></i> Principal</a>
                            </li>
                            <li>
                                <a href="{{ route('matchs.matchsJoined') }}"><i class="fa fa-futbol-o" aria-hidden="true"></i> Mis Mejengas</a>
                            </li>
                            @if(auth()->user()->isMod())
                                <li>
                                    <a href="{{ route('matchs.mymatchs', auth()->user()->id) }}"><i class="fa fa-check-square-o" aria-hidden="true"></i> Mejengas Creadas</a>
                                </li>
                            @endif
                            @if(auth()->user()->requestHave(auth()->user()->id))        
                                <li>
                                    <a href="{{ route('requests.create') }}"><i class="fa fa-file-text" aria-hidden="true"></i> Solicitud Moderador</a>
                                </li>
                            @endif
                            @if(auth()->user()->isAdmin())
                                <li>
                                    <a href="{{ route('requests.index') }}"><i class="fa fa-files-o" aria-hidden="true"></i> Solicitudes Recibidas</a>
                                </li>
                            <li>
                                <a href="{{ route('historial.index') }}"><i class="fa fa-history" aria-hidden="true"></i> Historial</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    
                </div>
            </div>
            @endif
        </div>


            @yield('content')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/toggle.js')}}"></script>
    <script src="{{ asset('js/setHeight.js')}}"></script>
    @yield('scripts')
</body>
</html>
