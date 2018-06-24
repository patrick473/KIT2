@extends('layouts.app')

@section('content')
<link href="{{ asset('css/survey.css')}}" rel="stylesheet">
<div class="card">
    <div class="card-body">
        <h4 class="card-title"></h4>
        <form id="Questions">
    <div id="SurveyBody" data-group_id="{{$surveyid}}">
      <table id="table">
        <tr >
        </tr>
      </table>
      <div id="body">
      </div>
        </div>
    </div>
    <button id="submit" type="submit" onclick="saveanswers">Submit</button>
  </form>

</div>

@endsection

@section('extrascripts')

<script src="{{ asset('js/answersurvey.js') }}"></script>
@endsection
