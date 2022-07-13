<?php

namespace App\Http\Controllers;

use App\Filters\BookFilter;
use App\Models\Author;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BookFilter $request)
    {
     //   dd($request);
        $books = Book::filter($request)->Paginate(5);
        $categories = Category::All();
        $authors = Author::all();

        return view('book.books', ['data' => $books, 'categories' => $categories, 'authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreBookRequest $request)
    {
        $book = new Book();
        $book->name =  $request->input('name');
        $book->category_id = $request->input('category_id');
        $book->author_id = $request->input('author_id');
        $book->description = $request->input('description');
        if ($request->hasFile('cover')) {
            $destinationPath = 'images/books/';
            $fileName = $book->name . '.jpg';

            $request->file('cover')->move($destinationPath, $fileName);

            $book->cover  = $destinationPath . $fileName;

        }
        $book->save();
        if ($book) {
            return redirect(route('book.books'));
        };
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('book.update', ['data' => Book::find($id), 'id' => $id]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateBookRequest $request)
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
            return redirect(route('book.books'))->with('success', 'The book is updated successfully');
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('books')->where('id', $id)->delete();
        return redirect(route('book.books'))->with('success', 'The book is deleted successfully');
    }



}
