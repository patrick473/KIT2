@extends ('layouts.app')

@section('content')
  <div class="row">
    <div class="col-sm-12" id="memberBody">
      @if(!$members->isEmpty())
        @foreach($members as $member)
          @foreach($member->users as $user)
              <div class="card">
                @if($member->group_leader == 1)
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
    <h3>Surveys voor deze groep</h3>
    <div class="row">
      <div class="col-sm-12" id="SurveyBody">
        @if(!$surveys->isEmpty())
          @foreach($surveys as $survey)
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{$survey->title}}</h5>
                  <p class="card-text">{{$survey->description}}</p>
                  <div class="row">
                    <div class="col align-self-end">
                      <button type="button" class="btn btn-success float-right answerSurvey" id='answerSurvey' data-member_id = {{$survey->id}}>Beantwoord survey</button>
                    </div>
                  </div>
                </div>
              </div>
          @endforeach
        @else
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">De groepleider heeft nog geen surveys toegevoegd.</h5>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>

@endsection

@section('extrascripts')
  <script> src="{{ asset('js/surveyOverview.js') }}"></script>
@endsection
