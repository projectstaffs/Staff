<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\data\JobOption;

class ClientJoboptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $title = JobOption::where('id', $this->joboption_id)->value('title');
        return [
            'id' => $this->joboption_id,
            'title' => $title            
        ];
    }
}
