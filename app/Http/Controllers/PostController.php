<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();

        $comments = Comment::where('post_id', $post->id)->paginate(2);

        return view('post', ['post' => $post, 'comments' => $comments]);
    }

    public function create()
    {
        return view('create_post');
    }

    public function store(Request $request)
    {
        $post = new Post;

        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->text = $request->text;
        $post->slug = $request->slug;


        $post->save();
        return redirect('home');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return back();
    }
}
