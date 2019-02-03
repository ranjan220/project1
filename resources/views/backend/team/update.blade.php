@extends('home')
@section('content')
<!-- Modal -->

    
   <div style="padding-left:25px">
        <form class="form-horizontal" method="post" action="{{route('admin.team.update',['team'=>$teams->id])}}" enctype="multipart/form-data">
        	{{csrf_field()}}
          {{method_field('PUT')}}
          <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" value="{{$teams->fname}}">
</div>
<div class="form-group">
	<label for="exampleInputEmail1">Position</label>
	<input type="text"  class="form-control" name="content" value="{{$teams->position}}">
</div>
</div>
 <div class="form-group">
    <label for="exampleInputEmail1">content</label>
    <textarea type="text"  id="summernote"class="form-control" name="content" value="{{$teams->content}}"></textarea>
  
  </div>
   <div class="form-group">
<input type="file" class="form-control" name="image" >
 </div>
 <button type="submit" class="btn btn-primary">Submit</button>
</form>
    

</div>
@endsection