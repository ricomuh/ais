<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Page;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        $page->views++;
        $page->save();

        return view('page', compact('page'));
    }

    public function faqs()
    {
        $faqs = Faq::all();

        return view('faqs', compact('faqs'));
    }
}
