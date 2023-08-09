<?php

namespace App\Http\Resources\forms;

use Illuminate\Support\Facades\Cache;
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
        if(!Cache::has('languages')) { Cache::put('languages', Language::all()); }
        $Language = Cache::get('languages');        
        foreach ($Language as $item) {
            if($item->id == $this->language_id) {
                return [
                    'id' => $this->language_id,
                    'title' => $item->title            
                ];                
            }                           
        }
    }
}
