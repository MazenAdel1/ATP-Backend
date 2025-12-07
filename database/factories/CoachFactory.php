<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CoachFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name('male'), // أسماء رجالة (بما إن الجيم للكل ممكن تخليها name بس)
        ];
    }
}