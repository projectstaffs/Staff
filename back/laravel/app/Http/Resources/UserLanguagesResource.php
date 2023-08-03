<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\data\Language;

class UserLanguagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $title = Language::where('id', $this->language_id)->value('title');
        return [
            'id' => $this->language_id,
            'title' => $title            
        ];
    }
}
