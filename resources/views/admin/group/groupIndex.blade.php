@extends ('layouts.app-admin')

@section('content')
  <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#addGroupModal">
      Groep aanmaken
    </button>

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

  <div class="modal fade" id="addGroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form method="POST" action="/admin/group/store">
        {{ csrf_field() }}
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Groep aanmaken</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="title">Groep naam</label>
                <input type="text" class="form-control" id="title" placeholder="Groep naam" name="title" required />
              </div>
              <div class="form-group">
                <label for="description">Groep omschrijving</label>
                <textarea class="form-control" id="description" rows="3" placeholder="Waar is de groep voor bedoeld?" name="description" required="required"></textarea>
              </div>
        </div>
        <div class="modal-footer">

                <button type="submit" class="btn btn-primary">Maak groep aan</button>

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </form>
  </div>

@endsection

@section('extrascripts')
<script src="{{ asset('js/live_group_search.js') }}"></script>
<script src="{{ asset('js/AdminDeleteGroup.js') }}"></script>
@endsection
