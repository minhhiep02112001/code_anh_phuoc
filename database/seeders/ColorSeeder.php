<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Color::insert([
            ['title' => 'Black', 'slug' => 'black',   'code' => '#000000'],
            ['title' => 'White', 'slug' => 'white',  'code' => '#FFFFFF'],
            ['title' => 'Red', 'slug' => 'red',  'code' => '#FF0000'],
            ['title' => 'Lime', 'slug' => 'lime',  'code' => '#00FF00'],
            ['title' => 'Blue', 'slug' => 'blue',  'code' => '#0000FF'],
            ['title' => 'Yellow', 'slug' => 'yellow',  'code' => '#FFFF00'],
            ['title' => 'Gray', 'slug' => 'gray',  'code' => '#808080'],
            ['title' => 'Green', 'slug' => 'green',  'code' => '#008000'],
            ['title' => 'Purple', 'slug' => 'purple',  'code' => '#800080'],
        ]);
    }
}
