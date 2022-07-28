<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class UserCategoryController extends Controller
{
    public function index($id)
    {
        $category = Category::find($id);
        $books = $category->Book;
        return view("user.viewcategory")->with(compact('category','books'));
    }
}
