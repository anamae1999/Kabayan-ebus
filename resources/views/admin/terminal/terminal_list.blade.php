
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
                    <th>Bus Name</th>
                    <th>Bus Code</th>
                    <th>Total Seats</th>
                    <th>Created Date</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ( $buses as $data )
                      <tr>
                       <!--  <td>{{ $data->operator_id }}</td> -->
                        <td><a data-toggle="modal" data-target="#exampleModalCenterviewOperator
                            {{$data->bus_id}}"data-toggle="tooltip">{{ $data->bus_name ?? 'empty'}}</a></td>
                        <td>{{ $data->bus_code ?? 'empty'}}</td>
                        <td>{{ $data->total_seats ?? 'empty'}}</td>
                        <td>{{ $data->created_at ?? 'empty' }}</td>
                        <td>

                            <a data-toggle="modal" data-target="#exampleModalCentereditbus" ><input type="submit" name="submit" value="Edit" class="btn btn-sm btn-info" /></a>
                             <a data-toggle="modal" data-target="#exampleModalCenterdelete"><input type="submit" name="submit" value="Delete" class="btn btn-sm btn-danger" /></a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              @endif 
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
