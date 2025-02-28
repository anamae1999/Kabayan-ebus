
{{-- we will copy this modal and make some changes for the bus modal --}}
{{-- it's just a simple bootstrap modal okay  --}}
<!-- Modal -->
<div class="modal fade" id="exampleModalCenteraddbus" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Add New Bus</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="/store" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <fieldset>
                      <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                                <!-- <label for="exampleInputPassword1">Seat No</label> -->
                                <select name="operator_id" class="form-control">
                                    <option value="">Select Operator</option>
                                    @foreach ($operators as $data)
                                    @if ($data->terminal_id == Auth::user()->terminal_id || Auth::user()->role== 'Super Admin')
                                    <option value="{{$data->operator_id}}">{{$data->operator_name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                          </div>
                              <div class="form-group">
                                <!-- <label for="exampleInputPassword1">Seat No</label> -->
                                <select name="terminal_id" class="form-control">
                                    <option value="">Select Terminal</option>
                                    @foreach ($terminal as $datan)
                                    <option value="{{$datan->terminal_id}}">{{$datan->terminal_name}}</option>
                                    @endforeach
                                </select>
                          </div>
                        </div>
                      <div class="col-md-12">
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="bus_name"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Bus Name" type="text">
                          </div>
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="bus_price"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Bus Price" type="text">
                          </div>

                          </div>
                          <div class="col-md-12">
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="bus_code"  class="form-control" aria-describedby="emailHelp" 
                                placeholder="Enter Bus Code" type="text">
                          </div>
                           <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="bus_origin"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Bus Origin" type="text">
                          </div>
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="bus_origin_lat"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Bus Origin Latitude" type="text">
                          </div>
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="bus_origin_long"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Bus Origin Longitude" type="text">
                          </div>
                            <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="bus_destination"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Bus Destination" type="text">
                          </div>
                           <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="bus_des_lat"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Bus Destination Latitude" type="text">
                          </div>
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="bus_des_long"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Bus Destination Longitude" type="text">
                          </div>
                           <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="total_seats"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Total Seat" type="text">
                          </div>
                          </div>
                         
                           <div class="col-md-12">
                          <div class="form-group">
                                <label for="exampleInputEmail1">Departure Date:</label>
                                <input name="bus_departuredate"  class="form-control" aria-describedby="emailHelp" 
                                placeholder="Enter Bus Departure Date" type="date">
                          </div>
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="bus_departuretime"  class="form-control" aria-describedby="emailHelp" 
                                placeholder="Enter Bus Departure Time" type="text">
                          </div>
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                               <select name="driver_id" class="form-control">
                                    <option value="">Select Driver</option>
                                    @foreach ($user as $users)
                                     @if($users->role == 'Driver')
                                    <option value="{{$users->id}}">{{$users->name}}</option>
                                     @endif
                                    @endforeach
                                </select>
                          </div>
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                               <select name="condoctor_id" class="form-control">
                                    <option value="">Select Conductor</option>
                                    @foreach ($user as $users)
                                     @if($users->role == 'Conductor')
                                    <option value="{{$users->id}}">{{$users->name}}</option>
                                     @endif
                                    @endforeach
                                </select>
                          </div>
                        </div>
                          
                       
              </div>
              {{-- <div class="row">
                <div class="col-md-12">
                        <label class="control-label">Image</label>
                        <input type="file" name="operator_logo">
                </div>
            </div> --}}
                      </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Register Bus</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  