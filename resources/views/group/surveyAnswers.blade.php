@extends ('layouts.app')

@section('content')
  <link href="{{ asset('css/survey.css')}}" rel="stylesheet">

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
              <div class='col-md-12'>
                  <p class='bg_custom_2'>Er zijn nog geen antwoorden gegeven op deze vraag.</p>
              </div>
            @endif
          </div>
        </div>
      </div>
      <hr>
    @elseif($question->type=='Slider')
      <div class="row">
        <div class="col-md-12">
          <h5>{{$question->title}}</h5>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p>{{$question->description}}</p>
        </div>
      </div>
      <div class='row'>
        <div class="col-md-12">
          <div class='slider-wrapper row'>
              <input class='col-md-12 col-xs-12 slider' type='range' disabled/>
              <input disabled value={{$question->attributes->start}} class='autosave col-md-4 col-xs-4 slider-start start'/><input disabled value={{$question->attributes->middle}} class='autosave slider-middle col-md-4 col-xs-4 middle'/><input disabled value={{$question->attributes->end}} class='autosave slider-end col-md-4 col-xs-4 end'/>
          </div>
        </div>
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
                  <p class='bg_custom'>{{$answer->user->username}}:</p><p>Waarde gegeven: {{$answer->value}}</p>
                </div>
              </div>
            @endforeach
          @else
            <div class='col-md-12'>
                <p class='bg_custom_2'>Er zijn nog geen antwoorden gegeven op deze vraag.</p>
            </div>
          @endif
        </div>
      </div>
      <hr>
    @elseif($question->type=='Radio')
      <div class="row">
        <div class="col-md-12">
          <h5>{{$question->title}}</h5>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p>{{$question->description}}</p>
        </div>
      </div>

      <div class='row'>
        <div class="col-md-12">
          <form>
            <div class='row'>
              <div class="col-md-12">
                <input disabled name='score' type='radio' value='{{$question->attributes->first}}'> {{$question->attributes->first}}
              </div>
            </div>
            <div class='row'>
              <div class="col-md-12">
                <input disabled  name='score' type='radio' value='{{$question->attributes->second}}'> {{$question->attributes->second}}
              </div>
            </div>
            <div class='row'>
              <div class="col-md-12">
                <input disabled  name='score' type='radio' value='{{$question->attributes->third}}'> {{$question->attributes->third}}
              </div>
            </div>
            <div class='row'>
              <div class="col-md-12">
                <input disabled  name='score' type='radio' value='{{$question->attributes->fourth}}'> {{$question->attributes->fourth}}
              </div>
            </div>
            <div class='row'>
              <div class="col-md-12">
                <input disabled  name='score' type='radio' value='{{$question->attributes->fifth}}'> {{$question->attributes->fifth}}
              </div>
            </div>
          </form>
        </div>
      </div>
      <br>
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
                  <p class='bg_custom'>{{$answer->user->username}}:</p><p>Geselecteerd antwoord: {{$answer->value}}</p>
                </div>
              </div>
            @endforeach
          @else
            <div class='col-md-12'>
                <p class='bg_custom_2'>Er zijn nog geen antwoorden gegeven op deze vraag.</p>
            </div>
          @endif
        </div>
      </div>
      <hr>
    @endif

  @endforeach
  <button type="button" class="btn btn-success pdfConverter" id="pdfConverter"  data-id = {{$id}}>Print of exporteer naar pdf</button>

@endsection

@section('extrascripts')
  <script src="{{ asset('js/surveyAnswers.js') }}"></script>
@endsection
