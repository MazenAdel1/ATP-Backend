<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Coach extends Model implements HasMedia
{ use InteractsWithMedia;
    protected $fillable = ['name','phone'];
    public function games()
    {
        return $this->belongsToMany(Game::class,'game_coach');
    }
    // public function getImageAttribute()
    // {
    //     // بنحاول نجيب الصورة من الكولكشن اللي ظهر في الداتا بيز عندك
    //     // ولو ملقاش، بيرجع null
    //     return $this->getFirstMediaUrl('App\Models\Coach') ?: null;
    // }

}
