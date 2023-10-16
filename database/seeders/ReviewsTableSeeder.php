<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = DB::table('recipes')->pluck('id')->toArray();
        $users = DB::table('users')->pluck('id')->toArray();
        $comments = ['Great recipe!', 'I loved it!', 'Will try again.', 'Not my favorite.', 'Easy to make and delicious!'];

        foreach ($recipes as $recipe) {
            for ($i = 0; $i < rand(1, 3); $i++) { // Each recipe will have 1 to 3 reviews
                DB::table('reviews')->insert([
                    'user_id' => $users[array_rand($users)],
                    'recipe_id' => $recipe,
                    'rating' => rand(1, 5),
                    'comment' => $comments[array_rand($comments)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
