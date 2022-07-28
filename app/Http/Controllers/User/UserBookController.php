<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class UserBookController extends Controller
{
    public function index($id)
    {
        $book = Book::findOrFail($id);
        return view("user.viewbook")->with(compact('book'));
    }

    public function DeleteBook($bookid)
    {
        $book = Book::findOrFail($bookid);
        $book->delete();
        return redirect("User/category/".$book->category_id)->with("success",__("alerts.Your Book Has been Deleted Successfully"));
    }
}
