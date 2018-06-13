@extends ('layouts.app')

@section('content')

  <form method="POST" action="/admin/group/store">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="GroupName">Groep naam:</label>
      <input type="text" class="form-control" id="GroupName" name="GroupName" placeholder="test groep">
    </div>
    <button type="submit" class="btn btn-primary btn-lg">Maak groep aan</button>
  </form>

@endsection
