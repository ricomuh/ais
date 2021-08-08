<x-dashboard-layout title="Edit post">
    <x-error-success />
    <form action="{{ route('dashboard.posts.update', $post->id) }}" enctype="multipart/form-data" method="post" class="flex flex-col space-y-2">
        @method('PUT')
        @csrf
        <x-dashboard-auto-input  name="title" :value="$post->title" />
        <x-dashboard-auto-custom name="thumbnail">
            <div class="flex flex-col">
                <img src="{{ asset('img/thumbnails/' . $post->thumbnail) }}" alt="" class="w-32">
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
        </x-dashboard-auto-custom>
        <x-dashboard-auto-custom name="tag_id">
            <x-dashboard-select :collection="$tags" name="tag_id" :defaultId="$post->tag_id" >
                <option value="">None</option>
            </x-dashboard-select>
        </x-dashboard-auto-custom>
        <x-label for="body">Content</x-label>
        <x-dashboard-texteditor name="body" :value="$post->body" />
        <div class="flex justify-center">
            <x-button>Save</x-button>
        </div>
    </form>
</x-dashboard-layout>