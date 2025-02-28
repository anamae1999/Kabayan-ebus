<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <link href="{{ asset('back-end/assets/css/main.css" rel="stylesheet')}}" />
       <link href="{{ asset('back-end/assets/demo/main.css" rel="stylesheet')}}" />
    </head>
@include('layouts.headernew')
<section>
<div class="hero-image" style="height:30vh;">
  <div class="hero-text">

  </div>
<div>
</section>
<section class="content content-container" style="width:100%;">
     <h1>BUSES IN METRO MANILA</h1>
     <h1 class="term-title">Consurtion TERMINAL <br><p>Address: Doroteo Jose Manila</p></h1>
     @include('admin.message')
    <div class="grid-container">
      @if ( count($bus) > 0 )
          @foreach($bus as $key => $data)
             @php
               $busdate = date('m/d/Y',strtotime($data->bus_departuredate));
               $date_now = date("m/d/Y",strtotime('-1 day'));
             @endphp
            @if($data->bus_terminal_id == 1 &&  $busdate >= $date_now && $data->bus_arrival_trigger!=1 )
             <div>
                <img style="max-width:100;" src="https://www.freeiconspng.com/uploads/bus-png-25.jpg">
                <h2>{{ $data->bus_name }}</h2>
                <input type="hidden" class="bname" value="{{ $data->bus_name }}">
                <h3>{{ $data->bus_code }}</h3>
                <table>
                  <tr>
                    <td><p>Price Per Ticket: <br><b class="red">{{ $data->bus_price}}</b></p></td>
                    <td><p>Origin: <br><b>{{ $data->bus_origin }}</b></p></td>
                  </tr>
                  <tr>
                    <td><p>Departure Time: <br><b class="red">{{date('h:i A', strtotime( $data->bus_departuretime))}}</b></p></p></td>
                    <td><p>Destination: <br><b>{{ $data->bus_destination }}</b></p></td>
                  </tr>
                  <tr>
                    <td><p>Available Seats: <br><b class="red">{{ $data->total_seats}}</b></p></td>
                    <td><p>Departure Date: <br><b>{{ date('F d, Y', strtotime($data->bus_departuredate))}}</b></p></td>
                  </tr>
                  <tr>
                    <td>
                        @if($data->bus_stop_trigger == 1)
                        <a href="booking/{{ $data->bus_id }}"><button class="myBtn" id="myBtn">Book Now</button></a>
                        @else
                        <button class="btn btn-sm btn-success " disable>Not Available</button>
                        @endif
                    </td>
                    <td>
                    
                    </td>
                  </tr>
                  <tr><td></td><td></td></tr>
                  <tr><td></td><td></td></tr>
                </table>        
             </div>
            @endif
          @endforeach
      @endif 
    </div>
     <h1 class="term-title">BBL Terminal <br><p>Address: LRT Buendia Manila</p></h1>
          @include('admin.message')
   <div class="grid-container">
      @if ( count($bus) > 0 )
          @foreach($bus as $key => $data)
             @php
               $busdate = date('m/d/Y',strtotime($data->bus_departuredate));
               $date_now = date("m/d/Y",strtotime('-1 day'));
             @endphp
            @if($data->bus_terminal_id == 2 &&  $busdate >= $date_now && $data->bus_arrival_trigger!=1 )
                         <div>
                <img style="max-width:100;" src="https://www.freeiconspng.com/uploads/bus-png-25.jpg">
                <h2>{{ $data->bus_name }}</h2>
                <input type="hidden" class="bname" value="{{ $data->bus_name }}">
                <h3>{{ $data->bus_code }}</h3>
                <table>
                  <tr>
                    <td><p>Price Per Ticket: <br><b class="red">{{ $data->bus_price}}</b></p></td>
                    <td><p>Origin: <br><b>{{ $data->bus_origin }}</b></p></td>
                  </tr>
                  <tr>
                    <td><p>Departure Time: <br><b class="red">{{date('h:i A', strtotime( $data->bus_departuretime))}}</b></p></p></td>
                    <td><p>Destination: <br><b>{{ $data->bus_destination }}</b></p></td>
                  </tr>
                  <tr>
                    <td><p>Available Seats: <br><b class="red">{{ $data->total_seats}}</b></p></td>
                    <td><p>Departure Date: <br><b>{{ date('F d, Y', strtotime($data->bus_departuredate))}}</b></p></td>
                  </tr>
                  <tr>
                    <td>
                         @if($data->bus_stop_trigger == 1)
                        <a href="booking/{{ $data->bus_id }}"><button class="myBtn" id="myBtn">Book Now</button></a>
                        @else
                        <button class="btn btn-sm btn-success " disable>Not Available</button>
                        @endif
                        
                    </td>
                    <td>
                    
                    </td>
                  </tr>
                  <tr><td></td><td></td></tr>
                  <tr><td></td><td></td></tr>
                </table>        
             </div>
            @endif
          @endforeach
      @endif 
    </div>
         <h1 class="term-title">Laguna Starbus Terminal <br><p>Address: 1441 Valenzuela City, Metro Manila</p></h1>
          @include('admin.message')
    <div class="grid-container">
      @if ( count($bus) > 0 )
          @foreach($bus as $key => $data)
             @php
               $busdate = date('m/d/Y',strtotime($data->bus_departuredate));
               $date_now = date("m/d/Y",strtotime('-1 day'));
             @endphp
            @if($data->bus_terminal_id == 3 &&  $busdate >= $date_now && $data->bus_arrival_trigger!=1 )
            <div>
                <img style="max-width:100;" src="https://www.freeiconspng.com/uploads/bus-png-25.jpg">
                <h2>{{ $data->bus_name }}</h2>
                <input type="hidden" class="bname" value="{{ $data->bus_name }}">
                <h3>{{ $data->bus_code }}</h3>
                <table>
                  <tr>
                    <td><p>Price Per Ticket: <br><b class="red">{{ $data->bus_price}}</b></p></td>
                    <td><p>Origin: <br><b>{{ $data->bus_origin }}</b></p></td>
                  </tr>
                  <tr>
                    <td><p>Departure Time: <br><b class="red">{{date('h:i A', strtotime( $data->bus_departuretime))}}</b></p></p></td>
                    <td><p>Destination: <br><b>{{ $data->bus_destination }}</b></p></td>
                  </tr>
                  <tr>
                    <td><p>Available Seats: <br><b class="red">{{ $data->total_seats}}</b></p></td>
                    <td><p>Departure Date: <br><b>{{ date('F d, Y', strtotime($data->bus_departuredate))}}</b></p></td>
                  </tr>
                  <tr>
                    <td>
                         @if($data->bus_stop_trigger == 1)
                        <a href="booking/{{ $data->bus_id }}"><button class="myBtn" id="myBtn">Book Now</button></a>
                        @else
                        <button class="btn btn-sm btn-success " disable>Not Available</button>
                        @endif
                    </td>
                    <td>
                    
                    </td>
                  </tr>
                  <tr><td></td><td></td></tr>
                  <tr><td></td><td></td></tr>
                </table>        
             </div>
            @endif
          @endforeach
      @endif 
    </div>

          @foreach($bus as $key => $data)
                @if ( $data->bus_terminal_id == 11)
             <h1 class="term-title">New Terminal Here</h1> 
             <!--Add terminal Name and Adress Here-->
          @include('admin.message')
    <div class="grid-container">
             @php
               $busdate = date('m/d/Y',strtotime($data->bus_departuredate));
               $date_now = date("m/d/Y",strtotime('-1 day'));
             @endphp
            @if($data->bus_terminal_id == 11 &&  $busdate >= $date_now && $data->bus_arrival_trigger!=1 )
            <div>
                <img style="max-width:100;" src="https://www.freeiconspng.com/uploads/bus-png-25.jpg">
                <h2>{{ $data->bus_name }}</h2>
                <input type="hidden" class="bname" value="{{ $data->bus_name }}">
                <h3>{{ $data->bus_code }}</h3>
                <table>
                  <tr>
                    <td><p>Price Per Ticket: <br><b class="red">{{ $data->bus_price}}</b></p></td>
                    <td><p>Origin: <br><b>{{ $data->bus_origin }}</b></p></td>
                  </tr>
                  <tr>
                    <td><p>Departure Time: <br><b class="red">{{date('h:i A', strtotime( $data->bus_departuretime))}}</b></p></p></td>
                    <td><p>Destination: <br><b>{{ $data->bus_destination }}</b></p></td>
                  </tr>
                  <tr>
                    <td><p>Available Seats: <br><b class="red">{{ $data->total_seats}}</b></p></td>
                    <td><p>Departure Date: <br><b>{{ date('F d, Y', strtotime($data->bus_departuredate))}}</b></p></td>
                  </tr>
                  <tr>
                    <td>
                         @if($data->bus_stop_trigger == 1)
                        <a href="booking/{{ $data->bus_id }}"><button class="myBtn" id="myBtn">Book Now</button></a>
                        @else
                        <button class="btn btn-sm btn-success " disable>Not Available</button>
                        @endif
                    </td>
                    <td>
                    
                    </td>
                  </tr>
                  <tr><td></td><td></td></tr>
                  <tr><td></td><td></td></tr>
                </table>        
             </div>
            @endif
                </div>
                      @endif 
          @endforeach


@include('addpass')

</section>
<script>
var modal = document.getElementById("myModal");
var btn = document.getElementsByClassName("myBtn");
var span = document.getElementsByClassName("close")[0];


var i;
  for (i = 0; i < btn.length; i++) {
    btn[i].onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
  }

</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    // Get value on button click and show alert

 

       $('#lstatus').change(function() {
        var lstat=$('#lstatus').val();
         var priceo=$(this).attr("data-price");
         var percentage = price * 0.1;
         var newp = price - percentage;

          if(lstat != 'adult'){
                  $( "#total" ).val( newp );
                  $( "#newtot" ).text( newp );
                  
          }else{
             $( "#total" ).val( price );
             $( "#newtot" ).text( newp );
          }
       });
    
});
</script>


<!-- <script>
  window.onload = function() {  // reload file every second
    setInterval(function() { location.reload(); } , 1000);
  };
</script> -->
    </body>
</html>
