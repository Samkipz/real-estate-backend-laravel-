<?php

namespace Database\Factories;

use App\Models\ProjectUnit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Issue>
 */
class IssueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'issue_number' => fake()->postcode(),
            'title' => fake()->sentence,
            'issue_type_id' => fake()->biasedNumberBetween(1,3),
            'description' => fake()->paragraph(),
            'project_units_id' => ProjectUnit::all()->unique()->random()->id,
            'creator_id' => User::all()->unique()->random()->id,
            'resolved' => fake()->biasedNumberBetween(0,1)
        ];
    }
}
