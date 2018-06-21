@extends('layouts.app')

@section('content')

    <link href="{{ asset('css/survey.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Vragenlijst</h4>
            <h5>Status: <label id="status-label"> geen</label></h5>
            <form class='col-md-12 col-form-label text-md-right'>
                <div class="form-group row">
                    <input id='survey-id' type='hidden'/>

                    <div class="col-md-12">
                        <label class="input-label">Vragenlijst titel: <input id="survey-title-input" class="autosave form-control survey-input" name="title" required autofocus></label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label class="input-label">Vragenlijst beschrijving: <textarea id="survey-description-input" class="autosave form-control survey-input survey-textarea" name="description" required autofocus></textarea></label>
                    </div>
                </div>
            </form>


            <h4 class="card-title">Voeg een vraag toe</h4>
            <form class='col-md-12 col-form-label text-md-right'>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label class="input-label">Vraag titel: <input id="question-title-input" class="form-control survey-input" name="title" required autofocus></label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label class="input-label">Vraag beschrijving: <textarea id="question-description-input" class="form-control survey-input survey-textarea" name="description" required autofocus></textarea></label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label class="input-label">Type vraag: <select id="question-type-input" class="form-control survey-input survey-select" name="type" required autofocus>
                                <option>Text</option>
                            </select></label>
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

@endsection