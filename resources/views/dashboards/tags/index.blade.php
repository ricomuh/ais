<x-dashboard-layout title="Tags">
    @if (session('message'))
        <div class="bg-green-300 border border-green-600 p-2 my-3 rounded-md">
            <span class="text-sm text-green-600">{{ session('message') }}</span>
        </div>
    @endif
    @if ($errors->count())
        <ul class="bg-red-100 border border-red-500 p-5">
            @foreach ($errors->all() as $error)
                <li class="text-red-500 list-disc list-inside">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="bg-green-50 p-10 my-10 flex flex-col border border-green-200">
        <h3 class="font-bold text-lg text-gray-700 mb-3">Create a new tag</h3>
        <form class="grid grid-cols-1 md:grid-cols-4 gap-5" method="POST" action="{{ route('dashboard.tags.store') }}">
            @csrf
            <div class="flex flex-col">
                <x-input type="text" name="name" id="name" placeholder="Name..."></x-input>
            </div>
            <div class="">
                <x-button>Create</x-button>
            </div>
        </form>
    </div>
    <div class="flex flex-col divide-y divide-gray-500">
        @foreach ($tags as $tag)
            <div class="flex flex-col" x-data="{ open : false }">
                <div class="flex flex-row space-x-5 py-2">
                    <div class="w-5 flex flex-row items-center justify-center">
                        {{ $loop->iteration }}
                    </div>
                    <div class="grid grid-cols-1 flex-grow">
                        <div class="flex flex-col col-span-1">
                            <div class="font-bold text-gray-600 text-sm">Name</div>
                            <div class="text-gray-800">{{ $tag->name }}</div>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <x-button @click="open = ! open" >Edit</x-button>
                        <form action="{{ route('dashboard.tags.destroy', $tag->id) }}" method="post" class="flex">
                            @method('DELETE')
                            @csrf
                            <x-button class="bg-red-600 hover:bg-red-700 flex">Delete</x-button>
                        </form>
                    </div>
                </div>
                <form x-show="open" action="{{ route('dashboard.tags.update', $tag->id) }}" method="POST" class="grid grid-cols-1 md:grid-cols-4 p-5 gap-5 bg-blue-50">
                    @method('PUT')
                    @csrf
                    <div class="flex flex-col">
                        <x-input type="text" name="name" id="name" placeholder="Name..." value="{{ $tag->name }}"></x-input>
                    </div>
                    <div class="">
                        <x-button>Save</x-button>
                    </div>
                </form>
            </div>
        @endforeach
    </div>
</x-dashboard-layout>