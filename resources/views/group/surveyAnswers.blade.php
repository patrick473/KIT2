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
          <div class="row">
            <div class='col-md-12'>
              <p class='text-success font-weight-bold'>Antwoorden {{$question->title}}:</p>
            </div>
          </div>
          <div class='row'>
            @if(count($question->answers) > 0)
              @foreach($question->answers as $answer)
                <div class='col-md-3'>
                  <div class="border_custom">
                    <p class='bg_custom'>{{$answer->user->username}}:</p><p>{{$answer->value}}</p>
                  </div>
                </div>
              @endforeach
            @else
              <div class='col-md-3'>
                  <p class='bg_custom_2'>Er zijn nog geen antwoorden gegeven op deze vraag.</p>
              </div>
            @endif
          </div>
        </div>
      </div>
      <hr>
    @endif
  @endforeach

@endsection

@section('extrascripts')
  <script src="{{ asset('js/surveyAnswers.js') }}"></script>
@endsection
