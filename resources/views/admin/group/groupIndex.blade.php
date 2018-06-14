@extends ('layouts.app')

@section('content')

  {{-- <form method="POST" action="/admin/group/store">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="GroupName">Groep naam:</label>
      <input type="text" class="form-control" id="GroupName" name="GroupName" placeholder="test groep">
    </div>
    <button type="submit" class="btn btn-primary btn-lg">Maak groep aan</button>
  </form> --}}

<div class="container box">
   <div class="form-group">
    <input type="text" name="search" id="search" class="form-control" placeholder="Zoek voor een groep" />
   </div>
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
     <thead>
      <tr>
       <th>id</th>
       <th>Groep naam</th>
      </tr>
     </thead>
     <tbody>

     </tbody>
    </table>
   </div>
  </div>
 </div>
</div>

@endsection

@section('extrascripts')
<script src="{{ asset('js/live_search.js') }}"></script>
@endsection
