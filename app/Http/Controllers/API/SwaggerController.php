<?php


namespace App\Http\Controllers\API;


use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class SwaggerController
{
    /**
     * @OA\Get(
     *     path="/books",
     *     operationId="books",
     *     tags={"Books ALL"},
     *     summary="Display a listing of the resource",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="The page number",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *
     *     ),
     *      @OA\Response(
     *         response="404",
     *         description="Example not found",
     *
     *     ),
     * )
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $books =  Book::query()->SimplePaginate(5);
        return response()->json($books);
    }

    /**
     * @OA\Post(
     *     path="/books",
     *     operationId="bookCreate",
     *     tags={"Books Creat"},
     *     summary="Create yet another book record",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *         @OA\JsonContent(ref="#/components/schemas/StoreBookRequest")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/StoreBookRequest")
     *     ),
     * )
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
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
     * @OA\Get(
     *     path="/books/{id}",
     *     operationId="booksGet",
     *     tags={"Books Find by id"},
     *     summary="Get book by ID",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of book",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *         @OA\JsonContent(ref="#/components/schemas/StoreBookRequest")
     *     ),
     * )
     *
     * Display a listing of the resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $book = Book::find($id);
        return response()->json($book);
    }

    /**
     * @OA\Put(
     *     path="/books/{id}",
     *     operationId="booksUpdate",
     *     tags={"Books Update"},
     *     summary="Update book by ID",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of example",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *         @OA\JsonContent(ref="#/components/schemas/StoreBookRequest")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/StoreBookRequest")
     *     ),
     * )
     *
     * Update the specified book in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\JsonResponse
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
     * @OA\Delete(
     *     path="/books/{id}",
     *     operationId="booksDestroy",
     *     tags={"Books Destroy"},
     *     summary="Delete book by ID",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of example",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response="202",
     *         description="Deleted",
     *     ),
     * )
     *
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(int $id): Response
    {
        $book = Book::find($id);
        $book->delete();

        return response(null, HttpResponse::HTTP_ACCEPTED);
    }

}
