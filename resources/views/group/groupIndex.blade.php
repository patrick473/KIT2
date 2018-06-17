@extends ('layouts.app')

@section('content')
  <h3>Groep aanmaken.</h3>
  <form method="POST" action="/group/store">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="title">Groep naam</label>
      <input type="text" class="form-control" id="title" placeholder="Groep naam" name="title">
    </div>
    <div class="form-group">
      <label for="description">Groep omschrijving</label>
      <textarea class="form-control" id="description" rows="3" placeholder="Waar is de groep voor bedoeld?" name="description"></textarea>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Maak groep aan</button>
    </div>
  </form>

  <hr>

  <div class="container box">
    <h3>Zoek een groep.</h3>
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Zoek voor een groep" />
     </div>
     <div class="row">
       <div class="col-sm-12" id="GroupBody">

       </div>
     </div>
  </div>

@endsection

@section('extrascripts')
<script src="{{ asset('js/live_group_search.js') }}"></script>
<script src="{{ asset('js/DeleteGroup.js') }}"></script>
@endsection
