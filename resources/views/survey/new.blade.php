@extends('layouts.app')

@section('content')
  <div class="card">
      <div class="card-body">
      <h4 class="card-title"> Add Survey</h4>
      <form method="POST" action="{{route('create.survey')}}">
        @csrf
     
        <div class="form-group row">
          <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}</label>

          <div class="col-md-6">
              <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

              @if ($errors->has('title'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('title') }}</strong>
                  </span>
              @endif
          </div>
      </div> 
      <div class="form-group row">
        <label for="description" class="col-md-2 col-form-label text-md-right">{{ __('Description') }}</label>

        <div class="col-md-6">
            <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>

            @if ($errors->has('description'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div> 
         

          <div class="input-field col s12">
            <button type="button" class="btn btn-primary btn-lg">Submit</button>
          </div>
        
        </form>
    </div>
  </div>
@endsection