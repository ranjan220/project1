@extends('home')
@section('content')
<!-- Modal -->

    
     <div>
        <form class="form-horizontal" method="post" action="{{route('admin.logo.update',$logos->id)}}" enctype="multipart/form-data">
        	{{csrf_field()}}
          {{method_field('PUT')}}
  <div class="form-group">

    <input type="file" class="form-control" name="logo" >
  
  </div>
  
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    

</div>
@endsection