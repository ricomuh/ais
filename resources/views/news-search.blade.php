@section('title', 'Search for: ' . $search . ' | Aqobah International School Official Website')
@section('description', 'Showing of ' . $posts->count() . ' results')
@section('image', asset('img/header.svg'))
<x-news-layout :title="'Search for: ' . $search">
    <div class="flex flex-col space-y-8">
        <x-news-list :posts="$posts"/>
    </div>
</x-news-layout>