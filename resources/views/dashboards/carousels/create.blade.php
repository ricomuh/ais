<x-dashboard-layout title="Create a new carousel">
    <x-error-success />
    <form class="flex flex-col space-y-2" enctype="multipart/form-data" action="{{ route('dashboard.carousels.store') }}" method="POST">
        @csrf
        <x-dashboard-auto-input name="title" />
        <x-dashboard-auto-input name="link" />
        <x-dashboard-auto-input name="description" />
        <x-dashboard-auto-custom name="thumbnail">
            <input type="file" name="thumbnail" id="thumbnail">
        </x-dashboard-auto-custom>
        <div class="flex justify-center">
            <x-button>Submit</x-button>
        </div>
    </form>
</x-dashboard-layout>