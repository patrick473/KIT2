@extends ('layouts.app')

@section('content')

  <div class="container box">
    <h3>Zoek een gebruiker op naam.</h3>
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Zoek voor een gebruiker" />
     </div>
     <div class="row">
       <div class="col-sm-12" id="MemberBody" data-group_id={{$group_id}}>

       </div>
     </div>
  </div>

@endsection

@section('extrascripts')
<script src="{{ asset('js/protected_member_search.js') }}"></script>
@endsection
