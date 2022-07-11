<?php

namespace App\Http\Controllers\Vue;

use App\Filters\BookFilter;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookVueController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return response()->json($books);
    }

    public function show($search_string)
    {
        $books = Book::where('name', 'LIKE', '%' . $search_string . '%')->orderBy('id', 'asc')->get();
        return response()->json($books);
    }

    /*
      public function show(BookFilter $request)
    {
        $books = Book::filter($request)->get();
        return response()->json($books);
    }
       */
}
