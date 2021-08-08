<x-dashboard-layout :title="$page->title">
    <x-error-success />
    <form action="{{ route('dashboard.pages.update', $page->id) }}" method="post" class="flex flex-col space-y-2">
        @method('PUT')
        @csrf
        <x-dashboard-auto-input  name="title" :value="$page->title" />
        <x-dashboard-auto-input  name="slug" :value="$page->slug" />
        <x-dashboard-auto-custom name="menu_id">
            <x-dashboard-select :collection="$menus" name="menu_id" :defaultId="$page->menu_id" >
                <option value="">None</option>
            </x-dashboard-select>
        </x-dashboard-auto-custom>
        <x-label for="body">Content</x-label>
        <x-dashboard-texteditor name="body" :value="$page->body" />
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