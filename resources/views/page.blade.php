@section('title', $page->title . ' | Aqobah International School')
@section('description', substr($page->body, 0, 200) . '...')
@section('image', asset('img/header.svg'))
<x-main-layout>
    <div class="bg-primary pt-8 border-b-4 border-secondary" id="header" style="background-image: url({{ asset('img/pattern1.png') }}); background-attachment: fixed;">
        <div class="w-10/12 mx-auto flex flex-col py-16 space-y-16">
            <div class="">
                <ul class="flex text-sm lg:text-base">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="text-secondary-dark">Home</a>
                        <svg class="h-5 w-auto text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    </li>
                    @isset($page->menu_id)
                        <li class="md:inline-flex items-center hidden" >
                            <a href="{{ route('home') }}" class="text-secondary-dark">{{ $page->menu->name }}</a>
                            <svg class="h-5 w-auto text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        </li>
                    @endisset
                    <li class="inline-flex items-center" >
                        <div class="text-secondary">{{ $page->title }}</div>
                    </li>
                </ul>
            </div>
            <h1 class="text-3xl text-secondary font-bold tracking-widest">{{ $page->title }}</h1>
        </div>
    </div>
    <div class="my-16 w-10/12 mx-auto leading-loose">
        {!! $page->body !!}
    </div>

    @push('custom-script')
        <script>
            $(window).scroll(function() {
                $("#header").css({
                    "background-position-y" : -$(window).scrollTop()/2.2
                });
            });
            @isset($page->menu_id) {
                $("#{{ $page->menu->slug }}")
                    .removeClass("text-primary")
                    .addClass("text-secondary bg-primary")
            }
            @endisset
        </script>
    @endpush
</x-main-layout>