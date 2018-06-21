@extends('layouts.app')

@section('content')

<div id="content" data-page="1">

</div>




@endsection




@section('extrascripts')
@include('scripts.contentscript')
<!--
    Probably redundant but to scared to delete
    <script src="{{ asset('js/loaddynamiccontent.js') }}"></script>-->
@endsection
