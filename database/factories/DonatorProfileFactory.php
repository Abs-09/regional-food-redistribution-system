<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DonatorProfile>
 */
class DonatorProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get user IDs where user_type is 2 and the user does not have a donatorprofile
        $userIds = User::where('type', 'donator')
            ->doesntHave('donatorprofile')
            ->pluck('id')
            ->toArray();

        // If there are no users without a donatorprofile, return null to skip this factory
        if (empty($userIds)) {
            return null;
        }

        return [
            'user_id' => fake()->randomElement($userIds),
            'donator_name' => fake()->company(),
            'registration' => fake()->numerify('BG-######'),
            'business_address' => fake()->address(),
        ];
    }
}
