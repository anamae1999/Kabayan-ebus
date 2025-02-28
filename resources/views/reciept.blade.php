<style>
  .main {
  color: #00cc65;
  width: 500px;
  padding-left: 25px;
 padding:30px;
 width: 600px;margin:auto;background-color:#fff;
 box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
 font-family: 'Inter';
 margin-top:50px;
}

.main p{
  margin:0px;
}
</style>
<!-- partial:index.partial.html -->
@include('layouts.headernew')
<div id="html-content-holder" class="main">
       
          @foreach($data as $datan )
             <div style="color: #323232;font-size: 16px;">
              <h2>KABAYAN-E-BUS</h2>
              <h3 style="color: #323232;">YOUR TICKET </h3>
              @foreach($bus as $item)
                  @if($item->bus_id == $datan->passenger_bus_id)
                  <p>Bus Name: <b>{{$item->bus_name}}</b> </p>
                   <p>Bus Code: <b>{{$item->bus_code}}</b> </p>
                    <p>Ticket Number:<span style="text-transform:uppercase;font-weight:bold;">{{ $datan->passenger_ticket }}</span></p>
                    @foreach($seat as $iteme)
                        @if($iteme->id == $datan->passenger_seat_id)
                    <p>Seat Number:{{  $iteme->seat_number }}</p>
                       @endif
                    @endforeach
                     <p>Departure Date:{{ date('F d, Y', strtotime($item->bus_departuredate))}}</p>
                     <p>Departure Time:{{ date('h:i A', strtotime($item->bus_departuretime)) }}</p>
                      @if ( count($slight)>0) 
                      @foreach($slight as $itemf)
                      @if($item->bus_id == $itemf->bus_id )
                      
                      @php
                            $departure = $item->bus_departuretime;
                            $s1 = $itemf->s1;
                            $s2 = $itemf->s2;
                            $s3 = $itemf->s3;
                            $s4 = $itemf->s4;
                            $s5 = $itemf->s5;
                            $s6 = $itemf->s6;
                            $s7 = $itemf->s7;
                            $s8 = $itemf->s8;
                            $s9 = $itemf->s9;
                            $s10 = $itemf->s10;
                            $sd = $itemf->sd;
    
                            $time = $itemf->s1;
                            $time2 = $itemf->s2;

                            $s1t = strtotime($s1)-strtotime("00:00");
                            $s2t = strtotime($s2)-strtotime("00:00");
                            $s3t = strtotime($s3)-strtotime("00:00");
                            $s4t = strtotime($s4)-strtotime("00:00");
                            $s5t = strtotime($s5)-strtotime("00:00");
                            $s6t = strtotime($s6)-strtotime("00:00");
                            $s7t = strtotime($s7)-strtotime("00:00");
                            $s8t = strtotime($s8)-strtotime("00:00");
                            $s9t = strtotime($s9)-strtotime("00:00");
                            $s10t = strtotime($s10)-strtotime("00:00");
                            $sdt = strtotime($sd)-strtotime("00:00");
                            $result1 = date("H:i",strtotime($s1)+$s2t+$s3t+$s4t+$s5t+$s6t+$s7t+$s8t+$s9t+$s10t+$sdt);
                            $totaltravel = strtotime($result1)-strtotime("00:00");
                            $arrival = date('h:i A',strtotime($departure)+$totaltravel);
                      @endphp
                        <p>Estimated Arrival Time:{{$arrival}}</p>
                      @endif
                      @endforeach
                      @else
                      <p>Estimated Arrival Time: Not Available </p>
                      @endif
                  @endif
              @endforeach
             
                   


              <p></p>
              <h3>PERSONAL INFORMATION</h3>
                <p>{{ $datan->passenger_fname }} {{ $datan->passenger_lname }}</p>
                <p>{{ $datan->passenger_address }}</p> 
                <p>{{ $datan->passenger_email }}</p> 
                <p>{{ $datan->passenger_contact }}</p>
                <p>{{ $datan->passenger_age }} Years Old</p>  
                <h3>TOTAL: {{ $datan->passenger_total }}</h3>   

                <p>Payment Instruction: Please do send your payment in account number below:and send as email in kabayanebus@gmail.com or call us at 09332222334. Present this ticket to the bus conductor.</p><br>
                
                <p><b>PAY HERE:</b></p>
                <p>BPI-233443333445</p>  
                <p>GCASH-09123456678</p>
                <img width="100px" src="https://i.ibb.co/TtCqw8c/KABAYAN-E-Bus-QR.png">
             </div>
          @endforeach

    </div>
    <center style="margin-top:30px;"><a id="btn-Convert-Html2Image" href="#">Save your Ticket</a></center>
    <br />
    <div id="previewImage" style="display: none;">
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script>
  $(document).ready(function () {
            var element = $("#html-content-holder"); // global variable
            var getCanvas; // global variable

            html2canvas(element, {
                onrendered: function (canvas) {
                    $("#previewImage").append(canvas);
                    getCanvas = canvas;
                }
            });

            $("#btn-Convert-Html2Image").on('click', function () {
                var imgageData = getCanvas.toDataURL("image/png");
                // Now browser starts downloading it instead of just showing it
                var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
                $("#btn-Convert-Html2Image").attr("download", "your_pic_name.png").attr("href", newData);
            });
        });
</script>

