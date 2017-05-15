<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $comment = new Comment;

        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;


        $comment->save();
        return back();
    }

}