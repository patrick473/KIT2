<div class="card question">
    <div class="card-body">
      <h4>Title: {{$question->title}}</h4>
      <p>Question Type: {{$question->question_type}}</p>
      <br>
      <h4>Example:</h4>
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
          <label class="form-check-label" for="exampleRadios1">
             radio
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
          <label class="form-check-label" for="exampleRadios2">
             radio
          </label>
        </div>
        <div class="form-check disabled">
          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" >
          <label class="form-check-label" for="exampleRadios3">
             radio
          </label>
        </div>
      </div>
    </div>
  </div>