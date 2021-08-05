<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        $latest = Post::latest()->first();

        return view('news', compact('posts', 'latest'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tag(Tag $tag)
    {
        return view('news-tag', compact('tag'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->get('query', '');
        $posts = Post::where('title', 'LIKE', '%' . $search . '%')->orWhere('body', 'LIKE', '%' . $search . '%')->paginate(10)->withQueryString();

        return view('news-search', compact('search', 'posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->views++;
        $post->save();

        return view('news-read', compact('post'));
    }
}
