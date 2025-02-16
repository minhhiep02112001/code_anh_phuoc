<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i < 1000; $i++) {

            $params = [
                'Số đăng ký' => $faker->sentence,
                'Quy cách ' =>$faker->sentence ,
                'Nhà sản xuất' => $faker->sentence,
                'Nước sản xuất' => $faker->sentence,
                'Thành phần' => $faker->sentence,
                'Dạng bào chế' => $faker->sentence
            ];


            $name = $faker->sentence;
            $category_id = Category::where('type', 'product')->inRandomOrder()->first()->id;
            Product::insert([
                'title' => $name,
                'content' => $faker->paragraph,
                'viewed' => $faker->numberBetween(0, 10000),
                'thumbnail' => $faker->imageUrl(640, 480, 'technics'),
                'is_status' => $faker->boolean,
                'slug' => \Str::slug($name),
                'description' => $faker->text,
                'meta_title' => $faker->sentence,
                'meta_description' => $faker->paragraph,
                'meta_keyword' => implode(', ', $faker->words(5)),
                'avg_vote' => $faker->randomFloat(2, 1, 5),
                'total_vote' => $faker->numberBetween(0, 500),
                'category_id' => $category_id,
                'price' => rand(1000, 100000000),
                'price_out' => rand(1000, 100000000),
                'quantity' => rand(10,10000),
                'schema' => json_encode(['@context' => 'https://schema.org', '@type' => 'Product', 'name' => $name]),
                'params' => json_encode($params)
            ]);
            echo "\n Done $i";
        }
    }
}
