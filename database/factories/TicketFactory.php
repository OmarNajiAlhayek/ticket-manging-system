<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userIds = User::pluck('id');
        return [
            'user_id' => $userIds
                        ?
                        $this->faker->randomElement($userIds)
                        :
                        User::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['pending', 'ongoing', 'testing', 'finished']),
            'deadline' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
