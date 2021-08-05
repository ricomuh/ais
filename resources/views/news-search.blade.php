<x-news-layout :title="'Search for: ' . $search">
    <div class="flex flex-col space-y-8">
        <x-news-list :posts="$posts"/>
    </div>
</x-news-layout>