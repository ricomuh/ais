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
        <div class="flex flex-col" x-data="{ html : false }">
            <div class="flex flex-row justify-start">
                <div class="px-4 py-2 border border-gray-300 cursor-pointer text-gray-700 rounded-t-md transition duration-300 border-b-0 hover:bg-gray-100" @click="html = false" :class="{'bg-gray-200 transform scale-90 translate-y-0.5 ' : html}">Plain Text</div>
                <div class="px-4 py-2 border border-gray-300 cursor-pointer text-gray-700 rounded-t-md transition duration-300 border-b-0 hover:bg-gray-100" @click="html = true; openHtml();" :class="{'bg-gray-200 transform scale-90 translate-y-0.5 ' : !html}" >Html</div>
            </div>
            <div x-show="!html">
                <x-dashboard-texteditor name="body" :value="$page->body" />
            </div>
            <div x-show="html">
                <textarea name="html" id="html" class="w-full h-96" placeholder="Html..." x-ref="htmlEditor"></textarea>
            </div>
        </div>
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
            function openHtml() {
                $("#html").val(tinyMCE.get('body').getContent());
            }
            $("#html").keyup(function(){
                tinyMCE.get("body").setContent($(this).val());
            });
        </script>
    @endpush
</x-dashboard-layout>