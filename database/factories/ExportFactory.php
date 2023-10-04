<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Export; // Adjust the namespace to match your model's location
use Faker\Generator as Faker;

class ExportFactory extends Factory
{
    protected $model = Export::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
        ];
    }
}
