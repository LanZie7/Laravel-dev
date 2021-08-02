<?php

namespace Database\Seeders;

use App\Models\News;
use Faker\Factory;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->getData());
    }

    public function getData() : array
    {
        $faker = Factory::create();
        $data = [];

        for($i = 0; $i <10; $i++) {
            $title = $faker->sentence(mt_rand(3,10));
            $slug = \Str::slug($title);
            $data[] = [
                'category_id' => 1,
				'title' => $title,
				'description' => $faker->text(250),
				'slug' => $slug,
				'created_at' => now(),
				'updated_at' => now()
            ];
        }

        return $data;
    }

}
