@extends ('layouts.app')

@section('content')


    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addGroupModal">
        Groep aanmaken
      </button>




  <hr>

  <div class="container box">
    <div class="row">
      <div class="col text-center">
        <h3>Uw groepen</h3>
      </div>
    </div>
     <div class="row">
       <div class="col-sm-12" id="GroupBody">
         @if(!$members->isEmpty())
           @foreach($members as $member)
             @foreach($member->groups as $group)

               <div class="card">
                 <div class="card-body">
                   <h5 class="card-title">{{$group->title}}</h5>
                   <p class="card-text">{{$group->description}}</p>
                   @if ($member->group_leader == 1)
                     <div class="row">
                       <div class="col align-self-start">
                         <button type="button" class="btn btn-success addMember" id="addMember" data-id={{$group->id}}>Beheer groep leden</button>
                       </div>
                       <div class="col text-center">
                         <button type="button" class="btn btn-info groupOverview" id="groupOverview" data-id={{$group->id}}>Survey overzicht</button>
                       </div>
                       <div class="col align-self-end">
                         <button type="button" class="btn btn-danger float-right groupDeletebutton" data-id={{$group->id}}>Verwijder groep</button>
                       </div>
                     </div>
                   @else
                     <div class="row">
                       <div class="col align-self-start">
                         <button type="button" class="btn btn-light">Alleen beheerder kan lid toevoegen</button>
                       </div>
                       <div class="col text-center">
                         <button type="button" class="btn btn-info groupOverview" id="addMember" data-id={{$group->id}}>Survey overzicht</button>
                       </div>
                       <div class="col align-self-end">
                         <button type="button" class="btn btn-danger float-right memberDeletebutton" data-id={{$member->id}}>Verlaat groep</button>
                       </div>
                     </div>
                  @endif
               </div>
             </div>

             @endforeach
            @endforeach
          @else

            <div class="card">
              <div class="card-body">Geen gebruikers met deze naam gevonden.</div>
            </div>

          @endif
      </div>
    </div>
  </div>
</div>
<!-- modal 1: add group -->
<div class="modal fade" id="addGroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="/group/store">
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
              <input type="text" class="form-control" id="title" placeholder="Groep naam" name="title" required>
            </div>
            <div class="form-group">
              <label for="description">Groep omschrijving</label>
              <textarea class="form-control" id="description" rows="3" placeholder="Waar is de groep voor bedoeld?" name="description" required></textarea>
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
  <script src="{{ asset('js/DeleteGroup.js') }}"></script>
@endsection
