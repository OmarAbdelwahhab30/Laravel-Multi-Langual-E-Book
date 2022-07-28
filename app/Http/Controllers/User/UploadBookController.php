<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UploadBookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Traits\FileUploaderTrait;
use Illuminate\Support\Facades\Auth;

class UploadBookController extends Controller
{
    use FileUploaderTrait;
    public function index()
    {
        return view("user.uploadbook");
    }

    public function Upload(UploadBookRequest $request)
    {
        $Image = $this->ValidateFile($request->img,'BooksImages');
        $File = $this->ValidateFile($request->file,'BooksFiles');
        $book = new Book();
        $book->author = $request->author;
        $book->title = $request->bookname ;
        $book->info = $request->info;
        $book->user_id = Auth::user()->id;
        $book->category_id = $request->category;
        $book->file     = $File;
        $book->image = $Image;
        if ($book->save()){
            return redirect()->back()->with("success",__("alerts.The Book Has been Added Successfully"));
        }
        return redirect()->back()->with("fail",__("alerts.SomeThing Went Wrong ,try again later"));
    }
}
