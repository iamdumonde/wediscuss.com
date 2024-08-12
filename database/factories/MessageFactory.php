<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $senderId = fake()->randomElement([0, 1]);
        if ($senderId === 0) {
            $senderId = fake()->randomElement(\App\Models\User::where('id', '!=', 1)->pluck('id')->toArray());
            $receiverId = 1;
        } else {
            $receiverId = fake()->randomElement(\App\Models\User::pluck('id')->toArray());
        }
        
        $groupId = null;

        return [
            "message" => fake()->realText(),
            "sender_id" => $senderId,
            "receiver_id" => $receiverId,
            "group_id" => $groupId,
            "conversation_id" => '',
        ];
    }
}
