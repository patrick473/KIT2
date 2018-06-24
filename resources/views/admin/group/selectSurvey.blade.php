@extends ('layouts.app-admin')

@section('content')

  <div class="container box">
    <h3>Zoek een survey om toe te voegen.</h3>
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Zoek een survey title" />
     </div>
     <div class="row">
       <div class="col-sm-12" id="SurveyBody" data-group_id={{$group_id}}>

       </div>
     </div>
  </div>

@endsection

@section('extrascripts')
  <script src="{{ asset('js/selectSurvey.js') }}"></script>
@endsection
