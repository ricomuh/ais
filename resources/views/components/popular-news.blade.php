<div class="flex flex-col space-y-4">
    <h2 class="text-lg font-bold text-primary">Popular News</h2>
    <div class="flex flex-col">
        @foreach ($posts as $post)
            <a href="{{ route('news.read', $post->slug) }}" class="grid grid-cols-5 relative p-2 gap-2 group hover:bg-gray-100 hover:shadow-md transition duration-300">
                <div class="col-span-2 h-full overflow-hidden">
                    <img src="{{ asset('img/thumbnails/' . $post->thumbnail) }}" alt="" class="w-full h-full object-cover rounded">
                </div>
                <div class="col-span-3 flex flex-col">
                    <div class="font-bold text-primary group-hover:text-primary-dark transition duration-300 leading-tight">{{ $post->title }}</div>
                    <p class="text-sm leading-tight">{{ substr($post->body, 0, 40) }}...</p>
                    <div>
                        <span class="bg-primary rounded px-2 py-1 text-sm text-white"><i class="fas fa-eye"></i> {{ $post->views }}</span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>