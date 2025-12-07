<?php

namespace App;

use App\Models\Coach;
use Illuminate\Support\Facades\DB;

class CoachDB
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function store($data)
    {
        return DB::transaction(function () use ($data) {
            $coach = Coach::create($data);
            if (isset($data['games'])) {
                $coach->games()->attach($data['games']);
            }
            if (isset($data['image'])) {
                ImageService::upload($coach, 'coach');
            }

            return $coach->load(['games']);
        });

    }

    public static function update(Coach $coach, $data)
    {
        $coach->update($data);
        if (isset($data['games'])) {
            $coach->games()->sync($data['games']);
        }
        if (isset($data['image'])) {

            ImageService::update($coach, 'coach');
        }

        return $coach;
    }

    public static function delete(Coach $coach)
    {
        $deleted = $coach->delete();
        if ($coach->hasMedia()) {
            ImageService::delete($coach, 'coach');
        }

        return $deleted;

    }
}
