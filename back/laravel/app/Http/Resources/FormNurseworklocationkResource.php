<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\data\WorkLocation;

class FormNurseworklocationkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $title = WorkLocation::where('id', $this->nurseworklocation_id)->value('title');
        return [
            'id' => $this->nurseworklocation_id,
            'title' => $title            
        ];
    }
}
