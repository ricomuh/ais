<?php

namespace App\Http\Controllers;

use App\Models\SubMenuTitle;
use Illuminate\Http\Request;

class SubMenuTitleController extends Controller
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

        SubMenuTitle::create($request->all());

        return redirect()->route('dashboard.menus.index')->with('message', 'SubMenuTitle created successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubMenuTitle  $subMenuTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubMenuTitle $subMenuTitle)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);

        $subMenuTitle->update($request->all());
        return redirect()->route('dashboard.menus.index')->with('message', 'SubMenuTitle successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubMenuTitle  $subMenuTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubMenuTitle $subMenuTitle)
    {
        $subMenuTitle->delete();

        return redirect()->route('dashboard.menus.index')->with('message', 'SubMenuTitle successfully deleted');
    }
}
