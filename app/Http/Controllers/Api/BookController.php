<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // 1. Menampilkan data dengan pagination
    public function index(Request $request)
    {
        $paginate = $request->query('paginate', 10);
        $books = Book::paginate($paginate);
        return BookResource::collection($books);
    }

    // 2. Mencari berdasarkan title (like)
    public function search(Request $request)
    {
        $title = $request->query('title');
        $books = Book::where('title', 'like', '%' . $title . '%')->get();
        return BookResource::collection($books);
    }

    // 3. Filter berdasarkan year
    public function filterByYear(Request $request)
    {
        $year = $request->query('year');
        $books = Book::where('year', $year)->get();
        return BookResource::collection($books);
    }

    // 4. Filter berdasarkan publisher dan author
    public function filterByPublisherAndAuthor(Request $request)
    {
        $publisher = $request->query('publisher');
        $author = $request->query('author');

        $books = Book::where('publisher', $publisher)
                     ->where('author', $author)
                     ->get();

        return BookResource::collection($books);
    }
}