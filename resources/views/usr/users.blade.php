@extends('layouts.app')

@section('title-block')
    Users
@endsection

@section('content')

    <div class="container">
        <div class="row col-12">
            <h1>Users page</h1>
        </div>
         <div class="row" style="margin-top: 10px">
                 <div class="col-md-2">

                 <form action="{{route('user.users')}}" method="get">
                         <div class="mb-3">
                             <a href="{{route('user.create')}}" class="btn btn-info">New user</a>
                         </div>
                         <div class="mb-3">
                             <label for="exampleFormControlInput1" class="form-label">Search by name</label>
                             <input name="search_field" @if(isset($_GET['search_field'])) value="{{$_GET['search_field']}}" @endif type="text" class="form-control" id="exampleFormControlInput1" placeholder="Type something">
                         </div>
                         <div class="mb-3">

                                 <div class="form-label">Sort ASC by ...</div>
                                 <select name="sort_asc" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                     <option value="{{$by = 'name'}}"  @if(isset($_GET['by'])) @if($_GET['by'] == 'name') selected @endif @endif>{{'Name'}}</option>
                                     <option value="{{$by = 'email'}}"  @if(isset($_GET['by'])) @if($_GET['by'] == 'email') selected @endif @endif>{{'Email'}}</option>
                                     <option value="{{$by = 'created_at'}}"  @if(isset($_GET['by'])) @if($_GET['by'] == 'created_at') selected @endif @endif>{{'Created_at'}}</option>
                                     <option value="{{$by = 'id'}}"  @if(isset($_GET['by'])) @if($_GET['by'] == 'id') selected @endif @endif>{{'#'}}</option>
                                 </select>
                         </div>
                         <button type="submit" class="btn btn-primary" onclick="location.reload();">Submit</button>
                     </form>

                 </div>
                 <div class="col-md-10">
                     <table class="table table-bordered table-hover">
                         <tr>
                             <th>#</th>
                             <th>Avatar</th>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Created_at</th>
                             <th></th>
                         </tr>
                         @foreach($data as $value)
                             <tr>
                                 <td>{{$value->id}}</td>
                                 <td> <img src="{{asset($value->avatar)}}" style="width: 50px" alt=""></td>

                                 <td>{{$value->name}}</td>
                                 <td>{{$value->email}} </td>
                                 <td>{{$value->created_at}} </td>
                                 <td> <a href="{{ route('user.update', $value->id) }}"><button class="btn btn-info">Upd</button></a>
                                     <a href="{{ route('user.destroy', $value->id) }}"><button class="btn btn-danger">Del</button></a>
                                 </td>
                             </tr>
                         @endforeach
                     </table>
                     <div style="margin: 10px;"> {{$data->withQueryString()->links('vendor.pagination.bootstrap-4') }}</div>
                 </div>

             </div>

    </div>
@endsection

