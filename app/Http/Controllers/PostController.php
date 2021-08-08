<?php

namespace App\Http\Controllers;

use App\Helper\Uploader;
use App\Models\Post;
use App\Models\Tag;
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
        $posts = Post::all();

        return view('dashboards.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        return view('dashboards.posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'thumbnail' => 'required',
            'body' => 'required',
        ]);

        $file = $request->file('thumbnail');
        $filename = Uploader::upload($file, 'img/thumbnails', $request->title);

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'tag_id' => $request->tag_id == '' ? null : $request->tag_id,
            'body' => $request->body,
            'thumbnail' => $filename,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('dashboard.posts.index')->with('message', 'Post successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboards.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();

        return view('dashboards.posts.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = Uploader::upload($file, 'img/thumbnails', $request->name);
            Uploader::deleteWhenExist($post->thumbnail, 'img/thumbnails');
        }

        $post->update([
            'title' => $request->title,
            'tag_id' => $request->tag_id == '' ? null : $request->tag_id,
            'body' => $request->body,
            'thumbnail' => $filename ?? $post->thumbnail
        ]);

        return redirect()->route('dashboard.posts.index')->with('message', 'Post successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('dashboard.posts.index')->with('message', 'Post successfully deleted');
    }
}
