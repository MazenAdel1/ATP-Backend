<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PartnerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
     
        return [
            'id' => $this->id,
            'name' => $this->name,
            'links' => $this->links,
            'image' => $this->getFirstMediaUrl("partner"),
            'description'=>$this->description

        ];
    }
}
