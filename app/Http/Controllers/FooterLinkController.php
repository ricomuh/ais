<?php

namespace App\Http\Controllers;

use App\Models\FooterLink;
use Illuminate\Http\Request;

class FooterLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footerLinks = FooterLink::all();

        return view('dashboards.footerLinks.index', compact('footerLinks'));
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

        FooterLink::create($request->all());

        return redirect()->route('dashboard.footerLinks.index')->with('message', 'Footer Link created successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FooterLink  $footerLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FooterLink $footerLink)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);

        $footerLink->update($request->all());
        return redirect()->route('dashboard.footerLinks.index')->with('message', 'Footer Link successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FooterLink  $footerLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(FooterLink $footerLink)
    {
        $footerLink->delete();

        return redirect()->route('dashboard.footerLinks.index')->with('message', 'Footer Link successfully deleted');
    }
}
