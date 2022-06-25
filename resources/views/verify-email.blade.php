@extends('layouts.app')

@section('title-block')
    Confirm
@endsection

@section('content')
    <div class="container">
        <div class="row col-12">
            <h1>Confirm email</h1>
        </div>
    </div>

    <p>Need to confirm your email </p>
    <form role="form" action="{{route('verification.send')}}" class="form-horizontal" method="post">
        @csrf
        <button type="submit" class="btn btn-info">Send again</button>
    </form>


@endsection

