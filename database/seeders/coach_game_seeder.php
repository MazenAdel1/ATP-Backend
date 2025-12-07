<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Coach;
use App\Models\Package;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class coach_game_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // 1. نكريت 5 ألعاب
        $games = Game::factory(5)->create();

        // 2. نكريت 10 كوتشات
        $coaches = Coach::factory(10)->create();

        // 3. نربط كل كوتش بألعاب عشوائية (من لعبة لـ 3 ألعاب)
        foreach ($coaches as $coach) {
            // هات عدد عشوائي من الألعاب (من 1 لـ 3)
            $randomGames = $games->random(rand(1, 3))->pluck('id');
            
            // اربطهم بالكوتش
            $coach->games()->attach($randomGames);
        }

        // // 4. (إضافي) نكريت باقات لكل لعبة بالمرة
        // foreach ($games as $game) {
        //     Package::factory(3)->create([
        //         'game_id' => $game->id
        //     ]);
        }
    }

