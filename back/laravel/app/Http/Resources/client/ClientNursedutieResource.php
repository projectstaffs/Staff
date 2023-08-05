<?php

namespace App\Http\Resources\client;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\data\NurseDutie;

class ClientNursedutieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $title = NurseDutie::where('id', $this->nursedutie_id)->value('title');
        return [
            'id' => $this->nursedutie_id,
            'title' => $title            
        ];
    }
}
