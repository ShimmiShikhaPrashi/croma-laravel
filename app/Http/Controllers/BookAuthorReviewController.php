<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class BookAuthorReviewController extends Controller
{
    public function index()
    {
    $authors = Author::with('books.reviews.user')->get(); // eager load everything
    
    return view('backend.bookAuthorReview', compact('authors'));
    }
}
