<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::updateOrCreate(['email' => 'admin@gmail.com'], [
            'name' => 'root',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => 'admin123456', // password
            'remember_token' => Str::random(10),
            'type' => '1'
        ]);
        \App\Models\User::factory(10)->create();
    }
}
