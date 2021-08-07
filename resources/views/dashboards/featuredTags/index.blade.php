<x-dashboard-layout title="Featured Tags">
    <x-error-success />
    <div class="bg-green-50 p-10 my-10 flex flex-col border border-green-200">
        <h3 class="font-bold text-lg text-gray-700 mb-3">Create a new featured tag</h3>
        <x-dashboard-form :route="route('dashboard.featuredTags.store')">
            <x-dashboard-input name="title" />
            <x-dashboard-input name="icon_class" />
            <x-dashboard-select name="tag_id" :collection="$tags" />
        </x-dashboard-form>
    </div>
    <div class="flex flex-col divide-y divide-gray-500">
        @foreach ($featuredTags as $featuredTag)
            <x-dashboard-item 
            :items="[
                'Name' => $featuredTag->title,
                'Icon Class' => $featuredTag->icon_class,
                'Tag' => $featuredTag->tag->name
            ]" 
            :iteration="$loop->iteration" :deleteRoute="route('dashboard.featuredTags.destroy', $featuredTag->id)">
                <x-slot name="update">
                    <x-dashboard-form :route="route('dashboard.featuredTags.update', $featuredTag->id)" :put="true">
                        <x-dashboard-input name="title" :value="$featuredTag->title" />
                        <x-dashboard-input name="icon_class" :value="$featuredTag->icon_class" />
                        <x-dashboard-select name="tag_id" :collection="$tags" :defaultId="$featuredTag->tag->id" />
                    </x-dashboard-form>
                </x-slot>
            </x-dashboard-item>
        @endforeach
    </div>
</x-dashboard-layout>