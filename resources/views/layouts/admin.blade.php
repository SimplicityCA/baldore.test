<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Baldore') }}</title>
    <!-- Styles -->
    {!! Rapyd::styles(true) !!}
    <link href="/css/app.css" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
                    <a class="navbar-brand" href="{{ url('admin/home/') }}">
                        Baldore
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                      <li><a href="{{ url('admin/home/') }}">Home</a></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administradores<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ url('admin/users/') }}">Ver Administradores</a></li>
                          <li><a href="{{ url('admin/users/create') }}">Agregar Administrador</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ url('admin/consumers/') }}">Ver Usuarios</a></li>
                          <li><a href="{{ url('admin/consumers/create') }}">Agregar Usuario</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contactos<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ url('admin/contacts/') }}">Ver Contactos</a></li>
                          <li><a href="{{ url('admin/contacts/create') }}">Agregar Contacto</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contenidos<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ url('admin/contents/') }}">Ver Contenidos</a></li>
                          <li><a href="{{ url('admin/contents/create') }}">Agregar Contenido</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sorteos<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ url('admin/draws/') }}">Ver Sorteos</a></li>
                          <li><a href="{{ url('admin/draws/create') }}">Agregar Sorteo</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Empaques<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ url('admin/packages/') }}">Ver Empaques</a></li>
                          <li><a href="{{ url('admin/packages/create') }}">Agregar Empaque</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Imágenes<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ url('admin/pictures/') }}">Ver Imágenes</a></li>
                          <li><a href="{{ url('admin/pictures/create') }}">Agregar Imagen</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Noticias<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ url('admin/posts/') }}">Ver Noticias</a></li>
                          <li><a href="{{ url('admin/posts/create') }}">Agregar Noticia</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Productos<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ url('admin/products/') }}">Ver Productos</a></li>
                          <li><a href="{{ url('admin/products/create') }}">Agregar Producto</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Promociones<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ url('admin/promotions/') }}">Ver Promociones</a></li>
                          <li><a href="{{ url('admin/promotions/create') }}">Agregar Promoción</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recetas<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ url('admin/recipes/') }}">Ver Recetas</a></li>
                          <li><a href="{{ url('admin/recipes/create') }}">Agregar Receta</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tipos de Producto<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ url('admin/types/') }}">Ver Tipos de Productos</a></li>
                          <li><a href="{{ url('admin/types/create') }}">Agregar Tipo de Producto</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Imágenes del Home<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ url('admin/homepictures/') }}">Ver Imágenes del Home</a></li>
                          <li><a href="{{ url('admin/homepictures/create') }}">Agregar Imagen del Home</a></li>
                        </ul>
                      </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
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
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    <!-- Scripts -->
    <script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    {!! Rapyd::scripts() !!}
    @yield('stylesheets')
    @yield('scripts')
</body>
</html>