@extends('layouts.app')

@section('content')

@foreach ($surveys as $survey )
<div class="card" >
    
    <div class="card-body">
      <h5 class="card-title">{{$survey->title}}</h5>
      <p class="card-text">{{$survey->description}}</p>
      <a href="{{route('home',['survey'=>$survey->id])}}" class="btn btn-primary">Edit</a>
    </div>
  </div>
@endforeach


@endsection