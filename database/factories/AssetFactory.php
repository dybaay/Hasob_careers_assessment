<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function Sodium\increment;

class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->word(),
            'serial_number' =>$this->faker->numberBetween([0, 1]),
            'description' =>$this->faker->sentence(),
            'fixed_or_movable' =>$this->faker->name(),
            'picture_path' =>$this->faker->filePath(),
            'purchased_date' =>$this->faker->date(),
            'start_use_date' =>$this->faker->date(),
            'purchase_price' =>$this->faker->numberBetween([200, 500]),
            'warranty_expiry_date' =>$this->faker->date(),
            'degradation_in_years' =>$this->faker->name(),
            'current_value_in_naira' =>$this->faker->numberBetween([300, 900]),
            'location' =>$this->faker->word()

        ];
    }
}
