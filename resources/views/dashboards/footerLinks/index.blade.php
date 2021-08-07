<x-dashboard-layout title="Footer Links">
    <x-error-success />
    <div class="bg-green-50 p-10 my-10 flex flex-col border border-green-200">
        <h3 class="font-bold text-lg text-gray-700 mb-3">Create a new footer link</h3>
        <x-dashboard-form :route="route('dashboard.footerLinks.store')">
            <x-dashboard-input name="name" />
            <x-dashboard-input name="link" />
        </x-dashboard-form>
    </div>
    <div class="flex flex-col divide-y divide-gray-500">
        @foreach ($footerLinks as $footerLink)
            <x-dashboard-item 
            :items="[
                'Name' => $footerLink->name,
                'Link' => $footerLink->link
            ]" 
            :iteration="$loop->iteration" :deleteRoute="route('dashboard.footerLinks.destroy', $footerLink->id)">
                <x-slot name="update">
                    <x-dashboard-form :route="route('dashboard.footerLinks.update', $footerLink->id)" :put="true">
                        <x-dashboard-input name="name" :value="$footerLink->name" />
                        <x-dashboard-input name="link" :value="$footerLink->link" />
                    </x-dashboard-form>
                </x-slot>
            </x-dashboard-item>
        @endforeach
    </div>
</x-dashboard-layout>