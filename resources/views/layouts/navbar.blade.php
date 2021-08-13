<div id="nav" class="w-full bg-white bg-opacity-80 fixed backdrop-filter backdrop-blur-sm shadow-lg z-40">
    <div class="w-10/12 mx-auto hidden md:flex justify-between">
        <a href="{{ route('home') }}" class="my-auto">
            <img src="{{ asset('img/header.svg') }}" alt="AIS Header" class="h-8">
        </a>
        <div class="flex flex-row">
            @foreach ($menus as $menu)
                @if ($menu->subMenuTitles->count())
                    <div x-data="{ open : false }" class="relative group"  @mouseleave="open = false">
                        <button @mouseover="open = true" id="{{ $menu->slug }}" href="{{ $menu->link }}" class="inline-flex text-primary font-semibold p-4 group-hover:bg-primary group-hover:text-secondary transition">{{ $menu->name }}</button>
                        <div x-show="open" :class="{'flex' : open, 'hidden' : !open}" class="absolute origin-top-right right-0 top-full bg-white shadow-md hidden flex-col divide-y divide-gray-200 rounded-tr-none"
                        x-transition:enter="transition transform"
                        x-transition:enter-start="opacity-0 -translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition duration-300 transform"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-4"
                        >
                            @foreach ($menu->subMenuTitles as $subMenuTitle)
                                <div class="flex flex-col">
                                    <a href="{{ $subMenuTitle->link }}" class="font-semibold px-4 py-1 inline-flex hover:bg-primary hover:text-white min-w-max m-0.5">{{ $subMenuTitle->name }}</a>
                                    <div class="flex flex-col">
                                        @foreach ($subMenuTitle->subMenus as $subMenu)
                                            <a href="{{ $subMenu->link }}" class="py-1 px-4 min-w-max hover:bg-primary-light hover:text-white m-0.5">{{ $subMenu->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ $menu->link }}" id="{{ $menu->slug }}" class="inline-flex text-primary font-semibold p-4 hover:bg-primary hover:text-secondary transition">{{ $menu->name }}</a>
                @endif
            @endforeach
        </div>
    </div>
    <div class="flex justify-between md:hidden relative" x-data="{open : false}" @click.away="open = false">
        <a href="{{ route('home') }}" class="my-auto pl-5">
            <img src="{{ asset('img/header.svg') }}" alt="AIS Header" class="h-8">
        </a>
        <button class="text-primary p-5" :class="{'text-secondary bg-primary' : open, 'text-primary' : !open }" @click="open = !open">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <div class="absolute w-full top-full bg-primary shadow-md hidden flex-col" :class="{'flex' : open, 'hidden' : !open}" x-show="open">
            <div class="flex flex-col divide-y divide-secondary divide-opacity-20">
                @foreach ($menus as $menu)
                    @if ($menu->subMenuTitles->count())    
                        <div x-data="{ selected : false }" class="flex flex-col items-center">
                            <button class="text-secondary font-bold py-2 text-lg w-full text-left pl-8" :class="{'bg-primary-dark border-b border-primary' : selected}" @click="selected = !selected" @click.away="selected = false" >{{ $menu->name }}</button>
                            <div class="flex flex-col w-full bg-primary-dark pb-2" x-show="selected">
                                @foreach ($menu->subMenuTitles as $subMenuTitle)
                                    <div class="flex flex-col items-start pl-16">
                                        <a href="{{ $subMenuTitle->link }}" class="font-semibold inline-flex text-white py-2">{{ $subMenuTitle->name }}</a>
                                        <div class="flex flex-col items-start">
                                            @foreach ($subMenuTitle->subMenus as $subMenu)
                                                <a href="{{ $subMenu->link }}" class="text-white py-2 pl-2">{{ $subMenu->name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else 
                        <a href="{{ $menu->link }}" class="text-secondary font-bold py-2 text-lg w-full text-left pl-8">{{ $menu->name }}</a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>