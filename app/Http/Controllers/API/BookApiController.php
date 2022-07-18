<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class BookApiController
{
    /**
     * @return JsonResponse
     */
    public function index()
    {
        $books =  Book::all();
        return response()->json($books);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {

        $book = new Book();
        $book->name = $request->input('name');
        $book->category_id = $request->input('category_id');
        $book->author_id = $request->input('author_id');
        $book->description = $request->input('description');
        $book->cover  = $request->input('cover');
        $book->save();

        return response()->json($book);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $book = Book::find($id);
        return response()->json($book);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $book = Book::find($id);
        $book->name = $request->input('name');
        $book->category_id = $request->input('category_id');
        $book->author_id = $request->input('author_id');
        $book->description = $request->input('description');
        $book->cover  = $request->input('cover');
        $book->save();

        return response()->json($book);
    }

    /**
     * @param int $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        $book = Book::find($id);
        $book->delete();

        return response(null, HttpResponse::HTTP_ACCEPTED);
    }
}
