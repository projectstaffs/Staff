<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\data\JobOption;

class KeeperjoboptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $title = JobOption::where('id', $this->keeperjoboption_id)->value('title');
        return [
            'id' => $this->keeperjoboption_id,
            'title' => $title            
        ];
    }
}
