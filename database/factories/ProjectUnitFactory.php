<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectUnit>
 */
class ProjectUnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'project_id' => Project::all()->random()->id,
            'tenant_id' => User::all()->unique()->random()->id,
            'name' => fake()->name(),
        ];
    }

    private function getRandomUserId($id)
    {
        $user = User::find($id)->first();
        return $user->id;
    }
}
