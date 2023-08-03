<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\data\HousekeeperTypeOfWork;

class KeepertypeworkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $title = HousekeeperTypeOfWork::where('id', $this->keepertypework_id)->value('title');
        return [
            'id' => $this->keepertypework_id,
            'title' => $title            
        ];
    }
}
