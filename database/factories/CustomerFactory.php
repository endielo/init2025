<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'attn' => fake()->name(),
            // 'department' => fake()->jobTitle(),
            'address' => fake()->address(),
            'tel' => fake()->phoneNumber(),
            'fax' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'remark' => fake()->sentence(),
        ];
    }
}
