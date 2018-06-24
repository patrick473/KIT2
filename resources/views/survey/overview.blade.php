@extends('layouts.app-admin')

@section('content')
<h1>Vragenlijsten</h1>
<br>
@foreach ($surveys as $survey )
<div class="card" >
    
    <div class="card-body">
      <h5 class="card-title">{{$survey->title}}</h5>
      <p class="card-text">{{$survey->description}}</p>
      <a href="{{route('survey.detail',['survey'=>$survey->id])}}" class="btn btn-primary">Bewerken</a>
    </div>
  </div>
  
@endforeach


@endsection