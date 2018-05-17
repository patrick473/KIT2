@extends('layouts.app')

@section('content')
@forelse ($surveys as $survey)

      <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title"> {{$survey->title}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{$survey->id}}  /  {{$survey->user_id}}</h6>
              <p class="card-text">{{$survey->description}}</p>
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>
    @empty
        <p class="flow-text center-align">Nothing to show</p>
    @endforelse
    @endsection