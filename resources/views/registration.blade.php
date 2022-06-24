@extends('layouts.app')

@section('title-block')
    Registration
@endsection

@section('content')

    <div class="container">
        <div class="row col-12">
            <h1>Registration page</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <form role="form" action="{{route('user.registration')}}" class="form-horizontal" method="post">
                @csrf
                <div class="form-grope">
                    <label for="name" class="control-label col-md-2">Name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="name" id="email" placeholder="Andrii Korzhov"><br>

                    </div>
                    <label for="email" class="control-label col-md-2">Email</label>
                    <div class="col-md-10">
                        <input type="email" class="form-control" name="email" id="email" placeholder="andrey18051@gmail.com"><br>

                    </div>
                </div>
                <div class="form-grope">
                    <label for="password" class="control-label col-md-2" >Password</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" ><br>

                    </div>
                </div>
                <div class="form-grope">
                    <div class="col-md-10 col-md-offset-2">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <button  type="reset"  class="btn btn-danger" >
                            Reset
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

