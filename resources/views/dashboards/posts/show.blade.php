<x-dashboard-layout :title="$post->title">
    <div class="flex flex-col space-y-4">
        <x-detail-item name="Title" :value="$post->title" />
        <x-detail-item name="Slug" :value="$post->slug" />
        <x-detail-item name="Thumbnail">
            <img src="{{ asset('img/thumbnails/' . $post->thumbnail) }}" alt="" class="w-32">
        </x-detail-item>
        <x-detail-item name="Creator" :value="$post->user->name" />
        <x-detail-item name="Tag" :value="$post->tag->name ?? 'None'" />
        <x-detail-item name="Views" :value="$post->views" />
        <x-detail-item name="Body">
            {!! $post->body !!}
        </x-detail-item>
        <div class="flex justify-center">
            <a href="{{ route('dashboard.posts.edit', $post->id) }}">
                <x-button>Edit</x-button>
            </a>
            <form action="{{ route('dashboard.posts.destroy', $post->id) }}" method="post">
                @method('DELETE')
                @csrf
                <x-button class="bg-red-600 hover:bg-red-500">Delete</x-button>
            </form>
        </div>
    </div>
</x-dashboard-layout>