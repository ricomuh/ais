<?php

namespace App\Http\Controllers;

use App\Helper\Uploader;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $file = $request->file('file');
        $filename = Uploader::upload($file, 'img/uploaded_img', $file->getClientOriginalName());

        return response()->json(['location' => asset('/img/uploaded_img/' . $filename)]);
    }
}
