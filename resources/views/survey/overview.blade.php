@extends('layouts.app-admin')

@section('content')
    <link href="{{ asset('css/survey.css')}}" rel="stylesheet">
<h1>Vragenlijsten</h1>
<br>
<a href="{{route('survey.new')}}" class="btn btn-primary btn-lg">Nieuwe vragenlijst toevoegen</a>
<hr>
@foreach ($surveys as $survey )
<div class="card" >
    
    <div class="card-body" id="card{{$survey->id}}">
      <h5 class="card-title">{{$survey->title}}</h5>
      <p class="card-text">{{$survey->description}}</p>
      <a href="{{route('survey.detail',['survey'=>$survey->id])}}" class="bewerken-button btn btn-primary">Bewerken</a>
      <button type="submit" onClick="deleteQuestion({{$survey->id}})" class="btn btn-danger">Verwijderen</button>
    </div>
  </div>
  
@endforeach

    <script>
        function deleteQuestion(id) {
            $.ajax({
                url: "/api/admin/survey/" + id,
                type: "DELETE",
                contentType: 'json',
                success: function(response){
                    $("#card" + id).fadeOut(250);
                    setTimeout(function(){
                        $("#card" + id).remove();
                    }, 300);
                },
                error: function(xhr){
                    console.log(xhr);
                }
            });
        }
    </script>

@endsection
