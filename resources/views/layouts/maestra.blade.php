<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/cover.css') }}" rel="stylesheet">
   {{--   <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    @livewireStyles
</head>
<body class="text-center">
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
          <div class="inner">
            <h3 class="masthead-brand">Peluquería Yireth</h3>
            <nav class="nav nav-masthead justify-content-center">
              <a class="nav-link active" href="#">Inicio</a>
              <a class="nav-link" href="{{ route('login') }}">Entrar</a>
              <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
            </nav>
          </div>
        </header>
  
        <main role="main" class="inner cover">
            @yield('content')
        </main>
  
        <footer class="mastfoot mt-auto">
          <div class="inner">
            <p>&copy; <a href="#">2021</a>, by <a href="#">@aeosoft</a>.</p>
          </div>
        </footer>
      </div>
    
      {{--    <main class="py-4">
            @yield('content')
        </main>--}}
    
     <!-- Scripts -->
   {{--  <script src="{{ asset('js/app.js') }}" defer></script> --}}
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
