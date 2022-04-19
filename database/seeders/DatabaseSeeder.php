<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
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
        $this->seedDepartments();
        $this->seedEmployees();
    }

    /**
     * Seed users
     */
    protected function seedUsers(): void
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

        User::factory(5)->create();
    }

    protected function seedDepartments(): void
    {
        Department::factory(50)->create();
    }

    /**
     * Seed employees
     */
    protected function seedEmployees(): void
    {
        for ($count = 0; $count < 100; $count++) {
            Employee::factory()->create(['department_id' => Department::query()->inRandomOrder()->first()->id]);
        }
    }
}
