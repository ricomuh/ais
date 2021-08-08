<x-dashboard-layout :title="$page->title">
    <div class="flex flex-col space-y-4">
        <x-detail-item name="Title" :value="$page->title" />
        <x-detail-item name="Slug" :value="$page->slug" />
        <x-detail-item name="Menu" :value="$page->menu->name ?? 'None'" />
        <x-detail-item name="Views" :value="$page->views" />
        <x-detail-item name="Body">
            {!! $page->body !!}
        </x-detail-item>
        <div class="flex justify-center">
            <a href="{{ route('dashboard.pages.edit', $page->id) }}">
                <x-button>Edit</x-button>
            </a>
            <form action="{{ route('dashboard.pages.destroy', $page->id) }}" method="post">
                @method('DELETE')
                @csrf
                <x-button class="bg-red-600 hover:bg-red-500">Delete</x-button>
            </form>
        </div>
    </div>
</x-dashboard-layout>