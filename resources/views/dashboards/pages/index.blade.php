<x-dashboard-layout title="Pages">
    <x-error-success />
    <div class="flex justify-center">
        <a href="{{ route('dashboard.pages.create') }}">
            <x-button>Create new page</x-button>
        </a>
    </div>
    <div class="flex flex-col divide-y divide-gray-500">
        @foreach ($pages as $page)
            <x-dashboard-custom-item :edit="route('dashboard.pages.show', $page->id)" :items="5" :iteration="$loop->iteration">
                <div class="flex flex-col col-span-2">
                    <x-dashboard-detail title="Title">
                        {{ $page->title }}
                    </x-dashboard-detail>
                    <x-dashboard-detail title="Slug">
                        {{ $page->slug }}
                    </x-dashboard-detail>
                </div>
                <div class="flex flex-col">
                    <x-dashboard-detail title="Menu">
                        {{ $page->menu->name ?? 'None' }}
                    </x-dashboard-detail>
                    <x-dashboard-detail title="Views">
                        {{ $page->views }}
                    </x-dashboard-detail>
                </div>
                <x-dashboard-detail :span="2" title="Body">
                    {{ Str::words(strip_tags($page->body), 30, '...') }}
                </x-dashboard-detail>
            </x-dashboard-custom-item>
        @endforeach
    </div>
</x-dashboard-layout>