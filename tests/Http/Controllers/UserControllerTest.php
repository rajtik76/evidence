<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function test_login_route_can_be_accessed_without_authorization(): void
    {
        $response = $this->get('/user/login');
        $response->assertSuccessful();
    }

    public function test_user_login(): void
    {
        $response = $this->postJson('/user/login');
        $response->assertStatus(422); // missing data

        $response = $this->postJson('/user/login', ['email' => 'a']);
        $response->assertStatus(422);
        $response->assertJsonValidationErrorFor('email'); // email validation failed
        $response->assertJsonValidationErrorFor('password'); // password missing

        $user = User::factory()->create();

        $response = $this->postJson('/user/login', ['email' => $user->email, 'password' => 'password']);
        $response->assertRedirect('/');
    }

    public function test_user_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/user/logout');
        $response->assertRedirect('/user/login');
    }

    public function test_user_list(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/user/list');
        $response->assertStatus(500); // user is not an admin

        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->get('/user/list');
        $response->assertViewIs('user.list'); // return view
        $response->assertViewHasAll(['users', 'grid']); // view have all bindings
    }
}
