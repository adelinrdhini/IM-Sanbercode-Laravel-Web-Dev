<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $books_id)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $user_id = Auth::id();

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->books_id = $books_id;
        $comment->user_id = $user_id;

        $comment->save();
        return redirect('/books/'. $books_id);
        
}
}
