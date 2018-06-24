@extends ('layouts.app-admin')

@section('content')

  <div class="container box">
    <h3>Zoek een lid om toe te voegen.</h3>
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Zoek een lid" />
     </div>
     <div class="row">
       <div class="col-sm-12" id="MemberBody">

       </div>
     </div>
  </div>

@endsection

@section('extrascripts')
<script src="{{ asset('js/live_member_search.js') }}"></script>
@endsection
