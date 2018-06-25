@extends('layouts.app')

@section('content')
<link href="{{ asset('css/survey.css')}}" rel="stylesheet">
<div class="card">
    <div class="card-body">
        <h4 class="card-title"></h4>
    <div id="SurveyBody" data-groupid="{{$surveyid}}" data-userid="{{Auth::id()}}">
</div>

      <div id="body">
      </div>
        <input id="surveyid" type="hidden"/>
    <button id="submit">Submit</button>
    </div>
</div>

@endsection

@section('extrascripts')

<script src="{{ asset('js/answersurvey.js') }}"></script>
@endsection
