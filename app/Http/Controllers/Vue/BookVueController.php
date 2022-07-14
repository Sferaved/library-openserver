<?php

namespace App\Http\Controllers\Vue;

use App\Filters\BookFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BookVueController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return response()->json($books);
    }
    public function destroy($id)
    {
        $book = Book::find($id);
        $bookDelete = $book->name;
        $book->delete();
        $bookInfo = "Book $bookDelete was deleted!";
        return response()->json($bookInfo);
    }

    public function show($id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }

    public function update($id)
    {
        return view('book.updatev', ['data' => Book::find($id)]);
    }

    public function updateSubmit($id, UpdateBookRequest $request)
    {
        $book = Book::find($id);
        $coverOld = $book->cover;

        $book->name =  $request->input('name');
        $book->category_id = $request->input('category_id');
        $book->author_id = $request->input('author_id');
        $book->description = $request->input('description');
        $book->updated_at = now();
        $book->description = $request->input('description');


        if ($request->hasFile('cover')) {
            $destinationPath = 'images/books/';
            $fileName = $book->name . '.jpg';

            $request->file('cover')->move($destinationPath, $fileName);

            $book->cover  = $destinationPath . $fileName;

        } else {
            $book->cover  = $coverOld;
        };

        $book->save();


        if ($book) {
            return redirect()->route('bv')->with('success', 'The book are updated successfully');
        }
    }
}
