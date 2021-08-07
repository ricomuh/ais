<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();

        return view('dashboards.menus.index', compact('menus'));
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
            'name' => 'required',
            'link' => 'required',
        ]);

        Menu::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'link' => $request->link
        ]);

        return redirect()->route('dashboard.menus.index')->with('message', 'Menu created successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);

        $menu->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'link' => $request->link
        ]);
        return redirect()->route('dashboard.menus.index')->with('message', 'Menu successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('dashboard.menus.index')->with('message', 'Menu successfully deleted');
    }
}
