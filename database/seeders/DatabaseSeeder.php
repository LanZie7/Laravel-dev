<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            NewsSeeder::class
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@yandex.ru',
            'password' => Hash::make('admin@yandex.ru'),
            'email_verified_at' => Carbon::now()
        ]);
    }
}
