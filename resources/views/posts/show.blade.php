@extends('layout.app')
 
@section('content')

@section('title') posts @endsection
    <div class="card">
  <div class="card-header">
    Post Info
  </div>
  <div class="card-body">
    <h5 class="card-title">Title: {{$post->title}} </h5>
    <p class="card-text">Description :{{$post->Description}} </p>
  </div>
</div>

<div class ="text-center">
    <div class="card">
  <div class="card-header">
    Post Creator Info
  </div>
  <div class="card-body">
    <h5 class="card-title">Name : {{$post->user? $post->user->name  :"Not Found"}} </h5>
    <p class="card-text">Email : {{$post->user? $post->user->email :"Not Found"}} </p>
    <p class="card-text">Create At  :  {{$post->user? $post->user->created_at: "Not Found"}} </p>

@endsection

