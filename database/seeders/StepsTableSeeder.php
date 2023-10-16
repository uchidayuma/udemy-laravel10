<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = DB::table('recipes')->pluck('id')->toArray();

        foreach ($recipes as $recipeId) {
            $numberOfSteps = rand(3, 6); // Randomly generate between 3 to 6 steps for each recipe

            for ($i = 1; $i <= $numberOfSteps; $i++) {
                DB::table('steps')->insert([
                    'recipe_id' => $recipeId,
                    'step_number' => $i,
                    'description' => 'Step ' . $i . ' description for recipe ' . $recipeId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
