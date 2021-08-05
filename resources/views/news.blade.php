<x-news-layout title="Aqobah International News">
    <div class="flex flex-col space-y-8">
        @if ($latest)
            <x-news-item :post="$latest" h="96" />
        @endif
        <x-news-list :posts="$posts" />
    </div>
</x-news-layout>