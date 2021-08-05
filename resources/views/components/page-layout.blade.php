@props(['title'])

<x-main-layout>
    <div class="bg-primary pt-8 border-b-4 border-secondary relative overflow-hidden" id="header" style="background-image: url({{ asset('img/pattern1.png') }}); background-attachment: fixed;">
        <div class="w-10/12 mx-auto py-32 relative">
            <h1 class="text-3xl text-secondary font-bold tracking-widest text-center">{{ $title }}</h1>
        </div>
    </div>
    <div class="my-16 w-10/12 mx-auto">
        {{ $slot }}
    </div>

    @push('custom-script')
        <script>
            $(window).scroll(function() {
                $("#header").css({
                    "background-position-y" : -$(window).scrollTop()/2.2
                });
            });
            $("#staff")
                .removeClass("text-primary")
                .addClass("text-secondary bg-primary")
        </script>
    @endpush
</x-main-layout>