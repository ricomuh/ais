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
        \App\Models\Staff::factory(rand(10, 15))->create();

        $tags = \App\Models\Tag::factory(5)->create();
        \App\Models\Post::factory(60)->create();
        \App\Models\FeaturedTag::factory(2)->create();

        \App\Models\Menu::create([
            'name' => 'Home',
            'slug' => "home",
            'link' => '/'
        ]);

        \App\Models\Menu::factory(4)->create()->each(
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

        \App\Models\Menu::create([
            'name' => 'News',
            'slug' => 'news',
            'link' => '/news'
        ]);
    }
}
