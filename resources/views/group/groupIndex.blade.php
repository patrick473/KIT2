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
    <h3>Uw groepen.</h3>
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
                         <button type="button" class="btn btn-info groupOverview" id="groupOverview" data-id={{$group->id}}>Overzicht</button>
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
                         <button type="button" class="btn btn-info groupOverview" id="addMember" data-id={{$group->id}}>Overzicht</button>
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

@endsection

@section('extrascripts')
  <script src="{{ asset('js/DeleteGroup.js') }}"></script>
@endsection
