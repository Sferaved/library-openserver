<?php


namespace App\Http\Controllers\API;


use App\Models\Book;
use App\Models\Category;

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
     * )
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $contacts =  Book::query()->SimplePaginate(5);
        return response()->json($contacts);
    }

}
