<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PartnerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        // بنجيب آخر صورة من الميديا اللي اتحملت (عشان الـ load اللي في PartnerDB)
        $lastMedia = $this->media->last();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'links' => $this->links,
            'image' => $lastMedia ? $lastMedia->getUrl() : null,
            'description'=>$this->description

        ];
    }
}
