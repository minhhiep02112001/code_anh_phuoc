<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i < 100; $i++) {
            $name =  $faker->sentence;
            \App\Models\Category::insert([
                'title' => $name,
                'type' => 'product',
                'thumbnail' => $faker->imageUrl(640, 480, 'technics'),
                'is_status' => $faker->boolean,
                'slug' => \Str::slug($name),
            ]);
        }
    }
}
