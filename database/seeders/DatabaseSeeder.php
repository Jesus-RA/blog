<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
        $users = User::factory()->count(10)->create();

        $categoriesNames = [
            'Programación',
            'Desarrollo Web',
            'Desarrollo Movil',
            'Inteligencia Artificial',
        ];
        $collection = collect($categoriesNames);
        $categories = $collection->map(function ($category, $key){
            return Category::factory()->create(['name' => $category]);
        });

        Post::factory()
            ->count(10)
            ->make()
            ->each(function($post) use ($users, $categories){
                $post->author_id = $users->random()->id;
                $post->category_id = $categories->random()->id;
                $post->save();
            });
            
        $user = User::factory()->create();
        $user->name = 'Jesús Ramírez';
        $user->email = 'jesus.ra98@hotmail.com';
        $user->password = Hash::make('jamon123');
        $user->save();
    }
}
