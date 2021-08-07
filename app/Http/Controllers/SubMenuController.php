<?php

namespace App\Http\Controllers;

use App\Models\SubMenu;
use Illuminate\Http\Request;

class SubMenuController extends Controller
{
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

        SubMenu::create($request->all());

        return redirect()->route('dashboard.menus.index')->with('message', 'SubMenu created successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubMenu  $subMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubMenu $subMenu)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);

        $subMenu->update($request->all());
        return redirect()->route('dashboard.menus.index')->with('message', 'SubMenu successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubMenu  $subMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubMenu $subMenu)
    {
        $subMenu->delete();

        return redirect()->route('dashboard.menus.index')->with('message', 'SubMenu successfully deleted');
    }
}
