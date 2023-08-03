<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\data\AgeGroup;

class FormAgegroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $title = AgeGroup::where('id', $this->agegroup_id)->value('title');
        return [
            'id' => $this->agegroup_id,
            'title' => $title            
        ];
    }
}
