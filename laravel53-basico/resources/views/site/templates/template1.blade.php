<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{$title or 'Curso'}}</title>

  </head>
  <body>
      @yield('content')
      @stack('scripts')
  </body>
</html>
