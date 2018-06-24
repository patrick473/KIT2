@extends ('layouts.app')

@section('content')

  <div class="container box">
    <h3>Leden.</h3>
    <div class="row">
      <div class="col-sm-12" id="memberBody">
        @if(!$members->isEmpty())
          @foreach($members as $member)
            @foreach($member->users as $user)
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{$user->username}}</h5>
                  <div class="row">
                    <div class="col align-self-end">
                      <button type="button" class="btn btn-danger float-right deleteMember" id='deleteMember' data-member_id = {{$member->id}}>Verwijder lid</button>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          @endforeach
        @else
          {{--GROEP LEIDER IS OOK MEMBER MAAR WORDT HIER NIET IN MEE GENOMEN--}}
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">De groep heeft nog geen leden.</h5>
            </div>
          </div>
        @endif
      </div>
    </div>

    <hr>

    <h3>Openstaande uitnodigingen.</h3>
    <div class="row">
      <div class="col-sm-12" id="InviteBody">
        @if(!$invites->isEmpty())
          @foreach($invites as $invite)
            @foreach($invite->users as $user)
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{$user->username}}</h5>
                  <div class="row">
                    <div class="col align-self-end">
                      <button type="button" class="btn btn-danger float-right deleteInvite" id='deleteInvite' data-invite_id = {{$invite->id}}>Trek uitnodiging in</button>
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

    <hr>

    <h3>Zoek een gebruiker op naam.</h3>
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Zoek voor een gebruiker" />
     </div>
     <div class="row">
       <div class="col-sm-12" id="UserBody" data-group_id={{$group_id}}>

       </div>
     </div>
  </div>

@endsection

@section('extrascripts')
<script src="{{ asset('js/invite.js') }}"></script>
@endsection
