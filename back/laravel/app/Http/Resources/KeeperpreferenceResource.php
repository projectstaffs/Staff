<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\data\HousekeeperPreference;

class KeeperpreferenceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $title = HousekeeperPreference::where('id', $this->keeperpreference_id)->value('title');
        return [
            'id' => $this->keeperpreference_id,
            'title' => $title            
        ];
    }
}
