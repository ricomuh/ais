<x-dashboard-layout title="Tags">
    <x-error-success />
    <div class="bg-green-50 p-10 my-10 flex flex-col border border-green-200">
        <h3 class="font-bold text-lg text-gray-700 mb-3">Create a new tag</h3>
        <x-dashboard-form :route="route('dashboard.tags.store')">
            <x-dashboard-input name="name" />
        </x-dashboard-form>
    </div>
    <div class="flex flex-col divide-y divide-gray-500">
        @foreach ($tags as $tag)
            <x-dashboard-item 
            :items="[
                'Name' => $tag->name,
            ]"
            :iteration="$loop->iteration" :deleteRoute="route('dashboard.tags.destroy', $tag->id)">
                <x-slot name="update">
                    <x-dashboard-form :route="route('dashboard.tags.update', $tag->id)" :put="true">
                        <x-dashboard-input name="name" :value="$tag->name" />
                    </x-dashboard-form>
                </x-slot>
            </x-dashboard-item>
        @endforeach
    </div>
</x-dashboard-layout>
