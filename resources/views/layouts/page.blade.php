<!DOCTYPE html>
<html>
  <head>
    <link href="/css/app.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
  </head>
  <body>
    @include('layouts.nav')
    <div class='content'>
      @yield('content')
    </div>
  </body>
</html>
