<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @yield('cdn')
  {{-- Includiamo gli assets con la direttiva @vite --}}
  @vite('resources/js/app.js')

  <title>{{ env('APP_NAME') }} - @yield('title')</title>
</head>
<body>
  @include('partials._header')

  <main>
    @yield('main-content')
  </main>
  
  @include('partials._footer')

  @yield('modals')

</body>
</html>



