@props(['post', 'h' => 64, 'small' => false, 'class' => ''])

<a href="{{ route('news.read', $post->slug) }}" class="group h-{{ $h }} w-full relative inline-flex shadow-md hover:shadow-lg transition duration-300 overflow-hidden transform hover:-translate-y-1 {{ $class }}">
    <img src="{{ asset('img/thumbnails/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-300">
    <div class="absolute w-full h-full bg-gradient-to-t from-black opacity-50 group-hover:opacity-70 transition duration-300"></div>
    <div class="absolute bottom-0 left-0 w-full p-4 text-white">
        <h4 class="font-semibold {{ $small ? 'text-sm' : 'text-base' }}">
            {{ $post->title }}
        </h4>
        <p class="{{ $small ? 'text-xs' : 'text-sm' }} mt-2"><i class="fas fa-user"></i> {{ $post->user->name }} <i class="fas fa-calendar"></i> {{ $post->created_at->format('d F Y') }}</p>
    </div>
    <div class="absolute bg-black group-hover:bg-primary-dark transition duration-300 right-0 top-4 text-white px-3 py-1 font-semibold {{ $small ? 'text-sm' : 'text-base' }}">{{ $post->tag->name }}</div>
</a>