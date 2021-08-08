<x-dashboard-layout title="Create a new page">
    <x-error-success />
    <form action="{{ route('dashboard.pages.store') }}" method="post" class="flex flex-col space-y-2">
        @csrf
        <x-dashboard-auto-input  name="title" :value="old('title')" />
        <x-dashboard-auto-input  name="slug" :value="old('slug')" />
        <x-dashboard-auto-custom name="menu_id">
            <x-dashboard-select :collection="$menus" name="menu_id" :defaultId="old('menu_id')" >
                <option value="">None</option>
            </x-dashboard-select>
        </x-dashboard-auto-custom>
        <x-label for="body">Content</x-label>
        <x-dashboard-texteditor name="body" :value="old('body')" />
        <div class="flex justify-center">
            <x-button>Save</x-button>
        </div>
    </form>
    @push('custom-script')
        <script>
            $("#title, #slug").change(function(){
                var value = $(this).val().toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'')
                $("#slug").val(value);
            });
        </script>
    @endpush
</x-dashboard-layout>