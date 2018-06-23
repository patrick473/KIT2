@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{$survey->title}}</h4>
        <p>{{$survey->description}}</p>
        <hr>
        
    </div>
</div>
       
@endsection

@section('extrascripts')

<script src="{{ asset('js/answersurvey.js') }}"></script>
@endsection
