@extends('home')
@section('content')
<!-- Modal -->

    
     <div>
        <form class="form-horizontal" method="post" action="{{route('admin.slider.update',$sliders->id)}}" enctype="multipart/form-data">
        	{{csrf_field()}}
          {{method_field('PUT')}}
  <div class="form-group">

    <input type="file" class="form-control" name="slider" >
  
  </div>
  
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    

</div>
@endsection