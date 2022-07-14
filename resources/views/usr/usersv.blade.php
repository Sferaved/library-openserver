@extends('layouts.app')

@section('title-block')
    Books
@endsection

@section('content')

    <div id="app">
        <user-component></user-component>
        <router-view></router-view>
    </div>
    <script src="/js/app.js"></script>
@endsection
