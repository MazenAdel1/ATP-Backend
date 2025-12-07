<?php
namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    protected $model=Game::class;
    public function definition()
    {
        // قائمة أسماء ألعاب حقيقية عشان يبقى شكلها حلو
        $games = ['MMA', 'Kickboxing', 'Boxing', 'Jiu-jitsu', 'CrossFit', 'Yoga', 'Wrestling', 'Karate'];
        
        return [
            // بناخد اسم عشوائي من اللي فوق
            'name' => $this->faker->unique()->randomElement($games),
            'description' => $this->faker->sentence(10), // وصف من 10 كلمات
        ];
    }
}