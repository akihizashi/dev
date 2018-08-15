<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ URL::asset('/css/offcanvas.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <title>Web develope</title>
  <style>
      html, body {
          background-color: #fff;
          color: #636b6f;
          font-family: 'Quicksand', sans-serif;
          font-weight: 100;
          height: 100vh;
          margin: 0;
      }
      .feather {
          width: 14px;
          height: 14px
      }
  </style>
</head>
<body>
  <div class="container w-75">
    @yield('content')
  </div>
  @include('layouts.footer')
</body>
</html>
