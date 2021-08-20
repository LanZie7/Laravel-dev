<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Database\Factories\NewsFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash as FacadesHash;
=======
use Illuminate\Support\Facades\Hash;
>>>>>>> Lesson_8-Laravel-Middleware-Sessions-Auth

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        // $this->call([CategorySeeder::class, NewsSeeder::class]);

=======
>>>>>>> Lesson_8-Laravel-Middleware-Sessions-Auth
        Category::factory(5)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@yandex.ru',
<<<<<<< HEAD
            'password' => FacadesHash::make('admin@yandex.ru'),
=======
            'password' => Hash::make('admin@yandex.ru'),
>>>>>>> Lesson_8-Laravel-Middleware-Sessions-Auth
            'email_verified_at' => Carbon::now()
        ]);
    }
}
