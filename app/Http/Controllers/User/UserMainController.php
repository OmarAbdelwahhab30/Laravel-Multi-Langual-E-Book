<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;

class UserMainController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(5);
        return view("user.home")->with(compact('books'));
    }
}
