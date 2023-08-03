<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\data\NursingSkill;

class FormNurseskillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $title = NursingSkill::where('id', $this->nurseskill_id)->value('title');
        return [
            'id' => $this->nurseskill_id,
            'title' => $title            
        ];
    }
}
