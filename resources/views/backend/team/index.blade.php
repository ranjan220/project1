@extends('home')
@section('content')
<div class="container">
  <a href="{{route('admin.team.create')}}"><button class="btn btn-sm btn-success">Add Team Member</button></a><br><br>
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
      @foreach($team as $teams)
      <th scope="row">{{$teams->id}}</th>
     
      <td><img height="50px" width="100px" src="{{asset("storage/team/$teams->team")}}"></td>
       <td><a href="{{route('admin.team.edit',$teams->id)}}"> Edit profile</td>

 <td>
        <form action="{{route('admin.team.destroy',$teams->id)}}" method="post">
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