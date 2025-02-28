
@extends('layouts.header')
@section('content') 
@include('admin.message')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Passenger List</h4>
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
                    <th class="rowc">Contact</th>
                    <th class="rowc">Email</th>
                    <th class="rowc">Address</th>
                    <th class="rowc">Booked</th>
                    <th class="rowc">Seat</th>
                    <th class="rowc">Bus</th>
                    <th class="rowc">Payment</th>
                    @if(Auth::user()->role !='Dispatcher' )
                    <th >Action</th>
                    @endif
                    </thead>
                    <tbody>
                    @foreach ( $data as $passenger )
                    @if ($passenger->passenger_terminal == Auth::user()->terminal_id || Auth::user()->role== 'Super Admin')
                      <tr>
                        <td class="rowl">{{ $passenger->passenger_fname }} {{ $passenger->passenger_lname }}</td>
                        <td class="rowl">{{ $passenger->passenger_contact }}</td>
                        <td class="rowl">{{ $passenger->passenger_email }}</td>
                        <td class="rowl">{{ $passenger->passenger_address }}</td>
                        <td class="rowl">{{ date('F d, Y', strtotime($passenger->passenger_created_date)) }}</td>
                        @foreach($seat as $iteme)
                        @if($iteme->id == $passenger->passenger_seat_id)
                        <td class="rowl">{{ $iteme->seat_number }}</td>
                        @endif
                        @endforeach
                        @foreach ($bus as $item)
                          @if($item->bus_id == $passenger->passenger_bus_id)
                          <td class="rowl">{{ $item->bus_name }}</td>
                          @endif
                        @endforeach
                        <td class="rowl">{{$passenger->passenger_payment}}</td>
                        @if(Auth::user()->role !='Dispatcher' )
                        <td><button data-toggle="modal" data-target="#exampleModalCenterdeletebus" class="btn btn-sm btn-info myBtn" id="myBtn"  data-value="{{ $passenger->passenger_id }}">Payment</button> <button data-toggle="modal" data-target="#exampleModalCenterdeletebusb" class="btn btn-sm btn-danger myBtnd" id="myBtnd"  data-valued="{{ $passenger->passenger_id }}" data-seat="{{ $passenger->passenger_seat_id }}" >Delete</button></td>
                        @endif
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
 <div class="modal fade" id="exampleModalCenterdeletebus" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Select Action</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="editpayment" enctype="multipart/form-data">
            {{ csrf_field() }}
            <fieldset>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Name</label> -->
                                <select class="form-control" name="pay">
                                  <option>Select Payment Action</option>
                                   <option value="Paid">Paid</option>
                                    <option value="Unpaid">Unpaid</option>
                                </select>
                          </div>
                          <input type="hidden" name="did" id="did">
                        </div>
                    </div>
            </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <a href="editpayment/"><button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  
     <div class="modal fade" id="exampleModalCenterdeletebusb" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Delete Passenger</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="deletepass" enctype="multipart/form-data">
            {{ csrf_field() }}
            <p>Are you sure you want to delete this data?</p>
            <input type="hidden" name="didd" id="didd">
            <input type="hidden" name="seat" id="seat">
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
       $( "#did" ).val( idd );
      
    });
    $(".myBtnd").click(function(){
       var idd=$(this).attr("data-valued");
       var sid=$(this).attr("data-seat");
       $( "#didd" ).val( idd );
        $( "#seat" ).val( sid );
      
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