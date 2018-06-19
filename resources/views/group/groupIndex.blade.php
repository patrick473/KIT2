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
         @foreach($members->toArray() as $member)
           {{dd($member)}}
           @foreach($member->Groups as $group)
             <div class="card">
               <div class="card-body">
                 <h5 class="card-title">{{$group->title}}</h5>
                 <p class="card-text">{{$group->description}}</p>
               </div>
             </div>
           @endforeach
          @endforeach
      </div>
    </div>
  </div>
</div>

@endsection

@section('extrascripts')

@endsection
