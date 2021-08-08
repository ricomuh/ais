<x-dashboard-layout title="edit a staff">
    <x-error-success />
    <form class="flex flex-col space-y-2" enctype="multipart/form-data" action="{{ route('dashboard.staff.update', $staff->id) }}" method="POST">
        @method('PUT')
        @csrf
        <x-dashboard-auto-custom name="photo">
            <div class="flex flex-col">
                <img src="{{ asset('img/staff/' . $staff->photo) }}" alt="" class="w-32">
                <input type="file" name="photo" id="photo">
            </div>
        </x-dashboard-auto-custom>
        <x-dashboard-auto-input name="name" :value="$staff->name"/>
        <x-dashboard-auto-input name="email" :value="$staff->email"/>
        <x-dashboard-auto-input name="address" :value="$staff->address"/>
        <x-dashboard-auto-input name="structural_role" :value="$staff->structural_role"/>
        <x-dashboard-auto-input name="functional_role" :value="$staff->functional_role"/>
        <x-dashboard-auto-custom name="formal_educations" >
            <x-dashboard-textarea name="formal_educations" :full="true" :rows="3" :value="$staff->formal_educations"/>
        </x-dashboard-auto-custom>
        <x-dashboard-auto-custom name="nonformal_educations" >
            <x-dashboard-textarea name="nonformal_educations" :full="true" :rows="3" :value="$staff->nonformal_educations"/>
        </x-dashboard-auto-custom>
        <x-dashboard-auto-custom name="experiences" >
            <x-dashboard-textarea name="experiences" :full="true" :rows="3" :value="$staff->experiences"/>
        </x-dashboard-auto-custom>
        <x-dashboard-auto-custom name="publications" >
            <x-dashboard-textarea name="publications" :full="true" :rows="3" :value="$staff->publications"/>
        </x-dashboard-auto-custom>
        
        <div class="flex justify-center">
            <x-button>Submit</x-button>
        </div>
    </form>
</x-dashboard-layout>