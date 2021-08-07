<x-dashboard-layout title="Menus">
    <x-error-success />
    <div class="bg-green-50 p-10 my-10 flex flex-col border border-green-200">
        <h3 class="font-bold text-lg text-gray-700 mb-3">Create a new menu</h3>
        <x-dashboard-form :route="route('dashboard.menus.store')">
            <x-dashboard-input name="name" />
            <x-dashboard-input name="link" />
        </x-dashboard-form>
    </div>
    <div class="flex flex-col divide-y divide-gray-500">
        @foreach ($menus as $menu)
            <x-dashboard-item 
            :items="[
                'Name' => $menu->name,
                'Link' => $menu->link
            ]" 
            :iteration="$loop->iteration" :deleteRoute="route('dashboard.menus.destroy', $menu->id)">
                <x-slot name="update">
                    <x-dashboard-form :route="route('dashboard.menus.update', $menu->id)" :put="true">
                        <x-dashboard-input name="name" :value="$menu->name" />
                        <x-dashboard-input name="link" :value="$menu->link" />
                    </x-dashboard-form>
                    <div class="p-5 mt-10 bg-green-50 border border-green-500">
                        <div class="text-lg font-semibold text-gray-700">
                            Sub Menus
                        </div>
                        <x-dashboard-form :route="route('dashboard.subMenuTitles.store')">
                            <x-dashboard-input name="name" />
                            <x-dashboard-input name="link" />
                            <input type="hidden" id="menu_id" name="menu_id" value="{{ $menu->id }}">
                        </x-dashboard-form>
                        @foreach ($menu->subMenuTitles as $subMenuTitle)
                            <x-dashboard-item
                            :items="[
                                'Name' => $subMenuTitle->name,
                                'Link' => $subMenuTitle->link
                            ]"
                            :iteration="$loop->iteration" :deleteRoute="route('dashboard.subMenuTitles.destroy', $subMenuTitle->id)"
                            >
                                <x-slot name="update">
                                    <x-dashboard-form :route="route('dashboard.subMenuTitles.update', $subMenuTitle->id)" :put="true">
                                        <x-dashboard-input name="name" :value="$subMenuTitle->name" />
                                        <x-dashboard-input name="link" :value="$subMenuTitle->link" />
                                        <input type="hidden" id="menu_id" name="menu_id" value="{{ $menu->id }}">
                                    </x-dashboard-form>
                                </x-slot>
                            </x-dashboard-item>
                        @endforeach
                    </div>
                    @if ($menu->subMenuTitles->count())
                        <div class="p-5 mt-10 bg-green-50 border border-green-500">
                            <div class="text-lg font-semibold text-gray-700">
                                Sub Menu Children
                            </div>
                            <x-dashboard-form :route="route('dashboard.subMenus.store')">
                                <x-dashboard-input name="name" />
                                <x-dashboard-input name="link" />
                                <x-dashboard-select name="sub_menu_title_id" :collection="$menu->subMenuTitles" />
                                <input type="hidden" id="menu_id" name="menu_id" value="{{ $menu->id }}">
                            </x-dashboard-form>
                            
                            @foreach ($menu->subMenus as $subMenu)
                                <x-dashboard-item
                                :items="[
                                    'Name' => $subMenu->name,
                                    'Link' => $subMenu->link,
                                    'Sub Menu Title' => $subMenu->subMenuTitle->name
                                ]"
                                :iteration="$loop->iteration" :deleteRoute="route('dashboard.subMenus.destroy', $subMenu->id)"
                                >
                                    <x-slot name="update">
                                        <x-dashboard-form :route="route('dashboard.subMenus.update', $subMenu->id)" :put="true">
                                            <x-dashboard-input name="name" :value="$subMenu->name" />
                                            <x-dashboard-input name="link" :value="$subMenu->link" />
                                            <x-dashboard-select name="sub_menu_title_id" :collection="$menu->subMenuTitles" :defaultId="$subMenu->subMenuTitle->id" />
                                            <input type="hidden" id="menu_id" name="menu_id" value="{{ $menu->id }}">
                                        </x-dashboard-form>
                                    </x-slot>
                                </x-dashboard-item>
                            @endforeach
                        </div>
                    @endif
                </x-slot>
            </x-dashboard-item>
        @endforeach
    </div>
</x-dashboard-layout>