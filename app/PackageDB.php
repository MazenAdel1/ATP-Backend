<?php

namespace App;

use App\Models\Package;

class PackageDB
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
        $Package = Package::create($data);
        if (isset($data['image'])) {
            $imageUrl = ImageService::upload($Package, 'package');
            $Package->image_url = $imageUrl;
            $Package->save();
        }

        return $Package;

    }

    public static function update(Package $package, $data)
    {
        $package->update($data);
        if (isset($data['image'])) {
            $imageUrl = ImageService::update($package, 'package');
            $package->image_url = $imageUrl;
            $package->save();
        }

        return $package;
    }

    public static function delete(Package $package)
    {
        $package->delete();
        ImageService::delete($package, 'package');

        return true;
    }

    public static function get_package($id)
    {
        return Package::findOrFail($id);

    }

    public static function attach_backage_to_game(Package $Package, $game_id)
    {
        $Package->game_id = $game_id;
        $Package->save();
    }
}
