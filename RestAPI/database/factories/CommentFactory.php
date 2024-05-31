<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $parentComment = $this->faker->boolean(70) ? null : Comment::inRandomOrder()->first();

        return [
            'user_name' => $this->faker->userName,
            'email' => $this->faker->safeEmail,
            'home_page' => $this->faker->url,
            'text' => $this->faker->text,
            'parent_id' => $parentComment,
            'author_id' => null
        ];
    }
}
