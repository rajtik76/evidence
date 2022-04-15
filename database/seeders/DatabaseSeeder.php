<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        if (User::query()->where('email', 'rajtik@gmail.com')->doesntExist()) {
            User::factory()->create([
                'name' => 'Vladislav Rajtmajer',
                'email' => 'rajtik@gmail.com',
                'password' => Hash::make('password')
            ]);
        }
    }
}
