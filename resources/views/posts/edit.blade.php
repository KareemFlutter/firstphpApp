@extends('layout.app')
 
@section('content')

@section('title') Edit  @endsection
    
<form method = "POST" action ="{{route('posts.update'  , 1)}}" > 
    @csrf <! //! اي فورم محتاج اعملها لازم ي كون فيها>
    @method("PUT")
    <div class = "mb-3">
        <lable class = form-lable> Title</lable>
        <input name = "title" type  = "text" class ="form-control">
</div>
<div class = "mb-3">
        <lable class = form-lable> Description</lable>
        <textarea name = "description" class  ="form-control" rows ="3"></textarea>
</div>
<div class = "mb-3">
        <lable class = form-lable> Post Creator</lable>
        <select name = "post_creator" class  = "form-control">
        <option value = '1'>Ahmed</option>
        <option value = '2'>kareem</option>
</select>
</div>

<button class = "btn btn-primary"> Update</button>
@endsection

