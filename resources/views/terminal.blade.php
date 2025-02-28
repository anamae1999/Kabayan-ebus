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
            <i class="glyphicon glyphicon-plus"></i> Add Terminal</a>
            </span>
            <br>
            <br>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Terminal List</h4>
                  <h4 class="card-title pull-right">Today is: {{ date('d-m-Y', time()) }}</h4>
                  <p class="card-category"> This is a list of terminal</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  @if ( count($data) > 0 ) 
                    <table class="table">
                      <thead class=" text-primary">
                      <!-- <th>ID</th> -->
                    <th class="rowc">Name</th>
                    <th class="rowc">Address</th>
                     <th class="rowc">Contact</th>
                    <th>Action</th>
                   <!--  <th>role</th> -->
                    </thead>
                    <tbody>
                    @foreach ( $data as $item )
                      <tr>
                        <td class="rowl">{{ $item->terminal_name }}</td>
                         <td class="rowl">{{ $item->terminal_address }}</td>
                        <td class="rowl">{{ $item->terminal_contact }}</td>
                        <td><button data-toggle="modal" data-target="#exampleModalCentereditbus" class="btn btn-sm btn-info myBtn" id="myBtn"  data-value="{{ $item->terminal_id }}" >Edit</button>
                          <button data-toggle="modal" data-target="#exampleModalCenterdeletebus" class="btn btn-sm btn-danger myBtnd" id="myBtn"  data-valuen="{{ $item->terminal_id }}" >Delete</button></td>
                      </tr>
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
            <i class="glyphicon glyphicon-log-in">Add New Terminal</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="/addterm" enctype="multipart/form-data">
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
                                <label for="exampleInputEmail1">Address</label>
                                <input name="address"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Address" type="text">
                          </div>
                           <div class="form-group">
                                <label for="exampleInputEmail1">Contact</label>
                                <input name="contact"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Cotnact" type="text">
                          </div>


                        </div>     
              </div>
                      </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
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
            <i class="glyphicon glyphicon-log-in">Edit Terminal</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="/editterm" enctype="multipart/form-data">
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
                                <label for="exampleInputEmail1">Address</label>
                                <input name="address"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Address" type="text">
                          </div>
                           <div class="form-group">
                                <label for="exampleInputEmail1">Contact</label>
                                <input name="contact"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Cotnact" type="text">
                                 <input type="hidden" id="bus_id" name="id">
                          </div>


                        </div>     
              </div>
                      </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
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
            <i class="glyphicon glyphicon-log-in">Delete Terminal</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="deleteterm" enctype="multipart/form-data">
            {{ csrf_field() }}
            <p>Are you sure you want to delete this data?</p>
            <input type="hidden" name="did" id="did">
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
       var name=$(this).attr("data-valuen");
       $( "#term_id" ).val( name );
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