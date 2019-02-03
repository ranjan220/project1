@extends('home')
@section('content')
<div class="container">
	@if(count($errors)>0)
	@foreach($errors->all() as $errors)
	<div class="alert alert-danger" >{{$errors}}</div>
	@endforeach


@endif
	
<!-- Button trigger modal -->


<!-- Modal -->

  
    
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="{{route('admin.slider.store')}}" enctype="multipart/form-data">
        	{{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Slider Image</label>
    <input type="file" class="form-control" name="slider" >
  
  </div>
  
 
  <button type="submit" class="btn btn-primary">Submit</button>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
     
        
       </form>
      </div>
    </div>
  </div>
</div>






@endsection