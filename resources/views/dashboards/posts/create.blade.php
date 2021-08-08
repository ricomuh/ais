<x-dashboard-layout title="Create a new post">
    <x-error-success />
    <form action="{{ route('dashboard.posts.store') }}" enctype="multipart/form-data" method="post" class="flex flex-col space-y-2">
        @csrf
        <x-dashboard-auto-input  name="title" :value="old('title')" />
        <x-dashboard-auto-custom name="thumbnail">
            <input type="file" name="thumbnail" id="thumbnail">
        </x-dashboard-auto-custom>
        <x-dashboard-auto-custom name="tag_id">
            <x-dashboard-select :collection="$tags" name="tag_id" :defaultId="old('tag_id')" >
                <option value="">None</option>
            </x-dashboard-select>
        </x-dashboard-auto-custom>
        <x-label for="body">Content</x-label>
        <x-dashboard-texteditor name="body" :value="old('body')" />
        <div class="flex justify-center">
            <x-button>Save</x-button>
        </div>
    </form>
</x-dashboard-layout>