@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="forename" class="col-md-4 col-form-label text-md-right">forename</label>

                            <div class="col-md-6">
                                <input id="forename" type="text" class="form-control{{ $errors->has('forename') ? ' is-invalid' : '' }}" name="forename" value="{{ old('forename') }}" required autofocus>

                                @if ($errors->has('forename'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('forename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">surname</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" required autofocus>

                                @if ($errors->has('surname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="school" class="col-md-4 col-form-label text-md-right">School</label>
                            <div class="col-md-6">
                                <input id="school" type="text" class="form-control{{ $errors->has('school') ? ' is-invalid' : '' }}" name="school" value="{{ old('school') }}" required>

                                @if ($errors->has('school'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('school') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="schoollocation" class="col-md-4 col-form-label text-md-right">School location</label>
                            <div class="col-md-6">
                                <input id="schoollocation" type="text" class="form-control{{ $errors->has('schoollocation') ? ' is-invalid' : '' }}" name="schoollocation" value="{{ old('schoollocation') }}" required>

                                @if ($errors->has('schoollocation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('schoollocation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
          

                        <div class="form-group row">
                            <label for="level" class="col-md-4 col-form-label text-md-right">level</label>
                            <div class="col-md-6">
                            <select  name="level" class="form-control" id="exampleFormControlSelect3">
                                <option value="basisonderwijs">basisonderwijs</option>
                                <option value="vmbo">vmbo</option>
                                <option value="havo">havo</option>
                                <option value="vwo">vwo</option>
                                <option value="mbo1">mbo1</option>
                                <option value="mbo2">mbo2</option>
                                <option value="mbo3">mbo3</option>
                                <option value="mbo4">mbo4</option>
                                <option value="hbo">hbo</option>
                                <option value="wo">wo</option>
                                <option value="anders">anders</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">role</label>
                            <div class="col-md-6">
                            <select  name="role" class="form-control" id="exampleFormControlSelect4">
                                <option value="student">Student</option>
                                <option value="docent">Docent</option>
                                <option value="anders">Anders</option>
                              </select>
                            </div>
                        </div>





                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
