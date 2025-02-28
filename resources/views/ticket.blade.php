<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 70%;
  background: #f1f1f1;
}

form.example{
    max-width:30%;
    margin:auto;
    margin-top:5%;
}

form.example button {
  float: left;
  width: 30%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
@media all and (max-width: 900px) {
    form.example {
    max-width: 80%;
    margin: auto;
    margin-top: 5%;
  }
}
</style>
</head>
<body>
@include('layouts.headernew')
<section>
<div class="hero-image" style="height:30vh;">
  <div class="hero-text">

  </div>
<div>
</section>
 <form method="post" class="example" action="search" enctype="multipart/form-data">
{{ csrf_field() }}
  <center><h4><b>FIND YOUR TRAVEL TICKET HISTORY</b></h4></center>
  <input required type="text" placeholder="Enter your ticket number.." name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>


</body>
</html> 
