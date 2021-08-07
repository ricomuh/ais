@section('title', $post->title . ' | Aqobah International School Official Website')
@section('description', substr($post->body, 0, 200) . '...')
@section('image', asset('img/thumbnails/' . $post->thumbnail))
<x-news-layout :title="$post->title" :bg="$post->thumbnail">
    <div class="flex flex-col space-y-8">
        <div class="flex flex-col md:flex-row gap-4 justify-between md:items-center items-start">
            <a href="{{ route('news.tag', $post->tag->slug) }}" class="flex space-x-2 text-sm bg-primary text-secondary hover:bg-primary-light hover:text-secondary-light transition duration-300 px-4 py-2 rounded-md shadow-md items-center">
                <i class="fas fa-tag"></i> <span class="">{{ $post->tag->name }}</span>
            </a>
            <div class="flex space-x-2 items-center">
                <span>Share: </span> 
                <a target="_blank" href="https://api.whatsapp.com/send?text={{ $post->title }} {{ url()->current() }}" class="bg-green-500 hover:bg-green-600 transition duration-300 rounded-full w-10 h-10 text-lg flex items-center justify-center text-white shadow hover:shadow-md"><i class="fab fa-whatsapp"></i></a>
                <a target="_blank" href="https://www.facebook.com/sharer.php?u={{ url()->current() }}" class="bg-blue-500 hover:bg-blue-600 transition duration-300 rounded-full w-10 h-10 text-lg flex items-center justify-center text-white shadow hover:shadow-md"><i class="fab fa-facebook"></i></a>
                <a target="_blank" href="https://twitter.com/share?url={{ url()->current() }}&text={{ $post->title }}" class="bg-blue-400 hover:bg-blue-500 transition duration-300 rounded-full w-10 h-10 text-lg flex items-center justify-center text-white shadow hover:shadow-md"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
        <img src="{{ asset('img/thumbnails/' . $post->thumbnail) }}" class="w-full shadow-md rounded-md" alt="">
        <div class="flex flex-col space-y-2">
            <h2 class="text-primary-dark text-2xl font-bold leading-loose text-center">{{ $post->title }}</h2>
            <div class="text-primary text-base">
                <i class="fas fa-fw mr-2 fa-calendar"></i> {{ $post->created_at->format('d F Y') }}
            </div>
            <div class="text-primary text-base">
                <i class="fas fa-fw mr-2 fa-user"></i> {{ $post->user->name }}
            </div>
        </div>
        <div id="content">{!! $post->body !!}</div>
    </div>
</x-news-layout>