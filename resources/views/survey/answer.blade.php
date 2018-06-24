@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{$survey->title}}</h4>
        <p>{{$survey->description}}</p>
        <hr>

    </div>
    <div class="row">
      <div class="col-sm-12" id="SurveyBody" data-group_id={{$group_id}}>

      </div>
    </div>
</div>

@endsection

@section('extrascripts')

<script src="{{ asset('js/answersurvey.js') }}"></script>
@endsection
