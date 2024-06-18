<?php

use App\Http\Controllers\BookController;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\Route;


Route::controller(BookController::class)->group(function(){
    Route::get("all_books", 'index')->name("books");
    Route::get('/test', 'test');
    Route::get('one_book/{id}', 'show')->name('Book_Details');
});

