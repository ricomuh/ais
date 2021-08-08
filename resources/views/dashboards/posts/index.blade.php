<x-dashboard-layout title="Posts">
    <x-error-success />
    <div class="flex justify-center">
        <a href="{{ route('dashboard.posts.create') }}">
            <x-button>Create new post</x-button>
        </a>
    </div>
    <div class="flex flex-col divide-y divide-gray-500">
        @foreach ($posts as $post)
            <x-dashboard-custom-item :edit="route('dashboard.posts.show', $post->id)" :items="5" :iteration="$loop->iteration">
                <x-dashboard-detail title="Title">
                    {{ $post->title }}
                </x-dashboard-detail>
                <x-dashboard-detail title="Thumbnail">
                    <img src="{{ asset('img/thumbnails/' . $post->thumbnail) }}" class="w-32" alt="">
                </x-dashboard-detail>
                <div class="flex flex-col">
                    <x-dashboard-detail title="Tag">
                        {{ $post->tag->name ?? 'None' }}
                    </x-dashboard-detail>
                    <x-dashboard-detail title="Views">
                        {{ $post->views }}
                    </x-dashboard-detail>
                    <x-dashboard-detail title="Creator">
                        {{ $post->user->name }}
                    </x-dashboard-detail>
                </div>
                <x-dashboard-detail :span="2" title="Body">
                    {{ Str::words(strip_tags($post->body), 30, '...') }}
                </x-dashboard-detail>
            </x-dashboard-custom-item>
        @endforeach
        {{ $posts->links() }}
    </div>
</x-dashboard-layout>