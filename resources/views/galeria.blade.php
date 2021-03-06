<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }} ">
    <meta name="author" content="Sergi Tur Badenas - acacha.org">

    <meta property="og:title" content="Adminlte-laravel" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }}" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org/" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x600.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x314.png" />
    <meta property="og:sitename" content="demo.adminlte.acacha.org" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@acachawiki" />
    <meta name="twitter:creator" content="@acacha1" />

    <title>Findesin</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

<div id="app">
    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><b>Findesin</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <!--<li class="active"><a href="#home" class="smoothScroll">inicio</a></li>-->

                    <!--<li class="active"><a href="#portada" class="smoothScroll">Home</a></li>-->
                    <li><a href="{{url('http://localhost:8000/#qs')}}" class="smoothScroll">Sobre nosotros</a></li>
                    <li><a href="{{url('http://localhost:8000/#objetivos')}}" class="smoothScroll">Objetivos</a></li>
                    <li><a href="{{url('http://localhost:8000/#proyectos')}}" class="smoothScroll">Proyectos</a></li>
                    <li><a href="{{url('http://localhost:8000/#showcase')}}" class="smoothScroll">Galería</a></li>
                    @if (Auth::check())
                        <li class=""><a href="{{url('/donations')}}" class="smoothScroll">Donaciones</a></li>
                        <li class=""><a href="{{url('/transactions')}}" class="smoothScroll">Transacciones</a></li>
                        <li class=""><a href="{{url('http://localhost/moodle/login/index.php')}}" class="smoothScroll">Moodle</a></li>
                        @if(auth()->user()->rol_id == 1)
                            <li class="{{isset($integrantesActive) ? $integrantesActiveor : ''}}"><a href="{{url('/integrantes')}}" class="smoothScroll">CRUD Integrantes</a></li>
                        @endif
                    @endif

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Inicia sesion</a></li>
                        <li><a href="{{ url('/register') }}">Registrate</a></li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
<br>
<br>
<br>

   <div class="container">
        <div class="col-md-12">
            @foreach($girls as $key => $girl)
                @if($key == 0 )
                <div class="row">
                @endif
                    <div class="col-md-4" style="padding:0; height:300px;">
                        <img width="100%" style="height:70%;" src="{{Storage::url("$girl->int_foto")}}" alt="">
                            <h3 style="text-align:center;">Nombre: <span>{{$girl->int_nombre}}</span></h3>

                    </div>
                @if((($key+1)%4 == 0 && $key != 0) || $loop->last)
                </div>
                @if(!$loop->last)
                    <div class="row">
                @endif
                @endif
            @endforeach
        </div>
    </div>

</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/smoothscroll.js') }}"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>
