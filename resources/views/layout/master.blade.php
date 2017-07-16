<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ URL::to('/css/app.css') }}">
  <link rel="stylesheet" href="{{ URL::to('/css/style.css') }}">
  @yield('css-style')
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  </style>
</head>
<body>
@include('layout.header') 
<div class="container text-center">    
  @yield('content')
</div>
@include('layout.footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{URL::to('/js/style.js')}}"></script>
@yield('js-script')
</body>
</html>
