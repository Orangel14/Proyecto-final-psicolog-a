<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $posts = Post::visibleToUser()->latest()->paginate(5);

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $post = new Post();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/posts');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $post->image = $name;
        }

        $post->user_id = auth()->id();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post creado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function show(Post $post)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        Post::visibleToUser()->findOrFail($post->id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Post $post)
    {
        Post::visibleToUser()->findOrFail($post->id);

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $post->update($request->only(['title', 'body']));
        return redirect()->route('posts.index')->with('success', 'Post editado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function destroy(Post $post)
    {   
        Post::visibleToUser()->findOrFail($post->id);

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post eliminado con exito!');
    }

    public function all()
    {           
        $posts = Post::latest()->paginate(5);
        return view('landing', compact('posts'));
    }

    public function single(Post $post)
    {
        return view('posts.single', compact('post'));
    }

    

}