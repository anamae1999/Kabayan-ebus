<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="{{ asset('back-end/assets/demo/demo.css" rel="stylesheet')}}" />
     <link href="{{ asset('css/main.css" rel="stylesheet')}}" />
     <link href="{{ asset('back-end/assets/css/material-dashboard.css?v=2.1.1')}}" rel="stylesheet" />
      <link href="{{ asset('back-end/assets/css/main.css?v=2.1.1')}}" rel="stylesheet" />

</head>
<body>
<header>
<div class="header">
  <a href="http://kabayanebus.com/" class="logo" ><img style="max-width:120px;" src='http://kabayanebus.com/Logo.png'></a>
  <div class="header-right">
    <a href="{{ url('/') }}">Home</a>
    <a href="http://kabayanebus.com/ticket">Ticket</a>
    <a href="{{ route('login') }}">Login</a>
  </div>
</div>
</header>

</html>
