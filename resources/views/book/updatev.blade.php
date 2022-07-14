@extends('layouts.app')

@section('title-block')
    Book update
@endsection

@section('content')
    <div class="container">

        <main class="login-form">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Book update</div>
                            <div class="card-body">

                                <form action="{{ route('update-submit-bv', $data->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="category_id" class="col-md-4 col-form-label text-md-right">Choose category</label>
                                        <select name="category_id"  class="form-select form-select-sm" aria-label=".form-select-sm example">
                                            <option value="{{$data->category_id}}">{{$data->category['name']}}</option>
                                            @foreach(App\Models\Category::All() as $category)
                                                @if($category->id != $data->category_id)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endif
                                            @endforeach

                                            @if ($errors->has('category_id'))
                                                <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category_id" class="col-md-4 col-form-label text-md-right">Choose author</label>
                                        <select name="author_id"  class="form-select form-select-sm" aria-label=".form-select-sm example">
                                            <option value="{{$data->author_id}}">{{$data->author['name']}}</option>
                                            @foreach(App\Models\Author::All() as $author)
                                                @if($author->id != $data->author_id)
                                                <option value="{{$author->id}}">{{$author->name}}</option>
                                                @endif
                                            @endforeach
                                            @if ($errors->has('author_id'))
                                                <span class="text-danger">{{ $errors->first('author_id') }}</span>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group row" style="margin-top: 10px">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                        <div class="col-md-6">
                                            <input type="text" id="name" class="form-control" name="name" value="{{$data->name}}" required autofocus>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-top: 10px">
                                        <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                                        <div class="col-md-6">
                                            <textarea name="description" id="description" class="form-control"  >{{$data->description}}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-grope">
                                        <label for="cover" class="control-label col-md-2" >Cover</label>
                                        <input type="file" class="form-control" name="cover" id="cover"><br>
                                    </div>
                                    <div class="col-md-2 offset-md-10">
                                        <button type="submit" class="btn btn-primary">
                                            Update
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

