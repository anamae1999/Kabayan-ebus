
@extends('layouts.header')
@section('content') 
<!-- <div class="navbar-wrapper">
<a class="navbar-brand text-black " href="#pablo">Bus List</a>
 </div> -->
@include('admin.message')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <span class="pull-center">
            <a href="#" data-toggle="modal" data-target="#exampleModalCenteraddbus" 
            data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
            <i class="glyphicon glyphicon-plus"></i> Add New Operator</a>
            </span>
            <br>
            <br>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Operators List</h4>
                  <h4 class="card-title pull-right">Today is: {{ date('d-m-Y', time()) }}</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  @if ( count($operators) > 0 ) 
                    <table class="table">
                      <thead class=" text-primary">
                    <th class="rowc">Operator Name</th>
                    <th class="rowc">Email</th>
                    <th class="rowc">Phone</th>
                    <th class="rowc">Address</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ( $operators as $data )
                     @if ($data->terminal_id == Auth::user()->terminal_id || Auth::user()->role== 'Super Admin')
                      <tr>
                        <td class="rowl"><a data-toggle="modal" data-target="#exampleModalCenterviewOperator
                            {{$data->operator_id}}"data-toggle="tooltip">{{ $data->operator_name }}</a></td>
                        <td class="rowl">{{ $data->operator_email }}</td>
                        <td class="rowl">{{ $data->operator_phone }}</td>
                        <!-- <td>{{ $data->operator_address }}</td> -->
                        <!-- <td>{{ $data->operator_description }}</td> -->
                        <td class="rowl">{{ $data->operator_address }}</td>
                        <td>

                            <button data-toggle="modal" data-target="#exampleModalCentereditbus" class="btn btn-sm btn-info myBtn" id="myBtn"  data-value="{{ $data->operator_id }}">Edit</button>
                             <button data-toggle="modal" data-target="#exampleModalCenterdeletebus" class="btn btn-sm btn-danger myBtnd" id="myBtnd"  data-valued="{{ $data->operator_id }}" >Delete</button>

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
            @include('admin.operators.add-operator')
            @include('admin.operators.delete-operator')
@endsection

<div class="modal fade" id="exampleModalCentereditbus" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Edit Operator</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="editoperator" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <fieldset>
                      <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="operator_name"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Operator Name" type="text">
                          </div>
                          </div>
                          <div class="col-md-6">
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="operator_email"  class="form-control" aria-describedby="emailHelp" 
                                placeholder="Enter Email" type="email">
                          </div>
                          </div>
                          </div>
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="operator_phone"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Mobile Number" type="text">
                          </div>
                          <div class="form-group">
                                <!-- <label for="exampleInputPassword1">Seat No</label> -->
                                <textarea name="operator_address" rows="2" cols="20" class="form-control" 
                                placeholder="Enter Operator Address" type="text"></textarea>
                          </div>
                          <div class="form-group">
                                <!-- <label for="exampleInputPassword1">Seat No</label> -->
                                <select name="terminal_id" class="form-control">
                                    <option value="">Select Terminal</option>
                                    @foreach ($terminal as $terminals)
                                    <option value="{{$terminals->terminal_id}}">{{$terminals->terminal_name}}</option>
                                    @endforeach
                                </select>
                          </div>
                          {{-- <div class="form-group">
                                <!-- <label for="exampleInputPassword1">Seat No</label> -->
                                <textarea name="operator_description" rows="2" cols="20" class="form-control" 
                                placeholder="Enter Operator Description" type="text"></textarea>
                          </div> --}}
<!--                           <div class="col-md-3">
                          <div class="form-group">
                                <input name="status"  aria-describedby="emailHelp" type="checkbox">
                                <label for="exampleInputEmail1">Active</label>
                          </div>
              </div> -->
          <!--     <div class="row">
                <div class="col-md-12">
                        <label class="control-label">Image</label>
                        <input type="file" name="operator_logo">
                </div>
            </div> -->
                      </fieldset>
        </div>
        <input type="hidden" name="id" id="id">
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <a href="editoperator/{{ $data->operator_id }}"><button type="submit" class="btn btn-primary">Update Operator</button></a>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!--DELETE-->
     <div class="modal fade" id="exampleModalCenterdeletebus" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Delete</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="deleteoperator" enctype="multipart/form-data">
            {{ csrf_field() }}
            <p>Are you sure you want to delete this data?</p>
            <input type="hidden" name="did" id="did">
        </div>
        <div class="modal-footer">
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
     $(".myBtn").click(function(){
       var idd=$(this).attr("data-value");
       $( "#id" ).val( idd );
      
    });
    $(".myBtnd").click(function(){
       var idd=$(this).attr("data-valued");
       $( "#did" ).val( idd );
      
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