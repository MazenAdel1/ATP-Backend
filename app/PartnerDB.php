<?php

namespace App;

use App\Models\Partner;
use Illuminate\Support\Facades\DB;
use App\ImageService;

class PartnerDB
{
    /**
     * Get All Partners
     */
    public static function all()
    {
        return Partner::get();
    }

    /**
     * Store New Partner
     */
    public static function store($data)
    {
        return DB::transaction(function () use ($data) {
            $partner = Partner::create($data);

            if (isset($data['image'])) {
                $imageUrl = ImageService::upload($partner, 'partner');
                $partner->image_url = $imageUrl;
                $partner->save();
            }

            return $partner;
        });
    }

    /**
     * Update Partner
     */
    public static function update($partner, $data)
    {
        return DB::transaction(function () use ($partner, $data) {
            $partner->update($data);

            if (isset($data['image'])) {
                $imageUrl = ImageService::update($partner, 'partner');
                $partner->image_url = $imageUrl;
                $partner->save();
            }

            return $partner;
        });
    }

    /**
     * Delete Partner
     */
    public static function delete($partner)
    {
        return DB::transaction(function () use ($partner) {
            $partner->delete();
            return true;
        });
    }
}