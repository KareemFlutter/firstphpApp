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
    <h5 class="card-title">Name : Kareem </h5>
    <p class="card-text">Email : Kareem@gmail.com </p>
    <p class="card-text">Create At  : Kareem@gmail.com </p>

@endsection

