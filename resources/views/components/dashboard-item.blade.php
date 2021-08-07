@props(['items' => [], 'update', 'deleteRoute', 'iteration'])

<div class="flex flex-col" x-data="{ open : false }">
    <div class="flex flex-row space-x-5 py-2">
        <div class="w-5 flex flex-row items-center justify-center">
            {{ $iteration }}
        </div>
        <div class="grid grid-cols-{{ count($items) }} flex-grow">
            @foreach ($items as $key => $value)
                <div class="flex flex-col col-span-1">
                    <div class="font-bold text-gray-600 text-sm">{{ $key }}</div>
                    <div class="text-gray-800">{{ $value }}</div>
                </div>
            @endforeach
        </div>
        <div class="flex-shrink-0">
            <x-button @click="open = ! open" >Edit</x-button>
            <form action="{{ $deleteRoute }}" method="post" class="flex">
                @method('DELETE')
                @csrf
                <x-button class="bg-red-600 hover:bg-red-700 flex">Delete</x-button>
            </form>
        </div>
    </div>
    <div class="bg-blue-50 p-5" x-show="open">
        {{ $update }}
    </div>
</div>