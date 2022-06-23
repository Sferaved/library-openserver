<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>


    <div class="container">
        <div class="row" style="margin-top: 10px">
            <div class="col-md-2">
                <h2>Filter</h2>
                <form action="{{route('books')}}" method="get">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Search by name of Books</label>
                        <input name="search_field" @if(isset($_GET['search_field'])) value="{{$_GET['search_field']}}" @endif type="text" class="form-control" id="exampleFormControlInput1" placeholder="Type something">
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Choose category</div>
                        <select name="category_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option></option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if(isset($_GET['category_id'])) @if($_GET['category_id'] == $category->id) selected @endif @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-label">Choose author</div>
                        <select name="author_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option></option>
                            @foreach($authors as $author)
                                <option value="{{$author->id}}" @if(isset($_GET['author_id'])) @if($_GET['author_id'] == $author->id) selected @endif @endif>{{$author->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-label">Sort ASC by ...</div>

                        <select name="sort_asc" class="form-select form-select-sm" aria-label=".form-select-sm example">
                             <option value="{{$by = 'author_id'}}"  @if(isset($_GET['by'])) @if($_GET['by'] == 'author->id') selected @endif @endif>{{'Author ID'}}</option>
                             <option value="{{$by = 'name'}}"  @if(isset($_GET['by'])) @if($_GET['by'] == 'name') selected @endif @endif>{{'Name'}}</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="location.reload();">Submit</button>
                </form>

            </div>
            <div class="col-md-10">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>#</th>
                        <th>Cover</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Description</th>

                        <th>Category</th>
                    </tr>
                    @foreach($data as $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td> <img src="{{asset($value->cover)}}" style="width: 70px" alt=""></td>

                            <td>{{$value->name}}</td>
                            <td>{{$value->author['name']}}</td>
                            <td>{{$value->description}} </td>
                            <td>{{$value->category['name']}} </td>
                        </tr>
                    @endforeach
                </table>
                <div style="margin: 10px;"> {{$data->withQueryString()->links('vendor.pagination.bootstrap-4') }}</div>
            </div>

       </div>

    </div>

    </body>
</html>
