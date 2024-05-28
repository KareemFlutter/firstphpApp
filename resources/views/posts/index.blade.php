@extends('layout.app')

@section('content')

@section('title') index @endsection
    <div class ="text-center">
<a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>

</div>

<table class="table mt-4" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Post By </th>
      <th scope="col">Create At</th>
      <th scope="col"> Actions</th>
    </tr>
  </thead>
  <tbody>

    @foreach($posts as $post)
    <tr>
      <td>{{$post->id}}</td>
      <td>{{$post->title}}</td>
      <td>{{$post->posted_by}}</td>
      <td>{{$post->created_at}}</td>
      <td>
       <a href = "{{route('posts.show' , $post->id)}}" class="btn btn-info">Views</a>
       <a href="{{route('posts.edit' , $post->id)}}" class="btn btn-primary">Edit</a>
      <form style = "display : inline ; " method = "POST" action = "{{route('posts.delete' , $post->id)}}" >
        @csrf
        @method("DELETE")
        <button type = "submit " class ="btn btn-danger" >Delete</button>
      </form>
      </td>
    </tr>
     @endforeach
   
  </tbody>
</table>
@endsection