
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
            <i class="glyphicon glyphicon-plus"></i> Add User</a>
            </span>
            <br>
            <br>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">User List</h4>
                  <h4 class="card-title pull-right">Today is: {{ date('d-m-Y', time()) }}</h4>
                  <p class="card-category"> This is a list of users</p>
                  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for name.." title="Type in a name">
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  @if ( count($data) > 0 ) 
                    <table class="table" id="myTable">
                      <thead class=" text-primary">
                      <!-- <th>ID</th> -->
                    <th class="rowc">Name</th>
                    <th class="rowc">Email</th>
                    <th class="rowc">Role</th>
                    <th class="rowc">Operator</th>
                    <th>Action</th>
                   <!--  <th>role</th> -->
                    </thead>
                    <tbody>
                    @foreach ( $data as $item )
                    @if ($item->terminal_id == Auth::user()->terminal_id || Auth::user()->role== 'Super Admin')
                      <tr>
                        <td class="row1">{{ $item->name }}</td>
                        <td class="row1">{{ $item->email }}</td>
                        <td class="row1">{{ $item->role }}</td>
                        @foreach ($operators as $operator)
                        @if($operator->operator_id == $item->operator_id)
                         <td class="row1">{{$operator->operator_name }}</td>
                         @endif
                        @endforeach
                        @if( $item->operator_id == '0')
                        <td class="row1">No Operator</td>
                        @endif
                        <td><button data-toggle="modal" data-target="#exampleModalCentereditbus" class="btn btn-sm btn-info myBtn" id="myBtn"  data-value="{{ $item->id }}" data-name="{{ $item->name }}" data-email="{{ $item->email }}" data-role="{{ $item->role }}" data-operator="{{ $item->operator_id }}" data-terminal="{{ $item->terminal_id }}" data-password="{{ $item->password }}">Edit</button>
                        <button data-toggle="modal" data-target="#exampleModalCenterdeletebus" class="btn btn-sm btn-danger myBtnd" id="myBtnd"  data-valued="{{ $item->id }}" >Delete</button></td>
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
@endsection
<div class="modal fade" id="exampleModalCenteraddbus" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Add New Operator</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="/adduser" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <fieldset>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input name="name"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Name" type="text">
                          </div>
                          <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input name="email"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Email" type="text">
                          </div>
                           <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input name="password"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Password" type="text">
                          </div>
                          <div class="form-group">
                                <label for="exampleInputEmail1">Role</label>
                                <select class="form-control" name="role"><option value="Admin">Admin</option><option value="Dispatcher">Dispatcher</option><option value="Driver">Driver</option><option  value="Conductor">Conductor</option></select>
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
                           <div class="form-group">
                                <!-- <label for="exampleInputPassword1">Seat No</label> -->
                                <select name="operator_id" class="form-control">
                                    <option value="0">Select Operator</option>
                                    @foreach ($operators as $operator)
                                    <option value="{{$operator->operator_id}}">{{$operator->operator_name}}</option>
                                    @endforeach
                                </select>
                          </div>


                        </div>     
              </div>
                      </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add User</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModalCentereditbus" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Edit Bus</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="edituser" enctype="multipart/form-data">
                    {{ csrf_field() }}
                      <fieldset>
                                          <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Name</label> -->
                                <input name="name" id="name" class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Name" type="text">
                                 <input name="id"  id="id" class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Name" type="hidden">
                          </div>
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Email</label> -->
                                <input name="email" id="email" class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Email" type="text">
                          </div>
                           <div class="form-group">
                               <!--  <label for="exampleInputEmail1">Password</label> -->
                                <input name="password" id="password" class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Password" type="text">
                                 <input name="password1" id="password1" class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Password" type="hidden">
                          </div>
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Role</label> -->
                                <select class="form-control" name="role" id="role"><option value="Super Admin">Super Admin</option><option value="Admin">Admin</option><option value="Driver">Driver</option><option  value="Conductor">Conductor</option><option  value="Dispatcher">Dispatcher</option></select>
                          </div>
                          <div class="form-group">
                                <!-- <label for="exampleInputPassword1">Seat No</label> -->
                                <select name="operator_id" id="operator_id" class="form-control">
                                    <option value="0">Select Operator</option>
                                    @foreach ($operators as $operator)
                                    <option value="{{$operator->operator_id}}">{{$operator->operator_name}}</option>
                                    @endforeach
                                </select>
                          </div>
                          <div class="form-group">
                                <!-- <label for="exampleInputPassword1">Seat No</label> -->
                                <select name="terminal_id" id="terminal_id" class="form-control">
                                    <option value="0">Select Terminal</option>
                                    @foreach ($terminal as $terminals)
                                    <option value="{{$terminals->terminal_id}}">{{$terminals->terminal_name}}</option>
                                    @endforeach
                                </select>
                          </div>


                        </div>     
              </div>

                      </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <a href="edituser/"><button type="submit" class="btn btn-primary">Update User</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- 
  DELETE -->
   <div class="modal fade" id="exampleModalCenterdeletebus" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Delete User</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="deleteuser" enctype="multipart/form-data">
            {{ csrf_field() }}
            <p>Are you sure you want to delete this data?</p>
            <input type="hidden" name="did" id="did">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <a href="deleteuser/"><button type="submit" class="btn btn-primary">Delete User</button>
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
       var name=$(this).attr("data-name");
       var email=$(this).attr("data-email");
       var role=$(this).attr("data-role");
       var operator=$(this).attr("data-operator");
        var terminal=$(this).attr("data-terminal");
        var password=$(this).attr("data-password");
       
       
       $( "#id" ).val( id );
       $( "#name" ).val( name );
       $( "#email" ).val( email );
       $( "#role" ).val( role );
        $( "#operator_id" ).val( operator );
         $( "#terminal_id" ).val( terminal );
         $( "#password1" ).val( password );
       // alert(name);
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
        var row = [], cols = rows[i].querySelectorAll(".row1, .rowc");
        
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
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>