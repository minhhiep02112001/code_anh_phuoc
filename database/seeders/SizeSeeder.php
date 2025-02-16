<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Size::insert([
            ['title' => 'Size S', 'slug' => 'size-s', 'description' => ''],
            ['title' => 'Size M', 'slug' => 'size-m', 'description' => ''],
            ['title' => 'Size L', 'slug' => 'size-l', 'description' => ''],
            ['title' => 'Size XL', 'slug' => 'size-xl', 'description' => ''],
            ['title' => 'Size XXL', 'slug' => 'size-xxl', 'description' => ''],
            ['title' => 'Size 3XL', 'slug' => 'size-3xl', 'description' => '']
        ]);
    }
}
