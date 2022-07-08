<?php

namespace App\Http\Controllers\Vue;

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
}
