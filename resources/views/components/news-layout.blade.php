@props(['title', 'bg' => null])

<x-main-layout>
    <div class="bg-primary pt-8 border-b-4 border-secondary relative overflow-hidden"
    @if ($bg == null)
        id="header" style="background-image: url({{ asset('img/pattern1.png') }}); background-attachment: fixed;"
    @endif
    >
        @if ($bg !== null)
            <img src="{{ asset('img/thumbnails/' . $bg) }}" alt="" class="absolute w-full h-full object-cover transform scale-110 filter blur-sm">
            <div class="bg-black absolute w-full h-full bg-opacity-50"></div>
        @endif
        <div class="w-10/12 mx-auto py-32 relative">
            <h1 class="text-3xl text-secondary font-bold leading-none tracking-widest text-center">{{ $title }}</h1>
        </div>
    </div>
    <div class="my-16 w-10/12 mx-auto flex flex-col md:flex-row gap-8">
        <div class="md:w-4/6 w-full">
            {{ $slot }}
        </div>
        <div class="w-full md:w-2/6">
            <x-popular-news />
        </div>
    </div>

    @push('custom-script')
        <script>
            $(window).scroll(function() {
                $("#header").css({
                    "background-position-y" : -$(window).scrollTop()/2.2
                });
            });
            $("#news")
                .removeClass("text-primary")
                .addClass("text-secondary bg-primary")
        </script>
    @endpush
</x-main-layout>