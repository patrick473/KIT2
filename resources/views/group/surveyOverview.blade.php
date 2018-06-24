@extends ('layouts.app')

@section('content')

  <div class="row">
    <div class="col-sm-12" id="memberBody">
      @if(!$members->isEmpty())
        @foreach($members as $member)
          @foreach($member->users as $user)
              <div class="card">
                @if($member->id == $groupLeader->id)
                  <h5 class="card-header">Groepsleider:</h5>
                @elseif ($firstMember->id == $member->id)
                  <h5 class="card-header">Groepsleden:</h5>
                @endif
                <div class="card-body">
                  <h5 class="card-title">{{$user->username}}</h5>
                </div>
              </div>
          @endforeach
        @endforeach
      @else
        {{--Als dit bericht wordt getoond zit er foute data in de database. een groep heeft namelijk altijd een lijder dus lid--}}
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">De groep heeft nog geen leden.</h5>
          </div>
        </div>
      @endif
    </div>
  </div>

  <hr>

  <div class="container box">
    <h3>Vragenlijsten voor deze groep</h3>
    <div class="row">
      <div class="col-sm-12" id="SurveyBody">
        @if($groupLeader->id == $currentUser)
          <div class="card">
            <div class="card-body">
              <div class="card-text col text-center"><a type="button" class="btn btn-success addSurvey" id='addSurvey' data-group_id ="{{$id}}" href="{{route('survey.selectpage',['group_id'=>$id])}}">Voeg een vragenlijst toe aan de groep</a></div>
            </div>
          </div>
        @endif
        @if(!$surveys->isEmpty())
          @foreach($surveys as $survey)
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{$survey->title}}</h5>
                  <p class="card-text">{{$survey->description}}</p>
                  <div class="row">
                    <div class="col align-self-start">
                      <button type="button" class="btn btn-success answerSurvey" id='answerSurvey' data-survey_id = {{$survey->groupsurvey}}>Beantwoord vragenlijst</button>
                    </div>
                    <div class="col text-center">
                      <button type="button" class="btn btn-info surveyAnswers" id='surveyAnswers' data-survey_id = {{$survey->groupsurvey}}>Vragenlijst overzicht</button>
                    </div>
                    @if($groupLeader->id == $currentUser)
                      <div class="col align-self-end">
                        <button type="button" class="btn btn-danger float-right removeSurvey_group" id='removeSurvey_group' data-survey_id = {{$survey->id}}>Verwijder vragenlijst uit de groep</button>
                      </div>
                    @else
                      <div class="col align-self-end">
                        <button type="button" class="btn btn-light float-right">Alleen groepsleider mag vragenlijsten uit groep verwijderen.</button>
                      </div>
                    @endif
                  </div>
                </div>
              </div>
          @endforeach
        @else
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">De groepleider heeft nog geen vragenlijsten toegevoegd.</h5>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>

@endsection

@section('extrascripts')
  <script src="{{ asset('js/surveyOverview.js') }}"></script>
@endsection
