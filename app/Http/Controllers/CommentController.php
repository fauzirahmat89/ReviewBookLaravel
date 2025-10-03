<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $book_id){
        $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment;
        $comment -> content = $request -> input('content');
        $comment -> book_id = $book_id;
        $comment -> user_id = Auth::id();

        $comment->save();

        return redirect('/books/'. $book_id);

    }
}
