<?php

namespace App\Http\Controllers;

use App\Helper\Uploader;
use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousels = Carousel::all();

        return view('dashboards.carousels.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.carousels.create');
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
            'link' => 'required',
            'description' => 'required',
            'thumbnail' => 'required',
        ]);

        $file = $request->file('thumbnail');
        $filename = Uploader::upload($file, 'img/carousels', $file->getBasename());

        Carousel::create([
            'title' => $request->title,
            'link' => $request->link,
            'description' => $request->description,
            'filename' => $filename,
        ]);

        return redirect()->route('dashboard.carousels.index')->with('message', 'Carousel successfully created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $carousel)
    {
        return view('dashboards.carousels.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carousel $carousel)
    {
        $request->validate([
            'title' => 'required',
            'link' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = Uploader::upload($file, 'img/carousels', $file->getBasename());
            Uploader::deleteWhenExist($request->filename, 'img/carousels');
        }

        $carousel->update([
            'title' => $request->title,
            'link' => $request->link,
            'description' => $request->title,
            'filename' => $filename ?? $carousel->filename,
        ]);

        return redirect()->route('dashboard.carousels.index')->with('message', 'Carousel successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carousel $carousel)
    {
        Uploader::deleteWhenExist($carousel->filename, 'img/carousels');

        $carousel->delete();

        return redirect()->route('dashboard.carousels.index')->with('message', 'Carousel successfully deleted');
    }
}
