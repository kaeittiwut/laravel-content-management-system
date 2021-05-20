<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // DB::table('users')->truncate();
        // DB::table('posts')->truncate();

        // User::factory(10)->create()->each(function ($user) {
        //     $user->posts()->save(Post::factory()->make());
        // });

        User::factory(10)->has(Post::factory()->count(2))->create();
    }
}
