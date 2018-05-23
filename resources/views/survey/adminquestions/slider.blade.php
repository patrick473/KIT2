<div class="card question">
    <div class="card-body">
      <h4>Title: {{$question->title}}</h4>
      <p>Question Type: {{$question->question_type}}</p>
      <br>
      <h4>Example:</h4>
      <div class="form-group">
      <label for="exampleText{{$question->id}}">{{$question->title}}</label>
      <input type="range" min="1" max="10" value="1" class="slider" id="myRange">
      </div>
    </div>
  </div>