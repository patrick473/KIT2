@extends('layouts.app-admin')

@section('content')

    <link href="{{ asset('css/survey.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{asset('js/ui/jquery-ui.min.js')}}"></script>
    <link href="{{ asset('js/ui/jquery-ui.min.css')}}" rel="stylesheet">

    <div class="card col-xs-12">
        <div class="card-body">
            <h4 class="card-title">Vragenlijst</h4>
            <h5>Status: <label id="status-label"> geen</label></h5>
            <form class='col-md-12 col-form-label text-md-right'>
                <div class="form-group row">
                    <input id='survey-id' type='hidden'/>

                    <div class="col-md-12">
                        <div class="row">
                            <label class="input-label col-xs-12 col-md-3">Vragenlijst titel: </label>
                            <input id="survey-title-input" class="autosave form-control survey-input col-md-6 col-xs-12" name="title" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="input-label col-xs-12 col-md-3">Vragenlijst beschrijving: </label>
                            <textarea id="survey-description-input" class="autosave form-control survey-input survey-textarea col-md-6 col-xs-12" name="description" required autofocus></textarea>
                        </div>
                    </div>
                </div>
            </form>


            <h4 class="card-title">Voeg een vraag toe</h4>
            <form class='col-md-12 col-form-label text-md-right'>
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="input-label col-xs-12 col-md-3">Vraag titel: </label>
                            <input id="question-title-input" class="form-control survey-input col-md-6 col-xs-12" name="title" required autofocus>
                        </div>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="input-label col-xs-12 col-md-3">Vraag beschrijving: </label>
                            <textarea id="question-description-input" class="form-control survey-input survey-textarea col-md-6 col-xs-12" name="description" required autofocus></textarea>
                        </div>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="input-label col-xs-12 col-md-3">Type vraag: </label>
                            <select id="question-type-input" class="form-control survey-input survey-select col-xs-12 col-md-6" name="type" required autofocus>
                                <option>Text</option>
                                <option>Slider</option>
                            </select>
                        </div>

                    </div>
                </div>
            </form>
            <div class="input-field col-s-12 center-children">
                <button id="add-question-button" class="col-md-6 col-lg-offset-3 btn btn-primary btn-lg">Vraag toevoegen</button>
            </div>
        </div>
    </div>

    <div class="card">
        <form id="survey-example-form">
            <div class="card-body">
                <h4 id="example-title" class="card-title"></h4><br/>
                <div class="questions-wrapper">

                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/survey.js') }}"></script>
    <script>loadSurvey({{$survey}})</script>

@endsection