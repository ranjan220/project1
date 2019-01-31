@extends('home')
@section('content')
<div class="container">
  <a href="{{route('admin.logo.create')}}"><button class="btn btn-sm btn-success">Add Logo</button></a><br><br>
</div>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Sn</th>
      <th scope="col">Images</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($logo as $logos)
      <th scope="row">{{$logos->id}}</th>
     
      <td><img height="50px" width="100px" src="{{asset("storage/logo/$logos->logo")}}"></td>
       <td><a href="{{route('admin.logo.edit',$logos->id)}}"> edit</td>

 <td>
        <form action="{{route('admin.logo.destroy',$logos->id)}}" method="post">
          {{method_field('DELETE')}}
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <button class="btn btn-danger bt-sm">Delete</button>
        </form>
      </td>
     

     
    </tr>
   
    @endforeach
  </tbody>
</table>
@endsection