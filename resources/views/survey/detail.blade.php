@extends('layouts.app')

@section('content')
  
     
      <h1> {{ $survey->title }}</h1>
      <p> {{ $survey->description }}</p>
      <br>
      <h2>Questions:</h2>
      <div class="divider" style="margin:20px 0px;"></div>    
          @forelse ($survey->questions as $question)
         
                    @if($question->question_type === 'text')
                    @include('survey.adminquestions.text',['question'=>$question])
                    @elseif($question->question_type === 'textarea')
                    @include('survey.adminquestions.textarea',['question'=>$question])
                    @elseif($question->question_type === 'radio')
                    @include('survey.adminquestions.radio',['question'=>$question])
                    @elseif($question->question_type === 'checkbox')
                    @include('survey.adminquestions.checkbox',['question'=>$question])
                    @elseif($question->question_type === 'slider')
                    @include('survey.adminquestions.slider',['question'=>$question])
                    @endif 
                 
              
          @empty
            <span style="padding:10px;">Nothing to show. Add questions below.</span>
          @endforelse
      </ul>
      <h2 class="text">Add Question</h2>
      <form method="POST" action="{{ $survey->id }}/questions" id="boolean">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
          <div class="input-field col s12">
            <select class="browser-default" name="question_type" id="question_type">
              <option value="" disabled selected>Choose your option</option>
              <option value="text">Text</option>
              <option value="textarea">Textarea</option>
              <option value="checkbox">Checkbox</option>
              <option value="radio">Radio Buttons</option>
              <option value="slider">Slider</option>
            </select>
          </div>                
          <div class="input-field col s12">
            <input name="title" id="title" type="text">
            <label for="title">Question</label>
          </div>  
          <!-- this part will be chewed by script in init.js -->
          <span class="form-g"></span>

          <div class="input-field col s12">
          <button class="btn waves-effect waves-light">Submit</button>
          </div>
        </div>
        </form>
    </div>
  </div>
@endsection