@extends('layouts.app')

@section('content')
<link href="{{ asset('css/survey.css')}}" rel="stylesheet">
<div class="card">
    <div class="card-body">
        <h4 class="card-title"></h4>
        <form id="Questions">
    <div id="SurveyBody" data-survey_id="{{$surveyid}}">
</div>

      <div id="body">
      </div>
    <button id="submit">Submit</button>
  </form>
    </div>
</div>

@endsection

@section('extrascripts')

<script src="{{ asset('js/answersurvey.js') }}"></script>
@endsection
