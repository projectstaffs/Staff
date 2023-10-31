<?php

namespace App\Http\Resources\Forms;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Data\Education;

class FormEducationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('educations')) { Cache::put('educations', Education::all()); }
        $Education = Cache::get('educations');        
        foreach ($Education as $item) {
            if($item->id == $this->education_id) {
                return [
                    'id' => $this->education_id,
                    'title' => $item->title            
                ];                
            }                           
        }
    }
}
