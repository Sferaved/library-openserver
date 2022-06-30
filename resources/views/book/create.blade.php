@extends('layouts.app')

@section('title-block')
    Book create
@endsection

@section('content')
 <div class="container">

     <main class="login-form">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-md-8">
                     <div class="card">
                         <div class="card-header">Books create</div>
                         <div class="card-body">

                             <form action="{{ route('book.create') }}" method="POST" enctype="multipart/form-data">
                                 @csrf
                                 <div class="form-group row">
                                     <label for="category_id" class="col-md-4 col-form-label text-md-right">Choose category</label>
                                     <select name="category_id"  class="form-select form-select-sm" aria-label=".form-select-sm example">
                                        @foreach(App\Models\Category::All() as $category)
                                             <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach

                                         @if ($errors->has('category_id'))
                                             <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                         @endif
                                     </select>
                                 </div>
                                 <div class="form-group row">
                                     <label for="category_id" class="col-md-4 col-form-label text-md-right">Choose author</label>
                                     <select name="author_id"  class="form-select form-select-sm" aria-label=".form-select-sm example">

                                         @foreach(App\Models\Author::All() as $author)
                                             <option value="{{$author->id}}">{{$author->name}}</option>
                                         @endforeach
                                         @if ($errors->has('author_id'))
                                             <span class="text-danger">{{ $errors->first('author_id') }}</span>
                                         @endif
                                     </select>
                                 </div>
                                 <div class="form-group row" style="margin-top: 10px">
                                     <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                     <div class="col-md-6">
                                         <input type="text" id="name" class="form-control" name="name" placeholder="Book name" required autofocus>
                                         @if ($errors->has('name'))
                                             <span class="text-danger">{{ $errors->first('name') }}</span>
                                         @endif
                                     </div>
                                 </div>
                                 <div class="form-group row" style="margin-top: 10px">
                                     <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                                     <div class="col-md-6">
                                         <textarea name="description" id="description" class="form-control"  placeholder="Description"></textarea>
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
                                         Create
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

