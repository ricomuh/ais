<x-dashboard-layout title="Staff">
    <x-error-success />
    <div class="flex justify-center">
        <a href="{{ route('dashboard.staff.create') }}">
            <x-button>Create new Staff</x-button>
        </a>
    </div>
    <div class="flex flex-col divide-y divide-gray-500">
        @foreach ($staffList as $staff)
            <x-dashboard-custom-item :items="6" :iteration="$loop->iteration" edit="{{ route('dashboard.staff.edit', $staff->id) }}" :deleteRoute="route('dashboard.staff.destroy', $staff->id)">
                <x-dashboard-detail title="Photo">
                    <img src="{{ asset('img/staff/' . $staff->photo) }}" alt="" class="h-16 my-1">
                </x-dashboard-detail>
                <div class="flex-flex-col col-span-3">
                    <x-dashboard-detail title="Name">
                        <div class="text-gray-700">{{ $staff->name }}</div>
                    </x-dashboard-detail>
                    <x-dashboard-detail title="Email">
                        <div class="text-gray-700">{{ $staff->email }}</div>
                    </x-dashboard-detail>
                    <x-dashboard-detail title="Address">
                        <div class="text-gray-700">{{ $staff->address }}</div>
                    </x-dashboard-detail>
                </div>
                <div class="flex flex-col col-span-2">
                    <x-dashboard-detail title="Structural Role">
                        <div class="text-gray-700">{{ $staff->structural_role }}</div>
                    </x-dashboard-detail>
                    <x-dashboard-detail title="Functional Role">
                        <div class="text-gray-700">{{ $staff->functional_role }}</div>
                    </x-dashboard-detail>
                </div>
            </x-dashboard-custom-item>
        @endforeach
    </div>
</x-dashboard-layout>