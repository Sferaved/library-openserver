@extends('layouts.app')

@section('title-block')
    Books
@endsection

@section('content')
<div id="app">
    <book-component></book-component>
</div>
<script src="./js/app.js"></script>
@endsection

