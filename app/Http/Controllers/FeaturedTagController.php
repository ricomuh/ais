<?php

namespace App\Http\Controllers;

use App\Models\FeaturedTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FeaturedTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featuredTags = FeaturedTag::all();
        $tags = Tag::all();

        return view('dashboards.featuredTags.index', compact('featuredTags', 'tags'));
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
            'icon_class' => 'required',
            'tag_id' => 'required'
        ]);

        FeaturedTag::create($request->all());

        return redirect()->route('dashboard.featuredTags.index')->with('message', 'FeaturedTag created successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeaturedTag  $featuredTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeaturedTag $featuredTag)
    {
        $request->validate([
            'title' => 'required',
            'icon_class' => 'required',
            'tag_id' => 'required'
        ]);

        $featuredTag->update($request->all());
        return redirect()->route('dashboard.featuredTags.index')->with('message', 'Featured Tag successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeaturedTag  $featuredTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeaturedTag $featuredTag)
    {
        $featuredTag->delete();

        return redirect()->route('dashboard.featuredTags.index')->with('message', 'Featured Tag successfully deleted');
    }
}
