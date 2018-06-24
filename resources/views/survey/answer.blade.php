@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title"></h4>
    <div id="SurveyBody" data-group_id="{{$surveyid}}">
      <table id="table">
        <tr >
        </tr>
      </table>
      <div id="test">
      </div>
        </div>
    </div>

</div>

@endsection

@section('extrascripts')

<script src="{{ asset('js/answersurvey.js') }}"></script>
@endsection
