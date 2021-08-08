<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardNav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $menus = [
            ['name' => 'Dashboard', 'route' => 'dashboard'],
            ['name' => 'Menus', 'route' => 'dashboard.menus.index'],
            ['name' => 'Tags', 'route' => 'dashboard.tags.index'],
            ['name' => 'Footer Links', 'route' => 'dashboard.footerLinks.index'],
            ['name' => 'Faqs', 'route' => 'dashboard.faqs.index'],
            ['name' => 'Carousels', 'route' => 'dashboard.carousels.index'],
            ['name' => 'Staff', 'route' => 'dashboard.staff.index'],
        ];

        return view('layouts.navigation', compact('menus'));
    }
}
