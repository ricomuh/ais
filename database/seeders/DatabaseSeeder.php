<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::factory(10)->create();

        \App\Models\Carousel::factory(5)->create();
        \App\Models\Faq::factory(rand(5, 10))->create();
        \App\Models\FooterLink::factory(8)->create();
        \App\Models\Staff::factory(40)->create();

        $tags = \App\Models\Tag::factory(5)->create();
        \App\Models\Post::factory(60)->create();
        \App\Models\FeaturedTag::factory(2)->create();

        \App\Models\Menu::create([
            'name' => 'Home',
            'slug' => "home",
            'link' => '/'
        ]);

        \App\Models\Menu::factory(3)->create()->each(
            function ($menu) {
                \App\Models\SubMenuTitle::factory(rand(2, 5))->create([
                    'menu_id' => $menu->id
                ])->each(
                    function ($subMenuTitle) use ($menu) {
                        $subMenus = \App\Models\SubMenu::factory(rand(0, 4))->create([
                            'menu_id' => $menu->id,
                            'sub_menu_title_id' => $subMenuTitle->id
                        ])->each(
                            function ($subMenu) use ($menu, $subMenuTitle) {
                                $pages = \App\Models\Page::factory(1)->create([
                                    'menu_id' => $menu->id
                                ]);

                                $subMenu->link = '/page/' . $pages->first()->slug;
                                $subMenu->save();
                                $subMenuTitle->link = '/page/' . $pages->first()->slug;
                                $subMenuTitle->save();
                            }
                        );

                        if ($subMenus->count() < 1) {
                            $pages = \App\Models\Page::factory(1)->create(['menu_id' => $menu->id]);

                            $subMenuTitle->link = '/page/' . $pages->first()->slug;
                            $subMenuTitle->save();
                        }
                    }
                );
            }
        );

        $menus = [
            // ['name' => 'News', 'slug' => 'news', 'link' => '/news'],
            [
                'name' => 'Other', 'slug' => 'other', 'link' => '#', 'children' => [
                    ['name' => 'Staff', 'link' => '/staff'],
                    ['name' => 'FAQs', 'link' => '/faqs']
                ]
            ],
            ['name' => 'News', 'slug' => 'news', 'link' => '/news']
        ];

        collect($menus)->each(function ($menu) {
            $createdMenu = \App\Models\Menu::create([
                'name' => $menu['name'],
                'slug' => $menu['slug'],
                'link' => $menu['link'],
            ]);
            collect($menu['children'] ?? [])->each(function ($subMenuTitle) use ($createdMenu) {
                \App\Models\SubMenuTitle::create([
                    'name' => $subMenuTitle['name'],
                    'link' => $subMenuTitle['link'],
                    'menu_id' => $createdMenu->id
                ]);
                collect($subMenuTitle['children'] ?? [])->each(function ($subMenu) use ($createdMenu) {
                    \App\Models\SubMenu::create($subMenu);
                });
            });
        });

        // \App\Models\Menu::create([
        //     'name' => 'News',
        //     'slug' => 'news',
        //     'link' => '/news'
        // ]);
    }
}
