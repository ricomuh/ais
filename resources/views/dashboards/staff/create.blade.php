<x-dashboard-layout title="Create a new staff">
    <x-error-success />
    <form class="flex flex-col space-y-2" enctype="multipart/form-data" action="{{ route('dashboard.staff.store') }}" method="POST">
        @csrf
        <x-dashboard-auto-custom name="photo">
            <input type="file" name="photo" id="photo">
        </x-dashboard-auto-custom>
        <x-dashboard-auto-input name="name" :value="old('name')"/>
        <x-dashboard-auto-input name="email" :value="old('email')"/>
        <x-dashboard-auto-input name="address" :value="old('address')"/>
        <x-dashboard-auto-input name="structural_role" :value="old('structural_role')"/>
        <x-dashboard-auto-input name="functional_role" :value="old('functional_role')"/>
        <x-dashboard-auto-custom name="formal_educations" >
            <x-dashboard-textarea name="formal_educations" :full="true" :rows="3" :value="old('formal_educations')"/>
        </x-dashboard-auto-custom>
        <x-dashboard-auto-custom name="nonformal_educations" >
            <x-dashboard-textarea name="nonformal_educations" :full="true" :rows="3" :value="old('nonformal_educations')"/>
        </x-dashboard-auto-custom>
        <x-dashboard-auto-custom name="experiences" >
            <x-dashboard-textarea name="experiences" :full="true" :rows="3" :value="old('experiences')"/>
        </x-dashboard-auto-custom>
        <x-dashboard-auto-custom name="publications" >
            <x-dashboard-textarea name="publications" :full="true" :rows="3" :value="old('publications')"/>
        </x-dashboard-auto-custom>
        
        <div class="flex justify-center">
            <x-button>Submit</x-button>
        </div>
    </form>
</x-dashboard-layout>