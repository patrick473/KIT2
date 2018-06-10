@extends('layouts.app')

@section('content')

<h1>Content Management</h1>
<hr>
<p>select page to edit:</p>
<select name="pageselector" id="pageselector" class="form-control">
    <option value="homepage">Home page</option>
    <option value="contact">Contact page</option>
</select>
<br>
<button type="button" class="btn btn-primary btn-lg" id="addcomponentbutton">Add component</button>
<hr>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('extrascripts')
<script src="{{ asset('js/cms.js') }}"></script>
@endsection