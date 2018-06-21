@extends ('layouts.app')

@section('content')

  <h3>Groep uitnodigingen.</h3>
  <div class="row">
    <div class="col-sm-12" id="InviteBody">
        @if(!$user->invites->isEmpty())
          @foreach($user->invites as $invite)
            @foreach($invite->groups as $group)
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">U bent uitgenodigd voor: {{$group->title}}</h5>
                  <p class="card-text">Groep omschrijving: {{$group->description}}</p>
                  <div class="row">
                    <div class="col align-self-start">
                      <button type="button" class="btn btn-success acceptInvite" id='acceptInvite' data-invite_id = {{$invite->id}}>Accepteer uitnodiging</button>
                    </div>
                    <div class="col align-self-end">
                      <button type="button" class="btn btn-danger float-right deleteInvite" id='deleteInvite' data-invite_id = {{$invite->id}}>Weiger uitnodiging</button>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          @endforeach
      @else
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Geen openstaande uitnodigingen gevonden.</h5>
          </div>
        </div>
      @endif
    </div>
  </div>

@endsection

@section('extrascripts')
<script src="{{ asset('js/accept.js') }}"></script>
@endsection
