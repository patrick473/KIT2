@extends('layouts.app')

@section('content')

<ul class="list-group">
    <li class="list-group-item list-group-item-dark">
        <h2 class="flow-text">Recent Surveys
            <a style="float:right;" href="{{ route('new.survey', 'Create new') }}">create new
            </a>
        </h2>
    </li>
    @forelse ($surveys as $survey)
      <li class="list-group-item">
        <div>
            {{ url('detail.survey', $survey->title, ['id'=>$survey->id])}}
            <a href="survey/view/{{ $survey->id }}" title="Take Survey" class="secondary-content">take</a>
            <a href="survey/{{ $survey->id }}" title="Edit Survey" class="secondary-content">edit</a>
            <a href="survey/answers/{{ $survey->id }}" title="View Survey Answers" class="secondary-content">view answers</a>
        </div>
        </li>
    @empty
        <p class="flow-text center-align">Nothing to show</p>
    @endforelse
</ul>


@endsection
