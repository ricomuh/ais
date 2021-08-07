<x-dashboard-layout title="Create a carousel">
    <x-error-success />
    <form class="flex flex-col space-y-2" enctype="multipart/form-data" action="{{ route('dashboard.carousels.update', $carousel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <x-dashboard-auto-input name="title" value="{{ $carousel->title }}" />
        <x-dashboard-auto-input name="link" value="{{ $carousel->link }}" />
        <x-dashboard-auto-input name="description" value="{{ $carousel->description }}" />
        <x-dashboard-auto-custom name="thumbnail">
            <div class="flex flex-col">
                <img src="{{ asset('img/carousels/' . $carousel->filename) }}" alt="" class="h-32 w-auto object-cover">
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
        </x-dashboard-auto-custom>
        <div class="flex justify-center">
            <x-button>Submit</x-button>
        </div>
    </form>
</x-dashboard-layout>