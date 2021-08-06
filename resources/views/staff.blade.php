@section('title', 'Aqobah International Staff')
@section('description', 'Showing all of Aqobah International Staff')
@section('image', asset('img/header.svg'))
<x-page-layout title="Staff of Aqobah International School">
    <div class="grid grid-cols-2 md:grid-cols-5 gap-8">
        @foreach ($staffList as $staff)
            <a href="{{ route('staff.detail', $staff->id) }}" class="flex flex-col items-center space-y-2 group">
                <div class="inline-flex relative overflow-hidden shadow-md transition duration-300 rounded-full h-36 w-36">
                    <img src="{{ asset('img/staff/' . $staff->photo) }}" alt="" class="w-full h-full object-cover filter group-hover:blur-sm transition duration-300">
                    <div class="w-full h-full absolute bg-black opacity-0 group-hover:bg-opacity-50 group-hover:opacity-100 transition duration-300 flex flex-col items-center justify-center space-y-2">
                        <i class="text-2xl text-secondary font-bold fas fa-search"></i>
                        <div class="text-base text-secondary font-bold">See details...</div>
                    </div>
                </div>
                <div class="flex flex-col space-y-1">
                    <div class="text-primary font-bold text-center leading-tight group-hover:text-primary-light">
                        {{ $staff->name }}
                    </div>
                    <div class="text-sm text-center leading-none text-gray-800">
                        as {{ $staff->structural_role }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</x-page-layout>