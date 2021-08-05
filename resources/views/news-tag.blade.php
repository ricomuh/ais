<x-news-layout :title="$tag->name">
    <div class="flex flex-col space-y-8">
        <x-news-list :posts="$tag->posts()->latest()->paginate(10)" />
    </div>
</x-news-layout>