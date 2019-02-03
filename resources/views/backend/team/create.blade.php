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
        <h5 class="modal-title" id="exampleModalLabel">Create Team</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
        <form class="form-horizontal" method="post" action="{{route('admin.team.store')}}" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name">
  
  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Position</label>
    <input type="text" class="form-control" name="position">
  
  </div> 
  
  <div class="form-group">
    <label for="exampleInputEmail1"> Team Image</label>
    <input type="file" class="form-control" name="team">
  
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Content</label>
    <textarea type="text" id="summernote" class="form-control" name="content"></textarea> 
  
  </div> 
  
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>







@endsection