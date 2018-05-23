@extends('layouts.app')

@section('content')
  <div class="card">
      <div class="card-body">
      <h4 class="card-title"> Add Survey</h4>
      {!!Form::open(['route' => 'create.survey'])!!}
      
        {!! Form::token()!!}
     
        <div class="form-group row">
         
          {!! Form::label('title', __('Title'), array('class' => 'col-md-2 col-form-label text-md-right'))!!}
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
       
        {!! Form::label('description', __('Description'), array('class' => 'col-md-2 col-form-label text-md-right'))!!}
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
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
          </div>
        
        {!! Form::close()!!}
    </div>
  </div>
@endsection