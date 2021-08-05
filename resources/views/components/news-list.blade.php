@props(['posts', 'paginate' => true])

<div class="flex flex-col space-y-2">
    @forelse ($posts as $post)
        <div class="flex flex-col md:flex-row gap-4 p-4 hover:shadow-md">
            <a href="{{ route('news.read', $post->slug) }}" class="w-full md:w-1/3 flex-shrink-0 overflow-hidden">
                <img src="{{ asset('img/thumbnails/' . $post->thumbnail) }}" alt="" class="w-full object-cover">
            </a>
            <div class="flex flex-col space-y-1">
                <a href="{{ route('news.read', $post->slug) }}" class="text-xl font-bold text-primary hover:text-primary-light">{{ $post->title }}</a>
                <div class="font-semibold text-sm text-gray-500">
                    <i class="fas fa-user"></i> {{ $post->user->name }} <i class="fas fa-calendar ml-2"></i> {{ $post->created_at->format('d F Y') }}
                </div>
                <div>
                    <a href="{{ route('news.tag', $post->tag->slug) }}" class="text-sm bg-primary text-secondary hover:bg-primary-light hover:text-secondary-light px-2 py-1 rounded"><i class="fas fa-tag"></i> {{ $post->tag->name }}</a>
                </div>
                <div class="text-sm text-gray-700">
                    {{ substr($post->body, 0, 100) }}... <a href="{{ route('news.read', $post->slug) }}" class="text-primary hover:text-primary-light font-semibold">Read More...</a>
                </div>
            </div>
        </div>
    @empty
        <div class="flex justify-center text-gray-500 font-bold">
            Sorry :( we can't find your request
        </div>
    @endforelse
    @if ($paginate)
        <div>
            {{ $posts->links() }}
        </div>
    @endif
</div>