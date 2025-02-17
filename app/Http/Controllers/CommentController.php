<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Events\CommentSent;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        $this->validate(request(), [
            'body' => 'required',
        ]);
        $user = auth()->user();
        $comment = Comment::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'body' => request('body'),
        ]);
        
        return redirect()->route('posts.single', $post)->with('success', 'Comentario creado con exito!');
    }
    public function index(Post $post)
    {
        return $post->comments()->with('user')->get();
    }
}
