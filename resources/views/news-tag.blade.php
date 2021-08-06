@section('title', $tag->name . ' Tag | Aqobah International School Official Website')
@section('description', 'Showing of ' . $tag->posts->count() . ' results')
@section('image', asset('img/header.svg'))
<x-news-layout :title="$tag->name">
    <div class="flex flex-col space-y-8">
        <x-news-list :posts="$tag->posts()->latest()->paginate(10)" />
    </div>
</x-news-layout>