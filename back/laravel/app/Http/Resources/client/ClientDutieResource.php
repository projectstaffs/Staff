<?php

namespace App\Http\Resources\client;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\data\BabysittingDutie;

class ClientDutieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $title = BabysittingDutie::where('id', $this->dutie_id)->value('title');
        return [
            'id' => $this->dutie_id,
            'title' => $title            
        ];
    }
}
