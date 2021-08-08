<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        return view('dashboards.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();

        return view('dashboards.pages.create', compact('menus'));
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
            'slug' => 'required',
            'body' => 'required',
        ]);

        Page::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'menu_id' => $request->menu_id == '' ? null : $request->menu_id,
            'body' => $request->body,
        ]);

        return redirect()->route('dashboard.pages.index')->with('message', 'Page successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('dashboards.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $menus = Menu::all();

        return view('dashboards.pages.edit', compact('page', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
        ]);

        $page->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'menu_id' => $request->menu_id == '' ? null : $request->menu_id,
            'body' => $request->body,
        ]);

        return redirect()->route('dashboard.pages.index')->with('message', 'Page successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('dashboard.pages.index')->with('message', 'Page successfully deleted');
    }
}
