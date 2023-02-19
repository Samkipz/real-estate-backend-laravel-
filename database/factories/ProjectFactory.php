<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'creator_id' => User::all()->unique()->random()->id,
            'admin_id' => User::all()->unique()->random()->id,
            'name' => fake()->name(),
            'description' => fake()->paragraph(),
            'image' => fake()->image(),
        ];
    }
}
