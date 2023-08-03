<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\data\HousekeeperDutie;

class KeeperdutieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $title = HousekeeperDutie::where('id', $this->keeperdutie_id)->value('title');
        return [
            'id' => $this->keeperdutie_id,
            'title' => $title            
        ];
    }
}
