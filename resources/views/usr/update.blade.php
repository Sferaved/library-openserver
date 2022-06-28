@extends('layouts.app')

@section('title-block')
    Update user
@endsection

@section('content')

    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Update</div>
                        <div class="card-body">

                            <form action="{{ route('user.update-submit', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="name" class="form-control" name="name" value="{{$data->name}}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-grope">
                                    <label for="photo" class="control-label col-md-2" >Photo</label>

                                    <input type="file" class="form-control" name="photo" id="photo"><br>

                                </div>
                                <div class="col-md-6 offset-md-4" style="margin-top: 10px">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

