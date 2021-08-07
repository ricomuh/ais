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
            ['name' => 'Tags', 'route' => 'dashboard.tags.index'],
            ['name' => 'Featured Tags', 'route' => 'dashboard.featuredTags.index'],
            ['name' => 'Footer Links', 'route' => 'dashboard.footerLinks.index'],
        ];

        return view('layouts.navigation', compact('menus'));
    }
}
