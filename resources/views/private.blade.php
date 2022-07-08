@extends('layouts.app')

@section('title-block')
    Private
@endsection

@section('content')
    <div class="container">
        <div class="row col-12">
            <h1>Private page</h1>
        </div>
    </div>

    <div id="app">
        <privat-component></privat-component>
    </div>
    <script src="./js/app.js"></script>

@endsection
