<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Database\Factories\NewsFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(5)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@yandex.ru',
            'password' => Hash::make('admin@yandex.ru'),
            'email_verified_at' => Carbon::now()
        ]);
    }
}
