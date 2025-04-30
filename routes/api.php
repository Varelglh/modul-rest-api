<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;

// Route resource untuk endpoint utama /api/books
Route::get('books', [BookController::class, 'index']);

// Route tambahan khusus di luar resource
Route::get('books/search', [BookController::class, 'search']);
Route::get('books/filter/year', [BookController::class, 'filterByYear']);
Route::get('books/filter', [BookController::class, 'filterByPublisherAndAuthor']);
