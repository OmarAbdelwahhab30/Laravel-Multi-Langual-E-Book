<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreNewComment;
use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCommentsController extends Controller
{
    public function ValidateComments(StoreNewComment $request,$bookID)
    {
        $book = Book::findOrFail($bookID);
        $comment = new Comment();
        $comment->comment =  $request->input("comment");
        $comment->user_id = Auth::user()->id;
        $comment->book_id = $book->id;
        if ($comment->save()){
            return redirect()->back()->with("success",__("alerts.Your Comment Has been Added Successfully"));
        }
        return redirect()->back()->with("fail",__("alerts.SomeThing Went Wrong ,try again later"));
    }

    public function DeleteComment($id){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back()->with("success",__("alerts.Your Comment Has been Deleted Successfully"));
    }
}
