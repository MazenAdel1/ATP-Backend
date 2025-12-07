<?php

namespace App;

use App\Models\Coach;
use Illuminate\Database\Eloquent\Model;

class ImageService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function upload(Model $model,$model_name, $request_name='image')
    {
          $model->addMediaFromRequest($request_name)->toMediaCollection($model_name);
    }
  
    public static function update(Model $model,$model_name, $request_name='image')
    {
        self::delete($model,$model_name);
        self::upload($model,$model_name, $request_name);
    }

    public static function delete(Model $model,$model_name)
    {
        $model->clearMediaCollection($model_name);

    }
}
