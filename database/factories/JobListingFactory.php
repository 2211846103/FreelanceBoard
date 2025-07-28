<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobListing>
 */
class JobListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "client_id" => User::factory(),
            "title" => fake()->sentence(1),
            "desc" => fake()->sentence(3, true),
            "budget" => fake()->randomFloat(2, 100, 500)
        ];
    }
}
