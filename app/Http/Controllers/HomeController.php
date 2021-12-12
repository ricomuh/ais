<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Faq;
use App\Models\FeaturedTag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $carousels = Carousel::all();
        $yt = cache()->remember('yt', 60 * 60 * 6, function () {
            return Http::get('https://youtube.googleapis.com/youtube/v3/channels?part=snippet&part=statistics&id=UCikrCm-sl0pauu4tTtBqIXw&key=AIzaSyDhViTqsxB6CRrj9P8mAvo1RPshbgI2uPI')->collect();
        });
        cache()->forget('ytVideo');
        $ytVideo = cache()->remember('ytVideo', 60 * 60 * 6, function () {
            return Http::get('https://youtube.googleapis.com/youtube/v3/search?part=snippet&channelId=UCikrCm-sl0pauu4tTtBqIXw&maxResults=1&order=date&key=AIzaSyDhViTqsxB6CRrj9P8mAvo1RPshbgI2uPI&&type=video')->collect();
        });
        $faqs = Faq::latest()->take(3)->get();
        $posts = Post::latest()->take(6)->get();
        $featuredTags = FeaturedTag::all();

        dd($ytVideo);
        return view('home', compact('carousels', 'yt', 'ytVideo', 'faqs', 'posts', 'featuredTags'));
    }
}
