<?php

namespace App\Route;

class Menu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
            'dashboard' => [
                'icon' => 'dashboard',
                'title' => 'Dashboard',
                'route_name' => 'dashboard',
            ],
            'blog' => [
                'icon' => 'blog',
                'title' => 'Blog',
                'route_name' => 'blogs',
            ],
        ];
    }
}
