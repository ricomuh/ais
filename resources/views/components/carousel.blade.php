@props(['id' => rand(), 'dots' => false, 'bottomDot' => false,'nav' => true, 'items' => 1, 'autoplay' => false, 'margin' => '0', 'responsive' => ''])

<div class="relative">
    <div id="{{ $id }}" {{ $attributes->merge(['class' => 'owl-carousel']) }}>
        {{ $slot }}
    </div>
    @if ($nav)
        <div class="absolute overflow-hidden top-0 w-full h-full md:block hidden">
            <button id="{{ $id }}-prev" class="absolute flex bottom-1/2 transform translate-y-1/2 focus:outline-none z-10 text-white pr-8 pl-6 py-4 text-7xl font-bold hover:scale-110 transition duration-300 items-center justify-center"><i class="fas fa-caret-left"></i></button>
            <button id="{{ $id }}-next" class="absolute right-0 flex bottom-1/2 transform translate-y-1/2 focus:outline-none z-10 text-white pl-8 pr-6 py-4 text-7xl font-bold hover:scale-110 transition duration-300 items-center justify-center"><i class="fas fa-caret-right"></i></button>
        </div>
    @endif
</div>

@push('custom-script')
    <script>
        $("#{{ $id }}").owlCarousel({
            items: {{ $items }},
            center: true,
            loop: true,
            autoplay: {{ $autoplay ? 'true' : 'false' }},
            autoplayHoverPause: true,
            autoplayTimeout: {{ $autoplay ? $autoplay : '0' }},
            dots: {{ $dots ? 'true' : 'false' }},
            dotsClass: "absolute {{ $bottomDot ? '-bottom-6' : 'bottom-6' }} w-full flex justify-center z-10 space-x-4",
            dotClass: "w-3 h-3 rounded-full focus:outline-none carousel-dot transition duration-300 transform shadow-md",
            margin: {{ $margin }},
            responsive: {
                {{ $responsive }}
            }
        });
        $("#{{ $id }}-prev").click(function(){
            $("#{{ $id }}").trigger("prev.owl.carousel");
        });
        $("#{{ $id }}-next").click(function(){
            $("#{{ $id }}").trigger("next.owl.carousel");
        });
    </script>
@endpush