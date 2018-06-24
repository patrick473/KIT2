@extends('layouts.app-admin')

@section('content')


<h1>Pagina Management</h1>
<hr>
<p>selecteer pagina om aan te passen:</p>
<select name="pageselector" id="pageselector" class="form-control">
    <option value="1">Home pagina</option>
    <option value="2">Begin page</option>
    <option value="3">Admin Home pagina</option>
    
</select>
<br>
<button type="button"  class="btn btn-primary btn-lg" id="opensectionmodal">Add Section</button>
<hr>

<div id="contentcreatorsection">


  
</div>
<button class="btn btn-primary btn-lg"  type="button" id="submitcontentcreation">save content</button>









<!-- popup -->
<div id="snackbar">Content has been saved</div>


<!-- MODAL -->
<div class="modal fade" id="addContent" tabindex="-1" role="dialog" aria-labelledby="addContentLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addContentLabel">Add section</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Select type of Section</p>
        <select name="sectionselector" id="sectionselector" class="form-control">
          <option value="text">text section</option>
          <option value="bulletpoints">bullet points</option>
          <option value="video">youtube video</option>
          <option value="picture">picture</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="addsectionbutton"id="addsectionbutton">Add Section</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('extrascripts')
<script src="{{ asset('js/cms.js') }}"></script>
@endsection