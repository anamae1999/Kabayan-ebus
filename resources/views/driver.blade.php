
@extends('layouts.header')
@section('content') 
@include('admin.message')
<body onload="startTime()">
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                        
                <div class="card-body" >
                  <div class="table-responsive" style="height:100%;background-color:#fff;text-align: center;">
                  <p style="padding-top:50px;color:#00468f;padding-bottom:15px;">Your Current Time</p>
                                        <p>{{ date('F d, Y', time()) }}</p>
                 <div id="txt" style="font-size:60px;color:#00468f;font-weight:bold;"></div>
            @if ( count($data) > 0 ) 
                   @foreach($data as $datan)
                   @if($datan->assign_driver == Auth::user()->id || $datan->assignn_codoctor == Auth::user()->id)
                    <table class="table driver-tab">
                      <thead class=" text-primary">
                      <!-- <th>ID</th> -->
                    <th>Bus Code</th>
                    <th>Passenger</th>
                    <th>Origin</th>
                    <th>Destination</th>
                     <th>Departure Date</th>
                     <th>Departure Time</th>
                     <th>Arrival</th>
                     <th>Distance</th>
                     <th>Action</th>
                    </thead>
                    <tbody>
                       <td>{{$datan->bus_code}}</td>
                        <td>{{$datan->bus_name}}</td>
                         <td>{{$datan->bus_origin}}</td>
                          <td>{{$datan->bus_destination}}</td>
                           <td>{{date('F d, Y', strtotime($datan->bus_departuredate))}}</td>
                            <td>{{$datan->bus_departuretime}} </td>
                            @if(!empty($datan->arrival_time))
                              @php 
                            $departure = $datan->bus_departuretime;
                            $arrivaltrigger = $datan->arrival_time;
                                   
                                     $totaltravel =  strtotime($departure) - strtotime($arrivaltrigger);
                            $hours      = (floor($totaltravel / 60 / 60));
                            $minutes    = round(($totaltravel - ($hours * 60 * 60)) / 60);
                            $a = ':';
                            $b = abs($hours);
                            $c = abs($minutes);
                            $timen= $b.$a.$c; 
                            
                            
                            
                            $hour_one = $departure;
                            $hour_two = $timen;
                            $h =  strtotime($hour_one);
                            $h2 = strtotime($hour_two);
                            
                            $minute = date("i", $h2);
                            $hour = date("H", $h2);
                            
                            $convert = strtotime("+$minute minutes", $h);;
                            $convert = strtotime("+$hour hours", $convert);
                            $new_time = date('h:i A', $convert);
                            

                              @endphp 
                            <td>{{date('F d, Y', strtotime($datan->arrival_date))}} | {{date('h:i A', strtotime($datan->arrival_time))}} </td>
                            @else
                            <td>ONGOING</td>
                            @endif
                             <td>{{ round($distance, 1) }} km</td>
                             <td>
                                 @if($datan->bus_stop_trigger != 1)
                                 <button data-toggle="modal" data-target="#exampleModalCenterdeletebus" class="btn btn-sm btn-danger myBtn" id="myBtn" data-value="{{ $datan->bus_id }}" >Add</button>
                                 @else
                                 <button class="btn btn-sm btn-success myBtn" id="myBtn" data-value="{{ $datan->bus_id }}" disable>Added</button>
                                 @endif
                    <form method="post" action="addarrival/{{$datan->bus_id}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                             @if(empty($datan->arrival_time))
                                 <button style="background-color:#00468f;color:#fff;" name="bus_id_new" value="{{$datan->bus_id}}" class="btn btn-sm btn-info myBtn" id="myBtn" >Arrived</button>
                            @else
                             <p>Bus Arrived</p>
                             @endif
                   </form>
                             
                      

                             </td>
                   
                    </tbody>
                    </table>
                    @endif
                   @endforeach
            @endif

                 </div>
                </div>
              </div>
            </div>
            </div>
            </div>
            </div>
@endsection

   <div class="modal fade" id="exampleModalCenterdeletebus" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Stoplight Time</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="savestop" enctype="multipart/form-data">
            {{ csrf_field() }}
            <p>Origin to Stop-light 1: <input style="width:70px;" type="number" name="s1h" id="s1h" min="0" value="0"> hr <input style="width:70px;" width="50px" type="number" name="s1m" id="s1m" max="59" min="0" value="00"> min</p>
            <p>Stop-light 1 to Stop-light 2: <input style="width:70px;" type="number" name="s2h" id="s2h" min="0" value="0"> hr <input style="width:70px;" width="50px" type="number" name="s2m" id="s2m" max="59" min="0" value="00"> min</p>
            <p>Stop-light 2 to Stop-light 3: <input style="width:70px;" type="number" name="s3h" id="s3h" min="0" value="0"> hr <input style="width:70px;" width="50px" type="number" name="s3m" id="s3m" max="59" min="0" value="00"> min</p>
            <p>Stop-light 3 to Stop-light 4: <input style="width:70px;" type="number" name="s4h" id="s4h" min="0" value="0"> hr <input style="width:70px;" width="50px" type="number" name="s4m" id="s4m" max="59" min="0" value="00"> min</p>
            <p>Stop-light 4 to Stop-light 5: <input style="width:70px;" type="number" name="s5h" id="s5h" min="0" value="0"> hr <input style="width:70px;" width="50px" type="number" name="s5m" id="s5m" max="59" min="0" value="00"> min</p>
            <p>Stop-light 5 to Stop-light 6: <input style="width:70px;" type="number" name="s6h" id="s6h" min="0" value="0"> hr <input style="width:70px;" width="50px" type="number" name="s6m" id="s6m" max="59" min="0" value="00"> min</p>
            <p>Stop-light 6 to Stop-light 7: <input style="width:70px;" type="number" name="s7h" id="s7h" min="0" value="0"> hr <input style="width:70px;" width="50px" type="number" name="s7m" id="s7m" max="59" min="0" value="00"> min</p>
            <p>Stop-light 7 to Stop-light 8: <input style="width:70px;" type="number" name="s8h" id="s8h" min="0" value="0"> hr <input style="width:70px;" width="50px" type="number" name="s8m" id="s8m" max="59" min="0" value="00"> min</p>
            <p>Stop-light 8 to Stop-light 9: <input style="width:70px;" type="number" name="s9h" id="s9h" min="0" value="0"> hr <input style="width:70px;" width="50px" type="number" name="s9m" id="s9m" max="59" min="0" value="00"> min</p>
            <p>Stop-light 9 to Stop-light 10: <input style="width:70px;" type="number" name="s10h" id="s10h" min="0" value="0"> hr <input style="width:70px;" width="50px" type="number" name="s10m" id="s10m" max="59" min="0" value="00"> min</p>
            <p>Stop-light 10 to Destination: <input style="width:70px;" type="number" name="sdh" id="sdh" min="0" value="0"> hr <input style="width:70px;" width="50px" type="number" name="sdm" id="sdm" max="59" min="0" value="00"> min</p>
            <input type="hidden" name="id" id="id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <a href="deleteuser/"><button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    // Get value on button click and show alert
    $(".myBtn").click(function(){
       var id=$(this).attr("data-value");

       $( "#id" ).val( id );
        // alert(id);
    });
});
</script>
<script>
function startTime() {
  const today = new Date();
  let h = today.getHours();
  let m = today.getMinutes();
  let s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =  h + ":" + m + ":" + s;
  setTimeout(startTime, 1000);
}

function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
</body>
