<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = DB::table('recipes')->pluck('id')->toArray();
        $ingredient_names = ['Salt', 'Sugar', 'Flour', 'Eggs', 'Milk', 'Butter', 'Oil', 'Vanilla extract', 'Baking powder', 'Cocoa powder'];

        foreach ($recipes as $recipe) {
            for ($i = 0; $i < rand(2, 5); $i++) { // Each recipe will have 2 to 5 ingredients
                DB::table('ingredients')->insert([
                    'recipe_id' => $recipe,
                    'name' => $ingredient_names[array_rand($ingredient_names)],
                    'quantity' => rand(1, 500) . 'g', // Random quantity between 1 and 500 grams
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
