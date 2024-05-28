<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 users
        User::factory(10)->create();

        // Create 10 tasks associated with random users
        Task::factory(10)->create();

        // If you want to create a specific user with a task, uncomment the lines below
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ])->each(function ($user) {
        //     $user->tasks()->save(Task::factory()->make());
        // });
    }
}
