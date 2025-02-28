<style>
   .booking div.elem-group {
  margin: 20px 0;
}
.booking form{
    margin-top:30px !important;
    max-width:50%;
    margin:auto;
      box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);
      padding:30px;
      background-color:#fff;
}

.booking div.elem-group.inlined {
  width: 49%;
  display: inline-block;
  float: left;
  margin-left: 1%;
  margin-top:5px;
}

.booking label {
  display: block;
  font-family: 'Inter';
  padding-bottom: 10px;
  font-size: 15px;
  color:#00468f;
}

.booking input, select, textarea {
  border-radius: 2px;
  outline:none;
  box-sizing: border-box;
  font-size: 15px;
  font-family: 'Inter';
  width: 95%;
  padding: 10px;
}

.booking div.elem-group.inlined input {
  width: 95%;
  display: inline-block;
}

.booking textarea {
  height: 70px;
}
.booking h1,tr,td,th,p {
   font-family: 'Inter';
   color:#00468f;
}

.booking h1 {
   font-family: 'Inter';
   color:#00468f;
   font-size:30px !important;
   margin-top:25px;
   text-transform:uppercase;
   font-weight:bold;
}
.booking hr {
  border: 1px dotted #ccc;
}

.booking button {
  height: 50px;
  background: #00468f;
  border: none;
  color: white;
  font-size: 15px;
  font-family: 'Inter';
  border-radius: 4px;
  cursor: pointer;
  padding:10px 30px;
}

.booking button:hover {
  border: 2px solid #00468f;
}
</style>
@include('layouts.headernew')
<div class="booking">
 <form method="post" action="addpass" enctype="multipart/form-data">
    {{ csrf_field() }}
         <h1 class="term-title">TRIP SUMMARY</h1>
    <table>
    @foreach($bus as $datan)
      <tr>
        <td class="tr-width-one">Bus Name:</td>
        <td class="tr-width"><span class="bold">{{$datan->bus_name}}</span></td>
      </tr>
      <tr>
        <td class="tr-width-one">Origin:</td>
        <td class="tr-width"><span class="bold" id="borigin">{{$datan->bus_origin}}</span></td>
      </tr>
      <tr>
        <td class="tr-width-one">Destination:</td>
        <td class="tr-width"><span class="bold" id="borigin">{{$datan->bus_destination}}</span></td>
      </tr>
      <tr>
        <td class="tr-width-one">Departure Date:</td>
        <td class="tr-width"><span class="bold" id="departure">{{date('F d, Y', strtotime($datan->bus_departuredate))}}</span></td>
      </tr>
      <tr>
        <td class="tr-width-one">Departure Time:</td>
        <td class="tr-width"><span class="bold" id="departure-time">{{date('h:i A', strtotime($datan->bus_departuretime))}}</span></td>
      </tr>
      <tr>
        <td class="tr-width-one">Price Per Ticket:</td>
        <td class="tr-width"><span class="bold" id="price">{{$datan->bus_price}}</span></td>
      </tr>
      @endforeach
    </table>
    <h1 class="term-title">PASSENGER DETAILS</h1>
  <div class="elem-group inlined">
    <input class="form-control" type="text" id="name" name="fname"  pattern=[A-Z\sa-z]{3,20} required placeholder="First Name">
    </div>
     <div class="elem-group inlined">
    <input class="form-control" type="text" id="name" name="lname"  pattern=[A-Z\sa-z]{3,20} required placeholder="Last Name">
  </div>
 <div class="elem-group inlined">
    <input class="form-control" type="email" id="name" name="email"   required placeholder="Email">
    </div>
  <div class="elem-group inlined">
    <input class="form-control" placeholder="Contact" type="tel" id="phone" name="contact" placeholder=""  required>
  </div>

  <div class="elem-group inlined">
     <select class="form-control" name="gender"><option>Select Gender</option><option value="Male">Male</option><option value="Female">Female</option></select>
  </div>
 <div class="elem-group inlined">
      <label for="exampleInputEmail1">Birth Date</label> 
    <input class="form-control" placeholder="Birth Date" type="date" id="name" name="visitor_name"  required>
    </div>
     <div class="elem-group">
    <input class="form-control" placeholder="Address" type="text" id="name" name="address"  required>
    </div>
     <div class="elem-group inlined">
    <input class="form-control"  placeholder="Age" type="text" id="name" name="age"  required>
    </div>
         <div class="elem-group inlined">
  <select class="form-control" required  id="lstatus" name="lstatus"><option>Select Passenger</option><option value="adult">Adult</option><option value="senior">Senior</option><option value="child">PWD</option><option value="student" >Student</option></select>
  <p style="display:none;;" id="price">></p>
    </div>
             <div class="elem-group inlined">
   <select required class="form-control"  name="mode"><option>Payment Option</option><option value="gcash">Gcash</option><option value="bank Transfer">Bank Transfer</option></select>
    </div>
    
                 <div class="elem-group inlined">
    <select required class="form-control" name="seatnumber" class="form-control">
                                    <option value="">Select Seat Number</option>
                                    @foreach ($seats as $seat)
                                     @if($seat->seat_status != 1 && $seat->bus_seat_code == $datan->bus_code)
                                    <option value="{{$seat->id}}">Seat #: <b>{{$seat->seat_number}}</b></option>
                                    @endif
                                    @endforeach
               </select>
    </div>

  <div class="elem-group">
    <p style="font-size: 20px;" >Total: <b style="color:red;">PHP <span id="newtot"></span><input type="hidden"  class="form-control" name="total" style="color:red;font-size: 20px;border:none;padding-left: 0px;" id="total" readonly></p>
 </div>
 
   <p><input  style="width:5%;" type="checkbox"  required>
    I Agree to the <a target="_blank" href="http://kabayanebus.com/kabayanebus_termsagreement.pdf"><b style="color:red;" >terms and agreement</b></a>.</p>
 <input type="hidden" name="busid" id="bus_idn">
 <input type="hidden" name="busname" id="busname">
  <input type="hidden" name="terid" id="ter_idn">
 <p id="bus_id" style="display:none;">{{ $datan->bus_id}}</p>
 <p id="bus_name" style="display:none;">{{ substr($datan->bus_name,0,2) }}</p>
 <p id="terminal_id" style="display:none;">{{ $datan->bus_terminal_id}}</p>

  <center><button type="submit">Book Now</button></center>
</form>
<h1 class="term-title">Bus Layout</h1>
<img width="80%" src="https://i.ibb.co/3FfvnsY/img-standard.jpg">
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    var price= $('#price').text(); 
    var bus_id= $('#bus_id').text();
    var terminal= $('#terminal_id').text();
    var bus_name= $('#bus_name').text();
    
    $( "#newtot" ).text( price );
     $( "#bus_idn" ).val( bus_id );
     $( "#ter_idn" ).val( terminal );
     $( "#busname" ).val( bus_name );
//   alert(bus_id);
   $('#lstatus').change(function() {
        var lstat=$('#lstatus').val();
        var price= $('#price').text();
         var percentage = price * 0.1;
         var newp = price - percentage;
        //  alert(price);

          if(lstat != 'adult'){
                  $( "#total" ).val( newp );
                  $( "#newtot" ).text( newp );
                  
          }else{
             $( "#total" ).val( price );
             $( "#newtot" ).text( price );
          }
       });
});
</script>
