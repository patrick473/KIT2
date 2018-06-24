@extends ('layouts.app')

@section('content')

  @foreach($survey->questions as $question)
    @if($question->type == 'Text')
      <div class='row'>
        <div class='col-md-12'>
          <h5>{{$question->title}}</h5>
        </div>
        <div class='col-md-12'>
          <p>{{$question->description}}</p>
        </div>
        <div class='col-md-12'>
          <p>Answers: </p>
        </div>
      </div>
      <br/>
    @endif
  @endforeach

@endsection

@section('extrascripts')
  <script src="{{ asset('js/surveyAnswers.js') }}"></script>
@endsection
