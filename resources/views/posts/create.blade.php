@extends('layout.app')
 
@section('content')

@section('title') create  @endsection


 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
<form , method = "POST" action ="{{route('posts.store')}}"> 
    @csrf <! //! اي فورم محتاج اعملها لازم ي كون فيها>
    <div class = "mb-3">
        <lable class = form-lable> Title</lable>
        <input name = "title" type  = "text" class ="form-control" value="{{old('title')}}">
</div>
<div class = "mb-3">
        <lable class = form-lable> Description</lable>
        <textarea name = "description" class  ="form-control" rows ="3" {{old('description')}}></textarea>
</div>
<div class = "mb-3">
        <lable class = form-lable> Post Creator</lable>
        <select name = "post_creator" class  = "form-control" >
                @foreach ($users as $user)
                <option value = '{{$user -> id}}'>{{$user-> name}}</option>
                @endforeach

      
</select>
</div>

<button class = "btn btn-success"> Submit</button>
@endsection

