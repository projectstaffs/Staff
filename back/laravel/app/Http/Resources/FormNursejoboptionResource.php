<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\data\JobOption;

class FormNursejoboptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $title = JobOption::where('id', $this->nursejoboption_id)->value('title');
        return [
            'id' => $this->nursejoboption_id,
            'title' => $title            
        ];
    }
}
