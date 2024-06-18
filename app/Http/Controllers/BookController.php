<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function test()
    {
        return "testing";
    }

    public function index(Request $request, Book $book)
    {
        $title = $request->input('title');
        $author = $request->input('auther');
        $filter_check = $request->input('filter', '');

        $books = Book::when($title, fn ($query, $title) => $query->search($title, $author));

        $books = match ($filter_check) {
            '' => $books->popular(),
            'Top_Reviews_Books' => $books->topReviews(),
            'Top_Rated_Books' => $books->topRated(),
            default => $books->latest(),
        };

        $books = $books->popular()->highestRate()->get();

        return view("books.books", compact("books"));
    }



    public function create()
    {
        //
    }



    public function store(Request $request)
    {
        //
    }



    public function show($id)
    {
               
        $book = Book::with([
            'review'=>fn ($query) => $query->latest()
            ])->highestRate()->popular()->findOrFail($id);
        return view('books.bookDetails', compact('book'));

    }



    public function edit(Book $book)
    {
        //
    }


    public function update(Request $request, Book $book)
    {
        //
    }


    public function destroy(Book $book)
    {
        //
    }
}
