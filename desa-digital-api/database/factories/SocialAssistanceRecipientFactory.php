<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SocialAssistanceRecipientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => $this->faker->randomFloat(2, 100000, 1000000),
            'reason' => $this->faker->sentence(),
            'banks' => $this->faker->randomElement(['bri', 'bni', 'mandiri', 'bca']),
            'account_number' => $this->faker->bankAccountNumber(),
            'proof' => $this->faker->url(),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
