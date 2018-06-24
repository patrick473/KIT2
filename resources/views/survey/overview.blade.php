@extends('layouts.app-admin')

@section('content')
<h1>Vragenlijsten</h1>
<br>
<a href="{{route('survey.new')}}" class="btn btn-primary btn-lg">Nieuwe vragenlijst toevoegen</a>
<hr>
@foreach ($surveys as $survey )
<div class="card" >
    
    <div class="card-body">
      <h5 class="card-title">{{$survey->title}}</h5>
      <p class="card-text">{{$survey->description}}</p>
      <a href="{{route('survey.detail',['survey'=>$survey->id])}}" class="btn btn-primary">Bewerken</a>
      <form action="{{route('survey.delete',['id'=>$survey->id])}}">
        @csrf
        @method('delete')
      <button type="submit" class="btn btn-danger">Verwijderen</button>
      </form>
    </div>
  </div>
  
@endforeach


@endsection
