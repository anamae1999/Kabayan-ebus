
@extends('layouts.header')
@section('content') 
@include('admin.message')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <span class="pull-center">
            <a href="#" data-toggle="modal" data-target="#exampleModalCenteraddbus" 
            data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
            <i class="glyphicon glyphicon-plus"></i> Add New Bus</a>
            </span>
            <br>
            <br>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Bus List</h4>
                  <h4 class="card-title pull-right">Today is: {{ date('d-m-Y', time()) }}</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  @if ( count($buses) > 0 ) 
                    <table class="table">
                      <thead class=" text-primary">
                      <!-- <th>ID</th> -->
                    <th class="rowc">Bus Name</th>
                    <th class="rowc">Bus Code</th>
                    <th class="rowc">Bus Terminal</th>
                    <th class="rowc">Total Seats</th>
                    <th class="rowc">Departure</th>
                     <th class="rowc">Arrival</th>
                     <th class="rowc">Total Travel</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ( $buses as $data )
                    @if ($data->bus_terminal_id == Auth::user()->terminal_id || Auth::user()->role=='Super Admin')
                      <tr>
                       <!--  <td>{{ $data->operator_id }}</td> -->
                        <td class="rowl"><a data-toggle="modal" data-target="#exampleModalCenterviewOperator
                            {{$data->bus_id}}"data-toggle="tooltip">{{ $data->bus_name ?? 'empty'}}</a></td>
                        <td class="rowl">{{ $data->bus_code ?? 'empty'}}</td>
               @foreach ($terminal as $terminaln)
                      @if ($terminaln->terminal_id == $data->bus_terminal_id )
                        @php
                        $tname = $terminaln->terminal_name;
                        @endphp
                        <td class="rowl">{{ $tname }}</td>

                      @endif
               @endforeach
                        <td class="rowl">{{ $data->total_seats ?? 'empty'}}</td>
                         <td class="rowl"> {{date('F d, Y', strtotime( $data->bus_departuredate))}} | {{date('h:i A', strtotime( $data->bus_departuretime))}}</td>
                        <td class="rowl"> @if(!empty($data->arrival_time))
                            {{ date('F d, Y', strtotime( $data->arrival_date)) }} | {{date('h:i A', strtotime($data->arrival_time))}}
                            @endif</td>
                        
                         <td class="rowl">
                             @if(!empty($data->arrival_time))
                             {{abs($hours)}} Hours {{abs($minutes)}} Min
                             @else
                             Active
                             @endif
                        </td>
                        <td >

                            <button data-toggle="modal" data-target="#exampleModalCentereditbus" class="btn btn-sm btn-info myBtn" id="myBtn" data-name="{{ $data->bus_name }}" data-value="{{ $data->bus_id }}" >Edit</button>
                            <!-- <a data-toggle="modal" data-target="#exampleModalCentereditbus" id="editbtn" data-name="{{ $data->bus_id }}"  ><button class="btn btn-sm btn-info" >Edit</button></a> -->
                             <button data-toggle="modal" data-target="#exampleModalCenterdeletebus" class="btn btn-sm btn-danger myBtnd" id="myBtn" data-name="{{ $data->bus_name }}" data-valued="{{ $data->bus_id }}" >Delete</button>
                        </td>
                      </tr>
                      @endif
                    @endforeach
                </tbody>
              </table>
              @endif 
               <button class="btn btn-sm btn-info" onclick="exportTableToCSV('members.csv')">Export CSV File</button>
                 </div>
                </div>
              </div>
            </div>
            </div>
            </div>
            </div>
           @include('admin.buses.add-bus')
            @include('admin.buses.delete-bus')

@endsection

<div class="modal fade" id="exampleModalCentereditbus" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Edit Bus Departure Date and Time</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="edit" enctype="multipart/form-data">
                    {{ csrf_field() }}
                      <fieldset>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="date"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Departure Date" type="date">
                                 <input name="bus_id"  id="bus_id" class="form-control" aria-describedby="emailHelp"
                                  type="hidden">
                          </div>
                           <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="time"  class="form-control" aria-describedby="time"
                                 placeholder="00:00" mask="00:00"  type="text">
                          </div>
                      </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <a href="edit/{{ $data->bus_id }}"><button type="submit" class="btn btn-primary">Update Bus</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
    <div class="modal fade" id="exampleModalCenterdeletebus" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Delete Bus</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="destroy" enctype="multipart/form-data">
            {{ csrf_field() }}
            <p>Are you sure you want to delete this data?</p>
            <input type="hidden" name="bus_idd" id="bus_idd">
        </div>
        <div class="modal-footer">
          <input type="hidden" id="term_id" name="term-id">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <a href="deleteuser/"><button type="submit" class="btn btn-primary">Delete</button>
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
       var name=$(this).attr("data-value");
       $( "#bus_id" ).val( name );
       // alert(name);
    });
    $(".myBtnd").click(function(){
       var name=$(this).attr("data-valued");
       $( "#bus_idd" ).val( name );
       // alert(name);
    });
});
</script>
<script>
  function exportTableToCSV(filename) {
    var csv = [];
    var rows = document.querySelectorAll("table tr");
    
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll(".rowl, .rowc");
        
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        
        csv.push(row.join(","));        
    }

    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}

function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Hide download link
    downloadLink.style.display = "none";

    // Add the link to DOM
    document.body.appendChild(downloadLink);

    // Click download link
    downloadLink.click();
}
</script>