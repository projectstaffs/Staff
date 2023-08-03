<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\data\Education;

class FormEducationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $title = Education::where('id', $this->education_id)->value('title');
        return [
            'id' => $this->education_id,
            'title' => $title            
        ];
    }
}
