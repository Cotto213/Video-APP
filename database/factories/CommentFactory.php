<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users=User::pluck("id");
        return [
            "user_id" => $users->random(),
            "text" => fake()->text(rand(3,1000)),
        ];
    }

    public function years()
    {
        return $this->state(function (array $attributes) {
            return [
                "created_at"=> fake()->dateTimeBetween("-32 months", "-12 months")
            ];
        });
    }

    public function months()
    {
        return $this->state(function (array $attributes) {
            return [
                "created_at"=> fake()->dateTimeBetween("-12 months", "-0 months")
            ];
        });
    }

    public function days()
    {
        return $this->state(function (array $attributes) {
            return [
                "created_at"=> fake()->dateTimeThisMonth("-30 days")
            ];
        });
    }

    public function hours()
    {
        return $this->state(function (array $attributes) {
            return [
                "created_at"=> fake()->dateTimeBetween("-23 hours", "-0 hours")
            ];
        });
    }

    public function minutes()
    {
        return $this->state(function (array $attributes) {
            return [
                "created_at"=> fake()->dateTimeBetween("-59 minutes", "-0 minutes")
            ];
        });
    }
}
