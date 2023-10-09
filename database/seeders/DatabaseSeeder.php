<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call([
        //     PostSeeder::class,
        // ]);

        $wunna = User::factory(['email' => "wunna@gmail.com", "name" => "wunna", 'created_user_id' => 1, 'updated_user_id' => 1])->create();
        $demo = User::factory(['email' => "demo@gmail.com", "name" => "demo", 'created_user_id' => 1, 'updated_user_id' => 1])->create();

        Post::factory(["created_user_id" => $wunna->id])->count(3)->create();
        Post::factory(["created_user_id" => $demo->id])->count(3)->create();
    }
}
