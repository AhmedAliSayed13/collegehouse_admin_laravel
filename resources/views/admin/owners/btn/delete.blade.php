
<a href="#owner_{{$id}}" data-toggle="modal" class="btn btn-danger"><i class='fa fa-trash'></i></a>
<div class="modal fade" id="owner_{{$id}}" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
       
            <div class="modal-body">
                <form method="post" action="{{ url('admin/owner/'.$id)}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="form-content p-2">
                        <h4 class="modal-title">Delete</h4>
                        <p class="mb-4">Are you sure want to delete?</p>
                        <button type="submit" class="btn btn-primary">Save </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




