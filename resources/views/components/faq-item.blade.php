@props(['faq', 'class' => '', 'dataAnimate' => null])

<div class="shadow hover:shadow-md rounded-lg w-full transition duration-300 overflow-hidden transform bg-white bg-opacity-50 backdrop-filter backdrop-blur-sm {{ $class }}" x-data="{ open : false }" @click.away="open = false"
@if ($dataAnimate !== null)
    data-animate="{{ $dataAnimate }}"
@endif
>
    <button @click="open = !open" class="py-3 px-5 flex justify-between items-center w-full hover:bg-gray-100 text-left transition duration-300" :class="{'bg-gray-100' : open}">
        <h3 class="text-gray-800 font-bold text-xl">{{ $faq->title }}</h3>
        <i class="fas fa-caret-right text-xl text-primary" :class="{ 'fa-caret-down' : open, 'fa-caret-right' : !open }"></i>
    </button>
    <div class="p-5 leading-tight" x-show="open">
        <p>{{ $faq->body }}</p>
    </div>
</div>