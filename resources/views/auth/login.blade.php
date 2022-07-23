@extends('layouts.app')

@section('title-block')
    Login
@endsection
Login
@section('content')


    <div id="app">
        <login-component></login-component>
        <router-view></router-view>
    </div>

    <script src="/js/app.js"></script>


 @endsection
