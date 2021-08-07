<x-dashboard-layout title="Carousels">
    <x-error-success />
    <div class="flex justify-center">
        <a href="{{ route('dashboard.carousels.create') }}">
            <x-button>Create new carousel</x-button>
        </a>
    </div>
    <div class="flex flex-col divide-y divide-gray-500">
        @foreach ($carousels as $carousel)
            <x-dashboard-custom-item :items="4" :iteration="$loop->iteration" edit="{{ route('dashboard.carousels.edit', $carousel->id) }}" :deleteRoute="route('dashboard.carousels.destroy', $carousel->id)">
                <x-dashboard-detail title="Image">
                    <img src="{{ asset('img/carousels/' . $carousel->filename) }}" alt="" class="h-20 my-1">
                </x-dashboard-detail>
                <x-dashboard-detail title="Title">
                    <div class="text-gray-700">{{ $carousel->title }}</div>
                </x-dashboard-detail>
                <x-dashboard-detail title="Description">
                    <div class="text-gray-700">{{ $carousel->description }}</div>
                </x-dashboard-detail>
                <x-dashboard-detail title="Link">
                    <div class="text-gray-700">{{ $carousel->link }}</div>
                </x-dashboard-detail>
            </x-dashboard-custom-item>
        @endforeach
    </div>
</x-dashboard-layout>