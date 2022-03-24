<?php

namespace Database\Factories;

use App\Models\Asset;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssetAssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'asset_id' => Asset::factory()->make(),
            'user_id' => User::factory()->make(),
            'assigned_by' => User::factory()->make(),
            'due_date' => $this->faker->date()
        ];
    }
}
