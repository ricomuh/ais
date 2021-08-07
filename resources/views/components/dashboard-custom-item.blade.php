@props(['items' => 0, 'iteration' ,'edit', 'deleteRoute'])

<div class="flex flex-col">
    <div class="flex flex-row space-x-5 py-2">
        <div class="w-5 flex flex-row items-center justify-center">
            {{ $iteration }}
        </div>
        <div class="grid grid-cols-1 md:grid-cols-{{ $items }} flex-grow">
            {{ $slot }}
        </div>
        <div class="flex-shrink-0">
            <a href="{{ $edit }}">
                <x-button>Edit</x-button>
            </a>
            <form action="{{ $deleteRoute }}" method="post" class="flex">
                @method('DELETE')
                @csrf
                <x-button class="bg-red-600 hover:bg-red-700 flex">Delete</x-button>
            </form>
        </div>
    </div>
</div>