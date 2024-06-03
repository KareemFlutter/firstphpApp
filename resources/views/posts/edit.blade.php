@extends('layout.app')

@section('content')

@section('title')
    Edit
@endsection

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method = "POST" action ="{{ route('posts.update', $post->id) }}">
    @csrf <! //! اي فورم محتاج اعملها لازم ي كون فيها>
        @method('PUT')
        <div class = "mb-3">
            <lable class=form-lable> Title</lable>
            <input name = "title" type  = "text" value="{{ $post->title }}" class ="form-control">
        </div>
        <div class = "mb-3">
            <lable class=form-lable> Description</lable>
            <textarea name="description" class="form-control" rows ="3">{{ $post->description }}</textarea>
        </div>
        <div class = "mb-3">
            <lable class=form-lable> Post Creator</lable>
            <select name = "post_creator" class  = "form-control">
                @foreach ($users as $user)
                    <option @if ($user->id == $post->user_id) selected @endif value = '{{ $user->id }}'>
                        {{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button class = "btn btn-primary"> Update</button>
    @endsection
