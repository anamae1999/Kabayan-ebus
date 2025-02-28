
{{-- we will copy this modal and make some changes for the bus modal --}}
{{-- it's just a simple bootstrap modal okay  --}}
<!-- Modal -->
<div class="modal fade" id="exampleModalCenterdelete" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterdelete" aria-hidden="true">
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
        <p>Are you sure you want to delete this data?</p>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <a href="delete/{{ $data->bus_id ?? 'empty' }}"><button type="submit" class="btn btn-primary">Delete Bus</button></a>
        </div>
      </div>
    </div>
  </div>
  
  
  
  