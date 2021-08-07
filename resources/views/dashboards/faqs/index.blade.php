<x-dashboard-layout title="FAQs">
    <x-error-success />
    <div class="bg-green-50 p-10 my-10 flex flex-col border border-green-200">
        <h3 class="font-bold text-lg text-gray-700 mb-3">Create a new FAQ</h3>
        <x-dashboard-form :route="route('dashboard.faqs.store')">
            <div class="">
                <x-dashboard-input name="title" />
            </div>
            <x-dashboard-textarea name="body" />
        </x-dashboard-form>
    </div>
    <div class="flex flex-col divide-y divide-gray-500">
        @foreach ($faqs as $faq)
            <x-dashboard-item 
            :items="[
                'Title' => $faq->title,
                'Body' => substr($faq->body, 0, 200) . '...'
            ]" 
            :iteration="$loop->iteration" :deleteRoute="route('dashboard.faqs.destroy', $faq->id)">
                <x-slot name="update">
                    <x-dashboard-form :route="route('dashboard.faqs.update', $faq->id)" :put="true">
                        <div class="">
                            <x-dashboard-input name="title" :value="$faq->title" />
                        </div>
                        <x-dashboard-textarea name="body" :value="$faq->body" />
                    </x-dashboard-form>
                </x-slot>
            </x-dashboard-item>
        @endforeach
    </div>
</x-dashboard-layout>