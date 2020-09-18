<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
        $users = User::factory()->count(10)->create();

        $categories = Category::factory()->count(5)->create();

        Post::factory()
            ->count(10)
            ->make()
            ->each(function($post) use ($users, $categories){
                $post->author_id = $users->random()->id;
                $post->category_id = $categories->random()->id;
                $post->save();
            });
            
    }
}
