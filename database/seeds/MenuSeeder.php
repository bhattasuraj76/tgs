<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        $navbarMenus = config('menu_seeder.navbar');
        foreach ($navbarMenus as $menuname => $menuitems) {
            // Create a new menu
            $menu = \App\Models\Menu::create([
                'name' => $menuname,
                'location' => 'navbar',
                'link' => '#'
            ]);

            $count = 0;
            foreach ($menuitems as $name => $subitems) {
                $menuitem = \App\Models\MenuItem::create([
                    'label' => $name,
                    'link' => '#',
                    'menu' => $menu->id,
                    'depth' => 0,
                    'sort' => ++$count,
                    'parent' => 0
                ]);

                foreach ($subitems as $subname) {
                   \App\Models\MenuItem::create([
                        'label' => $subname,
                        'link' => '/'. Str::slug($subname),
                        'menu' => $menu->id,
                        'depth' => 1,
                        'sort' => ++$count,
                        'parent' => $menuitem->id,
                    ]);
                }

            }
        }

        $footerMenus = config('menu_seeder.footer');
        foreach ($footerMenus as $menuname => $menuitems) {
            // Create a new menu
            $menu = \App\Models\Menu::create([
                'name' => $menuname,
                'location' => 'footer',
                'link' => '#'
            ]);

            $count = 0;
            foreach ($menuitems as $name => $menuitem) {

                $menuitem = \App\Models\MenuItem::create([
                    'label' => $menuitem,
                    'link' => '#',
                    'menu' => $menu->id,
                    'depth' => 0,
                    'sort' => ++$count,
                    'parent' => 0
                ]);
            }
        }
    }

}
