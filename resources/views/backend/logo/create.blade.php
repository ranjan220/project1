@extends('home')
@section('content')
<div class="container">
	@if(count($errors)>0)
	@foreach($errors->all() as $errors)
	<div class="alert alert-danger" >{{$errors}}</div>
	@endforeach


@endif
<!-- Modal -->
 <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Logo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="{{route('admin.logo.store')}}" enctype="multipart/form-data">
        	{{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Add Logo</label>
    <input type="file" class="form-control" name="logo" >
  
  </div>
  
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
    </div>
  </div>
</div>






@endsection