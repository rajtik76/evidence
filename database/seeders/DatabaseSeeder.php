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
        $this->seedUsers();
    }

    /**
     * @return void
     */
    public function seedUsers(): void
    {
        if (User::query()->where('email', 'rajtik@gmail.com')->doesntExist()) {
            User::factory()->create([
                'name' => 'Vladislav Rajtmajer',
                'email' => 'rajtik@gmail.com',
                'email_verified_at' => now(),
                'is_admin' => true,
                'password' => Hash::make('password')
            ]);
        }
    }
}
